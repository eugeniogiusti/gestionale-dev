@props(['date' => null])

@if(!$date)
    <x-not-set-badge />
@else
    <div class="flex flex-col">
        <span class="text-sm font-medium text-gray-900 dark:text-white">
            {{ $date->format('d/m/Y') }}
        </span>

        @if($date->isToday())
            <span class="text-xs text-blue-500 dark:text-blue-400">
                {{ __('tasks.due_today') }}
            </span>
        @elseif($date->isPast())
            <span class="text-xs text-red-500 dark:text-red-400">
                {{ __('tasks.overdue') }}
            </span>
        @elseif($date->diffInDays(now(), false) <= 3)
            <span class="text-xs text-orange-500 dark:text-orange-400">
                {{ __('tasks.due_soon') }}
            </span>
        @endif
    </div>
@endif