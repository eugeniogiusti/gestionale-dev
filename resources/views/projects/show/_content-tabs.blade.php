<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700" 
     x-data="{ activeTab: 'overview' }">
    
    {{-- Tabs Navigation --}}
    <div class="border-b border-gray-200 dark:border-gray-700">
        <nav class="flex -mb-px">
            <button 
                @click="activeTab = 'overview'"
                :class="activeTab === 'overview' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                📝 {{ __('projects.overview') }}
            </button>
            
            <button 
                @click="activeTab = 'details'"
                :class="activeTab === 'details' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                ⚙️ {{ __('projects.details') }}
            </button>
            
            <button 
                @click="activeTab = 'links'"
                :class="activeTab === 'links' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                🔗 {{ __('projects.dev_links') }}
            </button>
        </nav>
    </div>

    {{-- Tab Content --}}
    <div class="p-6">
        
        {{-- TAB: Overview --}}
        <div x-show="activeTab === 'overview'" x-cloak class="space-y-6">
            @include('projects.show._tab-overview')
        </div>

        {{-- TAB: Details --}}
        <div x-show="activeTab === 'details'" x-cloak class="space-y-6">
            @include('projects.show._tab-details')
        </div>

        {{-- TAB: Dev Links --}}
        <div x-show="activeTab === 'links'" x-cloak class="space-y-6">
            @include('projects.show._tab-links')
        </div>

    </div>

</div>