{{-- Paid Status Filter --}}
<div>
    <select name="paid"
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        <option value="">{{ __('taxes.all_statuses') }}</option>
        <option value="1" {{ request('paid') === '1' ? 'selected' : '' }}>{{ __('taxes.paid') }}</option>
        <option value="0" {{ request('paid') === '0' ? 'selected' : '' }}>{{ __('taxes.unpaid') }}</option>
    </select>
</div>
