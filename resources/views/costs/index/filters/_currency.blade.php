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