{{-- Status Filter --}}
<div>
    <select 
        name="status" 
        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
    >
        <option value="">{{ __('tasks.all_statuses') }}</option>
        @foreach(\App\Models\Task::STATUSES as $status)
            <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>
                {{ __('tasks.status_' . $status) }}
            </option>
        @endforeach
    </select>
</div>