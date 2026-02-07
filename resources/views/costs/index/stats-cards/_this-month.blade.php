{{-- This Month Card --}}
<div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-lg p-6 border border-orange-200 dark:border-orange-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl group-hover:scale-110 transition-transform">📅</span>
        <div class="text-right">
            <p class="text-xs font-medium text-orange-700 dark:text-orange-300 uppercase tracking-wide">
                {{ __('costs.stats.this_month') }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $currencySymbol }} {{ number_format($stats['total_this_month'], 2, ',', '.') }}
            </p>
        </div>
    </div>
    <div class="flex items-center gap-1 text-sm">
        <span class="text-gray-600 dark:text-gray-400">{{ now()->format('F Y') }}</span>
    </div>
</div>