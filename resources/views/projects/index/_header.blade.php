<div class="flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
            {{ __('projects.title') }}
        </h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('projects.projects_list') }}
        </p>
    </div>

    <a href="{{ route('projects.create') }}" 
       class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        {{ __('projects.add_project') }}
    </a>
</div>