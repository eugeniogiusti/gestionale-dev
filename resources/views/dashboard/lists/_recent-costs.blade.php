{{-- Ultimate costs registered --}}
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 transition-transform duration-200 hover:scale-[1.02]">
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('dashboard.recent_costs') }}</h3>
        </div>
        <a href="{{ route('costs.index') }}" class="text-sm text-red-600 hover:text-red-700">
            {{ __('ui.view_all') }}
        </a>
    </div>

    @if($lists['recent_costs']->count() > 0)
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($lists['recent_costs'] as $cost)
                <li>
                    <a href="{{ route('projects.show', [$cost->project, 'tab' => 'costs']) }}" class="flex items-center justify-between gap-3 p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <div class="min-w-0">
                            <p class="text-sm font-medium text-red-600">
                                -{{ number_format($cost->amount, 2) }} {{ $cost->currency }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $cost->project?->name ?? '—' }}</p>
                            <div class="mt-1"><x-costs.type-badge :type="$cost->type" /></div>
                        </div>
                        <span class="text-xs text-gray-500 shrink-0">
                            {{ $cost->paid_at->format('d/m/Y') }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="p-4 text-sm text-gray-500 dark:text-gray-400 italic text-center">
            {{ __('dashboard.no_recent_costs') }}
        </p>
    @endif
</div>
