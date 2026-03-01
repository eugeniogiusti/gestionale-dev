{{-- Month Filter --}}
<div>
    <select name="month" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        <option value="">{{ __('timesheets.all_months') }}</option>
        @foreach([
            1  => __('timesheets.months.january'),
            2  => __('timesheets.months.february'),
            3  => __('timesheets.months.march'),
            4  => __('timesheets.months.april'),
            5  => __('timesheets.months.may'),
            6  => __('timesheets.months.june'),
            7  => __('timesheets.months.july'),
            8  => __('timesheets.months.august'),
            9  => __('timesheets.months.september'),
            10 => __('timesheets.months.october'),
            11 => __('timesheets.months.november'),
            12 => __('timesheets.months.december'),
        ] as $num => $name)
            <option value="{{ $num }}" {{ request('month') == $num ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>
