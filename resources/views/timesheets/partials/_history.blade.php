{{-- Saved months history --}}
<div>
    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('timesheets.history') }}</h4>
    <div class="flex flex-wrap gap-2">
        @foreach($timesheetMonths as $ts)
            <a href="{{ route('projects.show', ['project' => $project, 'tab' => 'timesheets', 'ts_month' => $ts->month, 'ts_year' => $ts->year]) }}"
               class="px-3 py-1 text-xs rounded-full border transition
                      {{ $ts->month == $tsMonth && $ts->year == $tsYear
                          ? 'bg-emerald-100 dark:bg-emerald-900/30 border-emerald-300 dark:border-emerald-700 text-emerald-700 dark:text-emerald-300 font-medium'
                          : 'bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-400 hover:border-emerald-400' }}">
                {{ $monthNames[$ts->month] }} {{ $ts->year }}
            </a>
        @endforeach
    </div>
</div>
