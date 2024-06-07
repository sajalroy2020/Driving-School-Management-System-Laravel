<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CertificateRequest;
use App\Http\Services\CertificateService;

class CertificateController extends Controller
{
    public $certificateService;

    public function __construct()
    {
        $this->certificateService = new CertificateService();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->certificateService->list($request);
        }
        $data['pageTitle'] = __("My Certificate");
        $data['activeCertificateMenu'] = "active";
        return view('student.std-certificate.list', $data);
    }

    public function print($id)
    {
        $data['certificate'] = $this->certificateService->getById(decrypt($id));
        $data['students'] = $this->certificateService->allStudents();
        return view('student.std-certificate.print', $data);
    }

}
