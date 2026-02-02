<div class="md:col-span-2 flex items-center gap-2">
    <div class="flex-1">
        <input
            type="date"
            name="date_from"
            value="{{ request('date_from') }}"
            placeholder="{{ __('costs.filters.date_from') }}"
            title="{{ __('costs.filters.date_from') }}"
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>
    <span class="text-gray-400">-</span>
    <div class="flex-1">
        <input
            type="date"
            name="date_to"
            value="{{ request('date_to') }}"
            placeholder="{{ __('costs.filters.date_to') }}"
            title="{{ __('costs.filters.date_to') }}"
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
        >
    </div>
</div>
