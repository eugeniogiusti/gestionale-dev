<?php

namespace App\Services\Calendar;

use App\Models\Meeting;
use Illuminate\Support\Collection;

class MeetingCalendarService
{
    public function __construct(
        protected CalendarColorService $colorService
    ) {}

    /**
     * Get meeting events for calendar
     */
    public function getEvents(?string $start, ?string $end, array $filters): Collection
    {
        $query = Meeting::with(['project.client']);

        $this->applyDateFilters($query, $start, $end);
        $this->applyFilters($query, $filters);

        return $query->get()->map(fn($meeting) => $this->mapToEvent($meeting));
    }

    /**
     * Apply date range filters
     */
    protected function applyDateFilters($query, ?string $start, ?string $end): void
    {
        if (!$start || !$end) {
            return;
        }

        $query->whereBetween('scheduled_at', [$start, $end]);
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
    }

    /**
     * Map meeting to calendar event format
     */
    protected function mapToEvent(Meeting $meeting): array
    {
        $color = $this->colorService->getMeetingColor($meeting->status);

        return [
            'id' => 'meeting-' . $meeting->id,
            'title' => $meeting->title,
            'start' => $meeting->scheduled_at->format('Y-m-d H:i:s'),
            'end' => $meeting->getEndTime()->format('Y-m-d H:i:s'),
            'backgroundColor' => $color,
            'borderColor' => $color,
            'extendedProps' => [
                'type' => 'meeting',
                'entityId' => $meeting->id,
                'project' => $meeting->project->name,
                'client' => $meeting->project->client?->name,
                'status' => $meeting->status,
                'location' => $meeting->location,
                'meeting_url' => $meeting->meeting_url,
                'url' => route('projects.show', $meeting->project) . '#meetings',
            ],
        ];
    }
}