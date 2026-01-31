<div class="space-y-6">
    
    {{-- Header --}}
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            {{ __('meetings.meeting_list') }}
        </h3>
        <button 
            @click="$dispatch('open-meeting-modal')"
            class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
            {{ __('meetings.add_meeting') }}
        </button>
    </div>

    {{-- Tabella (riutilizza partial) --}}
    @if($showData['meetingsCount'] > 0)
        @include('meetings.partials._meeting-table', ['meetings' => $showData['meetings'], 'project' => $project])

        {{-- Link Vedi tutti --}}
        @if($showData['meetingsCount'] > 10)
            <div class="text-center">
                <a href="{{ route('meetings.index', ['project_id' => $project->id]) }}"
                   class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 font-medium">
                    {{ __('meetings.view_all') }} ({{ $showData['meetingsCount'] }})
                </a>
            </div>
        @endif
    @else
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('meetings.no_meetings') }}
                </h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('meetings.no_meetings_description') }}
                </p>
            </div>
        </div>
    @endif

    {{-- Modal Form --}}
    @include('meetings.partials._modal-form', ['project' => $project])

</div>