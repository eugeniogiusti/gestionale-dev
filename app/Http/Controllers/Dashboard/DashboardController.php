<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Queries\Dashboard\DashboardChartQuery;
use App\Queries\Dashboard\DashboardListsQuery;
use App\Queries\Dashboard\DashboardStatsQuery;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = (new DashboardStatsQuery())->handle();
        $lists = (new DashboardListsQuery())->handle();
        $chart = (new DashboardChartQuery())->handle();

        return view('dashboard.index', compact('stats', 'lists', 'chart'));
    }
}
