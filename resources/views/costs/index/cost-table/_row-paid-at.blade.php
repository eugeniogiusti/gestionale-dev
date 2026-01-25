{{-- Paid At Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <div class="text-sm text-gray-900 dark:text-white">
        {{ $cost->paid_at->format('d/m/Y') }}
    </div>
    @if($cost->isRecent())
        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300">
            {{ __('costs.recent') }}
        </span>
    @endif
</td>