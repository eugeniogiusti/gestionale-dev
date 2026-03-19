{{-- Actions Cell --}}
<td class="px-6 py-4 text-right">
    <div class="flex items-center justify-end gap-3">

        {{-- Document attachments --}}
        @if($task->taskDocuments->isNotEmpty())
            @if($task->taskDocuments->count() === 1)
                <a href="{{ $task->taskDocuments->first()->getPreviewUrl() }}"
                   target="_blank"
                   title="{{ __('task_documents.preview') }}: {{ $task->taskDocuments->first()->name }}"
                   class="text-gray-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </a>
                <a href="{{ $task->taskDocuments->first()->getDownloadUrl() }}"
                   title="{{ __('task_documents.download') }}: {{ $task->taskDocuments->first()->name }}"
                   class="text-gray-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
            @else
                <span class="relative inline-flex text-gray-400" title="{{ $task->taskDocuments->count() }} {{ __('task_documents.document_list') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                    <span class="absolute -top-1.5 -right-1.5 bg-emerald-500 text-white text-xs rounded-full w-3.5 h-3.5 flex items-center justify-center leading-none">
                        {{ $task->taskDocuments->count() }}
                    </span>
                </span>
            @endif
        @endif

        <a href="{{ route('projects.show', [$task->project, '#tasks']) }}"
           class="inline-flex items-center px-3 py-1.5 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-lg text-xs font-medium hover:bg-emerald-200 dark:hover:bg-emerald-800/50 transition group">
            <svg class="w-3.5 h-3.5 mr-1.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <span>{{ __('tasks.view_project') }}</span>
        </a>
    </div>
</td>