<?php

namespace Database\Seeders;

use App\Http\Services\RolePermissionService;
use App\Models\User;
use App\Traits\JsonResponseTrait;
use App\Traits\ResponseTrait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    use JsonResponseTrait;

    public $rolePermissionServices;

    public function __construct()
    {
        $this->rolePermissionServices = new RolePermissionService();
    }

    public function run()
    {
        foreach (permissionArrayList() as $permission) {
            Permission::insert(['name' => $permission, 'guard_name' => 'web']);
        }

        //admin
        $admin = User::where('role', USER_ROLE_ADMIN)->first();
        $dataObj = new Role();
        $dataObj->name = 'Admin';
        $dataObj->guard_name = 'web';
        $dataObj->user_id = $admin->id;
        $dataObj->tenant_id = $admin->tenant_id;
        $dataObj->status = STATUS_ACTIVE;
        $dataObj->save();
        $role = Role::find($dataObj->id);
        $role->syncPermissions(permissionArrayList());
        $admin->syncRoles($role->id);
        //staff
        $staff = User::where('role', USER_ROLE_STAFF)->first();
        $dataObjEmployee = new Role();
        $dataObjEmployee->name = 'Staff';
        $dataObjEmployee->guard_name = 'web';
        $dataObjEmployee->user_id = $staff->id;
        $dataObjEmployee->tenant_id = $staff->tenant_id;
        $dataObjEmployee->status = STATUS_ACTIVE;
        $dataObjEmployee->save();
        $roleEmployee = Role::find($dataObjEmployee->id);
        $roleEmployee->syncPermissions(permissionArrayForStaff());
        $staff->syncRoles($roleEmployee->id);
    }
}
