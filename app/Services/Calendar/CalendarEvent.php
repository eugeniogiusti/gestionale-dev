<?php

namespace App\Services\Calendar;

use Carbon\Carbon;

/**
 * Data Transfer Object representing a calendar event.
 *
 * Used as a standardized format for building external calendar links
 * (e.g. Google Calendar). Models can implement the CalendarEventable
 * contract to be converted into this DTO automatically.
 *
 * @see \App\Contracts\CalendarEventable
 * @see \App\Services\Calendar\GoogleCalendarLinkBuilder
 */
class CalendarEvent
{
    /**
     * @param string      $title       Event title displayed on the calendar.
     * @param string      $description Event body text / details.
     * @param Carbon      $startDate   When the event starts.
     * @param Carbon|null $endDate     When the event ends (null = single-day or 1-hour default).
     * @param string|null $location    Optional physical or virtual location.
     * @param bool        $isAllDay    Whether this is an all-day event (affects date formatting).
     */
    public function __construct(
        public string $title,
        public string $description,
        public Carbon $startDate,
        public ?Carbon $endDate = null,
        public ?string $location = null,
        public bool $isAllDay = true,
    ) {}
}
