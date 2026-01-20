<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        
        {{-- Project Filter --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                {{ __('documents.filter_by_project') }}
            </label>
            <select name="project_id" 
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <option value="">{{ __('documents.all_projects') }}</option>
                @foreach(\App\Models\Project::orderBy('name')->get() as $project)
                    <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Label Filter --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                {{ __('documents.filter_by_labels') }}
            </label>
            <select name="label_ids[]" 
                    multiple
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                @foreach(\App\Models\Label::ordered()->get() as $label)
                    <option value="{{ $label->id }}" {{ in_array($label->id, request('label_ids', [])) ? 'selected' : '' }}>
                        {{ $label->name }}
                    </option>
                @endforeach
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
                       placeholder="{{ __('documents.placeholder.search') }}"
                       class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <button type="submit" 
                        class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">
                    {{ __('ui.filter') }}
                </button>
            </div>
        </div>

    </form>
</div>