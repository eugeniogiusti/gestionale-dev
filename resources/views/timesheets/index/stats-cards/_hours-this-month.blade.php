{{-- Hours this month --}}
<div class="bg-gradient-to-br from-emerald-50 to-emerald-100 dark:from-emerald-900/20 dark:to-emerald-800/20 rounded-lg p-6 border border-emerald-200 dark:border-emerald-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl group-hover:scale-110 transition-transform">⏱️</span>
        <div class="text-right">
            <p class="text-xs font-medium text-emerald-700 dark:text-emerald-300 uppercase tracking-wide">
                {{ __('timesheets.stats.hours_this_month') }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ number_format($stats['hours_this_month'], 1) }}h
            </p>
        </div>
    </div>
    <div class="flex items-center gap-1 text-sm">
        <span class="text-gray-600 dark:text-gray-400">{{ now()->format('F Y') }}</span>
    </div>
</div>
