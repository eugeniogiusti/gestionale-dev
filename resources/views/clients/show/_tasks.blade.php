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
                <li class="flex items-center gap-3 p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                    <span class="w-2 h-2 rounded-full shrink-0
                        @if($task->status === 'done') bg-green-500
                        @elseif($task->status === 'in_progress') bg-blue-500
                        @elseif($task->status === 'blocked') bg-red-500
                        @else bg-gray-400
                        @endif
                    "></span>
                    <a href="{{ route('projects.show', [$task->project, 'tab' => 'tasks']) }}" class="min-w-0 flex-1">
                        <p class="text-sm text-gray-900 dark:text-white truncate {{ $task->status === 'done' ? 'line-through text-gray-400' : '' }}">
                            {{ $task->title }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $task->project->name }}</p>
                    </a>
                    @if($task->priority)
                        <x-tasks.priority-badge :priority="$task->priority" />
                    @endif
                    @if($task->taskDocuments->isNotEmpty())
                        @if($task->taskDocuments->count() === 1)
                            <div class="flex items-center gap-1 shrink-0">
                                <x-action-button :href="$task->taskDocuments->first()->getPreviewUrl()" variant="info" target="_blank" title="{{ __('task_documents.preview') }}: {{ $task->taskDocuments->first()->name }}">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </x-action-button>
                                <x-action-button :href="$task->taskDocuments->first()->getDownloadUrl()" variant="primary" title="{{ __('task_documents.download') }}: {{ $task->taskDocuments->first()->name }}">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                </x-action-button>
                            </div>
                        @else
                            <span class="relative inline-flex shrink-0 text-gray-400" title="{{ $task->taskDocuments->count() }} {{ __('task_documents.document_list') }}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="absolute -top-1.5 -right-1.5 bg-emerald-500 text-white text-xs rounded-full w-3.5 h-3.5 flex items-center justify-center leading-none">
                                    {{ $task->taskDocuments->count() }}
                                </span>
                            </span>
                        @endif
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p class="p-4 text-sm text-gray-500 dark:text-gray-400 italic">{{ __('tasks.no_tasks') }}</p>
    @endif
</div>
