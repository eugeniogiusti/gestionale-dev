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