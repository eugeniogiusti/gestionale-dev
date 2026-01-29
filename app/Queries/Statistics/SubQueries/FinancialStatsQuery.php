<?php

namespace App\Queries\Statistics\SubQueries;

use App\Models\Cost;
use App\Models\Payment;
use Illuminate\Support\Carbon;

class FinancialStatsQuery
{
    public function __construct(
        private Carbon $startDate,
        private Carbon $endDate
    ) {}

    public function handle(): array
    {
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
            ->where('currency', 'EUR')
            ->whereBetween('paid_at', [$this->startDate, $this->endDate])
            ->sum('amount');
    }

    private function getCosts(): float
    {
        return (float) Cost::where('currency', 'EUR')
            ->whereBetween('paid_at', [$this->startDate, $this->endDate])
            ->sum('amount');
    }

    private function getPending(): float
    {
        return (float) Payment::pending()
            ->where('currency', 'EUR')
            ->whereHas('project', fn($q) => $q->whereBetween('created_at', [$this->startDate, $this->endDate]))
            ->sum('amount');
    }
}
