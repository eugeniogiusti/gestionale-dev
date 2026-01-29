<td class="px-4 py-4 whitespace-nowrap">
    @if($payment->isPaid())
        {{-- Pagamento incassato --}}
        <div class="text-sm text-gray-900 dark:text-white">
            {{ $payment->paid_at->format('d/m/Y') }}
        </div>
    @else
        {{-- Pagamento da incassare --}}
        <div class="text-sm text-amber-600 dark:text-amber-400 font-medium">
            {{ __('payments.pending') }}
        </div>
    @endif
    
    @if($payment->due_date)
        <div class="text-xs {{ $payment->isOverdue() ? 'text-red-600 dark:text-red-400 font-semibold' : 'text-gray-500 dark:text-gray-400' }}">
            {{ __('payments.due') }}: {{ $payment->due_date->format('d/m/Y') }}
            @if($payment->isOverdue())
                <span class="ml-1">({{ __('payments.overdue') }})</span>
            @endif
        </div>
    @endif
</td>