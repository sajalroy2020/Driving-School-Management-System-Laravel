<?php

namespace App\Http\Controllers\FrontendSetting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Http\Services\FaqService;

class FaqController extends Controller
{
    public $faqService;

    public function __construct()
    {
        $this->faqService = new FaqService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->faqService->list();
        }
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Faq Update");
        $data['faq'] = $this->faqService->getById(decrypt($id));
        return view('admin.settings.frontend-setting.faq-setting.edit', $data)->render();
    }

    public function store(FaqRequest $request)
    {
        return $this->faqService->store($request);
    }

    public function destroy($id)
    {
        return $this->faqService->destroy(decrypt($id));
    }
}
