<?php

namespace App\Services\Calendar;

use Carbon\Carbon;

class CalendarEvent
{
    public function __construct(
        public string $title,
        public string $description,
        public Carbon $startDate,
        public ?Carbon $endDate = null,
        public ?string $location = null,
        public bool $isAllDay = true,
    ) {}
}
