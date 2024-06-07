<?php

namespace App\Http\Controllers\Admin;

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

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->certificateService->list($request);
        }
        $data['pageTitle'] = __("Certificate Configure");
        $data['activeCertificateMenu'] = "active";
        return view('admin.certificate.list', $data);
    }

    public function certificateConfiger()
    {
        $data['pageTitle'] = __("Certificate Configure");
        $data['activeCertificateMenu'] = "active";
        $data['students'] = $this->certificateService->allStudents();
        return view('admin.certificate.configer', $data);
    }

    public function edit($id)
    {
        $data['activeCertificateMenu'] = "active";
        $data['pageTitle'] = __("Event Details");
        $data['certificate'] = $this->certificateService->getById(decrypt($id));
        $data['students'] = $this->certificateService->allStudents();

        return view('admin.certificate.edit', $data);
    }

    public function print($id)
    {
        $data['certificate'] = $this->certificateService->getById(decrypt($id));
        $data['students'] = $this->certificateService->allStudents();
        return view('admin.certificate.print', $data);
    }

    public function store(CertificateRequest $request)
    {
        return $this->certificateService->store($request);
    }

    public function destroy($id)
    {
        return $this->certificateService->destroy(decrypt($id));
    }

}
