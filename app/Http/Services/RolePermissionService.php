<?php

namespace App\Http\Services;

use App\Traits\JsonResponseTrait;
use Exception;
use Spatie\Permission\Models\Role;

class RolePermissionService
{
    use JsonResponseTrait;

    public function getAll()
    {
        return Role::where('user_id', auth()->user()->tenant_id)->get();
    }

    public function getRoleList()
    {
        $data = Role::where('tenant_id', auth()->user()->tenant_id)->get();
        return datatables($data)
            ->addIndexColumn()
            ->editColumn('name', function ($data) {
                return "<p>$data->name</p>";
            })
            ->addColumn('status', function ($data) {
                $html = '';
                if ($data->status == STATUS_ACTIVE) {
                    $html = "<p>" . __("Active") . "</p>";
                } else {
                    $html = "<p>" . __("Inactive") . "</p>";
                }
                return $html;

            })
            ->addColumn('action', function ($data) {
                if ($data->id == 1) {
                    return '<div class="dropdown dropdown-one">
                           <button class="dropdown-toggle p-0 bg-transparent w-22 h-22 ms-auto bd-one bd-c-stroke rounded-circle fs-13 text-main-color d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                           <ul class="dropdown-menu dropdownItem-one">
                              <li>
                                 <button class="border-0 bg-transparent p-0 d-flex align-items-center cg-8" onclick="editCommonModal(\'' . route('admin.role-and-permission.permission-edit', encrypt($data->id)) . '\'' . ', \'#addPermissionModal\')">
                                    <img src="' . asset('assets/images/icon/permission.svg') . '" alt="permission" />
                                    <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Permission") . '</p>
                                 </button>
                              </li>
                           </ul>
                        </div>';
                } else {
                    return '<div class="dropdown dropdown-one">
                           <button class="dropdown-toggle p-0 bg-transparent w-22 h-22 ms-auto bd-one bd-c-stroke rounded-circle fs-13 text-main-color d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                           <ul class="dropdown-menu dropdownItem-one">
                              <li>
                                 <button class="border-0 bg-transparent p-0 d-flex align-items-center cg-8" onclick="editCommonModal(\'' . route('admin.role-and-permission.permission-edit', encrypt($data->id)) . '\'' . ', \'#addPermissionModal\')">
                                    <img src="' . asset('assets/images/icon/permission.svg') . '" alt="permission" />
                                    <p class="fs-14 fw-500 lh-19 text-main-color">'.__("Permission").'</p>
                                 </button>
                              </li>
                              <li>
                                 <button class="border-0 bg-transparent p-0 d-flex align-items-center cg-8 role-edit-btn" data-id="' . encrypt($data->id) . '" data-name="' . $data->name . '" data-status="' . $data->status . '">
                                    <img src="' . asset('assets/images/icon/edit.svg') . '" alt="edit" />
                                    <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Edit") . '</p>
                                 </button>
                              </li>
                              <li>
                                 <button class="deleteBtn border-0 bg-transparent p-0 d-flex align-items-center cg-8" onclick="deleteCommonMethod(\'' . route("admin.role-and-permission.delete", encrypt($data->id)) . '\', \'roleAndPermissionListTable\')">
                                    <img src="' . asset('assets/images/icon/trash.svg') . '" alt="delete" />
                                    <p class="fs-14 fw-500 lh-19 text-main-color">'.__("Delete").'</p>
                                 </a>
                              </li>
                           </ul>
                        </div>';
                }

            })
            ->rawColumns(['name','action', 'status'])
            ->make(true);

    }

    public function store($request)
    {
        try {
            if ($request->id) {
                $dataObj = Role::find(decrypt($request->id));
                $msg = __(MSG_UPDATED_SUCCESSFULLY);
                $flag = 1;
            } else {
                $dataObj = new Role();
                $msg = __(MSG_CREATED_SUCCESSFULLY);
                $flag = 0;
            }
            $dataObj->name = $request->name;
            $dataObj->guard_name = 'web';
            $dataObj->user_id = auth()->id();
            $dataObj->tenant_id = auth()->user()->tenant_id;
            $dataObj->status = $request->status;
            $dataObj->save();
            $data['flag'] = $flag;
            return $this->successResponse($data, $msg);

        } catch (Exception $exception) {
            return $this->errorResponse([], $exception->getMessage());
        }
    }

    public function permissionUpdate($request)
    {
        try {
            $role = Role::find(decrypt($request->role));

            if ($role->id == 2) {
                $permissionList = array_merge($request->permission, permissionArrayForQA());
            } elseif ($role->id == 3) {
                $permissionList = array_merge($request->permission, permissionArrayForEmployee());
            } else {
                $permissionList = $request->permission;
            }

            if ($role->name != 'Admin') {
                $role->syncPermissions($permissionList);
            }

            return $this->successResponse([], MSG_UPDATED_SUCCESSFULLY);
        } catch (Exception $exception) {
            return $this->errorResponse([], $exception->getMessage());
//            return $this->errorResponse([], MSG_SOMETHING_WENT_WRONG);
        }
    }

}
