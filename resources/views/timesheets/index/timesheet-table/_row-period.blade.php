{{-- Row: Period --}}
@php
    $monthNames = [
        1  => __('timesheets.months.january'),
        2  => __('timesheets.months.february'),
        3  => __('timesheets.months.march'),
        4  => __('timesheets.months.april'),
        5  => __('timesheets.months.may'),
        6  => __('timesheets.months.june'),
        7  => __('timesheets.months.july'),
        8  => __('timesheets.months.august'),
        9  => __('timesheets.months.september'),
        10 => __('timesheets.months.october'),
        11 => __('timesheets.months.november'),
        12 => __('timesheets.months.december'),
    ];
@endphp
<td class="px-6 py-4 whitespace-nowrap">
    <span class="text-sm text-gray-700 dark:text-gray-300">
        {{ $monthNames[$timesheet->month] }} {{ $timesheet->year }}
    </span>
</td>
