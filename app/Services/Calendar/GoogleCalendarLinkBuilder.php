<?php

namespace App\Services\Calendar;

use App\Contracts\CalendarEventable;

/**
 * Builds a "Add to Google Calendar" URL from a CalendarEvent DTO.
 *
 * Supports both all-day and timed events. Can be instantiated directly
 * from a CalendarEvent or from any Eloquent model implementing CalendarEventable.
 *
 * Usage:
 *   $url = GoogleCalendarLinkBuilder::fromModel($meeting)->build();
 *   $url = GoogleCalendarLinkBuilder::fromEvent($event)->build();
 *
 * @see \App\Services\Calendar\CalendarEvent
 */
class GoogleCalendarLinkBuilder
{
    private const BASE_URL = 'https://calendar.google.com/calendar/render';

    private CalendarEvent $event;

    public static function fromEvent(CalendarEvent $event): self
    {
        $instance = new self();
        $instance->event = $event;

        return $instance;
    }

    public static function fromModel(CalendarEventable $model): self
    {
        return self::fromEvent($model->toCalendarEvent());
    }

    public function build(): string
    {
        $params = [
            'action' => 'TEMPLATE',
            'text' => $this->event->title,
            'details' => $this->event->description,
            'dates' => $this->buildDates(),
        ];

        if ($this->event->location) {
            $params['location'] = $this->event->location;
        }

        return self::BASE_URL . '?' . http_build_query($params);
    }

    private function buildDates(): string
    {
        if ($this->event->isAllDay) {
            return $this->buildAllDayDates();
        }

        return $this->buildTimedDates();
    }

    private function buildAllDayDates(): string
    {
        // All-day format: YYYYMMDD/YYYYMMDD
        $startDate = $this->event->startDate->format('Ymd');

        if ($this->event->endDate) {
            // End date is exclusive for all-day events
            $endDate = $this->event->endDate->copy()->addDay()->format('Ymd');
        } else {
            // Single day event: end date is next day
            $endDate = $this->event->startDate->copy()->addDay()->format('Ymd');
        }

        return "{$startDate}/{$endDate}";
    }

    private function buildTimedDates(): string
    {
        // Timed format: YYYYMMDDTHHmmss/YYYYMMDDTHHmmss (local time)
        $startDate = $this->event->startDate->format('Ymd\THis');

        if ($this->event->endDate) {
            $endDate = $this->event->endDate->format('Ymd\THis');
        } else {
            // Default 1 hour duration
            $endDate = $this->event->startDate->copy()->addHour()->format('Ymd\THis');
        }

        return "{$startDate}/{$endDate}";
    }
}
