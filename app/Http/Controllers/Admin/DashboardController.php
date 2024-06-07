<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\DashboardService;
use App\Http\Controllers\Controller;

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
        $data['overallSummery'] = $this->dashboardService->getOverAllSummery();
        return view('admin.dashboard', $data);
    }

    public function revenueChart()
    {
        return $this->dashboardService->revenueChart();
    }

    public function studentChart()
    {
        return $this->dashboardService->studentChart();
    }

    public function recentEnrolmentHistory()
    {
        return $this->dashboardService->recentEnrolmentHistory();
    }

    public function recentPaymentHistory()
    {
        return $this->dashboardService->recentPaymentHistory();
    }
}
