{{-- Recurring Filter --}}
<div>
    <select 
        name="recurring" 
        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
    >
        <option value="">{{ __('costs.all_recurring') }}</option>
        <option value="1" {{ request('recurring') === '1' ? 'selected' : '' }}>{{ __('costs.recurring_yes') }}</option>
        <option value="0" {{ request('recurring') === '0' ? 'selected' : '' }}>{{ __('costs.recurring_no') }}</option>
    </select>
</div>