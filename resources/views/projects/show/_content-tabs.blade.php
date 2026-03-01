<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700" 
     x-data="{ activeTab: '{{ request()->query('tab', 'overview') }}' }"
     x-cloak>
    
    {{-- Tabs Navigation --}}
    <div class="border-b border-gray-200 dark:border-gray-700">
        <nav class="flex -mb-px">
            <button 
                @click="activeTab = 'overview'"
                :class="activeTab === 'overview' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                <svg aria-hidden="true" class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 3.5h10.5L20.5 9v11.5H4z"/>
                    <path d="M14.5 3.5V9H20.5"/>
                    <path d="M7 13h10M7 16h7"/>
                </svg>
                {{ __('projects.overview') }}
            </button>

                {{-- TAB TASKS --}}
            <button 
                @click="activeTab = 'tasks'"
                :class="activeTab === 'tasks' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                <svg aria-hidden="true" class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 6h11M9 12h11M9 18h11"/>
                    <path d="M4 6l1.5 1.5L8 5"/>
                    <path d="M4 12l1.5 1.5L8 11"/>
                    <path d="M4 18l1.5 1.5L8 17"/>
                </svg>
                {{ __('tasks.title') }}
            </button>

            {{-- TAB MEETINGS --}}
            <button 
                @click="activeTab = 'meetings'"
                :class="activeTab === 'meetings' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                <svg aria-hidden="true" class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M7 4v3M17 4v3M4 9h16"/>
                    <rect x="4" y="6" width="16" height="14" rx="2"/>
                    <path d="M8 13h3M13 13h3M8 16h3"/>
                </svg>
                {{ __('meetings.title') }}
            </button>

            {{-- TAB PAYMENTS --}}
            <button 
                @click="activeTab = 'payments'"
                :class="activeTab === 'payments' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                <svg aria-hidden="true" class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 7h16v10H4z"/>
                    <path d="M16 7V5H8v2"/>
                    <circle cx="12" cy="12" r="2.5"/>
                    <path d="M6 10h2M16 14h2"/>
                </svg>
                {{ __('payments.title') }}
            </button>

            {{-- TAB COSTS --}}
            <button 
                @click="activeTab = 'costs'"
                :class="activeTab === 'costs' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                <svg aria-hidden="true" class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 7h16v10H4z"/>
                    <path d="M16 7V5H8v2"/>
                    <path d="M9 12h6"/>
                    <path d="M14 10l2 2-2 2"/>
                </svg>
                {{ __('costs.title') }}
            </button>

            {{-- TAB PROFIT --}}
            <button 
                @click="activeTab = 'profit'"
                :class="activeTab === 'profit' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                <svg aria-hidden="true" class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19h16"/>
                    <path d="M7 16V9M12 16V5M17 16v-7"/>
                </svg>
                {{ __('profit.title') }}
            </button>

            {{-- TAB DOCUMENTS --}}
            <button 
                @click="activeTab = 'documents'"
                :class="activeTab === 'documents' 
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                <svg aria-hidden="true" class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M7 3.5h7.5L19.5 8v12.5H7z"/>
                    <path d="M14.5 3.5V8H19.5"/>
                    <path d="M9 13h8M9 16h6"/>
                </svg>
                {{ __('documents.title') }}
            </button>

            {{-- TAB TIMESHEETS --}}
            <button
                @click="activeTab = 'timesheets'"
                :class="activeTab === 'timesheets'
                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400'
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                class="px-6 py-4 border-b-2 font-medium text-sm transition">
                <svg aria-hidden="true" class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="16" rx="2"/>
                    <path d="M3 9h18"/>
                    <path d="M8 4V2M16 4V2"/>
                    <path d="M7 13h2v2H7z M11 13h2v2h-2z M15 13h2v2h-2z"/>
                </svg>
                {{ __('timesheets.title') }}
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

        {{-- TAB: Documents --}}
        <div x-show="activeTab === 'documents'" x-cloak>
            @include('projects.show._tab-documents')
        </div>

        {{-- TAB: Timesheets --}}
        <div x-show="activeTab === 'timesheets'" x-cloak>
            @include('projects.show._tab-timesheets')
        </div>

    </div>

</div>
