<td class="px-4 py-4 whitespace-nowrap">
    <div class="flex items-center gap-2">

        @if($cost->hasReceipt())
            {{-- Preview --}}
            <a href="{{ $cost->getReceiptPreviewUrl() }}"
               target="_blank"
               class="text-blue-600 hover:text-blue-800 dark:text-blue-400"
               title="{{ __('receipts.preview') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </a>

            {{-- Download --}}
            <a href="{{ $cost->getReceiptDownloadUrl() }}"
               class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400"
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
                        class="text-red-600 hover:text-red-800 dark:text-red-400"
                        title="{{ __('receipts.delete') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </form>
        @else
            <x-not-set-badge />
        @endif

        {{-- Upload sempre disponibile --}}
        <button @click="$dispatch('upload-receipt', {{ $cost->id }})"
                class="text-gray-600 hover:text-gray-800 dark:text-gray-400"
                title="{{ __('receipts.upload') }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L9 8m4-4v12" />
            </svg>
        </button>

    </div>
</td>
