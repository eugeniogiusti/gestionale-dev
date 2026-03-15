{{-- Pagamenti Recenti --}}
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="font-semibold text-gray-900 dark:text-white">{{ __('payments.recent_payments') }}</h3>
        </div>
    </div>

    @if($payments->count() > 0)
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($payments as $payment)
                <li>
                    <a href="{{ route('projects.show', [$payment->project, 'tab' => 'payments']) }}" class="flex items-center justify-between gap-3 p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <div class="min-w-0">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                {{ number_format($payment->amount, 2) }} {{ $payment->currency }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $payment->project->name }}</p>
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400 shrink-0">
                            @if($payment->paid_at)
                                {{ $payment->paid_at->format('d/m/Y') }}
                            @else
                                <span class="text-amber-600">{{ __('payments.pending') }}</span>
                            @endif
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="p-4 text-sm text-gray-500 dark:text-gray-400 italic">{{ __('payments.no_payments') }}</p>
    @endif
</div>
