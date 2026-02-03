<div class="space-y-6">
    
    {{-- Header --}}
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            {{ __('costs.cost_list') }}
        </h3>
        <button 
            @click="$dispatch('open-cost-modal')"
            class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
            {{ __('costs.add_cost') }}
        </button>
    </div>

    {{-- Table (partial) --}}
    @if($showData['costsCount'] > 0)
        @include('costs.partials._cost-table', ['costs' => $showData['costs'], 'project' => $project])

        {{-- Link  --}}
        @if($showData['costsCount'] > 10)
            <div class="text-center">
                <a href="{{ route('costs.index', ['project_id' => $project->id]) }}"
                   class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 font-medium">
                    {{ __('costs.view_all') }} ({{ $showData['costsCount'] }})
                </a>
            </div>
        @endif
    @else
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('costs.no_costs') }}
                </h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('costs.no_costs_description') }}
                </p>
            </div>
        </div>
    @endif

    {{-- Modal Form --}}
    @include('costs.partials._modal-form', ['project' => $project])

    {{-- Modal Upload Receipt --}}
    @include('costs.partials._upload-receipt-modal')

</div>