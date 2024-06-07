<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Models\Enrolment;
use App\Models\Exam;
use App\Models\IncomeExpense;
use App\Models\Notice;
use App\Models\Package;
use App\Models\Payment;
use App\Models\User;
use App\Traits\JsonResponseTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardService
{
    use JsonResponseTrait;

    public function getOverAllSummery()
    {
        try {
            $data['total_student'] = User::where(['tenant_id' => auth()->user()->tenant_id, 'role' => USER_ROLE_STUDENT])->count();
            $data['total_instructor'] = User::where(['tenant_id' => auth()->user()->tenant_id, 'role' => USER_ROLE_INSTRUCTOR, 'status' => USER_STATUS_ACTIVE])->count();
            $data['total_staff'] = User::where(['tenant_id' => auth()->user()->tenant_id, 'role' => USER_ROLE_STAFF, 'status' => USER_STATUS_ACTIVE])->count();
            $data['total_category'] = Category::where(['tenant_id' => auth()->user()->tenant_id, 'status' => STATUS_ACTIVE])->count();
            $data['total_package'] = Package::where(['tenant_id' => auth()->user()->tenant_id, 'status' => STATUS_ACTIVE])->count();
            $data['pending_enrolment'] = Enrolment::where(['tenant_id' => auth()->user()->tenant_id, 'status' => ENROLMENT_PENDING])->count();
            $data['running_student'] = Enrolment::where(['tenant_id' => auth()->user()->tenant_id, 'status' => ENROLMENT_RUNNING])->count();
            $data['completed_student'] = Enrolment::where(['tenant_id' => auth()->user()->tenant_id, 'status' => ENROLMENT_COMPLEATE])->count();
            return $data;
        } catch (Exception $exception) {
            Log::info('Get overall summery in dashboard:' . $exception->getMessage());
            return [
                'total_student' => 0,
                'total_instructor' => 0,
                'total_staff' => 0,
                'total_category' => 0,
                'total_package' => 0,
                'pending_enrolment' => 0,
                'running_student' => 0,
                'completed_student' => 0
            ];
        }
    }

    public function revenueChart()
    {
        try {
            $year = Carbon::now()->year;
            $paymentData = Payment::select(
                DB::raw("DATE_FORMAT(created_at, '%b') month"),
                DB::raw('sum(amount) as revenue'))
                ->whereYear('created_at', $year)
                ->where(['status' => PAYMENT_STATUS_SUCCESS, 'tenant_id' => auth()->user()->tenant_id,])
                ->groupBy('month')
                ->get()
                ->toArray();

            $incomeData = IncomeExpense::select(
                DB::raw("DATE_FORMAT(created_at, '%b') month"),
                DB::raw('sum(amount) as revenue'))
                ->whereYear('created_at', $year)
                ->where(['status' => PAYMENT_STATUS_SUCCESS, 'type' => INCOME_EXPENSE_TYPE_INCOME, 'tenant_id' => auth()->user()->tenant_id,])
                ->groupBy('month')
                ->get()
                ->toArray();


            $year = Carbon::now()->year;
            $monthList = [];

            for ($month = 1; $month <= 12; $month++) {
                $monthName = Carbon::create($year, $month, 1)->format('M');
                $monthList[$month] = $monthName;
            }

            $paymentChatData = [];
            foreach ($monthList as $month) {
                $paymentChatData[$month] = 0;
            }
            foreach ($paymentData as $data) {
                $paymentChatData[$data['month']] = $data['revenue'];
            }

            $incomeChatData = [];
            foreach ($monthList as $month) {
                $incomeChatData[$month] = 0;
            }
            foreach ($incomeData as $data) {
                $incomeChatData[$data['month']] = $data['revenue'];
            }

            $chatData = [];

            foreach ($paymentChatData as $paymentKey=>$paymentItem) {
                foreach ($incomeChatData as $incomeKey=>$incomeItem){
                if ($paymentKey == $incomeKey){
                    $chatData[$paymentKey] = $paymentItem + $incomeItem;
                    break;
                    }
                }
            }

            return $this->successResponse($chatData, 'Data Found');
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function studentChart()
    {
        try {
            $packageEnrolmentCounts = Package::query()
                ->leftJoin('enrolments', 'packages.id', '=', 'enrolments.package_id')
                ->select('packages.id', 'packages.package_name', DB::raw('count(enrolments.id) as enrolment_count'))
                ->where('packages.tenant_id', auth()->user()->tenant_id)
                ->groupBy('packages.id', 'packages.package_name')
                ->get();
            return $this->successResponse($packageEnrolmentCounts, 'Data Found');
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }

    }

    public function recentEnrolmentHistory()
    {
        $historyData = Enrolment::where('tenant_id', auth()->user()->tenant_id)->with(['student', 'package'])->take(5);
        return datatables($historyData)
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
            ->addColumn('status', function ($getData) {
                return getStatusForEnrolment($getData->status);
            })
            ->rawColumns(['enrolment_id', 'name', 'package_name', 'status'])
            ->make(true);
    }

    public function recentPaymentHistory()
    {
        $listData = Payment::where(['tenant_id' => auth()->user()->tenant_id])->with(['student'])->take(5);

        return datatables($listData)
            ->addIndexColumn()
            ->addColumn('student_name', function ($data) {
                $name = $data->student->name;
                return "<p>$name</p>";
            })
            ->editColumn('payment_amount', function ($data) {
                return showCurrency($data->amount);
            })
            ->addColumn('status', function ($data) {
                return getPaymentStatusHtml($data->status);
            })
            ->rawColumns(['student_name', 'status', 'payment_amount'])
            ->make(true);
    }

    public function activeNotice(){
        if (auth()->user()->role == USER_ROLE_INSTRUCTOR) {
            return Notice::where(['tenant_id'=> auth()->user()->tenant_id, 'status' => STATUS_ACTIVE])->whereIn('notice_for', [NOTICE_FOR_ALL, NOTICE_FOR_INSTRUCTOR])->count();
        }elseif(auth()->user()->role == USER_ROLE_STUDENT){
            return Notice::where(['tenant_id'=> auth()->user()->tenant_id, 'status' => STATUS_ACTIVE])->whereIn('notice_for', [NOTICE_FOR_ALL, NOTICE_FOR_STUDENT])->count();
        }
    }

    public function pendingExam(){
        return Exam::whereJsonContains('student_assign', (string)auth()->id())->where('status', EXAM_PENDING)->count();
    }

    public function myCourse(){
        return Enrolment::with('package')->where('student_id', auth()->id())->first();
    }

    public function paymentAmount(){
        return Payment::where('student_id', auth()->id())->sum('amount');
    }

    public function runningStudent(){
        return Enrolment::leftJoin('packages', 'packages.id', '=', 'enrolments.package_id')
                ->leftJoin('users', 'users.id', '=', 'enrolments.student_id')
                ->whereJsonContains('packages.instructors_id', (string)auth()->id())
                ->where('enrolments.status', ENROLMENT_RUNNING)
                ->count();
    }

    public function completedStudent(){
        return Enrolment::leftJoin('packages', 'packages.id', '=', 'enrolments.package_id')
                ->leftJoin('users', 'users.id', '=', 'enrolments.student_id')
                ->whereJsonContains('packages.instructors_id', (string)auth()->id())
                ->where('enrolments.status', ENROLMENT_COMPLEATE)
                ->count();
    }

    public function pendingExamInstructor(){
        return Exam::whereJsonContains('instructors_assign', (string)auth()->id())->where('status', EXAM_PENDING)->count();
    }

}
