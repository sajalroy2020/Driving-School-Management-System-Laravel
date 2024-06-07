<?php

namespace App\Http\Services;

use App\Models\FileHandler;
use App\Models\User;
use App\Models\UserContact;
use App\Models\UserDocument;
use App\Traits\JsonResponseTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class StaffService
{
    use JsonResponseTrait;

    public function list()
    {
        $stdInfo = User::where(['role' => USER_ROLE_STAFF, 'tenant_id' => auth()->user()->tenant_id]);

        return datatables($stdInfo)
            ->addIndexColumn()
            ->addColumn('image', function ($stdInfo) {
                return "
                    <div class='flex-shrink-0 w-30 h-30 rounded-circle overflow-hidden'>
                        <img src='" . getFileLink($stdInfo->picture) . "' alt='image' />
                    </div>";
            })
            ->addColumn('email', function ($stdInfo) {
                return "<p>$stdInfo->email</p>";
            })
            ->addColumn('name', function ($stdInfo) {
                return "<p>$stdInfo->name</p>";
            })
            ->addColumn('status', function ($stdInfo) {
                return getUserStatusHtml($stdInfo->status);
            })
            ->addColumn('action', function ($data) {
                return '<div class="dropdown dropdown-one">
                                <button class="dropdown-toggle p-0 bg-transparent w-22 h-22 ms-auto bd-one bd-c-stroke rounded-circle fs-13 text-main-color d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                <ul class="dropdown-menu dropdownItem-one">
                                    <li>
                                        <a href="' . route('admin.staff.edit', encrypt($data->id)) . '" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                            <img src="' . asset('assets/images/icon/edit.svg') . '" alt="edit" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Edit") . '</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="' . route('admin.staff.view', encrypt($data->id)) . '" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                            <img src="' . asset('assets/images/icon/view.svg') . '" alt="view" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("View") . '</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="deleteCommonMethod(\'' . route('admin.staff.delete', encrypt($data->id)) . '\', \'staffDataTable\')" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                           <img src="' . asset('assets/images/icon/trash.svg') . '" alt="delete" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Delete") . '</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>';
            })
            ->rawColumns(['image', 'email', 'name', 'action', 'status'])
            ->make(true);
    }

    public function getStaffById($id)
    {
        return User::where('id', $id)->with(['contactList', 'documentList', 'roles'])->first();
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $id = $request->get('id', 0);
            $authUser = auth()->user();
            if ($id != 0) {
                $id = decrypt($id);
                $staff = User::find($id);
                $msg = __(MSG_UPDATED_SUCCESSFULLY);

                $chekDataExist = UserDocument::where('user_id', $id)->get();
                if (count($chekDataExist) > 0) {
                    foreach ($chekDataExist as $item) {
                        $item->delete();
                    }
                }
                $stdContacts = UserContact::where('user_id', $id)->first();

            } else {
                $staff = new User();
                $stdContacts = new UserContact();
                $msg = __(MSG_CREATED_SUCCESSFULLY);
            }


            if ($request->hasFile('image')) {
                $existFile = FileHandler::where('id', $authUser->picture)->first();
                if ($existFile) {
                    $existFile->removeFile();
                    $uploaded = $existFile->upload('User', $request->image, '', $existFile->id);
                } else {
                    $newFile = new FileHandler();
                    $uploaded = $newFile->upload('User', $request->image);
                }
                $staff->picture = $uploaded->id;
            }

            $staff->name = $request->name;
            $staff->email = $request->email;
            $staff->phone = $request->number;
            $staff->address = $request->address;
            $staff->country = $request->country;
            $staff->state = $request->state;
            $staff->city = $request->city;
            $staff->role = USER_ROLE_STAFF;
            $staff->zip = $request->zip_code;
            $staff->dob = $request->date_of_birth;
            $staff->gender = $request->gender;
            $staff->status = isset($request->status) ? $request->status : USER_STATUS_ACTIVE;
            $staff->password = Hash::make($request->password);
            $staff->tenant_id = $authUser->tenant_id;
            $staff->save();

            $staff->syncRoles(decrypt($request->role));

            if ($id == 0) {
                $studentId = 'STF' . sprintf('%06d', $staff->id);
                User::where('id', $staff->id)->update(['student_id' => $studentId]);
            }

            if (!is_null($request->contact_name) || !is_null($request->contact_address) || !is_null($request->contact_relation) || !is_null($request->contact_phone)) {
                $stdContacts->user_id = $staff->id;
                $stdContacts->contact_person = $request->contact_name;
                $stdContacts->contact_address = $request->contact_address;
                $stdContacts->contact_relation = $request->contact_relation;
                $stdContacts->contact_phone = $request->contact_phone;
                $stdContacts->save();
            }

            if (!empty($request->documents_file) || !empty($request->documents_file_edit)) {
                foreach ($request->document_type as $key => $document_type) {
                    $stdDocument = new UserDocument();
                    $stdDocument->user_id = $staff->id;
                    $stdDocument->document_type = $request->document_type[$key];
                    $stdDocument->document_name = $request->document_name[$key];

                    if ($request->id) {
                        if ($request->hasFile('documents_file.' . $key)) {
                            $new_file = new FileHandler();
                            $uploaded = $new_file->upload('studentDocument', $request->documents_file[$key]);
                            $stdDocument->document_file_id = $uploaded->id;
                        } else {
                            $stdDocument->document_file_id = $request->documents_file_edit[$key];
                        }
                    } else {
                        if ($request->hasFile('documents_file.' . $key)) {
                            $new_file = new FileHandler();
                            $uploaded = $new_file->upload('studentDocument', $request->documents_file[$key]);
                            $stdDocument->document_file_id = $uploaded->id;
                        }
                    }

                    $stdDocument->save();
                }
            }

            DB::commit();
            return $this->successResponse([], $msg);

        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $student = User::find($id);
            $studentContact = UserContact::where('user_id', $id)->first();
            $studentDocument = UserDocument::where('user_id', $id)->get();

            if (!is_null($student)){
                $student->delete();
            }
            if (!is_null($studentContact)){
                $studentContact->delete();
            }
            if (!empty($studentDocument)) {
                foreach ($studentDocument as $item) {
                    $item->delete();
                }
            }
            DB::commit();
            return $this->successResponse([], __(MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

}
