<div class="flex justify-between items-center">
    <div class="flex items-center gap-4">
        <div class="p-3 bg-emerald-100 dark:bg-emerald-900/20 rounded-lg">
            <svg class="w-8 h-8 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
        </div>
        
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                {{ __('projects.title') }}
            </h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('projects.projects_list') }}
            </p>
        </div>
    </div>

    <a href="{{ route('projects.create') }}" 
       class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        {{ __('projects.add_project') }}
    </a>
</div>