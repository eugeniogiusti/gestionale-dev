{{-- Project Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <div class="text-sm font-medium text-gray-900 dark:text-white">
        <a href="{{ route('projects.show', [$task->project, 'tab' => 'tasks']) }}"
           class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
            {{ $task->project->name }}
        </a>
    </div>
    @if($task->project->client)
        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
            {{ $task->project->client->name }}
        </div>
    @endif
    <div class="mt-1">
        <x-projects.type-badge :type="$task->project->type" />
    </div>
</td>