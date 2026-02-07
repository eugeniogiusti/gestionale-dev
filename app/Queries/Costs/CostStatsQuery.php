<?php

namespace App\Queries\Costs;

use App\Models\Cost;

class CostStatsQuery
{
    public function handle(): array
    {
        return [
            'total_all_time' => $this->getTotalAllTime(),
            'total_this_month' => $this->getTotalThisMonth(),
            'total_this_year' => $this->getTotalThisYear(),
            'recurring_monthly' => $this->getRecurringMonthly(),
        ];
    }

    private function getTotalAllTime(): float
    {
        return Cost::sum('amount');
    }

    private function getTotalThisMonth(): float
    {
        return Cost::thisMonth()
            ->sum('amount');
    }

    private function getTotalThisYear(): float
    {
        return Cost::thisYear()
            ->sum('amount');
    }

    private function getRecurringMonthly(): float
    {
        return Cost::recurring(true)
            ->where('recurring_period', 'monthly')
            ->sum('amount');
    }
}
