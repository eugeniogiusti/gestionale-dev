{{-- Actions Cell --}}
<td class="px-6 py-4 text-right">
    <div class="flex flex-col items-end gap-2">
        {{-- Edit Button --}}
        <x-action-button 
            type="button"
            variant="primary" 
            :title="__('clients.edit')"
            x-data
            @click="$dispatch('edit-client', {{ Js::from($client) }})"
        >
            <svg class="w-4 h-4 mr-1.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            <span class="text-xs font-medium">{{ __('clients.edit') }}</span>
        </x-action-button>

        {{-- Delete Button --}}
        <form method="POST"
              action="{{ route('clients.destroy', $client) }}"
              onsubmit="return confirm('{{ __('clients.confirm_delete') }}')">
            @csrf
            @method('DELETE')

            <x-action-button type="submit" variant="danger" :title="__('clients.delete')">
                <svg class="w-4 h-4 mr-1.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                <span class="text-xs font-medium">{{ __('clients.delete') }}</span>
            </x-action-button>
        </form>
    </div>
</td>