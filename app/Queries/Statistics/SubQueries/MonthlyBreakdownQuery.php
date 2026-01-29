<?php

namespace App\Queries\Statistics\SubQueries;

use App\Models\Client;
use App\Models\Cost;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class MonthlyBreakdownQuery
{
    public function __construct(
        private int $year
    ) {}

    public function handle(): Collection
    {
        $months = $this->getMonthsStructure();

        $payments = $this->getPaymentsData();
        $costs = $this->getCostsData();
        $projects = $this->getProjectsData();
        $tasks = $this->getTasksData();
        $clients = $this->getClientsData();

        return $months->map(function ($m) use ($payments, $costs, $projects, $tasks, $clients) {
            $p = (float) ($payments[$m['key']] ?? 0);
            $c = (float) ($costs[$m['key']] ?? 0);

            return [
                'month' => $m['month'],
                'label' => $m['label'],
                'payments' => $p,
                'costs' => $c,
                'profit' => $p - $c,
                'projects' => (int) ($projects[$m['key']] ?? 0),
                'tasks' => (int) ($tasks[$m['key']] ?? 0),
                'clients' => (int) ($clients[$m['key']] ?? 0),
            ];
        });
    }

    private function getMonthsStructure(): Collection
    {
        return collect(range(1, 12))->map(fn($month) => [
            'month' => $month,
            'label' => Carbon::create($this->year, $month, 1)->translatedFormat('F'),
            'key' => sprintf('%d-%02d', $this->year, $month),
        ]);
    }

    private function getPaymentsData(): Collection
    {
        return Payment::paid()
            ->where('currency', 'EUR')
            ->whereYear('paid_at', $this->year)
            ->selectRaw("strftime('%Y-%m', paid_at) as month, SUM(amount) as total")
            ->groupBy('month')
            ->pluck('total', 'month');
    }

    private function getCostsData(): Collection
    {
        return Cost::where('currency', 'EUR')
            ->whereYear('paid_at', $this->year)
            ->selectRaw("strftime('%Y-%m', paid_at) as month, SUM(amount) as total")
            ->groupBy('month')
            ->pluck('total', 'month');
    }

    private function getProjectsData(): Collection
    {
        return Project::whereYear('created_at', $this->year)
            ->selectRaw("strftime('%Y-%m', created_at) as month, COUNT(*) as total")
            ->groupBy('month')
            ->pluck('total', 'month');
    }

    private function getTasksData(): Collection
    {
        return Task::where('status', 'done')
            ->whereYear('updated_at', $this->year)
            ->selectRaw("strftime('%Y-%m', updated_at) as month, COUNT(*) as total")
            ->groupBy('month')
            ->pluck('total', 'month');
    }

    private function getClientsData(): Collection
    {
        return Client::whereYear('created_at', $this->year)
            ->selectRaw("strftime('%Y-%m', created_at) as month, COUNT(*) as total")
            ->groupBy('month')
            ->pluck('total', 'month');
    }
}
