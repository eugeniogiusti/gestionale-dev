{{-- TAB 1: INFO BASE --}}
<div x-show="activeTab === 'info'" class="space-y-6">
    
    {{-- Name --}}
    <x-form-input
        name="name"
        :label="__('projects.name')"
        :placeholder="__('projects.placeholder.name')"
        :value="$project->name ?? ''"
        required
    />

    {{-- Project Type --}}
    <x-form-select
        name="type"
        :label="__('projects.type')"
        :value="$project->type ?? 'client_work'"
        :options="[
            'client_work' => __('projects.type_client_work'),
            'product' => __('projects.type_product'),
            'content' => __('projects.type_content'),
            'asset' => __('projects.type_asset'),
        ]"
        required
    />

    {{-- Client Search --}}
    <div x-data="clientSearch(
    {{ isset($project->client) ? $project->client->id : 'null' }}, 
    {{ isset($project->client) ? '\'' . addslashes($project->client->name) . '\'' : 'null' }}
    )">
        {{-- Checkbox Progetto Interno --}}
        <div class="flex items-center mb-4">
            <input 
                type="checkbox" 
                id="is_internal"
                x-model="isInternal"
                @change="if (isInternal) { clearClient(); }"
                class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 rounded focus:ring-emerald-500 dark:focus:ring-emerald-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            >
            <label for="is_internal" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ __('projects.is_internal') }}
            </label>
        </div>

        {{-- Client Search (shown only if NOT internal) --}}
        <div x-show="!isInternal" class="relative">
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                {{ __('projects.client') }}
            </label>
            
            {{-- Search Input --}}
            <input 
                type="text"
                x-model="searchQuery"
                @input.debounce.300ms="searchClients()"
                @focus="if (searchResults.length > 0) { showDropdown = true; }"
                @click.away="showDropdown = false"
                placeholder="{{ __('projects.placeholder.client') }}"
                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                       focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
                       transition duration-150"
            >

            {{-- Loading Indicator --}}
            <div x-show="isSearching" class="absolute right-3 top-11">
                <svg class="animate-spin h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>

            {{-- Dropdown Results --}}
            <div 
                x-show="showDropdown && searchResults.length > 0"
                x-transition
                class="absolute z-10 w-full mt-1 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg max-h-60 overflow-auto"
            >
                <template x-for="client in searchResults" :key="client.id">
                    <div 
                        @click="selectClient(client)"
                        class="px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer transition"
                    >
                        <div class="text-sm font-medium text-gray-900 dark:text-white" x-text="client.name"></div>
                        <div class="text-xs text-gray-500 dark:text-gray-400" x-text="client.email"></div>
                    </div>
                </template>
            </div>

            {{-- Hidden Input for Form Submit --}}
            <input 
                type="hidden" 
                name="client_id" 
                :value="selectedClient ? selectedClient.id : ''"
            >

            {{-- Selected Client Display --}}
            <div x-show="selectedClient && !showDropdown" class="mt-2 flex items-center justify-between p-3 bg-emerald-50 dark:bg-emerald-900/20 rounded-lg">
                <div>
                    <div class="text-sm font-medium text-gray-900 dark:text-white" x-text="selectedClient?.name"></div>
                    <div class="text-xs text-gray-500 dark:text-gray-400" x-text="selectedClient?.email"></div>
                </div>
                <button 
                    type="button"
                    @click="clearClient()"
                    class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Validation Error --}}
            @error('client_id')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Description --}}
    <x-form-textarea
        name="description"
        :label="__('projects.description')"
        :placeholder="__('projects.placeholder.description')"
        :value="$project->description ?? ''"
        rows="4"
    />

    {{-- Status and Priority --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-form-select
            name="status"
            :label="__('projects.status')"
            :value="$project->status ?? 'draft'"
            :options="[
                'draft' => __('projects.status_draft'),
                'in_progress' => __('projects.status_in_progress'),
                'completed' => __('projects.status_completed'),
                'archived' => __('projects.status_archived'),
            ]"
            required
        />

        {{-- Dates --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-form-input
                name="start_date"
                type="date"
                :label="__('projects.start_date')"
                :value="isset($project->start_date) ? $project->start_date->format('Y-m-d') : ''"
            />

            <x-form-input
                name="due_date"
                type="date"
                :label="__('projects.due_date')"
                :value="isset($project->due_date) ? $project->due_date->format('Y-m-d') : ''"
            />
        </div>

        <x-form-select
            name="priority"
            :label="__('projects.priority')"
            :value="$project->priority ?? ''"
            :options="[
                'low' => __('projects.priority_low'),
                'medium' => __('projects.priority_medium'),
                'high' => __('projects.priority_high'),
            ]"
        />
    </div>
</div>