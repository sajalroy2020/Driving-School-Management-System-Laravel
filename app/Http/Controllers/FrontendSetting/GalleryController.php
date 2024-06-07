<?php

namespace App\Http\Controllers\FrontendSetting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Http\Requests\Admin\GalleryRequest;
use App\Http\Services\GalleryService;

class GalleryController extends Controller
{
    public $galleryService;

    public function __construct()
    {
        $this->galleryService = new GalleryService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->galleryService->list();
        }
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Gallery Edit");
        $data['galleryCategory'] = $this->galleryService->galleryCategory();
        $data['gallery'] = $this->galleryService->getById(decrypt($id));
        return view('admin.settings.frontend-setting.gallery-setting.gallery-edit', $data)->render();
    }

    public function store(GalleryRequest $request)
    {
        return $this->galleryService->store($request);
    }

    public function destroy($id)
    {
        return $this->galleryService->destroy(decrypt($id));
    }
}
