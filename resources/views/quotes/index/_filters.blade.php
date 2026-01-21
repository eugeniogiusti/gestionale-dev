<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        
        {{-- Project Filter --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                {{ __('quotes.filter_by_project') }}
            </label>
            <select name="project_id" 
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <option value="">{{ __('quotes.all_projects') }}</option>
                @foreach(\App\Models\Project::orderBy('name')->get() as $project)
                    <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Status Filter --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                {{ __('quotes.filter_by_status') }}
            </label>
            <select name="status" 
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <option value="">{{ __('quotes.all_statuses') }}</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>{{ __('quotes.status_draft') }}</option>
                <option value="sent" {{ request('status') == 'sent' ? 'selected' : '' }}>{{ __('quotes.status_sent') }}</option>
                <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>{{ __('quotes.status_accepted') }}</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>{{ __('quotes.status_rejected') }}</option>
                <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>{{ __('quotes.status_expired') }}</option>
            </select>
        </div>

        {{-- Search --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                {{ __('ui.search') }}
            </label>
            <div class="flex gap-2">
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}"
                       placeholder="{{ __('quotes.placeholder.search') }}"
                       class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <button type="submit" 
                        class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">
                    {{ __('ui.filter') }}
                </button>
            </div>
        </div>

    </form>
</div>