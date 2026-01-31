@props(['date'])

@if($date)
    @php
        $days = now()->diffInDays($date, false);

        if ($days < 0) {
            $color = 'red';
            $label = __('projects.overdue');
            $icon = '⛔';
        } elseif ($days <= 7) {
            $color = 'yellow';
            $label = __('projects.due_soon');
            $icon = '⏰';
        } else {
            $color = 'gray';
            $label = __('projects.due_date');
            $icon = '📅';
        }
    @endphp

    <div class="flex items-center gap-2 text-sm">
        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full
            bg-{{ $color }}-100 text-{{ $color }}-800
            dark:bg-{{ $color }}-900 dark:text-{{ $color }}-300">
            {{ $icon }} {{ $label }}
        </span>

        <span class="text-gray-700 dark:text-gray-300">
            {{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}
        </span>
    </div>
@endif