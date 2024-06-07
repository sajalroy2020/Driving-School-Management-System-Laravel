<?php

namespace App\Http\Services;

use App\Models\Package;
use App\Traits\JsonResponseTrait;
use Exception;
use App\Models\FileHandler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PackageService
{
    use JsonResponseTrait;

    public function list($request)
    {
        if ($request->status) {
            if ($request->status == 1) {
                $getData = Package::with(['category', 'instructors'])
                    ->whereJsonContains('instructors_id', (string)auth()->id());
            } else {
                $getData = Package::with(['category', 'instructors'])->where('tenant_id', auth()->user()->tenant_id);
            }
        } else {
            $getData = Package::with(['category', 'instructors'])->where('tenant_id', auth()->user()->tenant_id);
        }

        return datatables($getData)
            ->addIndexColumn()
            ->addColumn('image', function ($getData) {
                return "
                    <div class='flex-shrink-0 w-30 h-30 rounded-circle overflow-hidden'>
                        <img src='" . getFileLink($getData->image) . "' alt='image' />
                    </div>";
            })
            ->addColumn('name', function ($getData) {
                return $getData->category->category_name;
            })
            ->addColumn('package_name', function ($getData) {
                return $getData->package_name;
            })
            ->addColumn('duration_time', function ($getData) {
                if ($getData->duration_type == DURATION_TYPE_DAY) {
                    return "<p>$getData->duration_time Day</p>";
                } elseif ($getData->duration_type == DURATION_TYPE_MONTH) {
                    return "<p>$getData->duration_time Month</p>";
                }
            })
            ->addColumn('price', function ($getData) {
                return showCurrency($getData->price);
            })
            ->addColumn('status', function ($getData) {
                return getStatusHtml($getData->status);
            })
            ->addColumn('action', function ($data) {
                if (auth()->user()->role == USER_ROLE_INSTRUCTOR) {
                    return '<div class="dropdown dropdown-one">
                                <button class="dropdown-toggle p-0 bg-transparent w-22 h-22 ms-auto bd-one bd-c-stroke rounded-circle fs-13 text-main-color d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                <ul class="dropdown-menu dropdownItem-one">
                                    <li>
                                        <a href="'.route('instructor.packages.view', encrypt($data->id)).'" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8" >
                                            <img src="' . asset('assets/images/icon/view.svg') . '" alt="view" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("View") . '</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>';
                } else {
                    return '<div class="dropdown dropdown-one">
                                <button class="dropdown-toggle p-0 bg-transparent w-22 h-22 ms-auto bd-one bd-c-stroke rounded-circle fs-13 text-main-color d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                <ul class="dropdown-menu dropdownItem-one">
                                    <li>
                                        <a href="'.route('admin.packages.view', encrypt($data->id)).'" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8" >
                                            <img src="' . asset('assets/images/icon/view.svg') . '" alt="view" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("View") . '</p>
                                        </a>
                                    </li>
                                    <li>
                                        <button onclick="editCommonModal(\'' . route('admin.packages.edit', encrypt($data->id)) . '\'' . ', \'#edit-modal\')" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8" data-bs-toggle="modal" data-bs-target="#edit-modal">
                                            <img src="' . asset('assets/images/icon/edit.svg') . '" alt="edit" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Edit") . '</p>
                                        </button>
                                    </li>
                                    <li>
                                        <button onclick="deleteCommonMethod(\'' . route('admin.packages.delete', encrypt($data->id)) . '\', \'packagesDataTable\')" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8">
                                            <img src="' . asset('assets/images/icon/trash.svg') . '" alt="delete" />
                                            <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Delete") . '</p>
                                        </button>
                                    </li>
                                </ul>
                            </div>';
                }
            })
            ->rawColumns(['name', 'package_name', 'image', 'price', 'duration_time', 'action', 'status'])
            ->make(true);
    }

    public function getById($id)
    {
        return Package::with(['category','instructors'])->find($id);
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $id = $request->get('id', 0);
            $authUser = auth()->user();

            if ($id != 0) {
                $id = decrypt($id);
                $packages = Package::find($id);
                $msg = __(MSG_UPDATED_SUCCESSFULLY);
            } else {
                $packages = new Package();
                $msg = __(MSG_CREATED_SUCCESSFULLY);
            }

            if ($request->hasFile('image')) {
                $new_file = new FileHandler();
                $uploaded = $new_file->upload('packages', $request->image);
                $packages->image = $uploaded->id;
            }

            $packages->category_id = $request->category;
            $packages->price = $request->price;
            $packages->package_name = $request->package_name;
            $packages->duration_type = $request->duration_type;
            $packages->duration_time = $request->duration_time;
            $packages->instructors_id = json_encode($request->instructors);
            $packages->description = $request->description;
            $packages->status = isset($request->status) ? $request->status : STATUS_ACTIVE;
            $packages->tenant_id = $authUser->tenant_id;
            $packages->save();

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
            $package = Package::find($id);
            $package->delete();
            DB::commit();
            return $this->successResponse([], __(MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

}
