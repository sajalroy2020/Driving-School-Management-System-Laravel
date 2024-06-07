<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\AwardAssignService;
use App\Http\Services\AwardService;

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
        $data['pageTitle'] = __("My Award");
        $data['activeAwardMenu'] = "active";
        return view('student.std-award.list', $data);
    }
}
