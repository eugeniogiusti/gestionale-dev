@props(['date' => null])

@if(!$date)
    <span class="text-gray-400 dark:text-gray-500">—</span>
@else
    @php
        // Usa Carbon (di solito $date è già Carbon castato)
        $d = $date instanceof \Carbon\Carbon ? $date : \Carbon\Carbon::parse($date);

        $isOverdue = $d->isPast();
        $daysLeft = now()->startOfDay()->diffInDays($d->startOfDay(), false); // negativo se passato
        $isDueSoon = !$isOverdue && $daysLeft <= 3;
    @endphp

    <div class="flex flex-col">
        <span class="text-sm font-medium text-gray-900 dark:text-white">
            {{ $d->format('d/m/Y') }}
        </span>

        @if($isOverdue)
            <span class="text-xs text-red-500 dark:text-red-400">
                {{ __('tasks.overdue') }}
            </span>
        @elseif($isDueSoon)
            <span class="text-xs text-orange-500 dark:text-orange-400">
                {{ __('tasks.due_soon') }}
            </span>
        @endif
    </div>
@endif