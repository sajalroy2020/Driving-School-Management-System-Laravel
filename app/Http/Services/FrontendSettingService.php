<?php

namespace App\Http\Services;

use App\Models\SectionConfiguration;
use App\Traits\JsonResponseTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\FileHandler;
use App\Models\FrontendSetting;
use App\Models\GalleryCategory;
use App\Models\User;

class FrontendSettingService
{
    use JsonResponseTrait;

    public function list()
    {
        $getData = SectionConfiguration::where('tenant_id', auth()->user()->tenant_id);

        return datatables($getData)
            ->addIndexColumn()
            ->addColumn('background_image', function ($getData) {
                if ($getData->background_image) {
                    return "<div class='flex-shrink-0 w-30 h-30 rounded-circle overflow-hidden'>
                                <img src='" . getFileLink($getData->background_image) . "' alt='image' />
                            </div>";
                }else{
                    return '<p>'.__('N/A').'</p>';
                }
            })
            ->addColumn('section_slug', function ($getData) {
                return "<p>".ucwords($getData->slug)."</p>";
            })
            ->addColumn('section_name', function ($getData) {
                if ($getData->section_name) {
                    return "<p>$getData->section_name</p>";
                }else{
                    return '<p>'.__('N/A').'</p>';
                }
            })
            ->addColumn('title', function ($getData) {
                if ($getData->title) {
                    return "<p>$getData->title</p>";
                }else{
                    return '<p>'.__('N/A').'</p>';
                }
            })
            ->addColumn('status', function ($getData) {
                if ($getData->is_section_show == STATUS_ACTIVE) {
                    return '<p class="zBadge zBadge-active">'.__('Show').'</p>';
                }else{
                    return '<p class="zBadge zBadge-deactivate">'.__('Hide').'</p>';
                }
            })
            ->addColumn('action', function ($data) {
                return '<div class="dropdown dropdown-one">
                            <button class="dropdown-toggle p-0 bg-transparent w-22 h-22 ms-auto bd-one bd-c-stroke rounded-circle fs-13 text-main-color d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                            <ul class="dropdown-menu dropdownItem-one">
                                <li>
                                    <button onclick="editCommonModal(\'' . route('admin.setting.frontend-setting.section-configuration.edit', encrypt($data->id)) . '\'' . ', \'#editModal\')" class="border-0 bg-transparent p-0 d-flex align-items-center cg-8" data-bs-toggle="modal">
                                        <div class="d-flex">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.37405 12.3634L2.66794 11.9589L2.37405 12.3634ZM1.63661 11.626L2.04112 11.3321L1.63661 11.626ZM12.3634 11.626L11.9589 11.3321L12.3634 11.626ZM11.626 12.3634L11.3321 11.9589L11.626 12.3634ZM11.626 1.63661L11.3321 2.04112L11.626 1.63661ZM12.3634 2.37405L11.9589 2.66794L12.3634 2.37405ZM2.37405 1.63661L2.66794 2.04112L2.37405 1.63661ZM1.63661 2.37405L2.04112 2.66794L1.63661 2.37405ZM5 6.5C4.72386 6.5 4.5 6.72386 4.5 7C4.5 7.27614 4.72386 7.5 5 7.5V6.5ZM9 7.5C9.27614 7.5 9.5 7.27614 9.5 7C9.5 6.72386 9.27614 6.5 9 6.5V7.5ZM6.5 9C6.5 9.27614 6.72386 9.5 7 9.5C7.27614 9.5 7.5 9.27614 7.5 9H6.5ZM7.5 5C7.5 4.72386 7.27614 4.5 7 4.5C6.72386 4.5 6.5 4.72386 6.5 5H7.5ZM7 12.5C5.73895 12.5 4.83333 12.4993 4.13203 12.4233C3.44009 12.3484 3.00661 12.2049 2.66794 11.9589L2.08016 12.7679C2.61771 13.1585 3.24729 13.3333 4.02432 13.4175C4.79198 13.5007 5.76123 13.5 7 13.5V12.5ZM0.5 7C0.5 8.23877 0.499314 9.20802 0.582485 9.97568C0.666671 10.7527 0.841549 11.3823 1.2321 11.9198L2.04112 11.3321C1.79506 10.9934 1.65163 10.5599 1.57667 9.86797C1.50069 9.16667 1.5 8.26105 1.5 7H0.5ZM2.66794 11.9589C2.42741 11.7841 2.21588 11.5726 2.04112 11.3321L1.2321 11.9198C1.46854 12.2453 1.75473 12.5315 2.08016 12.7679L2.66794 11.9589ZM12.5 7C12.5 8.26105 12.4993 9.16667 12.4233 9.86797C12.3484 10.5599 12.2049 10.9934 11.9589 11.3321L12.7679 11.9198C13.1585 11.3823 13.3333 10.7527 13.4175 9.97568C13.5007 9.20802 13.5 8.23877 13.5 7H12.5ZM7 13.5C8.23877 13.5 9.20802 13.5007 9.97568 13.4175C10.7527 13.3333 11.3823 13.1585 11.9198 12.7679L11.3321 11.9589C10.9934 12.2049 10.5599 12.3484 9.86797 12.4233C9.16667 12.4993 8.26105 12.5 7 12.5V13.5ZM11.9589 11.3321C11.7841 11.5726 11.5726 11.7841 11.3321 11.9589L11.9198 12.7679C12.2453 12.5315 12.5315 12.2453 12.7679 11.9198L11.9589 11.3321ZM7 1.5C8.26105 1.5 9.16667 1.50069 9.86797 1.57667C10.5599 1.65163 10.9934 1.79506 11.3321 2.04112L11.9198 1.2321C11.3823 0.841549 10.7527 0.666671 9.97568 0.582485C9.20802 0.499314 8.23877 0.5 7 0.5V1.5ZM13.5 7C13.5 5.76123 13.5007 4.79198 13.4175 4.02432C13.3333 3.24729 13.1585 2.61771 12.7679 2.08016L11.9589 2.66794C12.2049 3.00661 12.3484 3.44009 12.4233 4.13203C12.4993 4.83333 12.5 5.73895 12.5 7H13.5ZM11.3321 2.04112C11.5726 2.21588 11.7841 2.42741 11.9589 2.66794L12.7679 2.08016C12.5315 1.75473 12.2453 1.46854 11.9198 1.2321L11.3321 2.04112ZM7 0.5C5.76123 0.5 4.79198 0.499314 4.02432 0.582485C3.24729 0.666671 2.61771 0.841549 2.08016 1.2321L2.66794 2.04112C3.00661 1.79506 3.44009 1.65163 4.13203 1.57667C4.83333 1.50069 5.73895 1.5 7 1.5V0.5ZM1.5 7C1.5 5.73895 1.50069 4.83333 1.57667 4.13203C1.65163 3.44009 1.79506 3.00661 2.04112 2.66794L1.2321 2.08016C0.841549 2.61771 0.666671 3.24729 0.582485 4.02432C0.499314 4.79198 0.5 5.76123 0.5 7H1.5ZM2.08016 1.2321C1.75473 1.46854 1.46854 1.75473 1.2321 2.08016L2.04112 2.66794C2.21588 2.42741 2.42741 2.21588 2.66794 2.04112L2.08016 1.2321ZM5 7.5H9V6.5H5V7.5ZM7.5 9V5H6.5V9H7.5Z" fill="#4C40F7"/></svg>
                                        </div>
                                        <p class="fs-14 fw-500 lh-19 text-main-color">' . __("Edit") . '</p>
                                    </button>
                                </li>
                            </ul>
                        </div>';
            })
            ->rawColumns(['background_image', 'section_slug', 'section_name', 'title', 'action', 'status'])
            ->make(true);
    }

