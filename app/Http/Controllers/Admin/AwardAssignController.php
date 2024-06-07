<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AwardAssignRequest;
use App\Http\Services\AwardAssignService;

class AwardAssignController extends Controller
{
    public $awardAssignService;

    public function __construct()
    {
        $this->awardAssignService = new AwardAssignService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->awardAssignService->list($request);
        }
        $data['pageTitle'] = __("Award Assign List");
        $data['activeAwardMenu'] = "active";
        $data['activeAwardAssignMenu'] = "active";
        $data['students'] = $this->awardAssignService->getAllStudent();
        $data['awards'] = $this->awardAssignService->getAllAward();

        return view('admin.award-assign.list', $data);
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Packages Edit");
        $data['stdAwards'] = $this->awardAssignService->getById(decrypt($id));
        $data['students'] = $this->awardAssignService->getAllStudent();
        $data['awards'] = $this->awardAssignService->getAllAward();
        return view('admin.award-assign.edit', $data)->render();
    }

    public function store(AwardAssignRequest $request)
    {
        return $this->awardAssignService->store($request);
    }

    public function destroy($id)
    {
        return $this->awardAssignService->destroy(decrypt($id));
    }

}
