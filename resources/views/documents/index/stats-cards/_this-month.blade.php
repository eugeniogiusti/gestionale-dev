{{-- This Month Card --}}
<div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-lg p-6 border border-green-200 dark:border-green-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl group-hover:scale-110 transition-transform">📥</span>
        <div class="text-right">
            <p class="text-xs font-medium text-green-700 dark:text-green-300 uppercase tracking-wide">
                {{ __('documents.this_month') }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $stats['this_month'] }}
            </p>
        </div>
    </div>
    <div class="flex items-center gap-1 text-sm">
        <span class="text-gray-600 dark:text-gray-400">{{ __('documents.stats.uploaded_this_month') }}</span>
    </div>
</div>
