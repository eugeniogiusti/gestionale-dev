{{-- Total Documents Card --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('documents.total_documents') }}</p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $stats['total'] }}
            </p>
        </div>
        <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
            <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </div>
    </div>
</div>