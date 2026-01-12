<div class="border-b border-gray-200 dark:border-gray-700">
    <nav class="flex -mb-px">
        <button 
            type="button"
            @click="activeTab = 'info'"
            :class="activeTab === 'info' 
                ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
            class="relative w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm transition">
            {{ __('projects.tab_info') }}
            <span x-show="hasErrors('info')" class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>
        
        <button 
            type="button"
            @click="activeTab = 'links'"
            :class="activeTab === 'links' 
                ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
            class="relative w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm transition">
            {{ __('projects.tab_links') }}
            <span x-show="hasErrors('links')" class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>
        
        <button 
            type="button"
            @click="activeTab = 'notes'"
            :class="activeTab === 'notes' 
                ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
            class="relative w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm transition">
            {{ __('projects.tab_notes') }}
            <span x-show="hasErrors('notes')" class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>
    </nav>
</div>