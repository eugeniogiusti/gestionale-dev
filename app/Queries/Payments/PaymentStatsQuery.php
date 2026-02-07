<?php

namespace App\Queries\Payments;

use App\Models\Payment;

class PaymentStatsQuery
{
    /**
     * Calculate payment statistics
     *
     * Only counts payments that have been received (paid_at IS NOT NULL)
     * to provide accurate statistics based on actual received payments.
     *
     * @return array
     */
    public function handle(): array
    {
        return [
            'total_all_time' => $this->getTotalAllTime(),
            'total_this_month' => $this->getTotalThisMonth(),
            'total_this_year' => $this->getTotalThisYear(),
        ];
    }

    /**
     * Total received payments (all time)
     */
    private function getTotalAllTime(): float
    {
        return Payment::whereNotNull('paid_at')
            ->sum('amount');
    }

    /**
     * Total received payments this month
     * Note: thisMonth() scope already filters by paid_at date range
     */
    private function getTotalThisMonth(): float
    {
        return Payment::thisMonth()
            ->sum('amount');
    }

    /**
     * Total received payments this year
     * Note: thisYear() scope already filters by paid_at date range
     */
    private function getTotalThisYear(): float
    {
        return Payment::thisYear()
            ->sum('amount');
    }
}
