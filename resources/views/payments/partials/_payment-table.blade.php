{{-- Tabella riutilizzabile per show project --}}
<div class="overflow-x-auto">
    <table class="w-full">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('payments.amount') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('payments.method') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('payments.paid_at') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('payments.reference') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('payments.invoice') }}
                </th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('ui.actions') }}
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($payments as $payment)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    
                    {{-- Amount --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <div class="text-lg font-bold text-gray-900 dark:text-white">
                            {{ $payment->getFormattedAmount() }}
                        </div>
                        @if($payment->notes)
                            <div class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1">
                                {{ Str::limit($payment->notes, 50) }}
                            </div>
                        @endif
                    </td>

                    {{-- Method --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <x-payments.method-badge :method="$payment->method" />
                    </td>

                    {{-- Paid At --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 dark:text-white">
                            {{ $payment->paid_at->format('d/m/Y') }}
                        </div>
                        @if($payment->due_date)
                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                {{ __('payments.due') }}: {{ $payment->due_date->format('d/m/Y') }}
                            </div>
                        @endif
                    </td>

                    {{-- Reference --}}
                    <td class="px-4 py-4">
                        @if($payment->reference)
                            <div class="text-sm text-gray-900 dark:text-white font-mono">
                                {{ $payment->reference }}
                            </div>
                        @else
                            <span class="text-gray-400">—</span>
                        @endif
                    </td>

                    {{-- Invoice Actions (Component) --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <x-payments.invoice-actions :payment="$payment" />
                    </td>

                    {{-- Actions --}}
                    <td class="px-4 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            {{-- Edit --}}
                            <button 
                                @click="$dispatch('edit-payment', {{ $payment->id }})"
                                class="text-blue-600 hover:text-blue-800 dark:text-blue-400"
                                title="{{ __('ui.edit') }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>

                            {{-- Delete --}}
                            <form method="POST" action="{{ route('payments.destroy', [$project, $payment]) }}" 
                                  onsubmit="return confirm('{{ __('payments.confirm_delete') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 dark:text-red-400"
                                        title="{{ __('ui.delete') }}">
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