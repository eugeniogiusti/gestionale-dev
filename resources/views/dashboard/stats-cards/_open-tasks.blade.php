{{-- Open Tasks --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                {{ __('dashboard.open_tasks') }}
            </p>
            <p class="mt-2 text-3xl font-bold text-purple-600">
                {{ $stats['open_tasks']['total'] }}
            </p>
            <div class="mt-2 flex items-center gap-3 text-xs">
                <span class="text-gray-500 dark:text-gray-400">{{ $stats['open_tasks']['todo'] }} todo</span>
                <span class="text-blue-500">{{ $stats['open_tasks']['in_progress'] }} in corso</span>
                @if($stats['open_tasks']['blocked'] > 0)
                    <span class="text-red-500">{{ $stats['open_tasks']['blocked'] }} bloccati</span>
                @endif
            </div>
        </div>
        <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900/30">
            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
            </svg>
        </div>
    </div>
</div>
