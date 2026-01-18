<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('costs.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
            
            {{-- Search --}}
            <div>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="{{ __('costs.placeholder.search') }}"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                >
            </div>

            {{-- Type Filter --}}
            <div>
                <select 
                    name="type" 
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                >
                    <option value="">{{ __('costs.all_types') }}</option>
                    @foreach(\App\Models\Cost::TYPES as $type)
                        <option value="{{ $type }}" {{ request('type') === $type ? 'selected' : '' }}>
                            {{ __('costs.type_' . $type) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Recurring Filter --}}
            <div>
                <select 
                    name="recurring" 
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                >
                    <option value="">{{ __('costs.all_recurring') }}</option>
                    <option value="1" {{ request('recurring') === '1' ? 'selected' : '' }}>{{ __('costs.recurring_yes') }}</option>
                    <option value="0" {{ request('recurring') === '0' ? 'selected' : '' }}>{{ __('costs.recurring_no') }}</option>
                </select>
            </div>

            {{-- Currency Filter --}}
            <div>
                <select 
                    name="currency" 
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                >
                    <option value="">{{ __('costs.all_currencies') }}</option>
                    @foreach(\App\Models\Cost::CURRENCIES as $code => $symbol)
                        <option value="{{ $code }}" {{ request('currency') === $code ? 'selected' : '' }}>
                            {{ $code }} ({{ $symbol }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Date From --}}
            <div>
                <input 
                    type="date" 
                    name="date_from" 
                    value="{{ request('date_from') }}"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                >
            </div>

            {{-- Actions --}}
            <div class="flex gap-2">
                <button type="submit" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition flex-1">
                    {{ __('ui.filter') }}
                </button>
                <a href="{{ route('costs.index') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition inline-flex items-center">
                    {{ __('ui.reset') }}
                </a>
            </div>
        </div>
    </form>
</div>