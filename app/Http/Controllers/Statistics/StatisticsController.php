<?php

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\Controller;
use App\Queries\Statistics\StatisticsQuery;
use App\Services\Statistics\StatisticsPdfExporter;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index(Request $request)
    {
        $year = (int) $request->get('year', now()->year);
        $month = $request->has('month')
            ? ($request->get('month') ? (int) $request->get('month') : null)
            : now()->month;

        $availableYears = $this->getAvailableYears();
        $stats = (new StatisticsQuery($year, $month))->handle();

        return view('statistics.index', compact(
            'year',
            'month',
            'availableYears',
            'stats'
        ));
    }

    public function exportPdf(Request $request)
    {
        $year = (int) $request->get('year', now()->year);
        $month = $request->get('month') ? (int) $request->get('month') : null;

        return (new StatisticsPdfExporter($year, $month))->download();
    }

    private function getAvailableYears(): array
    {
        $startYear = 2026;
        $currentYear = now()->year;

        return range($currentYear, $startYear);
    }
}
