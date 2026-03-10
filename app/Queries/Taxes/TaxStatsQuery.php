<?php

namespace App\Queries\Taxes;

use App\Models\BusinessSettings;
use App\Models\Tax;

class TaxStatsQuery
{
    public function handle(): array
    {
        return [
            'total_all_time'  => $this->getTotalAllTime(),
            'total_this_year' => $this->getTotalThisYear(),
            'unpaid_amount'   => $this->getUnpaidAmount(),
            'count_this_year' => $this->getCountThisYear(),
        ];
    }

    private function getTotalAllTime(): float
    {
        return Tax::paid()->sum('amount');
    }

    private function getTotalThisYear(): float
    {
        return Tax::paid()
            ->whereYear('paid_at', now()->year)
            ->sum('amount');
    }

    private function getUnpaidAmount(): float
    {
        return Tax::unpaid()->sum('amount');
    }

    private function getCountThisYear(): int
    {
        return Tax::whereYear('due_date', now()->year)->count();
    }
}
