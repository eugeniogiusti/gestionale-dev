{{-- Pending Payments --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 transition-transform duration-200 hover:scale-105">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                {{ __('dashboard.pending_payments') }}
            </p>
            <p class="mt-2 text-3xl font-bold text-amber-600">
                {{ number_format($stats['pending_payments']['total'], 2) }} {{ $currencySymbol }}
            </p>
            <div class="mt-2 flex items-center gap-2 text-xs">
                <span class="text-gray-500 dark:text-gray-400">{{ $stats['pending_payments']['count'] }} {{ __('dashboard.to_collect') }}</span>
                @if($stats['pending_payments']['overdue_count'] > 0)
                    <span class="text-red-500 font-medium">{{ $stats['pending_payments']['overdue_count'] }} {{ __('dashboard.overdue') }}</span>
                @endif
            </div>
        </div>
        <div class="p-3 rounded-full bg-amber-100 dark:bg-amber-900/30">
            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>
</div>
