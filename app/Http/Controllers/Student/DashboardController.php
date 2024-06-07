<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Services\DashboardService;

class DashboardController extends Controller
{

    public $dashboardService;

    public function __construct()
    {
        $this->dashboardService = new DashboardService();
    }

    public function index()
    {
        $data['pageTitle'] = __("Dashboard");
        $data['activeDashboardMenu'] = "active";

        $data['notice'] = $this->dashboardService->activeNotice();
        $data['pendingExam'] = $this->dashboardService->pendingExam();
        $data['course'] = $this->dashboardService->myCourse();
        $data['amount'] = $this->dashboardService->paymentAmount();

        return view('student.dashboard', $data);
    }
}
