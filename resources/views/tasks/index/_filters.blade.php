<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('tasks.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            
            {{-- Search --}}
            <div>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="{{ __('tasks.placeholder.search') }}"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                >
            </div>

            {{-- Status Filter --}}
            <div>
                <select 
                    name="status" 
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                >
                    <option value="">{{ __('tasks.all_statuses') }}</option>
                    @foreach(\App\Models\Task::STATUSES as $status)
                        <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>
                            {{ __('tasks.status_' . $status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Type Filter --}}
            <div>
                <select 
                    name="type" 
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                >
                    <option value="">{{ __('tasks.all_types') }}</option>
                    @foreach(\App\Models\Task::TYPES as $type)
                        <option value="{{ $type }}" {{ request('type') === $type ? 'selected' : '' }}>
                            {{ __('tasks.type_' . $type) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Actions --}}
            <div class="flex gap-2">
                <button type="submit" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition flex-1">
                    {{ __('ui.filter') }}
                </button>
                <a href="{{ route('tasks.index') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition inline-flex items-center">
                    {{ __('ui.reset') }}
                </a>
            </div>
        </div>
    </form>
</div>