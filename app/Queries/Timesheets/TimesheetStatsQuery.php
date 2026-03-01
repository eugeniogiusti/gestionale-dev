<?php

namespace App\Queries\Timesheets;

use App\Models\Timesheet;

/**
 * Timesheet statistics for the index stat cards.
 *
 * Returns: hours_this_month, earnings_this_month, hours_this_year, earnings_this_year.
 * daily_hours is stored as JSON, so aggregation is done in PHP.
 */
class TimesheetStatsQuery
{
    public function handle(): array
    {
        $now = now();

        $thisMonth = Timesheet::query()
            ->where('year', $now->year)
            ->where('month', $now->month)
            ->get(['daily_hours', 'hourly_rate']);

        $thisYear = Timesheet::query()
            ->where('year', $now->year)
            ->get(['daily_hours', 'hourly_rate']);

        return [
            'hours_this_month'    => $this->sumHours($thisMonth),
            'earnings_this_month' => $this->sumEarnings($thisMonth),
            'hours_this_year'     => $this->sumHours($thisYear),
            'earnings_this_year'  => $this->sumEarnings($thisYear),
        ];
    }

    private function sumHours($timesheets): float
    {
        return $timesheets->sum(fn ($ts) => array_sum($ts->daily_hours ?? []));
    }

    private function sumEarnings($timesheets): float
    {
        return $timesheets->sum(fn ($ts) => array_sum($ts->daily_hours ?? []) * (float) ($ts->hourly_rate ?? 0));
    }
}
