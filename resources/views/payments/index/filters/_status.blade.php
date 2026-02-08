<div>
    <select
        name="status"
        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
    >
        <option value="">{{ __('payments.all_statuses') }}</option>
        <option value="paid" {{ request('status') === 'paid' ? 'selected' : '' }}>
            {{ __('payments.status_paid') }}
        </option>
        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>
            {{ __('payments.status_pending') }}
        </option>
        <option value="overdue" {{ request('status') === 'overdue' ? 'selected' : '' }}>
            {{ __('payments.status_overdue') }}
        </option>
    </select>
</div>
