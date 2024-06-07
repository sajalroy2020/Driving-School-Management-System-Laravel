<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\CommonService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AwardRequest;
use App\Http\Services\AwardService;

class CommonController extends Controller
{
    public $commonService;

    public function __construct()
    {
        $this->commonService = new CommonService();
    }

    public function userDocumentList(Request $request)
    {
            return $this->commonService->userDocumentList($request);
    }
    public function userActivityLog(Request $request)
    {
            return $this->commonService->userActivityLog($request);
    }

}
