<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EnrolmentRequest;
use App\Http\Services\EnrolmentService;

class EnrolmentController extends Controller
{
    public $enrolmentService;

    public function __construct()
    {
        $this->enrolmentService = new EnrolmentService();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->enrolmentService->list('student');
        }
        $data['pageTitle'] = __("Enrolment List");
        $data['activeEnrolmentMenu'] = "active";
        return view('student.std-enrolment.list', $data);
    }
    public function view($id)
    {
        $data['activeEnrolmentMenu'] = "active";
        $data['pageTitle'] = __("Enrolment Details");
        $data['enrolment'] = $this->enrolmentService->getById(decrypt($id));
        $data['payments'] = $this->enrolmentService->getPayment(decrypt($id));
        $data['instructors'] = $this->enrolmentService->getInstructor($data['enrolment']->package->instructors_id);

        return view('student.std-enrolment.view', $data);
    }
}
