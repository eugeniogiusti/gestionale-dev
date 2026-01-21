<?php

namespace App\Services\Calendar;

class CalendarColorService
{
    /**
     * Project colors by status
     */
    public function getProjectColor(string $status): string
    {
        return match($status) {
            'draft' => '#6b7280',
            'in_progress' => '#3b82f6',
            'completed' => '#10b981',
            'archived' => '#9ca3af',
            default => '#6b7280',
        };
    }

    /**
     * Meeting colors by status
     */
    public function getMeetingColor(string $status): string
    {
        return match($status) {
            'scheduled' => '#8b5cf6',
            'completed' => '#10b981',
            'cancelled' => '#ef4444',
            default => '#6b7280',
        };
    }

    /**
     * Task colors by status and priority
     */
    public function getTaskColor(string $status, ?string $priority): string
    {
        if ($status === 'done') {
            return '#10b981';
        }

        if ($status === 'blocked') {
            return '#ef4444';
        }

        return match($priority) {
            'high' => '#dc2626',
            'medium' => '#f59e0b',
            'low' => '#6b7280',
            default => '#6b7280',
        };
    }
}