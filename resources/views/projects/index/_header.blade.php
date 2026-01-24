<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
            {{ __('projects.title') }}
        </h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('projects.subtitle') }}
        </p>
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