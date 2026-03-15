{{-- Tasks  --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 transition-transform duration-200 hover:scale-[1.02]">
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('dashboard.tasks_due_soon') }}</h3>
        </div>
        <a href="{{ route('tasks.index') }}" class="text-sm text-emerald-600 hover:text-emerald-700">
            {{ __('ui.view_all') }}
        </a>
    </div>

    @if($lists['tasks_due_soon']->count() > 0)
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($lists['tasks_due_soon'] as $task)
                <li>
                    <a href="{{ route('projects.show', [$task->project, 'tab' => 'tasks']) }}" class="flex items-center gap-3 p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <span class="w-2 h-2 rounded-full shrink-0
                            @if($task->isOverdue()) bg-red-500
                            @elseif($task->status === 'in_progress') bg-blue-500
                            @else bg-gray-400
                            @endif
                        "></span>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm text-gray-900 dark:text-white truncate">{{ $task->title }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $task->project->name }}</p>
                            <div class="mt-1"><x-tasks.type-badge :type="$task->type" /></div>
                        </div>
                        <span class="text-xs shrink-0 {{ $task->isOverdue() ? 'text-red-500 font-medium' : 'text-gray-500' }}">
                            {{ $task->due_date->format('d/m') }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="p-4 text-sm text-gray-500 dark:text-gray-400 italic text-center">
            {{ __('dashboard.no_tasks_due_soon') }}
        </p>
    @endif
</div>
