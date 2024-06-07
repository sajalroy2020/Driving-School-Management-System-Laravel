<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentPackagesRequest;
use App\Http\Services\StudentPackageService;
use App\Models\Package;
use App\Models\PaymentGateway;
use App\Models\User;

class StudentPackagesController extends Controller
{
    public $stdPackagesService;

    public function __construct()
    {
        $this->stdPackagesService = new StudentPackageService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->stdPackagesService->list($request);
        }
        $data['pageTitle'] = __("Student Packages List");
        $data['activeStdPackagesMenu'] = "active";
        $data['students'] = User::where('role', USER_ROLE_STUDENT)->where('status', USER_STATUS_ACTIVE)->get();
        $data['Packages'] = Package::where('status', STATUS_ACTIVE)->with('category')->get();
        $data['getway'] = PaymentGateway::where('status', STATUS_ACTIVE)->get();

        return view('admin.student-package.list', $data);
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Packages Edit");
        $data['packages'] = $this->stdPackagesService->getById(decrypt($id));
        $data['students'] = User::where('role', USER_ROLE_STUDENT)->where('status', USER_STATUS_ACTIVE)->get();
        $data['Packages'] = Package::where('status', STATUS_ACTIVE)->with('category')->get();
        $data['getway'] = PaymentGateway::where('status', STATUS_ACTIVE)->get();

        return view('admin.student-package.edit', $data)->render();
    }

    public function store(StudentPackagesRequest $request)
    {
        return $this->stdPackagesService->store($request);
    }

    public function destroy($id)
    {
        return $this->stdPackagesService->destroy(decrypt($id));
    }

}
