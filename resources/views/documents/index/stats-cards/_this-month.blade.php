{{-- This Month Card --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('documents.this_month') }}</p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $stats['this_month'] }}
            </p>
        </div>
        <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
            </svg>
        </div>
    </div>
</div>