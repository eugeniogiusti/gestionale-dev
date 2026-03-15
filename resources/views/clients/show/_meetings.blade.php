{{-- Meetings Recenti --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('meetings.recent_meetings') }}</h3>
        </div>
    </div>

    @if($meetings->count() > 0)
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($meetings as $meeting)
                <li>
                    <a href="{{ route('projects.show', [$meeting->project, 'tab' => 'meetings']) }}" class="flex items-center gap-3 p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <span class="w-2 h-2 rounded-full shrink-0
                            @if($meeting->status === 'completed') bg-green-500
                            @elseif($meeting->status === 'cancelled') bg-red-500
                            @else bg-blue-500
                            @endif
                        "></span>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm text-gray-900 dark:text-white truncate">{{ $meeting->title }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $meeting->project->name }}</p>
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400 shrink-0">
                            {{ $meeting->scheduled_at->format('d/m/Y H:i') }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="p-4 text-sm text-gray-500 dark:text-gray-400 italic">{{ __('meetings.no_meetings') }}</p>
    @endif
</div>
