<?php

namespace App\Queries\Dashboard;

use App\Models\Cost;
use App\Models\Payment;
use Illuminate\Support\Collection;

class DashboardChartQuery
{
    public function handle(): array
    {
        $months = $this->getCurrentYearMonths();

        $payments = $this->getMonthlyPayments($months);
        $costs = $this->getMonthlyCosts($months);

        return [
            'labels' => $months->pluck('label')->toArray(),
            'payments' => $payments,
            'costs' => $costs,
            'profit' => collect($payments)->map(fn($p, $i) => $p - $costs[$i])->values()->toArray(),
        ];
    }

    private function getCurrentYearMonths(): Collection
    {
        $year = now()->year;

        return collect(range(1, 12))->map(function ($month) use ($year) {
            $date = now()->setDate($year, $month, 1);
            return [
                'key' => $date->format('Y-m'),
                'label' => $date->translatedFormat('M'),
                'start' => $date->copy()->startOfMonth(),
                'end' => $date->copy()->endOfMonth(),
            ];
        });
    }

    private function getMonthlyPayments(Collection $months): array
    {
        $payments = Payment::paid()
            ->where('currency', 'EUR')
            ->thisYear()
            ->selectRaw("strftime('%Y-%m', paid_at) as month, SUM(amount) as total")
            ->groupBy('month')
            ->pluck('total', 'month');

        return $months->map(fn($m) => (float) ($payments[$m['key']] ?? 0))->values()->toArray();
    }

    private function getMonthlyCosts(Collection $months): array
    {
        $costs = Cost::where('currency', 'EUR')
            ->thisYear()
            ->selectRaw("strftime('%Y-%m', paid_at) as month, SUM(amount) as total")
            ->groupBy('month')
            ->pluck('total', 'month');

        return $months->map(fn($m) => (float) ($costs[$m['key']] ?? 0))->values()->toArray();
    }
}
