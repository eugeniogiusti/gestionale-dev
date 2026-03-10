{{-- Reference Year Filter --}}
<div>
    <select name="reference_year"
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        <option value="">{{ __('taxes.all_years') }}</option>
        @foreach($availableYears as $year)
            <option value="{{ $year }}" {{ request('reference_year') == $year ? 'selected' : '' }}>
                {{ $year }}
            </option>
        @endforeach
    </select>
</div>
