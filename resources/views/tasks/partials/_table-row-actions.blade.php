{{-- Task row actions: documents, calendar, edit, delete --}}
<div class="flex justify-end gap-2">

    {{-- Document attachments --}}
    @if($task->taskDocuments->isNotEmpty())
        @if($task->taskDocuments->count() === 1)
            {{-- Single document: eye (preview) + download --}}
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
            {{-- Multiple documents: paperclip with count badge, clicking opens edit modal --}}
            <button type="button"
                    data-action="edit-task"
                    data-payload="{{ json_encode($task->toFormPayload(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }}"
                    title="{{ $task->taskDocuments->count() }} {{ __('task_documents.document_list') }}"
                    class="relative text-gray-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                </svg>
                <span class="absolute -top-1.5 -right-1.5 bg-emerald-500 text-white text-xs rounded-full w-3.5 h-3.5 flex items-center justify-center leading-none">
                    {{ $task->taskDocuments->count() }}
                </span>
            </button>
        @endif
    @endif

    {{-- Google Calendar --}}
    @if($task->googleCalendarUrl())
        <a href="{{ $task->googleCalendarUrl() }}"
           target="_blank"
           title="{{ __('tasks.add_to_calendar') }}"
           class="text-gray-500 hover:text-gray-700 dark:text-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </a>
    @endif

    {{-- Edit --}}
    <button type="button"
        data-action="edit-task"
        data-payload="{{ json_encode($task->toFormPayload(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) }}"
        class="text-blue-600 hover:text-blue-800 dark:text-blue-400"
        title="{{ __('ui.edit') }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
    </button>

    {{-- Delete --}}
    <form method="POST" action="{{ route('tasks.destroy', [$project, $task]) }}"
          data-confirm="{{ __('tasks.confirm_delete') }}">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="text-red-600 hover:text-red-800 dark:text-red-400"
                title="{{ __('ui.delete') }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>
    </form>
</div>
