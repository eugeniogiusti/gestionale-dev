<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('projects.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            
            {{-- Search --}}
            <div>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="{{ __('projects.search_placeholder') }}"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                >
            </div>

            {{-- Filter by Status --}}
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

            {{-- Filter by Priority --}}
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

            {{-- Submit button --}}
            <div class="flex gap-2">
                <x-button type="submit" variant="primary" class="flex-1">
                    {{ __('projects.filter') }}
                </x-button>
                <a href="{{ route('projects.index') }}">
                    <x-button type="button" variant="secondary">
                        {{ __('projects.reset') }}
                    </x-button>
                </a>
            </div>
        </div>
    </form>
</div>