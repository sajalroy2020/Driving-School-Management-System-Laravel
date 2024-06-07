<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\GeneralPaymentRequest;
use App\Http\Requests\Admin\StaffRequest;
use App\Http\Services\EnrolmentService;
use App\Http\Services\GeneralPaymentService;
use App\Http\Services\StaffService;
use App\Http\Services\StudentService;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentRequest;
use App\Models\UserContact;
use App\Models\UserDocument;
use Spatie\Permission\Models\Role;

class PaymentController extends Controller
{
    public $generalPaymentService;
    public $enrolmentService;

    public function __construct()
    {
        $this->generalPaymentService = new GeneralPaymentService();
        $this->enrolmentService = new EnrolmentService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->generalPaymentService->list($request);
        }
        $data['pageTitle'] = __("Payment List");
        $data['activePaymentMenu'] = "active";
        $data['enrolmentList'] = $this->enrolmentService->getActiveEnrolmentList();
//        $data['getDueAmount'] = $this->generalPaymentService->getDueAmount();
        return view('admin.payment.list', $data);
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Payment Edit");
        $data['activePaymentMenu'] = "active";
        $data['enrolmentList'] = $this->enrolmentService->getActiveEnrolmentList();
        $data['paymentInfo'] = $this->generalPaymentService->getPaymentById(decrypt($id));
        return view('admin.payment.edit', $data);
    }

    public function view($id)
    {
        $data['pageTitle'] = __("Student Profile");
        $data['activeStudentMenu'] = "active";
        $data['student'] = $this->generalPaymentService->getStudentById(decrypt($id));
        return view('admin.student.view', $data);
    }

    public function store(GeneralPaymentRequest $request)
    {
        return $this->generalPaymentService->store($request);
    }

    public function destroy($id)
    {
        return $this->generalPaymentService->destroy(decrypt($id));
    }

    public function getTotalPaidAmount(Request $request)
    {
        return $this->generalPaymentService->getDueAmountByStudentOrEnrolmentId($request->enrolment_id);
    }



}
