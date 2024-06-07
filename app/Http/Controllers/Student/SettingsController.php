<?php

namespace App\Http\Controllers\Student;

use App\Http\Requests\Admin\ApplicationSettingRequest;
use App\Http\Requests\Admin\LanguageSettingRequest;
use App\Http\Requests\Admin\MaintenanceModeSettingRequest;
use App\Http\Requests\Admin\SettingConfigurationRequest;
use App\Http\Requests\Admin\StorageSettingRequest;
use App\Mail\CommonEmailHandler;
use App\Models\FileHandler;
use App\Models\MultiLanguage;
use App\Models\PaymentGateway;
use App\Models\Setting;
use App\Models\User;
use App\Traits\JsonResponseTrait;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TimeScheduleRequest;
use App\Models\TimeScheduleSetting;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SettingsController extends Controller
{
    use JsonResponseTrait;

    public function index()
    {
        $data['pageTitle'] = __("Settings");
        $data['activeSettingsMenu'] = "active";
        $data['timezones'] = getTimeZone();
        $data['languageList'] = MultiLanguage::all();
        $data['paymentGatewayList'] = PaymentGateway::where(['tenant_id'=> auth()->user()->tenant_id,])->get();
        $data['timeSchedule'] = TimeScheduleSetting::where(['tenant_id'=> auth()->user()->tenant_id,])->get();

        return view('admin.settings.index', $data);
    }

    public function profileUpdate(Request $request)
    {
        try {
            $user = User::find(auth()->id());
            if ($request->image) {
                $existFile = FileHandler::where('id', $user->image)->first();
                if ($existFile) {
                    $this->removeFile();
                    $uploadedFile = $existFile->upload('User', $request->image, '', $existFile->id);
                    $user->picture = $uploadedFile->id;
                } else {
                    $newFile = new FileHandler();
                    $uploadedFile = $newFile->upload('User', $request->image);
                    $user->picture = $uploadedFile->id;
                }
            }
//            $user->company_designation = $request->designation_id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return $this->successResponse([], __(MSG_UPDATED_SUCCESSFULLY));
        } catch (Exception $exception) {
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function configurationStatusChange(Request $request)
    {
        try {
            if ($request->ajax()) {
                $option = Setting::firstOrCreate(['option_key' => $request->option_key]);
                $option->option_value = $request->option_value;
                $option->save();
                return $this->successResponse([], __(MSG_UPDATED_SUCCESSFULLY));
            }
        } catch (Exception $exception) {
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function configurationModalRender(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = view('admin.settings.config.' . $request->render_name)->render();
                return $this->successResponse($data, __('Successful'));
            }
        } catch (Exception $exception) {
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function configurationDataUpdate(SettingConfigurationRequest $request)
    {
        try {

            $requestArray = Arr::except($request->all(), ['_token']);
            unset($requestArray['config_type']);
            $this->settingDataUpdate($requestArray);
            return $this->successResponse([], __('Successful'));
        } catch (Exception $exception) {
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function maintenanceModeUpdate(MaintenanceModeSettingRequest $request)
    {
        try {
            $requestArray = Arr::except($request->all(), ['_token']);
            $this->settingDataUpdate($requestArray, false);

            if ($request->maintenance_mode_status == 2) {
                Artisan::call('up');
                $secret_key = 'down --secret="' . $request->maintenance_mode_secret_key . '"';
                Artisan::call($secret_key);
            } else {
                Artisan::call('up');
            }

            return $this->successResponse([], __('Successful'));
        } catch (Exception $exception) {
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    private function settingDataUpdate($requestArray, $env = true)
    {
        foreach ($requestArray as $key => $value) {
            $option = Setting::firstOrCreate(['option_key' => $key]);
            $option->option_value = $value;
            $option->save();
            if ($env) {
                setEnvironmentValue($key, $value);
            }
        }

    }

    public function configurationTestEmail(SettingConfigurationRequest $request)
    {
        try {
            Mail::to($request->email_address)->send(new CommonEmailHandler($request->email_subject, $request->email_body));
            return $this->successResponse([], __(MSG_SENT_SUCCESSFULLY));
        } catch (Exception $exception) {
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function applicationSetting(ApplicationSettingRequest $request)
    {
        try {

            $requestArray = Arr::except($request->all(), ['_token']);
            foreach ($requestArray as $key => $value) {

                if ($key == 'app_preloader' || $key == 'app_logo' || $key == 'app_fav_icon') {
                    $existFile = FileHandler::where('id', getSetting($key))->first();
                    if ($existFile) {
                        $existFile->removeFile();
                        $uploadedFile = $existFile->upload('Application Setting', $value, '', $existFile->id);
                        $value = $uploadedFile->id;
                    } else {
                        $newFile = new FileHandler();
                        $uploadedFile = $newFile->upload('Application Setting', $value);
                        $value = $uploadedFile->id;
                    }
                }
                $option = Setting::firstOrCreate(['option_key' => $key]);
                $option->option_value = $value;
                $option->save();
//                setEnvironmentValue($key, $value);
            }

            return $this->successResponse([], __(MSG_UPDATED_SUCCESSFULLY));
        } catch (Exception $exception) {
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function storageDriverUpdate(StorageSettingRequest $request)
    {

        try {
            $requestArray = Arr::except($request->all(), ['_token']);
            $values['STORAGE_DRIVER'] = $request->STORAGE_DRIVER;
            if (updateEnv($values)) {
                Artisan::call('optimize:clear');
                foreach ($requestArray as $key => $value) {
                    $option = Setting::firstOrCreate(['option_key' => $key]);
                    $option->option_value = $value;
                    $option->save();
                    if ($request->STORAGE_DRIVER != STORAGE_DRIVER_PUBLIC) {

                        if ($key != 'STORAGE_DRIVER') {
                            $customKey = '';
                            if ($request->STORAGE_DRIVER == STORAGE_DRIVER_AWS) {
                                $customKey = 'AWS_' . $key;
                            } elseif ($request->STORAGE_DRIVER == STORAGE_DRIVER_VULTR) {
                                $customKey = 'VULTR_' . $key;
                            } elseif ($request->STORAGE_DRIVER == STORAGE_DRIVER_WASABI) {
                                $customKey = 'WASABI_' . $key;
                            }
                            setEnvironmentValue($customKey, $value);
                        }
                    }
                }
                return $this->successResponse([], __(MSG_UPDATED_SUCCESSFULLY));
            } else {
                return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
            }
        } catch (Exception $exception) {
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }

    }

    public function storageLink()
    {
        try {
            if (file_exists(public_path('storage'))) {
                File::delete(public_path('storage'));
                Artisan::call('storage:link');
            } else {
                Artisan::call('storage:link');
            }
            return redirect()->back()->with('success', 'Storage Link Updated');
        } catch (Exception $e) {
            return redirect()->back()->with('error', __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function cacheClear($id)
    {
        if ($id == CLEAR_ROUTE_CACHE) {
            Artisan::call('route:clear');
            return redirect()->back()->with('success', 'Route cache cleared successfully');
        } elseif ($id == CLEAR_VIEW_CACHE) {
            Artisan::call('view:clear');
            return redirect()->back()->with('success', 'Views cache cleared successfully');
        } elseif ($id == CLEAR_CONFIG_CACHE) {
            Artisan::call('config:clear');
            return redirect()->back()->with('success', 'Configuration cache cleared successfully');
        } elseif ($id == CLEAR_APPLICATION_CACHE) {
            Artisan::call('cache:clear');
            return redirect()->back()->with('success', 'Application cache cleared successfully');
        } elseif ($id == CLEAR_ALL_CACHE) {
            Artisan::call('optimize:clear');
            return redirect()->back()->with('success', 'All cache cleared successfully');
        }
        return redirect()->back()->with('error', __(MSG_SOMETHING_WENT_WRONG));
    }

    public function addNewLanguage(LanguageSettingRequest $request)
    {
        try {
            DB::beginTransaction();
            DB::commit();
            return $this->successResponse([], __(MSG_CREATED_SUCCESSFULLY));
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    // store Time Schedule data
    public function timeScheduleStore(TimeScheduleRequest $request)
    {
        DB::beginTransaction();

        try {
            $authUser = auth()->user();

            TimeScheduleSetting::where('tenant_id', $authUser->tenant_id)->delete();

            foreach ($request->start_time as $key => $start_time) {
                $time = new TimeScheduleSetting();
                $time->start_time = $request->start_time[$key];
                $time->end_time = $request->end_time[$key];
                $time->tenant_id = $authUser->tenant_id;
                $time->save();
            }

            DB::commit();
            return $this->successResponse([], __("Time schedule settings saved successfully."));
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            return $this->errorResponse([], __("An error occurred while saving time schedule settings."));
        }
    }

}
