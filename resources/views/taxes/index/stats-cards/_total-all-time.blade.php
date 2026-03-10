{{-- Total All Time Card --}}
<div class="bg-gradient-to-br from-amber-50 to-amber-100 dark:from-amber-900/20 dark:to-amber-800/20 rounded-lg p-6 border border-amber-200 dark:border-amber-800 hover:shadow-lg hover:scale-105 transition-all duration-200 group">
    <div class="flex items-center justify-between mb-3">
        <span class="text-3xl group-hover:scale-110 transition-transform">🧾</span>
        <div class="text-right">
            <p class="text-xs font-medium text-amber-700 dark:text-amber-300 uppercase tracking-wide">
                {{ __('taxes.stats.total_all_time') }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                {{ $currencySymbol }} {{ number_format($stats['total_all_time'], 2, ',', '.') }}
            </p>
        </div>
    </div>
    <div class="flex items-center gap-1 text-sm">
        <span class="text-gray-600 dark:text-gray-400">{{ __('taxes.stats.paid_total') }}</span>
    </div>
</div>
