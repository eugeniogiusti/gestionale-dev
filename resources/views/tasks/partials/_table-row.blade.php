{{-- Task table row for project show page --}}
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    {{-- Title & Description --}}
    <td class="px-4 py-3">
        <div class="font-medium text-gray-900 dark:text-white">
            {{ $task->title }}
        </div>
        @if($task->description)
            <div class="text-sm text-gray-500 dark:text-gray-400 truncate max-w-md">
                {{ Str::limit($task->description, 100) }}
            </div>
        @endif
    </td>

    {{-- Type Badge --}}
    <td class="px-4 py-3">
        <x-tasks.type-badge :type="$task->type" />
    </td>

    {{-- Status Badge --}}
    <td class="px-4 py-3">
        <x-tasks.status-badge :status="$task->status" />
    </td>

    {{-- Priority Badge --}}
    <td class="px-4 py-3">
        <x-tasks.priority-badge :priority="$task->priority" />
    </td>

    {{-- Due Date --}}
    <td class="px-4 py-3">
        <x-tasks.due-date :date="$task->due_date" />
    </td>

    {{-- Actions --}}
    <td class="px-4 py-4 text-right">
        @include('tasks.partials._table-row-actions', ['task' => $task, 'project' => $project])
    </td>
</tr>
