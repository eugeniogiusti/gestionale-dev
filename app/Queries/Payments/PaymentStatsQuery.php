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
            'by_currency' => $this->getByCurrency(),
        ];
    }

    /**
     * Total received payments (all time)
     */
    private function getTotalAllTime(): float
    {
        return Payment::whereNotNull('paid_at')
            ->where('currency', 'EUR')
            ->sum('amount');
    }

    /**
     * Total received payments this month
     * Note: thisMonth() scope already filters by paid_at date range
     */
    private function getTotalThisMonth(): float
    {
        return Payment::where('currency', 'EUR')
            ->thisMonth()
            ->sum('amount');
    }

    /**
     * Total received payments this year
     * Note: thisYear() scope already filters by paid_at date range
     */
    private function getTotalThisYear(): float
    {
        return Payment::where('currency', 'EUR')
            ->thisYear()
            ->sum('amount');
    }

    /**
     * Total received payments grouped by currency
     */
    private function getByCurrency(): array
    {
        return Payment::whereNotNull('paid_at')
            ->selectRaw('currency, SUM(amount) as total')
            ->groupBy('currency')
            ->get()
            ->pluck('total', 'currency')
            ->toArray();
    }
}