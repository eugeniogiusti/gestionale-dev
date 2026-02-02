{{-- Open Bugs Card --}}
<div class="bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20 rounded-lg p-6 border border-red-200 dark:border-red-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl group-hover:scale-110 transition-transform">🐛</span>
        <div class="text-right">
            <p class="text-xs font-medium text-red-700 dark:text-red-300 uppercase tracking-wide">
                {{ __('tasks.stats.bugs_open') }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $stats['bugs_open'] }}
            </p>
        </div>
    </div>
    <div class="flex items-center gap-1 text-sm">
        @if($stats['bugs_open'] > 0)
            <span class="text-red-600 dark:text-red-400 font-medium">🔥</span>
        @endif
        <span class="text-gray-600 dark:text-gray-400">{{ __('tasks.stats.to_fix') }}</span>
    </div>
</div>