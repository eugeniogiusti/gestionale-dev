<?php

namespace App\Services\Calendar;

use App\Models\Project;
use Illuminate\Support\Collection;

class ProjectCalendarService
{
    public function __construct(
        protected CalendarColorService $colorService
    ) {}

    /**
     * Get project events for calendar
     */
    public function getEvents(?string $start, ?string $end, array $filters): Collection
    {
        $query = Project::with('client')
            ->whereNotNull('due_date');

        $this->applyDateFilters($query, $start, $end);
        $this->applyFilters($query, $filters);

        return $query->get()->map(fn($project) => $this->mapToEvent($project));
    }

    /**
     * Apply date range filters
     */
    protected function applyDateFilters($query, ?string $start, ?string $end): void
    {
        if (!$start || !$end) {
            return;
        }

        $query->where(function($q) use ($start, $end) {
            $q->whereBetween('due_date', [$start, $end])
              ->orWhereBetween('start_date', [$start, $end])
              ->orWhere(function($q) use ($start, $end) {
                  $q->where('start_date', '<=', $end)
                    ->where('due_date', '>=', $start);
              });
        });
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
            $query->where('client_id', $filters['client_id']);
        }

        if (isset($filters['priority']) && !empty($filters['priority'])) {
            $query->whereIn('priority', $filters['priority']);
        }
    }

    /**
     * Map project to calendar event format
     */
    protected function mapToEvent(Project $project): array
    {
        $color = $this->colorService->getProjectColor($project->status);

        return [
            'id' => 'project-' . $project->id,
            'title' => $project->name,
            'start' => $project->start_date?->format('Y-m-d'),
            'end' => $project->due_date?->format('Y-m-d'),
            'backgroundColor' => $color,
            'borderColor' => $color,
            'extendedProps' => [
                'type' => 'project',
                'entityId' => $project->id,
                'client' => $project->client?->name,
                'status' => $project->status,
                'priority' => $project->priority,
                'url' => route('projects.show', $project),
            ],
        ];
    }
}