<div class="space-y-6" x-data="window.quoteModal(@js($project->quotes))">
    
    {{-- Header --}}
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            {{ __('quotes.quote_list') }}
        </h3>
        <button 
            @click="$dispatch('open-quote-modal')"
            class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
            {{ __('quotes.add_quote') }}
        </button>
    </div>

    {{-- Tabella (riutilizza partial) --}}
    @if($project->quotes->count() > 0)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
            @include('quotes.partials._quote-table', ['quotes' => $project->quotes->take(10), 'project' => $project])
        </div>

        {{-- Link Vedi tutti --}}
        @if($project->quotes->count() > 10)
            <div class="text-center">
                <a href="{{ route('quotes.index', ['project_id' => $project->id]) }}" 
                   class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 font-medium">
                    {{ __('quotes.view_all') }} ({{ $project->quotes->count() }})
                </a>
            </div>
        @endif
    @else
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-12 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ __('quotes.no_quotes') }}
            </h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                {{ __('quotes.no_quotes_description') }}
            </p>
            <div class="mt-6">
                <button @click="$dispatch('open-quote-modal')"
                        class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    {{ __('quotes.create_quote') }}
                </button>
            </div>
        </div>
    @endif

    {{-- Modal Form --}}
    @include('quotes.partials._modal-form', ['project' => $project])

</div>