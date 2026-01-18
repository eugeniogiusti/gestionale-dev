<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
    <form method="GET" action="{{ route('payments.index') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            
            {{-- Search --}}
            <div>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="{{ __('payments.placeholder.search') }}"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                >
            </div>

            {{-- Method Filter --}}
            <div>
                <select 
                    name="method" 
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                >
                    <option value="">{{ __('payments.all_methods') }}</option>
                    @foreach(\App\Models\Payment::METHODS as $method)
                        <option value="{{ $method }}" {{ request('method') === $method ? 'selected' : '' }}>
                            {{ __('payments.method_' . $method) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Currency Filter --}}
            <div>
                <select 
                    name="currency" 
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                >
                    <option value="">{{ __('payments.all_currencies') }}</option>
                    @foreach(\App\Models\Payment::CURRENCIES as $code => $symbol)
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
                <a href="{{ route('payments.index') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition inline-flex items-center">
                    {{ __('ui.reset') }}
                </a>
            </div>
        </div>
    </form>
</div>