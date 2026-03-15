{{-- Costi Recenti --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
            </svg>
            <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('costs.recent_costs') }}</h3>
        </div>
    </div>

    @if($costs->count() > 0)
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($costs as $cost)
                <li>
                    <a href="{{ route('projects.show', [$cost->project, 'tab' => 'costs']) }}" class="flex items-center justify-between gap-3 p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <div class="min-w-0">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                {{ number_format($cost->amount, 2) }} {{ $cost->currency }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $cost->project->name }}</p>
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400 shrink-0">
                            {{ __('costs.type_' . $cost->type) }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="p-4 text-sm text-gray-500 dark:text-gray-400 italic">{{ __('costs.no_costs') }}</p>
    @endif
</div>
