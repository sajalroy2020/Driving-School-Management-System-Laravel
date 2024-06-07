<?php

namespace App\Http\Services;

use App\Models\Enrolment;
use App\Models\Instructor;
use App\Models\Package;
use App\Models\Payment;
use App\Models\TimeScheduleSetting;
use App\Traits\JsonResponseTrait;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\JsonDecoder;

class EnrolmentService
{
    use JsonResponseTrait;

    public function list($status = null)
    {
        if ($status == 'student') {
            $getData = Enrolment::where('student_id', auth()->id())
                ->with(['package', 'student']);
        } else {
            $getData = Enrolment::where('tenant_id', auth()->user()->tenant_id)
                ->with(['package', 'student']);
        }

        return datatables($getData)
            ->addIndexColumn()
            ->addColumn('enrolment_id', function ($getData) {
                return $getData->register_id;
            })
            ->addColumn('package_name', function ($getData) {
                return $getData->package->package_name;
            })
            ->addColumn('name', function ($getData) {
                return $getData->student->name;
            })
            ->addColumn('created_date', function ($getData) {
                return $getData->created_at->format('F j, Y');
            })
            ->addColumn('status', function ($getData) {
                return getStatusForEnrolment($getData->status);
            })
            ->addColumn('action', function ($data) use ($status) {
                $html = "";
                if ($status == 'student') {
                    $html = '<div class="dropdown dropdown-one">
                                <button class="dropdown-toggle p-0 bg-transparent w-22 h-22 ms-auto bd-one bd-c-stroke rounded-circle fs-13 text-main-color d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                <ul class="dropdown-menu dropdownItem-one">
                                    <li>
                                        <a href="' . route('student.enrolment.view', encrypt($data->id)) . '" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                            <img src="' . asset('assets/images/icon/view.svg') . '" alt="view" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("View") . '</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>';
                } else {
                    $html = '<div class="dropdown dropdown-one">
                                <button class="dropdown-toggle p-0 bg-transparent w-22 h-22 ms-auto bd-one bd-c-stroke rounded-circle fs-13 text-main-color d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                <ul class="dropdown-menu dropdownItem-one">
                                    <li>
                                        <button onclick="editCommonModal(\'' . route('admin.enrolment.edit', encrypt($data->id)) . '\'' . ', \'#edit-modal\')" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8" data-bs-toggle="modal" data-bs-target="#edit-modal">
                                            <img src="' . asset('assets/images/icon/edit.svg') . '" alt="edit" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Edit") . '</p>
                                        </button>
                                    </li>
                                    <li>
                                        <a target="_blank" <a href="' . route('admin.enrolment.print', encrypt($data->id)) . '" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                            <img src="' . asset('assets/images/icon/print.svg') . '" alt="print" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Print") . '</p>
                                        </a>
                                    </li>
                                    <li>
                                        <button onclick="deleteCommonMethod(\'' . route('admin.enrolment.delete', encrypt($data->id)) . '\', \'enrolmentDataTable\')" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                            <img src="' . asset('assets/images/icon/trash.svg') . '" alt="delete" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Delete") . '</p>
                                        </button>
                                    </li>
                                </ul>
                            </div>';
                }
                return $html;
            })
            ->rawColumns(['enrolment_id', 'name', 'package_name', 'action', 'status'])
            ->make(true);
    }

    public function getById($id)
    {
        return Enrolment::with(['package', 'student', 'timeSchedule'])->find($id);
    }

    public function getActiveEnrolmentList()
    {
        return Enrolment::query()
            ->where(['tenant_id' => auth()->user()->tenant_id])
            ->where('status', '!=', ENROLMENT_CLOSE)
            ->with(['student'])
            ->get();
    }

    public function getAllStudent()
    {
        return User::where(['role' => USER_ROLE_STUDENT, 'status' => USER_STATUS_ACTIVE, 'tenant_id' => auth()->user()->tenant_id])->get();
    }

    public function getInstructor($instructorId)
    {
        return User::wherein('id', json_decode($instructorId))->get();

    }

    public function getTimeSlots()
    {
        return TimeScheduleSetting::where('tenant_id', auth()->user()->tenant_id)->get();
    }

    public function getAllPackage()
    {
        return Package::where(['status' => STATUS_ACTIVE, 'tenant_id' => auth()->user()->tenant_id])->get();
    }

    public function getPayment($id)
    {
        return Payment::where('enrolment_id', $id)->with('paymentGateway')->get();
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $id = $request->get('id', 0);
            $authUser = auth()->user();

            if ($id != 0) {
                $id = decrypt($id);
                $enrolment = Enrolment::find($id);
                $msg = __(MSG_UPDATED_SUCCESSFULLY);
            } else {
                $isStudentPending = Enrolment::where(['student_id' => $request->student, 'status' => ENROLMENT_PENDING])->get();
                if (count($isStudentPending) > 0) {
                    return $this->errorResponse([], __("Sorry, This student have already pending application"));
                }

                $isStudentRunning = Enrolment::where(['student_id' => $request->student, 'status' => ENROLMENT_RUNNING])->get();
                if (count($isStudentRunning) > 0) {
                    return $this->errorResponse([], __("Sorry, This student already running"));
                }
                $enrolment = new Enrolment();
                $msg = __(MSG_CREATED_SUCCESSFULLY);
            }

            $payableAmount = $request->orginal_price;

            if ($request->discount_amount != null) {
                if ($request->discount_type == DISCOUNT_TYPE_PARCENT) {
                    $discountPercentage = $request->discount_amount / 100;
                    $discountedAmount = $request->orginal_price * $discountPercentage;
                    $payableAmount = $request->orginal_price - $discountedAmount;
                } else {
                    $payableAmount = $request->orginal_price - $request->discount_amount;
                }
            }

            $enrolment->student_id = $request->student;
            $enrolment->package_id = $request->package;
            $enrolment->slot_id = $request->slot;
            $enrolment->total_amount = $request->orginal_price;
            $enrolment->discount_amount = isset($request->discount_amount) ? $request->discount_amount : 0.00;
            $enrolment->payable_amount = $payableAmount;
            $enrolment->discount_type = $request->discount_amount != null ? $request->discount_type : $enrolment->discount_type;
            $enrolment->start_date = $request->start_date;
            $enrolment->duration_type = $request->duration_type;
            $enrolment->duration_time = $request->duration_time;
            $enrolment->status = isset($request->status) ? $request->status : ENROLMENT_PENDING;
            $enrolment->tenant_id = $authUser->tenant_id;
            $enrolment->save();

            if ($id == 0) {
                $registerId = 'REG' . sprintf('%06d', $enrolment->id);
                Enrolment::where('id', $enrolment->id)->update(['register_id' => $registerId]);
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
            $package = Enrolment::find($id);
            $package->delete();
            DB::commit();
            return $this->successResponse([], __(MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

}
