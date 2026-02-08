<?php

namespace App\Queries\Statistics\SubQueries;

use App\Models\BusinessSettings;
use App\Models\Cost;
use App\Models\Payment;
use Illuminate\Support\Carbon;

/**
 * Financial statistics for a date range (sub-query of StatisticsQuery).
 *
 * Returns: payments total, costs total, profit (payments - costs),
 * pending payments amount — all within the given date range.
 * Amounts filtered by the default currency from BusinessSettings.
 */
class FinancialStatsQuery
{
    private string $currency;

    public function __construct(
        private Carbon $startDate,
        private Carbon $endDate
    ) {}

    public function handle(): array
    {
        $this->currency = BusinessSettings::current()->default_currency;
        $payments = $this->getPayments();
        $costs = $this->getCosts();

        return [
            'payments' => $payments,
            'costs' => $costs,
            'profit' => $payments - $costs,
            'pending' => $this->getPending(),
        ];
    }

    private function getPayments(): float
    {
        return (float) Payment::paid()
            ->where('currency', $this->currency)
            ->whereBetween('paid_at', [$this->startDate, $this->endDate])
            ->sum('amount');
    }

    private function getCosts(): float
    {
        return (float) Cost::where('currency', $this->currency)
            ->whereBetween('paid_at', [$this->startDate, $this->endDate])
            ->sum('amount');
    }

    private function getPending(): float
    {
        return (float) Payment::pending()
            ->where('currency', $this->currency)
            ->whereHas('project', fn($q) => $q->whereBetween('created_at', [$this->startDate, $this->endDate]))
            ->sum('amount');
    }
}
