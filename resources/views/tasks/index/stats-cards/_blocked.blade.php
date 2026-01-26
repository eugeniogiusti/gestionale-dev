{{-- Blocked Tasks Card --}}
<div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-lg p-6 border border-orange-200 dark:border-orange-800 hover:shadow-lg transition-all duration-200 group">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl group-hover:scale-110 transition-transform">🚧</span>
        <div class="text-right">
            <p class="text-xs font-medium text-orange-700 dark:text-orange-300 uppercase tracking-wide">
                {{ __('tasks.stats.blocked') }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $stats['blocked'] }}
            </p>
        </div>
    </div>
    <div class="flex items-center gap-1 text-sm">
        @if($stats['blocked'] > 0)
            <span class="text-orange-600 dark:text-orange-400 font-medium">⚠️</span>
        @endif
        <span class="text-gray-600 dark:text-gray-400">{{ __('tasks.stats.need_attention') }}</span>
    </div>
</div>