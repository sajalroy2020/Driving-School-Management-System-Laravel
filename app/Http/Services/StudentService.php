<?php

namespace App\Http\Services;

use App\Models\Enrolment;
use App\Models\FileHandler;
use App\Models\User;
use App\Models\UserContact;
use App\Models\UserDocument;
use App\Traits\JsonResponseTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class StudentService
{
    use JsonResponseTrait;

    public function list()
    {
        if (auth()->user()->role == USER_ROLE_INSTRUCTOR) {
            $stdInfo = Enrolment::leftJoin('packages', 'packages.id', '=', 'enrolments.package_id')
                ->leftJoin('users', 'users.id', '=', 'enrolments.student_id')
                ->whereJsonContains('packages.instructors_id', (string)auth()->id())
                ->select('users.*');
        } else {
            $stdInfo = User::where(['role' => USER_ROLE_STUDENT, 'tenant_id' => auth()->user()->tenant_id]);
        }
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
                if (auth()->user()->role == USER_ROLE_INSTRUCTOR) {
                    return '<div class="dropdown dropdown-one">
                                <button class="dropdown-toggle p-0 bg-transparent w-22 h-22 ms-auto bd-one bd-c-stroke rounded-circle fs-13 text-main-color d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                <ul class="dropdown-menu dropdownItem-one">
                                    <li>
                                        <a href="' . route('instructor.student.view', encrypt($data->id)) . '" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                            <img src="' . asset('assets/images/icon/view.svg') . '" alt="view" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("View") . '</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>';
                } else {
                    return '<div class="dropdown dropdown-one">
                        <button class="dropdown-toggle p-0 bg-transparent w-22 h-22 ms-auto bd-one bd-c-stroke rounded-circle fs-13 text-main-color d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                        <ul class="dropdown-menu dropdownItem-one">
                            <li>
                                <a href="' . route('admin.student.edit', encrypt($data->id)) . '" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                    <img src="' . asset('assets/images/icon/edit.svg') . '" alt="edit" />
                                    <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Edit") . '</p>
                                </a>
                            </li>
                            <li>
                                <a href="' . route('admin.student.view', encrypt($data->id)) . '" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                    <img src="' . asset('assets/images/icon/view.svg') . '" alt="view" />
                                    <p class="fs-14 fw-500 lh-19 text-main-color">' . __("View") . '</p>
                                </a>
                            </li>
                            <li>
                                <button onclick="deleteCommonMethod(\'' . route('admin.student.delete', encrypt($data->id)) . '\', \'studentDataTable\')" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                    <img src="' . asset('assets/images/icon/trash.svg') . '" alt="delete" />
                                    <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Delete") . '</p>
                                </button>
                            </li>
                        </ul>
                    </div>';
                }
            })
            ->rawColumns(['image', 'email', 'name', 'action', 'status'])
            ->make(true);
    }

    public function getStudentById($id)
    {
        return User::where('id', $id)->with(['contactList', 'documentList'])->first();
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $id = $request->get('id', 0);
            $authUser = auth()->user();
            if ($id != 0) {
                $id = decrypt($id);
                $student = User::find($id);
                $msg = __(MSG_UPDATED_SUCCESSFULLY);

                $chekDataExist = UserDocument::where('user_id', $id)->get();
                if (count($chekDataExist) > 0) {
                    foreach ($chekDataExist as $item) {
                        $item->delete();
                    }
                }
                $stdContacts = UserContact::where('user_id', $id)->first();

            } else {
                $student = new User();
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
                $student->picture = $uploaded->id;
            }

            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->number;
            $student->gender = $request->gender;
            $student->address = $request->address;
            $student->country = $request->country;
            $student->state = $request->state;
            $student->city = $request->city;
            $student->role = USER_ROLE_STUDENT;
            $student->zip = $request->zip_code;
            $student->dob = $request->date_of_birth;
            $student->status = isset($request->status) ? $request->status : USER_STATUS_ACTIVE;
            $student->password = Hash::make($request->password);
            $student->tenant_id = $authUser->tenant_id;
            $student->save();

            if ($id == 0) {
                $studentId = 'STD' . sprintf('%06d', $student->id);
                User::where('id', $student->id)->update(['student_id' => $studentId]);
            }

            if (!is_null($request->contact_name) || !is_null($request->contact_address) || !is_null($request->contact_relation) || !is_null($request->contact_phone)) {
                $stdContacts->user_id = $student->id;
                $stdContacts->contact_person = $request->contact_name;
                $stdContacts->contact_address = $request->contact_address;
                $stdContacts->contact_relation = $request->contact_relation;
                $stdContacts->contact_phone = $request->contact_phone;
                $stdContacts->save();
            }

            if (!empty($request->documents_file) || !empty($request->documents_file_edit)) {
                foreach ($request->document_type as $key => $document_type) {
                    $stdDocument = new UserDocument();
                    $stdDocument->user_id = $student->id;
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

            $student->delete();
            if (!is_null($studentContact)) {
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
