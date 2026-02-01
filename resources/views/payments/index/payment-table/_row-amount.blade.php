<td class="px-6 py-4 whitespace-nowrap">
    <div class="text-lg font-bold text-gray-900 dark:text-white" title="{{ $payment->getFormattedAmount() }}">
        {{ $payment->getCompactAmount() }}
    </div>
    @if($payment->currency !== 'EUR')
        <div class="text-xs text-gray-500 dark:text-gray-400">
            {{ $payment->currency }}
        </div>
    @endif
</td>
