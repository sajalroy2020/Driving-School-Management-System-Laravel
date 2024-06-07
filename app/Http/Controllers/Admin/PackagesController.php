<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackagesRequest;
use App\Http\Services\PackageService;
use App\Models\Category;
use App\Models\Package;
use App\Models\User;

class PackagesController extends Controller
{
    public $packagesService;

    public function __construct()
    {
        $this->packagesService = new PackageService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->packagesService->list($request);
        }
        $data['pageTitle'] = __("Packages List");
        $data['activePackagesMenu'] = "active";
        $data['category'] = Category::where(['status'=> STATUS_ACTIVE, 'tenant_id'=> auth()->user()->tenant_id])->get();
        $data['instructor'] = User::where(['status'=> STATUS_ACTIVE, 'role'=> USER_ROLE_INSTRUCTOR, 'tenant_id'=> auth()->user()->tenant_id])->get();
        return view('admin.packages.list', $data);
    }

    public function edit($id)
    {
        $data['packages'] = $this->packagesService->getById(decrypt($id));
        $data['category'] = Category::where(['status'=> STATUS_ACTIVE, 'tenant_id'=> auth()->user()->tenant_id])->get();
        $data['instructor'] = User::where(['status'=> STATUS_ACTIVE, 'role'=> USER_ROLE_INSTRUCTOR, 'tenant_id'=> auth()->user()->tenant_id])->get();
        return view('admin.packages.edit', $data)->render();
    }

    public function view($id)
    {
        $data['pageTitle'] = __("Packages Details");
        $data['activePackagesMenu'] = "active";
        $data['packages'] = $this->packagesService->getById(decrypt($id));
        return view('admin.packages.view', $data);
    }

    public function store(PackagesRequest $request)
    {
        return $this->packagesService->store($request);
    }

    public function destroy($id)
    {
        return $this->packagesService->destroy(decrypt($id));
    }

}
