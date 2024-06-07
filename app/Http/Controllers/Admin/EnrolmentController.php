<?php

namespace App\Http\Controllers\Admin;

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

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->enrolmentService->list($request);
        }
        $data['pageTitle'] = __("Enrolment List");
        $data['activeEnrolmentMenu'] = "active";
        $data['students'] = $this->enrolmentService->getAllStudent();
        $data['packages'] = $this->enrolmentService->getAllPackage();
        $data['timeSlots'] = $this->enrolmentService->getTimeSlots();
        return view('admin.enrolment.list', $data);
    }

    public function edit($id)
    {
        $data['enrolment'] = $this->enrolmentService->getById(decrypt($id));
        $data['students'] = $this->enrolmentService->getAllStudent();
        $data['packages'] = $this->enrolmentService->getAllPackage();
        $data['timeSlots'] = $this->enrolmentService->getTimeSlots();
        return view('admin.enrolment.edit', $data);
    }

    public function print($id)
    {
        $data['enrolment'] = $this->enrolmentService->getById(decrypt($id));
        $data['payments'] = $this->enrolmentService->getPayment(decrypt($id));
        return view('admin.enrolment.print', $data);
    }

    public function store(EnrolmentRequest $request)
    {
        return $this->enrolmentService->store($request);
    }

    public function destroy($id)
    {
        return $this->enrolmentService->destroy(decrypt($id));
    }

}
