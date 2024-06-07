<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StaffRequest;
use App\Http\Services\StaffService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserContact;
use App\Models\UserDocument;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    public $staffService;

    public function __construct()
    {
        $this->staffService = new StaffService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->staffService->list();
        }
        $data['pageTitle'] = __("Staff List");
        $data['activeStaffMenu'] = "active";
        return view('admin.staff.list', $data);
    }

    public function add()
    {
        $data['pageTitle'] = __("Staff Add");
        $data['activeStaffMenu'] = "active";
        $data['roleList'] = Role::where(['tenant_id' => auth()->user()->tenant_id, 'status' => STATUS_ACTIVE])->get();
        return view('admin.staff.add', $data);
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Staff Edit");
        $data['activeStaffMenu'] = "active";
        $data['staff'] = $this->staffService->getStaffById(decrypt($id));
        $data['staffContact'] = UserContact::where('user_id', decrypt($id))->first();
        $data['staffDocument'] = UserDocument::where('user_id', decrypt($id))->get();
        $data['roleList'] = Role::where(['tenant_id' => auth()->user()->tenant_id, 'status' => STATUS_ACTIVE])->get();
        return view('admin.staff.edit', $data);
    }

    public function view($id)
    {
        $data['pageTitle'] = __("Staff Details");
        $data['activeStaffMenu'] = "active";
        $data['staff'] = $this->staffService->getStaffById(decrypt($id));
        return view('admin.staff.view', $data);
    }

    public function store(StaffRequest $request)
    {
        return $this->staffService->store($request);
    }

    public function destroy($id)
    {
        return $this->staffService->destroy(decrypt($id));
    }

}
