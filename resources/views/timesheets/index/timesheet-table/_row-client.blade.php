{{-- Row: Client --}}
<td class="px-6 py-4 whitespace-nowrap">
    @if($timesheet->project->client)
        <span class="text-sm text-gray-700 dark:text-gray-300">
            {{ $timesheet->project->client->name }}
        </span>
    @else
        <span class="text-sm text-gray-400 dark:text-gray-500">—</span>
    @endif
</td>
