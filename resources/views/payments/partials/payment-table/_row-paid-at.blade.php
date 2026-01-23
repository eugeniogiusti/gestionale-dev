<td class="px-4 py-4 whitespace-nowrap">
    <div class="text-sm text-gray-900 dark:text-white">
        {{ $payment->paid_at->format('d/m/Y') }}
    </div>
    @if($payment->due_date)
        <div class="text-xs text-gray-500 dark:text-gray-400">
            {{ __('payments.due') }}: {{ $payment->due_date->format('d/m/Y') }}
        </div>
    @endif
</td>