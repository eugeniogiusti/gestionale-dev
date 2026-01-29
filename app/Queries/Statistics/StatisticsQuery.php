<?php

namespace App\Queries\Statistics;

use App\Queries\Statistics\SubQueries\ChartDataQuery;
use App\Queries\Statistics\SubQueries\FinancialStatsQuery;
use App\Queries\Statistics\SubQueries\MonthlyBreakdownQuery;
use App\Queries\Statistics\SubQueries\OperationalStatsQuery;
use Illuminate\Support\Carbon;

class StatisticsQuery
{
    private Carbon $startDate;
    private Carbon $endDate;
    private bool $isFullYear;

    public function __construct(
        private int $year,
        private ?int $month = null
    ) {
        $this->isFullYear = is_null($month);
        $this->startDate = $this->calculateStartDate();
        $this->endDate = $this->calculateEndDate();
    }

    public function handle(): array
    {
        return [
            'summary' => $this->getSummary(),
            'monthly' => $this->isFullYear ? $this->getMonthlyBreakdown() : null,
            'chart' => $this->getChartData(),
        ];
    }

    private function calculateStartDate(): Carbon
    {
        if ($this->isFullYear) {
            return Carbon::create($this->year, 1, 1)->startOfDay();
        }
        return Carbon::create($this->year, $this->month, 1)->startOfDay();
    }

    private function calculateEndDate(): Carbon
    {
        if ($this->isFullYear) {
            return Carbon::create($this->year, 12, 31)->endOfDay();
        }
        return Carbon::create($this->year, $this->month, 1)->endOfMonth()->endOfDay();
    }

    private function getSummary(): array
    {
        $financial = (new FinancialStatsQuery($this->startDate, $this->endDate))->handle();
        $operational = (new OperationalStatsQuery($this->startDate, $this->endDate))->handle();

        return array_merge($financial, $operational);
    }

    private function getMonthlyBreakdown()
    {
        return (new MonthlyBreakdownQuery($this->year))->handle();
    }

    private function getChartData(): array
    {
        return (new ChartDataQuery($this->year, $this->month))->handle();
    }
}
