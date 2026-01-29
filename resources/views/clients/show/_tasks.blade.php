{{-- Tasks Recenti --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
            </svg>
            <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('tasks.recent_tasks') }}</h3>
        </div>
    </div>

    @if($tasks->count() > 0)
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($tasks as $task)
                <li class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full shrink-0
                            @if($task->status === 'done') bg-green-500
                            @elseif($task->status === 'in_progress') bg-blue-500
                            @elseif($task->status === 'blocked') bg-red-500
                            @else bg-gray-400
                            @endif
                        "></span>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm text-gray-900 dark:text-white truncate {{ $task->status === 'done' ? 'line-through text-gray-400' : '' }}">
                                {{ $task->title }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $task->project->name }}</p>
                        </div>
                        @if($task->priority)
                            <x-tasks.priority-badge :priority="$task->priority" />
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p class="p-4 text-sm text-gray-500 dark:text-gray-400 italic">{{ __('tasks.no_tasks') }}</p>
    @endif
</div>
