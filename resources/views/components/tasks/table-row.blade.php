@props(['task', 'project'])

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
    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
        {{ $task->due_date ? $task->due_date->format('d/m/Y') : '-' }}
    </td>

        {{-- Actions --}}
    <td class="px-4 py-3 text-right space-x-2">
        <button 
            @click="$dispatch('edit-task', { 
                id: {{ $task->id }}, 
                title: {{ json_encode($task->title) }},
                description: {{ json_encode($task->description ?? '') }},
                type: '{{ $task->type }}',
                status: '{{ $task->status }}',
                priority: '{{ $task->priority ?? '' }}',
                due_date: '{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}'
            })"
            class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
            {{ __('ui.edit') }}
        </button>
        
        <form method="POST" action="{{ route('tasks.destroy', [$project, $task]) }}" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    onclick="return confirm('{{ __('tasks.confirm_delete') }}')"
                    class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                {{ __('ui.delete') }}
            </button>
        </form>
    </td>
</tr>