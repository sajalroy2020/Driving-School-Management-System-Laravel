<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\NoticeRequest;
use App\Http\Requests\Admin\ReportRequest;
use App\Http\Services\NoticeService;
use App\Http\Services\ReportService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public $reportService;

    public function __construct()
    {
        $this->reportService = new ReportService();
    }

    public function index(Request $request)
    {
        $data['pageTitle'] = __("Report");
        $data['activeReportMenu'] = "active";
        return view('admin.report.index', $data);
    }

    public function generation(ReportRequest $request)
    {
        return $this->reportService->generation($request);
    }

}
