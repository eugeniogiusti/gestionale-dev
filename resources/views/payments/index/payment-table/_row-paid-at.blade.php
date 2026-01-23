<td class="px-6 py-4 whitespace-nowrap">
    <div class="text-sm text-gray-900 dark:text-white">
        {{ $payment->paid_at->format('d/m/Y') }}
    </div>
    @if($payment->isRecent())
        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
            {{ __('payments.recent') }}
        </span>
    @endif
</td>