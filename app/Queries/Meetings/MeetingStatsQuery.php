<?php

namespace App\Queries\Meetings;

use App\Models\Meeting;

/**
 * Meeting statistics for the index stat cards.
 *
 * Returns: upcoming count, today count, this_week count, completed_last_week count.
 */
class MeetingStatsQuery
{
    public function handle(): array
    {
        return [
            'upcoming' => $this->getUpcomingCount(),
            'today' => $this->getTodayCount(),
            'this_week' => $this->getThisWeekCount(),
            'completed_last_week' => $this->getCompletedLastWeekCount(),
        ];
    }

    private function getUpcomingCount(): int
    {
        return Meeting::upcoming()->count();
    }

    private function getTodayCount(): int
    {
        return Meeting::today()->scheduled()->count();
    }

    private function getThisWeekCount(): int
    {
        return Meeting::thisWeek()->scheduled()->count();
    }

    private function getCompletedLastWeekCount(): int
    {
        return Meeting::status('completed')
            ->whereBetween('scheduled_at', [now()->subWeek(), now()])
            ->count();
    }
}