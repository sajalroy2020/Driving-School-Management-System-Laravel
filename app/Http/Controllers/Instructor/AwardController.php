<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\AwardAssignService;

class AwardController extends Controller
{
    public $awardService;

    public function __construct()
    {
        $this->awardService = new AwardAssignService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->awardService->list($request);
        }
        $data['pageTitle'] = __("Award List");
        $data['activeAwardMenu'] = "active";
        return view('Instructor.award.list', $data);
    }

}
