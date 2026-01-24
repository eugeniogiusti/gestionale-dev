<?php

namespace App\Queries\Payments;

use App\Models\Payment;

class PaymentStatsQuery
{
    public function handle(): array
    {
        return [
            'total_all_time' => $this->getTotalAllTime(),
            'total_this_month' => $this->getTotalThisMonth(),
            'total_this_year' => $this->getTotalThisYear(),
            'by_currency' => $this->getByCurrency(),
        ];
    }

    private function getTotalAllTime(): float
    {
        return Payment::where('currency', 'EUR')->sum('amount');
    }

    private function getTotalThisMonth(): float
    {
        return Payment::where('currency', 'EUR')
            ->thisMonth()
            ->sum('amount');
    }

    private function getTotalThisYear(): float
    {
        return Payment::where('currency', 'EUR')
            ->thisYear()
            ->sum('amount');
    }

    private function getByCurrency(): array
    {
        return Payment::selectRaw('currency, SUM(amount) as total')
            ->groupBy('currency')
            ->get()
            ->pluck('total', 'currency')
            ->toArray();
    }
}