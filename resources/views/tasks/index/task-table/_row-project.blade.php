{{-- Project Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <div class="font-medium text-gray-900 dark:text-white">
        <a href="{{ route('projects.show', $task->project) }}" 
           class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 hover:underline">
            {{ $task->project->name }}
        </a>
    </div>
</td>