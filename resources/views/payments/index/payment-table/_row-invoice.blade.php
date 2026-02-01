<td class="px-4 py-4 whitespace-nowrap">
    @if($payment->hasInvoice())
        <div class="flex items-center gap-2">
            <a href="{{ route('invoices.preview', $payment) }}"
               target="_blank"
               class="text-blue-600 hover:text-blue-800 dark:text-blue-400"
               title="{{ __('invoices.preview') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </a>

            <a href="{{ route('invoices.download', $payment) }}"
               class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400"
               title="{{ __('invoices.download') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
            </a>
        </div>
    @else
        <x-not-set-badge />
    @endif
</td>
