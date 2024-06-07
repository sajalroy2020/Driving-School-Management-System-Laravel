<?php

namespace App\Http\Services;

use App\Models\Award;
use App\Models\AwardAssign;
use App\Models\Enrolment;
use App\Traits\JsonResponseTrait;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AwardAssignService
{
    use JsonResponseTrait;

    public function list()
    {
        if (auth()->user()->role == USER_ROLE_INSTRUCTOR) {
            $getData = Enrolment::leftJoin('packages', 'packages.id', '=', 'enrolments.package_id')
                ->leftJoin('users', 'users.id', '=', 'enrolments.student_id')
                ->leftJoin('award_assigns', 'award_assigns.student_id', '=', 'enrolments.student_id')
                ->leftJoin('awards', 'awards.id', '=', 'award_assigns.award_id')
                ->whereJsonContains('packages.instructors_id', (string)auth()->id())
                ->whereNotNull('award_assigns.id')
                ->select('award_assigns.*', 'users.name as std_name', 'awards.title as award_title')
                ->get();
        }elseif(auth()->user()->role == USER_ROLE_STUDENT){
            $getData = AwardAssign::where('student_id', auth()->id())->with(['awards', 'student']);
        } else {
            $getData = AwardAssign::where('tenant_id', auth()->user()->tenant_id)->with(['awards', 'student']);
        }

        return datatables($getData)
            ->addIndexColumn()
            ->addColumn('name', function ($getData) {
                if (auth()->user()->role == USER_ROLE_INSTRUCTOR) {
                    return $getData->std_name;
                }else{
                    return $getData->student->name;
                }
            })
            ->addColumn('award', function ($getData) {
                if (auth()->user()->role == USER_ROLE_INSTRUCTOR) {
                    return $getData->award_title;
                }else{
                    return $getData->awards->title;
                }
            })
            ->addColumn('prize', function ($getData) {
                if ($getData->prize_type == AWARD_TYPE_MONEY) {
                    return showCurrency($getData->award_prize);
                }else{
                    return '<p>'.__('Depend on Management').'</p>';
                }
                return $getData->award_prize;
            })
            ->addColumn('status', function ($getData) {
                if ($getData->status == AWARD_GIVEN) {
                    return '<p class="zBadge zBadge-deactivate bg-green text-white">'.__('Given').'</p>';
                }elseif($getData->status == AWARD_PENDING){
                    return '<p class="zBadge zBadge-deactivate bg-progress text-white">'.__('Pending').'</p>';
                }else{
                    return '<p class="zBadge zBadge-deactivate text-cancel bg-danger">'.__('Cancel').'</p>';
                }

            })
            ->addColumn('action', function ($data) {
                if (auth()->user()->role != USER_ROLE_INSTRUCTOR) {
                    return '<div class="dropdown dropdown-one">
                                    <button class="dropdown-toggle p-0 bg-transparent w-22 h-22 ms-auto bd-one bd-c-stroke rounded-circle fs-13 text-main-color d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                    <ul class="dropdown-menu dropdownItem-one">
                                        <li>
                                            <button onclick="editCommonModal(\'' . route('admin.award-assign.edit', encrypt($data->id)) . '\'' . ', \'#edit-modal\')" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8" data-bs-toggle="modal" data-bs-target="#edit-modal">
                                                <img src="' . asset('assets/images/icon/edit.svg') . '" alt="edit" />
                                                <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Edit") . '</p>
                                            </button>
                                        </li>
                                        <li>
                                            <button onclick="deleteCommonMethod(\'' . route('admin.award-assign.delete', encrypt($data->id)) . '\', \'awardAssignDataTable\')" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                                <img src="' . asset('assets/images/icon/trash.svg') . '" alt="delete" />
                                                <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Delete") . '</p>
                                            </button>
                                        </li>
                                    </ul>
                                </div>';
                }
            })
            ->rawColumns(['award','name','prize','action','status'])
            ->make(true);
    }

    public function getById($id)
    {
        return AwardAssign::find($id);
    }

    public function getAllStudent()
    {
        return User::where(['role'=>USER_ROLE_STUDENT, 'status'=>USER_STATUS_ACTIVE, 'tenant_id'=>auth()->user()->tenant_id])->get();
    }

    public function getAllAward()
    {
        return Award::where('tenant_id', auth()->user()->tenant_id)->get();
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $id = $request->get('id', 0);
            $authUser = auth()->user();

            if ($id != 0) {
                $id = decrypt($id);
                $award = AwardAssign::find($id);
                $msg = __(MSG_UPDATED_SUCCESSFULLY);
            } else {
                $award = new AwardAssign();
                $msg = __(MSG_CREATED_SUCCESSFULLY);
            }

            $award->student_id = $request->student_id;
            $award->award_id = $request->award_id;
            $award->prize_type = $request->prize_type;
            $award->award_prize = $request->prize;
            $award->status = isset($request->status) ? $request->status : STATUS_ACTIVE;
            $award->tenant_id = $authUser->tenant_id;
            $award->save();

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
            $award = AwardAssign::find($id);
            $award->delete();
            DB::commit();
            return $this->successResponse([], __(MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

}
