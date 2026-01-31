{{-- Project Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <div class="text-sm font-medium text-gray-900 dark:text-white">
        <a href="{{ route('projects.show', $task->project) }}"
           class="hover:underline">
            {{ $task->project->name }}
        </a>
    </div>
    <div class="mt-1">
        <x-projects.type-badge :type="$task->project->type" />
    </div>
</td>