<td class="px-6 py-4 whitespace-nowrap">
    @if($payment->invoice_path)
        <div class="flex space-x-2">
            {{-- Visualizza --}}
            <a href="{{ route('payments.invoice.view', $payment) }}" 
               target="_blank"
               class="inline-flex items-center text-blue-600 hover:text-blue-800 dark:text-blue-400"
               title="{{ __('payments.view_invoice') }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </a>
            
            {{-- Scarica --}}
            <a href="{{ route('payments.invoice.download', $payment) }}" 
               class="inline-flex items-center text-emerald-600 hover:text-emerald-800 dark:text-emerald-400"
               title="{{ __('payments.download_invoice') }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
            </a>
        </div>
    @else
        <span class="text-gray-400">—</span>
    @endif
</td>