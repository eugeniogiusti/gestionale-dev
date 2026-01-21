<?php

namespace App\Services\Calendar;

use App\Models\Task;
use Illuminate\Support\Collection;

class TaskCalendarService
{
    public function __construct(
        protected CalendarColorService $colorService
    ) {}

    /**
     * Get task events for calendar
     */
    public function getEvents(?string $start, ?string $end, array $filters): Collection
    {
        $query = Task::with(['project.client'])
            ->whereNotNull('due_date');

        $this->applyDateFilters($query, $start, $end);
        $this->applyFilters($query, $filters);

        return $query->get()->map(fn($task) => $this->mapToEvent($task));
    }

    /**
     * Apply date range filters
     */
    protected function applyDateFilters($query, ?string $start, ?string $end): void
    {
        if (!$start || !$end) {
            return;
        }

        $query->whereBetween('due_date', [$start, $end]);
    }

    /**
     * Apply additional filters
     */
    protected function applyFilters($query, array $filters): void
    {
        if (isset($filters['status']) && !empty($filters['status'])) {
            $query->whereIn('status', $filters['status']);
        }

        if (isset($filters['client_id']) && !empty($filters['client_id'])) {
            $query->whereHas('project', fn($q) => $q->where('client_id', $filters['client_id']));
        }

        if (isset($filters['priority']) && !empty($filters['priority'])) {
            $query->whereIn('priority', $filters['priority']);
        }
    }

    /**
     * Map task to calendar event format
     */
    protected function mapToEvent(Task $task): array
    {
        $color = $this->colorService->getTaskColor($task->status, $task->priority);

        return [
            'id' => 'task-' . $task->id,
            'title' => $task->title,
            'start' => $task->due_date->format('Y-m-d'),
            'backgroundColor' => $color,
            'borderColor' => $color,
            'extendedProps' => [
                'type' => 'task',
                'entityId' => $task->id,
                'project' => $task->project->name,
                'client' => $task->project->client?->name,
                'status' => $task->status,
                'priority' => $task->priority,
                'isOverdue' => $task->isOverdue(),
                'url' => route('projects.show', $task->project) . '#tasks',
            ],
        ];
    }
}