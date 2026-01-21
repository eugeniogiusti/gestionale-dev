<div class="p-4 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-lg">
    <div class="flex justify-between items-center">
        <span class="text-lg font-semibold text-gray-900 dark:text-white">
            {{ __('quotes.total') }}
        </span>
        <span class="text-2xl font-bold text-emerald-600 dark:text-emerald-400" x-text="'€' + total.toFixed(2)">
            €0.00
        </span>
    </div>
</div>