{{-- Row: Project --}}
<td class="px-6 py-4 whitespace-nowrap">
    <a href="{{ route('projects.show', ['project' => $timesheet->project, 'tab' => 'timesheets', 'ts_month' => $timesheet->month, 'ts_year' => $timesheet->year]) }}"
       class="text-sm font-medium text-emerald-600 dark:text-emerald-400 hover:text-emerald-800 dark:hover:text-emerald-300 hover:underline">
        {{ $timesheet->project->name }}
    </a>
    @if($timesheet->project->client)
        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
            {{ $timesheet->project->client->name }}
        </div>
    @endif
    <div class="mt-1">
        <x-projects.type-badge :type="$timesheet->project->type" />
    </div>
</td>
