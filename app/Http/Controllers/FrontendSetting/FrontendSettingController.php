<?php

namespace App\Http\Controllers\FrontendSetting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FrontendSettingRequest;
use App\Http\Services\FrontendSettingService;

class FrontendSettingController extends Controller
{
    public $frontendSettingService;

    public function __construct()
    {
        $this->frontendSettingService = new FrontendSettingService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->frontendSettingService->list($request);
        }

        $data['settingData'] = $this->frontendSettingService->getFrontendSetting();
        $data['allStudent'] = $this->frontendSettingService->allStudent();
        $data['galleryCategory'] = $this->frontendSettingService->galleryCategory();

        $data['pageTitle'] = __("Section List");
        $data['activeSettingsMenu'] = "active";
        $data['activeSettingsFrontendMenu'] = "active";
        return view('admin.settings.frontend-setting.index', $data);
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Section Update");
        $data['section'] = $this->frontendSettingService->getById(decrypt($id));
        return view('admin.settings.frontend-setting.section-configuration.edit', $data)->render();
    }

    public function update(FrontendSettingRequest $request)
    {
        return $this->frontendSettingService->update($request);
    }

    public function frontendSettingUpdate(FrontendSettingRequest $request)
    {
        return $this->frontendSettingService->frontendSettingUpdate($request);
    }

}
