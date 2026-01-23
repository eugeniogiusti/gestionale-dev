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