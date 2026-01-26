{{-- Status Filter --}}
<div>
    <select 
        name="status"
        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
    >
        <option value="">{{ __('projects.all_statuses') }}</option>
        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>
            {{ __('projects.status_draft') }}
        </option>
        <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>
            {{ __('projects.status_in_progress') }}
        </option>
        <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>
            {{ __('projects.status_completed') }}
        </option>
        <option value="archived" {{ request('status') === 'archived' ? 'selected' : '' }}>
            {{ __('projects.status_archived') }}
        </option>
    </select>
</div>