@props(['cost'])

{{-- Receipt Actions - FULL MODE (Show page) --}}

@if($cost->hasReceipt())
    
    {{-- Preview --}}
    <a href="{{ $cost->getReceiptPreviewUrl() }}" 
       target="_blank"
       class="text-purple-600 hover:text-purple-800 dark:text-purple-400"
       title="{{ __('receipts.preview') }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
    </a>

    {{-- Download --}}
    <a href="{{ $cost->getReceiptDownloadUrl() }}" 
       class="text-green-600 hover:text-green-800 dark:text-green-400"
       title="{{ __('receipts.download') }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
    </a>

    {{-- Delete --}}
    <form method="POST" 
          action="{{ $cost->getReceiptDeleteUrl() }}" 
          class="inline"
          onsubmit="return confirm('{{ __('receipts.confirm_delete') }}')">
        @csrf
        @method('DELETE')
        <button type="submit" 
                class="text-orange-600 hover:text-orange-800 dark:text-orange-400"
                title="{{ __('receipts.delete') }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </form>

@else
    
    {{-- Upload --}}
    <button @click="$dispatch('upload-receipt', {{ $cost->id }})"
            class="text-blue-600 hover:text-blue-800 dark:text-blue-400"
            title="{{ __('receipts.upload') }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
        </svg>
    </button>

@endif