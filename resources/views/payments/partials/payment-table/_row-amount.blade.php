<td class="px-4 py-4 whitespace-nowrap">
    <div class="text-lg font-bold text-gray-900 dark:text-white" title="{{ $payment->getFormattedAmount() }}">
        {{ $payment->getCompactAmount() }}
    </div>
    @if($payment->notes)
        <div class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1">
            {{ Str::limit($payment->notes, 50) }}
        </div>
    @endif
</td>
