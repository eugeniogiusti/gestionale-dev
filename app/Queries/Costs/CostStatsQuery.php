<?php

namespace App\Queries\Costs;

use App\Models\BusinessSettings;
use App\Models\Cost;

/**
 * Cost statistics for the index stat cards.
 *
 * Returns: total_all_time, total_this_month, total_this_year, recurring_monthly.
 * All amounts filtered by the default currency from BusinessSettings.
 */
class CostStatsQuery
{
    private string $currency;

    public function handle(): array
    {
        $this->currency = BusinessSettings::current()->default_currency;

        return [
            'total_all_time' => $this->getTotalAllTime(),
            'total_this_month' => $this->getTotalThisMonth(),
            'total_this_year' => $this->getTotalThisYear(),
            'recurring_monthly' => $this->getRecurringMonthly(),
        ];
    }

    private function getTotalAllTime(): float
    {
        return Cost::where('currency', $this->currency)->sum('amount');
    }

    private function getTotalThisMonth(): float
    {
        return Cost::where('currency', $this->currency)
            ->thisMonth()
            ->sum('amount');
    }

    private function getTotalThisYear(): float
    {
        return Cost::where('currency', $this->currency)
            ->thisYear()
            ->sum('amount');
    }

    private function getRecurringMonthly(): float
    {
        return Cost::where('currency', $this->currency)
            ->recurring(true)
            ->where('recurring_period', 'monthly')
            ->sum('amount');
    }
}