    public function getById($id)
    {
        return SectionConfiguration::find($id);
    }

    public function getFrontendSetting()
    {
        return FrontendSetting::where('tenant_id', auth()->user()->tenant_id)->first();
    }

    public function allStudent()
    {
        return User::where('tenant_id', auth()->user()->tenant_id)->where('role', USER_ROLE_STUDENT)->get();
    }

    public function galleryCategory()
    {
        return GalleryCategory::where(['tenant_id' => auth()->user()->tenant_id, 'status' => STATUS_ACTIVE])->get();
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            $id = $request->get('id', 0);
            $id = decrypt($id);
            $section = SectionConfiguration::find($id);
            $msg = __(MSG_UPDATED_SUCCESSFULLY);

            if ($request->hasFile('background_image')) {
                $new_file = new FileHandler();
                $uploaded = $new_file->upload('frontend-section', $request->background_image);
                $section->background_image = $uploaded->id;
            }

            $section->section_name = $request->section_name;
            $section->title = $request->title;
            $section->description = $request->description;
            $section->tenant_id = auth()->user()->tenant_id;
            $section->is_section_show = isset($request->is_section_show) ? $request->is_section_show : STATUS_ACTIVE;
            $section->save();
            DB::commit();
            return $this->successResponse([], $msg);

        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function frontendSettingUpdate($request)
    {
        DB::beginTransaction();
        try {
            $id = $request->get('id', 0);
            $id = decrypt($id);
            $section = FrontendSetting::find($id);
            $msg = __(MSG_UPDATED_SUCCESSFULLY);

            if ($request->about_us) {
                if ($request->hasFile('about_right_image')) {
                    $new_file = new FileHandler();
                    $uploaded = $new_file->upload('frontend-setting', $request->about_right_image);
                    $section->about_right_image = $uploaded->id;
                }

                $section->about_point_1 = $request->about_point_1;
                $section->about_point_2 = $request->about_point_2;
                $section->about_point_3 = $request->about_point_3;
                $section->about_year_of_exp = $request->about_year_of_exp;
                $section->about_learn_more = $request->about_learn_more;
                $section->about_video_link = $request->about_video_link;
            }else{
                $section->achiev_course_completed = $request->achiev_course_completed;
                $section->achiev_driving_learner = $request->achiev_driving_learner;
                $section->achiev_experience_instructor = $request->achiev_experience_instructor;
                $section->achiev_award_winner = $request->achiev_award_winner;
            }

            $section->tenant_id = auth()->user()->tenant_id;
            $section->save();
            DB::commit();
            return $this->successResponse([], $msg);

        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

}

