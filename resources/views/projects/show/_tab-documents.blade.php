<div class="space-y-6">
    
    {{-- Header --}}
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            {{ __('documents.document_list') }}
        </h3>
        <button 
            @click="$dispatch('open-document-modal')"
            class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
            {{ __('documents.add_document') }}
        </button>
    </div>

    {{-- Table --}}
    @if($showData['documentsCount'] > 0)
        @include('documents.partials._document-table', ['documents' => $showData['documents']])

        {{-- Link  --}}
        @if($showData['documentsCount'] > 10)
            <div class="text-center">
                <a href="{{ route('documents.index', ['project_id' => $project->id]) }}"
                   class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 font-medium">
                    {{ __('documents.view_all') }} ({{ $showData['documentsCount'] }})
                </a>
            </div>
        @endif
    @else
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('documents.no_documents') }}
                </h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('documents.no_documents_description') }}
                </p>
            </div>
        </div>
    @endif

    {{-- Modal Form --}}
    @include('documents.partials._modal', ['project' => $project, 'labels' => \App\Models\Label::ordered()->get()])

</div>