<div class="flex items-center justify-between mb-6">
    <div class="flex items-center gap-4">
        <div class="p-3 bg-purple-100 dark:bg-purple-900/20 rounded-lg">
            <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
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
    
    <x-button 
        variant="primary"
        x-data
        @click="$dispatch('open-project-modal')"
    >
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        {{ __('projects.create_project') }}
    </x-button>
</div>