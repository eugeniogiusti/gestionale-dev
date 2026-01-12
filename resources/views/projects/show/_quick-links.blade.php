<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-5">
    <div class="flex items-center gap-2 mb-3">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
        </svg>
        <h3 class="font-semibold text-gray-900 dark:text-white">
            {{ __('projects.quick_links') }}
        </h3>
    </div>
    
    <div class="space-y-2">
        @if($project->repo_url)
            <a href="{{ $project->repo_url }}" target="_blank" 
               class="flex items-center gap-2 px-3 py-2 text-sm bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition group">
                <span class="text-lg">🔗</span>
                <span class="text-gray-700 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">
                    Repository
                </span>
            </a>
        @endif
        
        @if($project->staging_url)
            <a href="{{ $project->staging_url }}" target="_blank" 
               class="flex items-center gap-2 px-3 py-2 text-sm bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition group">
                <span class="text-lg">🌐</span>
                <span class="text-gray-700 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">
                    Staging
                </span>
            </a>
        @endif
        
        @if($project->production_url)
            <a href="{{ $project->production_url }}" target="_blank" 
               class="flex items-center gap-2 px-3 py-2 text-sm bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition group">
                <span class="text-lg">✅</span>
                <span class="text-gray-700 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">
                    Production
                </span>
            </a>
        @endif
        
        @if($project->figma_url)
            <a href="{{ $project->figma_url }}" target="_blank" 
               class="flex items-center gap-2 px-3 py-2 text-sm bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition group">
                <span class="text-lg">📐</span>
                <span class="text-gray-700 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">
                    Figma
                </span>
            </a>
        @endif
        
        @if($project->docs_url)
            <a href="{{ $project->docs_url }}" target="_blank" 
               class="flex items-center gap-2 px-3 py-2 text-sm bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition group">
                <span class="text-lg">📚</span>
                <span class="text-gray-700 dark:text-gray-300 group-hover:text-emerald-600 dark:group-hover:text-emerald-400">
                    Docs
                </span>
            </a>
        @endif
        
        @if(!$project->repo_url && !$project->staging_url && !$project->production_url && !$project->figma_url && !$project->docs_url)
            <p class="text-sm text-gray-500 dark:text-gray-400 italic py-2">
                {{ __('projects.no_links') }}
            </p>
        @endif
    </div>
</div>