<?php

namespace App\Http\Services;

use App\Models\FileHandler;
use App\Models\Instructor;
use App\Models\User;
use App\Models\UserDocument;
use App\Traits\JsonResponseTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class InstructorService
{
    use JsonResponseTrait;

    public function list()
    {
        $instructorInfo = User::where(['role' => USER_ROLE_INSTRUCTOR, 'tenant_id' => auth()->user()->tenant_id]);
        return datatables($instructorInfo)
            ->addIndexColumn()
            ->addColumn('image', function ($instructorInfo) {
                return "
                    <div class='flex-shrink-0 w-30 h-30 rounded-circle overflow-hidden'>
                        <img src='" . getFileLink($instructorInfo->picture) . "' alt='image' />
                    </div>";
            })
            ->addColumn('email', function ($instructorInfo) {
                return "<p>$instructorInfo->email</p>";
            })
            ->addColumn('name', function ($instructorInfo) {
                return "<p>$instructorInfo->name</p>";
            })
            ->addColumn('status', function ($instructorInfo) {
                return getUserStatusHtml($instructorInfo->status);
            })
            ->addColumn('action', function ($data) {
                return '<div class="dropdown dropdown-one">
                                <button class="dropdown-toggle p-0 bg-transparent w-22 h-22 ms-auto bd-one bd-c-stroke rounded-circle fs-13 text-main-color d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                <ul class="dropdown-menu dropdownItem-one">
                                    <li>
                                        <a href="' . route('admin.instructor.view', encrypt($data->id)) . '" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                            <img src="' . asset('assets/images/icon/view.svg') . '" alt="view" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("View") . '</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="' . route('admin.instructor.edit', encrypt($data->id)) . '" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                            <img src="' . asset('assets/images/icon/edit.svg') . '" alt="edit" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Edit") . '</p>
                                        </a>
                                    </li>
                                    <li>
                                        <button onclick="deleteCommonMethod(\'' . route('admin.instructor.delete', encrypt($data->id)) . '\', \'instructorDataTable\')" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                            <img src="' . asset('assets/images/icon/trash.svg') . '" alt="delete" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Delete") . '</p>
                                        </button>
                                    </li>
                                </ul>
                            </div>';
            })
            ->rawColumns(['image', 'email', 'name', 'action', 'status'])
            ->make(true);
    }

    public function getById($id)
    {
        return User::where('id', $id)->with(['instructor', 'documentList'])->first();
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $id = $request->get('id', 0);
            $authUser = auth()->user();

            if ($id != 0) {
                $id = decrypt($id);
                $instructor = User::find($id);
                $msg = __(MSG_UPDATED_SUCCESSFULLY);

                $chekDataExist = UserDocument::where('user_id', $id)->get();
                if (count($chekDataExist) > 0) {
                    foreach ($chekDataExist as $item) {
                        $item->delete();
                    }
                }
                $instructorContacts = Instructor::where('user_id', $id)->first();

            } else {
                $instructor = new User();
                $instructorContacts = new Instructor();
                $msg = __(MSG_CREATED_SUCCESSFULLY);
            }

            if ($request->hasFile('image')) {
                $existFile = FileHandler::where('id', $authUser->picture)->first();
                if ($existFile) {
                    $existFile->removeFile();
                    $uploaded = $existFile->upload('Instructor', $request->image, '', $existFile->id);
                } else {
                    $newFile = new FileHandler();
                    $uploaded = $newFile->upload('Instructor', $request->image);
                }
                $instructor->picture = $uploaded->id;
            }

            $instructor->name = $request->name;
            $instructor->email = $request->email;
            $instructor->phone = $request->number;
            $instructor->address = $request->address;
            $instructor->country = $request->country;
            $instructor->state = $request->state;
            $instructor->city = $request->city;
            $instructor->role = USER_ROLE_INSTRUCTOR;
            $instructor->zip = $request->zip_code;
            $instructor->gender = $request->gender;
            $instructor->dob = $request->date_of_birth;
            $instructor->status = isset($request->status) ? $request->status : USER_STATUS_ACTIVE;
            $instructor->password = Hash::make($request->password);
            $instructor->tenant_id = $authUser->tenant_id;
            $instructor->save();

            if ($id == 0) {
                $instructorId = 'STD' . sprintf('%06d', $instructor->id);
                User::where('id', $instructor->id)->update(['instructor_id' => $instructorId]);
            }

                $instructorContacts->user_id = $instructor->id;
                $instructorContacts->license_number = $request->license_number;
                $instructorContacts->driving_experience = $request->driving_experience;
                $instructorContacts->educational_qualification = $request->educational_qualification;
                $instructorContacts->contact_person = $request->contact_name;
                $instructorContacts->contact_address = $request->contact_address;
                $instructorContacts->contact_relation = $request->contact_relation;
                $instructorContacts->contact_phone = $request->contact_phone;
                $instructorContacts->save();

            if (!empty($request->documents_file) || !empty($request->documents_file_edit)) {
                foreach ($request->document_type as $key => $document_type) {
                    $instructorDocument = new UserDocument();
                    $instructorDocument->user_id = $instructor->id;
                    $instructorDocument->document_type = $request->document_type[$key];
                    $instructorDocument->document_name = $request->document_name[$key];

                    if ($request->id) {
                        if ($request->hasFile('documents_file.' . $key)) {
                            $new_file = new FileHandler();
                            $uploaded = $new_file->upload('InstructorDocument', $request->documents_file[$key]);
                            $instructorDocument->document_file_id = $uploaded->id;
                        } else {
                            $instructorDocument->document_file_id = $request->documents_file_edit[$key];
                        }
                    } else {
                        if ($request->hasFile('documents_file.' . $key)) {
                            $new_file = new FileHandler();
                            $uploaded = $new_file->upload('InstructorDocument', $request->documents_file[$key]);
                            $instructorDocument->document_file_id = $uploaded->id;
                        }
                    }

                    $instructorDocument->save();
                }
            }
            DB::commit();
            return $this->successResponse([], $msg);
        } catch
        (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            Log::info($exception->getMessage());
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $instructor = User::find($id);
            $instructorContact = Instructor::where('user_id', $id)->first();
            $instructorDocument = UserDocument::where('user_id', $id)->get();

            $instructor->delete();
            $instructorContact->delete();
            if (!empty($instructorDocument)) {
                foreach ($instructorDocument as $item) {
                    $item->delete();
                }
            }
            DB::commit();
            return $this->successResponse([], __(MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

}
