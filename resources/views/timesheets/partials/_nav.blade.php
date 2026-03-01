{{-- Month/year navigation --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
    <h3 class="text-base font-semibold text-gray-900 dark:text-white">
        {{ __('timesheets.title') }}
    </h3>

    <form method="GET" action="{{ route('projects.show', $project) }}" class="flex items-center gap-2">
        <input type="hidden" name="tab" value="timesheets">

        <select name="ts_month" onchange="this.form.submit()"
                class="px-2 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
            @for($m = 1; $m <= 12; $m++)
                <option value="{{ $m }}" @selected($m == $tsMonth)>{{ $monthNames[$m] }}</option>
            @endfor
        </select>

        <select name="ts_year" onchange="this.form.submit()"
                class="px-2 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500">
            @for($y = now()->year - 2; $y <= now()->year + 1; $y++)
                <option value="{{ $y }}" @selected($y == $tsYear)>{{ $y }}</option>
            @endfor
        </select>
    </form>
</div>
