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
                <li class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm text-gray-900 dark:text-white truncate">{{ $document->name }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $document->project->name }}</p>
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400 shrink-0">
                            {{ $document->uploaded_at->format('d/m/Y') }}
                        </span>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p class="p-4 text-sm text-gray-500 dark:text-gray-400 italic">{{ __('documents.no_documents') }}</p>
    @endif
</div>
