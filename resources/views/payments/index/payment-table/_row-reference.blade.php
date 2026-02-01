<td class="px-6 py-4">
    @if($payment->reference)
        <div class="text-sm text-gray-900 dark:text-white font-mono">
            {{ $payment->reference }}
        </div>
    @else
        <x-not-set-badge />
    @endif
    @if($payment->notes)
        <div class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1">
            {{ Str::limit($payment->notes, 50) }}
        </div>
    @endif
</td>