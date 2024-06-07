<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AwardRequest;
use App\Http\Services\AwardService;

class AwardController extends Controller
{
    public $awardService;

    public function __construct()
    {
        $this->awardService = new AwardService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->awardService->list($request);
        }
        $data['pageTitle'] = __("Award List");
        $data['activeAwardSubMenu'] = "active";
        $data['activeAwardMenu'] = "active";
        return view('admin.award.list', $data);
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Award Edit");
        $data['award'] = $this->awardService->getById(decrypt($id));
        return view('admin.award.edit', $data)->render();
    }

    public function store(AwardRequest $request)
    {
        return $this->awardService->store($request);
    }

    public function destroy($id)
    {
        return $this->awardService->destroy(decrypt($id));
    }

}
