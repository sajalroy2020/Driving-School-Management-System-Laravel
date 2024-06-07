<?php

namespace App\Http\Controllers\Student;

use App\Http\Services\GeneralPaymentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\EnrolmentService;

class PaymentController extends Controller
{
    public $generalPaymentService;
    public $enrolmentService;
    public function __construct()
    {
        $this->generalPaymentService = new GeneralPaymentService();
        $this->enrolmentService = new EnrolmentService();
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->generalPaymentService->list('student');
        }
        $data['pageTitle'] = __("Payment List");
        $data['activePaymentMenu'] = "active";

        return view('student.std-payment.index', $data);
    }


    public function view($id)
    {
        $data['pageTitle'] = __("Payment Invoice");

        $data['transaction'] = $this->generalPaymentService->getTransaction();
        $totalAmount = 0;
        foreach ($data['transaction'] as $data) {
            $totalAmount = $totalAmount + $data->amount;
        }

        $data['totalAmount'] = $totalAmount;
        $data['transaction'] = $this->generalPaymentService->getTransaction();
        $data['payment'] = $this->generalPaymentService->getById(decrypt($id));

        return view('student.std-payment.invoice', $data)->render();
    }
}
