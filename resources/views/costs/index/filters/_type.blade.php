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