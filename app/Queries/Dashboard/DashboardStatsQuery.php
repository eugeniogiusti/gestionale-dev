<?php

namespace App\Queries\Dashboard;

use App\Models\Cost;
use App\Models\Meeting;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Task;

class DashboardStatsQuery
{
    public function handle(): array
    {
        return [
            'profit_this_month' => $this->getProfitThisMonth(),
            'pending_payments' => $this->getPendingPayments(),
            'active_projects' => $this->getActiveProjectsCount(),
            'open_tasks' => $this->getOpenTasksCount(),
            'meetings_this_week' => $this->getMeetingsThisWeekCount(),
        ];
    }

    /**
     * Profit = payments received - costs (this month, EUR only)
     */
    private function getProfitThisMonth(): array
    {
        $payments = Payment::currency('EUR')
            ->thisMonth()
            ->sum('amount');

        $costs = Cost::where('currency', 'EUR')
            ->whereBetween('paid_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->sum('amount');

        return [
            'amount' => $payments - $costs,
            'payments' => $payments,
            'costs' => $costs,
        ];
    }

    /**
     * Pending payments (not yet received)
     */
    private function getPendingPayments(): array
    {
        $query = Payment::pending()->where('currency', 'EUR');

        return [
            'count' => (clone $query)->count(),
            'total' => (clone $query)->sum('amount'),
            'overdue_count' => Payment::overdue()->count(),
        ];
    }

    /**
     * Active projects count (in_progress)
     */
    private function getActiveProjectsCount(): int
    {
        return Project::where('status', 'in_progress')->count();
    }

    /**
     * Open tasks count (todo + in_progress)
     */
    private function getOpenTasksCount(): array
    {
        return [
            'total' => Task::open()->count(),
            'todo' => Task::status('todo')->count(),
            'in_progress' => Task::status('in_progress')->count(),
            'blocked' => Task::status('blocked')->count(),
        ];
    }

    /**
     * Meetings this week count
     */
    private function getMeetingsThisWeekCount(): int
    {
        return Meeting::scheduled()->thisWeek()->count();
    }
}
