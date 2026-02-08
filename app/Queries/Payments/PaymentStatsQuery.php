<?php

namespace App\Queries\Payments;

use App\Models\BusinessSettings;
use App\Models\Payment;

/**
 * Payment statistics for the index stat cards.
 *
 * Returns: total_all_time, total_this_month, total_this_year.
 * All amounts filtered by the default currency from BusinessSettings.
 */
class PaymentStatsQuery
{
    private string $currency;

    public function handle(): array
    {
        $this->currency = BusinessSettings::current()->default_currency;

        return [
            'total_all_time' => $this->getTotalAllTime(),
            'total_this_month' => $this->getTotalThisMonth(),
            'total_this_year' => $this->getTotalThisYear(),
        ];
    }

    private function getTotalAllTime(): float
    {
        return Payment::whereNotNull('paid_at')
            ->where('currency', $this->currency)
            ->sum('amount');
    }

    private function getTotalThisMonth(): float
    {
        return Payment::where('currency', $this->currency)
            ->thisMonth()
            ->sum('amount');
    }

    private function getTotalThisYear(): float
    {
        return Payment::where('currency', $this->currency)
            ->thisYear()
            ->sum('amount');
    }
}
