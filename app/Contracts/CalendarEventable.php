<?php

namespace App\Contracts;

use App\Services\Calendar\CalendarEvent;

interface CalendarEventable
{
    public function toCalendarEvent(): CalendarEvent;

    public function hasCalendarDate(): bool;
}
