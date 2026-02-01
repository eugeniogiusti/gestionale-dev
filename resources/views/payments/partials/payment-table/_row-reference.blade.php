<td class="px-4 py-4">
    @if($payment->reference)
        <div class="text-sm text-gray-900 dark:text-white font-mono">
            {{ $payment->reference }}
        </div>
    @else
        <x-not-set-badge />
    @endif
</td>
