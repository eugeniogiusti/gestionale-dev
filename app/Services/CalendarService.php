<?php

namespace App\Services;

use App\Services\Calendar\ProjectCalendarService;
use App\Services\Calendar\MeetingCalendarService;
use App\Services\Calendar\TaskCalendarService;
use Illuminate\Support\Collection;

class CalendarService
{
    public function __construct(
        protected ProjectCalendarService $projectService,
        protected MeetingCalendarService $meetingService,
        protected TaskCalendarService $taskService,
    ) {}

    /**
     * Get all calendar events
     */
    public function getEvents(?string $start = null, ?string $end = null, array $filters = []): Collection
    {
        $events = collect();

        if ($this->shouldIncludeType('projects', $filters)) {
            $events = $events->merge(
                $this->projectService->getEvents($start, $end, $filters)
            );
        }

        if ($this->shouldIncludeType('meetings', $filters)) {
            $events = $events->merge(
                $this->meetingService->getEvents($start, $end, $filters)
            );
        }

        if ($this->shouldIncludeType('tasks', $filters)) {
            $events = $events->merge(
                $this->taskService->getEvents($start, $end, $filters)
            );
        }

        return $events;
    }

    /**
     * Check if event type should be included based on filters
     */
    protected function shouldIncludeType(string $type, array $filters): bool
    {
        return !isset($filters['type']) || in_array($type, $filters['type']);
    }
}