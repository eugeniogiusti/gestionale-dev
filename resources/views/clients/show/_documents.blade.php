{{-- Documenti Recenti --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('documents.recent_documents') }}</h3>
        </div>
    </div>

    @if($documents->count() > 0)
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($documents as $document)
                <li class="flex items-center gap-3 p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                    <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    <a href="{{ route('projects.show', [$document->project, 'tab' => 'documents']) }}" class="min-w-0 flex-1">
                        <p class="text-sm text-gray-900 dark:text-white truncate">{{ $document->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $document->project->name }}</p>
                    </a>
                    <span class="text-xs text-gray-500 dark:text-gray-400 shrink-0">
                        {{ $document->uploaded_at->format('d/m/Y') }}
                    </span>
                    <div class="flex items-center gap-1 shrink-0">
                        {{-- Preview --}}
                        <x-action-button :href="$document->getPreviewUrl()" variant="info" target="_blank" title="{{ __('documents.preview') }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </x-action-button>
                        {{-- Download --}}
                        <x-action-button :href="$document->getDownloadUrl()" variant="primary" title="{{ __('documents.download') }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </x-action-button>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p class="p-4 text-sm text-gray-500 dark:text-gray-400 italic">{{ __('documents.no_documents') }}</p>
    @endif
</div>
