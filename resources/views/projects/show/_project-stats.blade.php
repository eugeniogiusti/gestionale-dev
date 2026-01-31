<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-5">
    <div class="flex items-center gap-2 mb-3">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        <h3 class="font-semibold text-gray-900 dark:text-white">
            {{ __('projects.quick_info') }}
        </h3>
    </div>
    
    <dl class="space-y-3">
        <div>
            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                {{ __('projects.created_at') }}
            </dt>
            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                {{ $project->created_at->format('d/m/Y') }}
            </dd>
        </div>
        
        <div>
            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                {{ __('projects.updated_at') }}
            </dt>
            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                {{ $project->updated_at->diffForHumans() }}
            </dd>
        </div>

        <div>
            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                {{ __('projects.due_date') }}
            </dt>
            <dd class="mt-1">
                <x-projects.due-date :date="$project->due_date" />
            </dd>
        </div>
    </dl>
</div>