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

                {{-- TAB TASKS --}}
            <button 
                @click="activeTab = 'tasks'"
                :class="activeTab === 'tasks' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                📋 {{ __('tasks.title') }}
            </button>

            {{-- TAB MEETINGS --}}
            <button 
                @click="activeTab = 'meetings'"
                :class="activeTab === 'meetings' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                📅 {{ __('meetings.title') }}
            </button>

            {{-- TAB PAYMENTS --}}
            <button 
                @click="activeTab = 'payments'"
                :class="activeTab === 'payments' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                💰 {{ __('payments.title') }}
            </button>

            {{-- TAB COSTS --}}
            <button 
                @click="activeTab = 'costs'"
                :class="activeTab === 'costs' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                💸 {{ __('costs.title') }}
            </button>

            {{-- TAB PROFIT --}}
            <button 
                @click="activeTab = 'profit'"
                :class="activeTab === 'profit' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                📊 {{ __('profit.title') }}
            </button>

        </nav>
    </div>

    {{-- Tab Content --}}
    <div class="p-6">
        
        {{-- TAB: Overview --}}
        <div x-show="activeTab === 'overview'" x-cloak class="space-y-6">
            @include('projects.show._tab-overview')
        </div>

        {{-- TAB: Tasks --}}
        <div x-show="activeTab === 'tasks'" x-cloak>
            @include('projects.show._tab-tasks')
        </div>

        {{-- TAB: Meetings --}}
        <div x-show="activeTab === 'meetings'" x-cloak>
            @include('projects.show._tab-meetings')
        </div>

        {{-- TAB: Payments --}}
        <div x-show="activeTab === 'payments'" x-cloak>
            @include('projects.show._tab-payments')
        </div>

        {{-- TAB: Costs --}}
        <div x-show="activeTab === 'costs'" x-cloak>
            @include('projects.show._tab-costs')
        </div>

        {{-- TAB: Profit --}}
        <div x-show="activeTab === 'profit'" x-cloak>
            @include('projects.show._tab-profit')
        </div>

    </div>

</div>