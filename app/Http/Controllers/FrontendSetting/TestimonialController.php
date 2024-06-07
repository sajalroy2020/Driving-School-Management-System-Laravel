<?php

namespace App\Http\Controllers\FrontendSetting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Http\Services\TestimonialService;

class TestimonialController extends Controller
{
    public $testimonialService;

    public function __construct()
    {
        $this->testimonialService = new TestimonialService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->testimonialService->list();
        }
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Faq Update");
        $data['allStudent'] = $this->testimonialService->allStudent();
        $data['testimonial'] = $this->testimonialService->getById(decrypt($id));
        return view('admin.settings.frontend-setting.testimonial-setting.edit', $data)->render();
    }

    public function store(TestimonialRequest $request)
    {
        return $this->testimonialService->store($request);
    }

    public function destroy($id)
    {
        return $this->testimonialService->destroy(decrypt($id));
    }
}
