<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Enrolment;
use Illuminate\Http\Request;
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

        $data['runningStudent'] = $this->dashboardService->runningStudent();
        $data['completedStudent'] = $this->dashboardService->completedStudent();
        $data['pendingExam'] = $this->dashboardService->pendingExamInstructor();
        $data['activeNotice'] = $this->dashboardService->activeNotice();

        return view('Instructor.dashboard', $data);
    }
}
