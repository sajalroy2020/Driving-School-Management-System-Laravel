<?php

namespace App\Http\Services;

use App\Models\FileHandler;
use App\Models\User;
use App\Traits\JsonResponseTrait;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileService
{
    use JsonResponseTrait;

    public function getById($id)
    {
        return User::where('id', $id)->with(['contactList', 'documentList'])->first();
    }

    public function profileUpdate($request)
    {
        DB::beginTransaction();
        try {
            $authUser = auth()->user();
            $student = User::find(auth()->id());
            $msg = __(MSG_UPDATED_SUCCESSFULLY);

            if ($request->hasFile('image')) {
                $existFile = FileHandler::where('id', $authUser->picture)->first();
                if ($existFile) {
                    $existFile->removeFile();
                    $uploaded = $existFile->upload('User', $request->image, '', $existFile->id);
                } else {
                    $newFile = new FileHandler();
                    $uploaded = $newFile->upload('User', $request->image);
                }
                $student->picture = $uploaded->id;
            }

            $student->name = $request->name;
            $student->phone = $request->number;
            $student->gender = $request->gender;
            $student->address = $request->address;
            $student->country = $request->country;
            $student->state = $request->state;
            $student->city = $request->city;
            $student->zip = $request->zip_code;
            $student->dob = $request->date_of_birth;
            $student->save();

            DB::commit();
            return $this->successResponse([], $msg);

        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function passwordUpdate($request)
    {
        try {
            $hashedPassword = Auth::user()->password;

            if (Hash::check($request->current_password, $hashedPassword)) {
                DB::beginTransaction();
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                DB::commit();
                Auth::logout();
                return $this->successResponse([], __(MSG_UPDATED_SUCCESSFULLY));
            } else {
                return $this->errorResponse([], __("Current password dose not match!"));
            }
        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

}
