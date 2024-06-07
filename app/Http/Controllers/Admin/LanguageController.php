<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LanguageSettingRequest;
use App\Models\FileHandler;
use App\Models\MultiLanguage;
use App\Traits\JsonResponseTrait;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    use JsonResponseTrait;

    public function store(LanguageSettingRequest $request)
    {
        DB::beginTransaction();
        try {

            if ($request->id) {
                $language = MultiLanguage::find($request->id);
                $message = __(MSG_UPDATED_SUCCESSFULLY);
            } else {
                $language = new MultiLanguage();
                $message = __(MSG_CREATED_SUCCESSFULLY);
            }

            if ($request->hasFile('flag_image')) {

                $new_file = MultiLanguage::where('id', $language->flag_image)->first();
                if ($new_file) {
                    $new_file->removeFile();
                    $uploaded = $new_file->upload('Language Flag Image', $request->flag_image, '', $new_file->id);
                    if (!is_null($uploaded)) {
                        $language->flag_image = $uploaded->id;
                    }
                } else {
                    $newFile = new FileHandler();
                    $uploaded = $newFile->upload('Language Flag Image', $request->flag_image);
                    if (!is_null($uploaded)) {
                        $language->flag_image = $uploaded->id;
                    }
                }
            }

            if ($request->hasFile('applicable_font')) {
                $new_file = MultiLanguage::where('id', $language->font)->first();
                if ($new_file) {
                    $new_file->removeFile();
                    $uploaded = $new_file->upload('Language Font', $request->applicable_font, '', $new_file->id);
                    if (!is_null($uploaded)) {
                        $language->font = $uploaded->id;
                    }
                } else {
                    $newFile = new FileHandler();
                    $uploaded = $newFile->upload('Language Font', $request->applicable_font);

                    if (!is_null($uploaded)) {
                        $language->font = $uploaded->id;
                    }
                }
            }


            if ($request->has('default')) {
                MultiLanguage::where('id', '!=', 0)->update(['default' => 0]);
            }
            $language->language = $request->language_name;
            $language->iso_code = $request->iso_code;
            $language->rtl = $request->rtl_enable;
            $language->default = $request->has('default_language') ? STATUS_ACTIVE : STATUS_DISABLE;
            $language->save();

            if (isset($request->default) == 1) {
                MultiLanguage::where('id', '!=', $language->id)->where('default', STATUS_ACTIVE)->update(['default' => STATUS_DISABLE]);
            }
            $defaultLanguage = MultiLanguage::where('default', STATUS_ACTIVE)->first();
            if ($defaultLanguage) {
                $ln = $defaultLanguage->iso_code;
                session(['local' => $ln]);
                session()->get('local');
                App::setLocale(session()->get('local'));
            }
            $path = resource_path('lang/');
            fopen($path . "$request->iso_code.json", "w");
            file_put_contents($path . "$request->iso_code.json", '{}');
            DB::commit();
            return $this->successResponse([], $message);

        } catch
        (Exception $e) {
            DB::rollBack();
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function edit($id)
    {
        $data['language'] = MultiLanguage::find($id);
        return view('admin.settings.languages.edit_form', $data);
    }

    public function delete($id)
    {
        try {
            $lang = MultiLanguage::find($id);
            if ($lang->default == 1) {
                return $this->errorResponse([],__('You Cannot delete default language'));
            }

            $path = resource_path() . "/lang/$lang->iso_code.json";
            if (file_exists($path)) {
                @unlink($path);
            }

            $file = FileHandler::where('id', $lang->flag_image)->first();
            if ($file) {
                $file->removeFile();
                $file->delete();
            }

            $lang->delete();
            return $this->successResponse([], __(MSG_DELETED_SUCCESSFULLY));
        }catch (Exception $exception){
            return $this->errorResponse([],__(MSG_SOMETHING_WENT_WRONG));
        }

    }

    public function translateLanguage($id){
        try {
            $data['language'] = MultiLanguage::find($id);
            $iso_code = $data['language']->iso_code;
            $path = resource_path() . "/lang/$iso_code.json";
            if (!file_exists($path)) {
                fopen(resource_path() . "/lang/$iso_code.json", "w");
                file_put_contents(resource_path() . "/lang/$iso_code.json", '{}');
            }
            $translatorsData = json_decode(file_get_contents(resource_path() . "/lang/$iso_code.json"), true);

            if(empty($translatorsData)){
                $language = MultiLanguage::where('status', STATUS_ACTIVE)->get();
                if (count($language) > 1){
                    foreach ($language as $lang){
                        if ($lang->iso_code != $iso_code){
                            $contents = file_get_contents(resource_path() . "/lang/$lang->iso_code.json");
                            file_put_contents(resource_path() . "/lang/$iso_code.json", $contents);
                            break;
                        }
                    }
                }

            }
            $translatorsData = json_decode(file_get_contents(resource_path() . "/lang/$iso_code.json"), true);

            $data['translators'] = $translatorsData;
            $data['languages'] = MultiLanguage::where('iso_code', '!=', $iso_code)->get();



            return view('admin.settings.languages.translate_modal', $data);

        }catch (Exception $exception){
            dd($exception->getMessage());
            return $this->errorResponse([],__(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function updateTranslate(Request $request, $id)
    {
        $request->validate([
            'key' => 'required',
            'val' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $language = MultiLanguage::find($id);
            $key = $request->key;
            $val = $request->val;
            $is_new = $request->is_new;
            $path = resource_path() . "/lang/$language->iso_code.json";
            $file_data = json_decode(file_get_contents($path), 1);

            if (!array_key_exists($key, $file_data)) {
                $file_data = array($key => $val) + $file_data;
            } else if ($is_new) {
                $message = __("Already Exist");
                return $this->error([], $message);
            } else {
                $file_data[$key] = $val;
            }
            unlink($path);
            file_put_contents($path, json_encode($file_data));
            DB::commit();
            return $this->successResponse([], __(MSG_UPDATED_SUCCESSFULLY));
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse([], $e->getMessage());
        }
    }

}
