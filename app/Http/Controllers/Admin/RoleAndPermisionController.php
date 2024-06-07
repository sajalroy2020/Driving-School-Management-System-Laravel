<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClientRequest;
use App\Http\Requests\Admin\RoleAndPermissionRequest;
use App\Http\Services\ClientServices;
use App\Http\Services\RolePermissionService;
use App\Models\Currency;
use App\Traits\JsonResponseTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermisionController extends Controller
{
    use JsonResponseTrait;

    public $rolePermissionServices;

    public function __construct()
    {
        $this->rolePermissionServices = new RolePermissionService();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->rolePermissionServices->getRoleList();
        } else {
            $data['pageTitle'] = __("Role Permission");
            $data['activeRolePermissionMenu'] = "active";
            return view('admin.role_and_permission.index', $data);
        }
    }

    public function permissionEdit($id)
    {
        $data['roleData'] = Role::find(decrypt($id));
        $data['permissionList'] = Permission::all();
        $data['rolePermissions'] = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", decrypt($id))
            ->get();
        return view('admin.role_and_permission.permission', $data)->render();
    }

    public function store(RoleAndPermissionRequest $request)
    {
        return $this->rolePermissionServices->store($request);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $data = Role::find(decrypt($id));
            $data->delete();
            DB::commit();
            return $this->successResponse([], __(MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function permissionUpdate(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'permission' => 'required',
        ]);
        return $this->rolePermissionServices->permissionUpdate($request);
    }
}
