<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Traits\JsonResponseTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryService
{
    use JsonResponseTrait;

    public function list()
    {
        $catData = Category::where('tenant_id', auth()->user()->tenant_id);

        return datatables($catData)
            ->addIndexColumn()
            ->addColumn('name', function ($catData) {
                return "<p>$catData->category_name</p>";
            })
            ->addColumn('status', function ($catData) {
                return getStatusHtml($catData->status);
            })
            ->addColumn('action', function ($data) {
                return '<div class="dropdown dropdown-one">
                                <button class="dropdown-toggle p-0 bg-transparent w-22 h-22 ms-auto bd-one bd-c-stroke rounded-circle fs-13 text-main-color d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                <ul class="dropdown-menu dropdownItem-one">
                                    <li>
                                        <button onclick="editCommonModal(\'' . route('admin.category.edit', encrypt($data->id)) . '\'' . ', \'#edit-modal\')" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8" data-bs-toggle="modal" data-bs-target="#edit-modal">
                                            <img src="' . asset('assets/images/icon/edit.svg') . '" alt="edit" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Edit") . '</p>
                                        </button>
                                    </li>
                                    <li>
                                        <button onclick="deleteCommonMethod(\'' . route('admin.category.delete', encrypt($data->id)) . '\', \'categoryDataTable\')" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                            <img src="' . asset('assets/images/icon/trash.svg') . '" alt="delete" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Delete") . '</p>
                                        </button>
                                    </li>
                                </ul>
                            </div>';
            })
            ->rawColumns(['name', 'action', 'status'])
            ->make(true);
    }

    public function getById($id)
    {
        return Category::find($id);
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $id = $request->get('id', 0);
            if ($id != 0) {
                $id = decrypt($id);
                $category = Category::find($id);
                $msg = __(MSG_UPDATED_SUCCESSFULLY);

            } else {
                $category = new Category();
                $msg = __(MSG_CREATED_SUCCESSFULLY);
            }

            $category->category_name = $request->category_name;
            $category->tenant_id = auth()->user()->tenant_id;
            $category->status = isset($request->status) ? $request->status : STATUS_ACTIVE;
            $category->save();
            DB::commit();
            return $this->successResponse([], $msg);

        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $category = Category::find($id);
            $category->delete();
            DB::commit();
            return $this->successResponse([], __(MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

}
