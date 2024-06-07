<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\PackageService;
use App\Models\Category;
use App\Models\User;

class PackageController extends Controller
{

    public $packageService;

    public function __construct()
    {
        $this->packageService = new PackageService();
    }

    public function list(Request $request)
    {
        $data['pageTitle'] = __("Package List");
        $data['activePackageMenu'] = "active";

        if ($request->ajax()) {
            return $this->packageService->list($request);
        }

        return view('Instructor.packages.list', $data);
    }

    public function view($id)
    {
        $data['activePackageMenu'] = "active";
        $data['pageTitle'] = __("Package details");
        $data['packages'] = $this->packageService->getById(decrypt($id));
        $data['category'] = Category::where('status', STATUS_ACTIVE)->get();
        $data['instructor'] = User::where(['status'=> STATUS_ACTIVE, 'role'=> USER_ROLE_INSTRUCTOR])->get();
        return view('Instructor.packages.view', $data);
    }
}
