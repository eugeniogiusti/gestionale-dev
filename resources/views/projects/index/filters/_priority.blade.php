{{-- Priority Filter --}}
<div>
    <select 
        name="priority"
        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
    >
        <option value="">{{ __('projects.all_priorities') }}</option>
        <option value="low" {{ request('priority') === 'low' ? 'selected' : '' }}>
            {{ __('projects.priority_low') }}
        </option>
        <option value="medium" {{ request('priority') === 'medium' ? 'selected' : '' }}>
            {{ __('projects.priority_medium') }}
        </option>
        <option value="high" {{ request('priority') === 'high' ? 'selected' : '' }}>
            {{ __('projects.priority_high') }}
        </option>
    </select>
</div>