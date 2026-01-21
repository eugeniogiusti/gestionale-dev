<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
        {{ __('calendar.filters') }}
    </h3>

    <div class="space-y-4">
        
        {{-- Event Types --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                {{ __('calendar.filter_by_type') }}
            </label>
            <div class="space-y-2">
                <label class="flex items-center">
                    <input type="checkbox" 
                           x-model="filters.type" 
                           value="projects"
                           @change="refetchEvents()"
                           class="rounded border-gray-300 dark:border-gray-600 text-emerald-600 focus:ring-emerald-500">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ __('calendar.projects') }}</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" 
                           x-model="filters.type" 
                           value="meetings"
                           @change="refetchEvents()"
                           class="rounded border-gray-300 dark:border-gray-600 text-emerald-600 focus:ring-emerald-500">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ __('calendar.meetings') }}</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" 
                           x-model="filters.type" 
                           value="tasks"
                           @change="refetchEvents()"
                           class="rounded border-gray-300 dark:border-gray-600 text-emerald-600 focus:ring-emerald-500">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ __('calendar.tasks') }}</span>
                </label>
            </div>
        </div>

        {{-- Client Filter --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                {{ __('calendar.filter_by_client') }}
            </label>
            <select x-model="filters.client_id" 
                    @change="refetchEvents()"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300">
                <option value="">{{ __('calendar.all_clients') }}</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Reset Filters --}}
        <button @click="resetFilters()"
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition">
            {{ __('calendar.reset_filters') }}
        </button>

    </div>
</div>