@props(['payment'])

@if($payment->hasInvoice())
    {{-- Invoice già generata --}}
    <div class="flex items-center gap-2">
        <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-300">
            📄 {{ $payment->invoice_number }}
        </span>
        
        {{-- Preview --}}
        <a href="{{ route('invoices.preview', $payment) }}" 
           target="_blank"
           class="text-purple-600 hover:text-purple-800 dark:text-purple-400"
           title="{{ __('invoices.preview') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </a>
        
        {{-- Download --}}
        <a href="{{ route('invoices.download', $payment) }}" 
           class="text-blue-600 hover:text-blue-800 dark:text-blue-400"
           title="{{ __('invoices.download') }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
        </a>
        
        {{-- Delete --}}
        <form method="POST" action="{{ route('invoices.destroy', $payment) }}" 
              onsubmit="return confirm('{{ __('invoices.confirm_delete') }}')"
              class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="text-red-600 hover:text-red-800 dark:text-red-400"
                    title="{{ __('invoices.delete') }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </form>
    </div>
@else
    {{-- Genera fattura --}}
    <form method="POST" action="{{ route('invoices.generate', $payment) }}" class="inline">
        @csrf
        <button type="submit" 
                class="inline-flex items-center px-3 py-1 bg-blue-600 text-white rounded text-xs font-medium hover:bg-blue-700 transition">
            📄 {{ __('invoices.generate') }}
        </button>
    </form>
@endif