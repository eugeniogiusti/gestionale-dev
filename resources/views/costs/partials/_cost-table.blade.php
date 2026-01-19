{{-- Tabella riutilizzabile per show project --}}
<div class="overflow-x-auto">
    <table class="w-full">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('costs.amount') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('costs.type') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('costs.recurring') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('costs.paid_at') }}
                </th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('ui.actions') }}
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($costs as $cost)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    
                    {{-- Amount --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <div class="text-lg font-bold text-gray-900 dark:text-white">
                            {{ $cost->getFormattedAmount() }}
                        </div>
                        @if($cost->notes)
                            <div class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1">
                                {{ Str::limit($cost->notes, 50) }}
                            </div>
                        @endif
                    </td>

                    {{-- Type --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <x-costs.type-badge :type="$cost->type" />
                    </td>

                    {{-- Recurring --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        @if($cost->recurring)
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                                <span>🔄</span>
                                <span>{{ __('costs.period_' . $cost->recurring_period) }}</span>
                            </span>
                        @else
                            <span class="text-gray-400">—</span>
                        @endif
                    </td>

                    {{-- Paid At --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 dark:text-white">
                            {{ $cost->paid_at->format('d/m/Y') }}
                        </div>
                    </td>
                    
                    {{-- Actions --}}
                    <td class="px-4 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            
                            {{-- Receipt Actions (FULL) --}}
                            <x-costs.receipt-actions-full :cost="$cost" />

                            {{-- Edit Cost --}}
                            <button @click="$dispatch('edit-cost', {{ $cost->id }})"
                                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>

                            {{-- Delete Cost --}}
                            <form method="POST" action="{{ route('costs.destroy', [$project, $cost]) }}" 
                                onsubmit="return confirm('{{ __('costs.confirm_delete') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>