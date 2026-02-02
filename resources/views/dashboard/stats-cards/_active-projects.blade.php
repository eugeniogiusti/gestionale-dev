{{-- Active Projects --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 transition-transform duration-200 hover:scale-105">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                {{ __('dashboard.active_projects') }}
            </p>
            <p class="mt-2 text-3xl font-bold text-blue-600">
                {{ $stats['active_projects'] }}
            </p>
            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                {{ __('dashboard.in_progress') }}
            </p>
        </div>
        <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900/30">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
            </svg>
        </div>
    </div>
</div>
