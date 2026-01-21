<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    
    {{-- Total Quotes --}}
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg p-6 border border-blue-200 dark:border-blue-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">📋</span>
            <div class="text-right">
                <p class="text-xs font-medium text-blue-700 dark:text-blue-300 uppercase tracking-wide">
                    {{ __('quotes.total_quotes') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['total'] }}
                </p>
            </div>
        </div>
    </div>

    {{-- Sent Quotes --}}
    <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-lg p-6 border border-purple-200 dark:border-purple-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">📧</span>
            <div class="text-right">
                <p class="text-xs font-medium text-purple-700 dark:text-purple-300 uppercase tracking-wide">
                    {{ __('quotes.sent_quotes') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['sent'] }}
                </p>
            </div>
        </div>
    </div>

    {{-- Accepted Quotes --}}
    <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-lg p-6 border border-green-200 dark:border-green-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">✅</span>
            <div class="text-right">
                <p class="text-xs font-medium text-green-700 dark:text-green-300 uppercase tracking-wide">
                    {{ __('quotes.accepted_quotes') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['accepted'] }}
                </p>
            </div>
        </div>
    </div>

    {{-- Rejected Quotes --}}
    <div class="bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20 rounded-lg p-6 border border-red-200 dark:border-red-800 hover:shadow-lg transition-all duration-200 group">
        <div class="flex items-center justify-between mb-3">
            <span class="text-3xl group-hover:scale-110 transition-transform">❌</span>
            <div class="text-right">
                <p class="text-xs font-medium text-red-700 dark:text-red-300 uppercase tracking-wide">
                    {{ __('quotes.rejected_quotes') }}
                </p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">
                    {{ $stats['rejected'] }}
                </p>
            </div>
        </div>
    </div>

</div>