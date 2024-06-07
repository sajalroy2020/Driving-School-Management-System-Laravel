<?php

namespace App\Http\Controllers\FrontendSetting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Http\Requests\Admin\GalleryCategoryRequest;
use App\Http\Services\GalleryCategoryService;

class GalleryCategoryController extends Controller
{
    public $galleryCatService;

    public function __construct()
    {
        $this->galleryCatService = new GalleryCategoryService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->galleryCatService->list();
        }
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Gallery Category Update");
        $data['category'] = $this->galleryCatService->getById(decrypt($id));
        return view('admin.settings.frontend-setting.gallery-setting.category-edit', $data)->render();
    }

    public function store(GalleryCategoryRequest $request)
    {
        return $this->galleryCatService->store($request);
    }

    public function destroy($id)
    {
        return $this->galleryCatService->destroy(decrypt($id));
    }
}
