<?php

namespace App\Queries\Dashboard;

use App\Models\Meeting;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Collection;

class DashboardListsQuery
{
    public function handle(): array
    {
        return [
            'tasks_due_soon' => $this->getTasksDueSoon(),
            'upcoming_meetings' => $this->getUpcomingMeetings(),
            'overdue_payments' => $this->getOverduePayments(),
            'recent_payments' => $this->getRecentPayments(),
            'projects_due_soon' => $this->getProjectsDueSoon(),
        ];
    }

    /**
     * Tasks with due_date in next 7 days (not done)
     */
    private function getTasksDueSoon(): Collection
    {
        return Task::with('project:id,name')
            ->open()
            ->whereNotNull('due_date')
            ->whereBetween('due_date', [now(), now()->addDays(7)])
            ->orderBy('due_date')
            ->take(5)
            ->get();
    }

    /**
     * Next 5 upcoming meetings (scheduled, future)
     */
    private function getUpcomingMeetings(): Collection
    {
        return Meeting::with('project:id,name')
            ->upcoming()
            ->take(5)
            ->get();
    }

    /**
     * Overdue payments (pending + past due_date)
     */
    private function getOverduePayments(): Collection
    {
        return Payment::with('project:id,name,client_id', 'project.client:id,name')
            ->overdue()
            ->orderBy('due_date')
            ->take(5)
            ->get();
    }

    /**
     * Last 5 received payments
     */
    private function getRecentPayments(): Collection
    {
        return Payment::with('project:id,name')
            ->paid()
            ->latest('paid_at')
            ->take(5)
            ->get();
    }

    /**
     * Projects with nearest due_date (active only)
     */
    private function getProjectsDueSoon(): Collection
    {
        return Project::with('client:id,name')
            ->where('status', 'in_progress')
            ->whereNotNull('due_date')
            ->where('due_date', '>=', now())
            ->orderBy('due_date')
            ->take(5)
            ->get();
    }
}
