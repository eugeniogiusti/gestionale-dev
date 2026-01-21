<div class="overflow-x-auto">
    <table class="w-full">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('quotes.quote_title') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('quotes.total') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('quotes.status') }}
                </th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('quotes.quote_date') }}
                </th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                    {{ __('ui.actions') }}
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($quotes as $quote)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">

                    {{-- Title --}}
                    <td class="px-4 py-4">
                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                            {{ $quote->title }}
                        </div>
                        @if($quote->notes)
                            <div class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1">
                                {{ Str::limit($quote->notes, 50) }}
                            </div>
                        @endif
                    </td>

                    {{-- Total --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <div class="text-sm font-semibold text-gray-900 dark:text-white">
                            {{ $quote->formatted_total }}
                        </div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            {{ count($quote->items) }} {{ __('quotes.items') }}
                        </div>
                    </td>

                    {{-- Status --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <x-quotes.status-badge :quote="$quote" />
                    </td>

                    {{-- Quote Date --}}
                    <td class="px-4 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 dark:text-white">
                            {{ $quote->quote_date->format('d/m/Y') }}
                        </div>
                    </td>

                    {{-- Actions --}}
                    <td class="px-4 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            
                            {{-- Download PDF --}}
                            <a href="{{ $quote->getDownloadUrl() }}" 
                               title="{{ __('quotes.download') }}"
                               class="text-purple-600 hover:text-purple-800 dark:text-purple-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>

                            {{-- Change Status (dropdown) --}}
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open" 
                                        title="{{ __('quotes.status') }}"
                                        class="text-blue-600 hover:text-blue-800 dark:text-blue-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>

                                <div x-show="open" 
                                     @click.away="open = false"
                                     x-transition
                                     class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 z-10">
                                    
                                    @foreach(['draft', 'sent', 'accepted', 'rejected', 'expired'] as $status)
                                        <form method="POST" action="{{ route('quotes.update-status', [$project, $quote]) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="{{ $status }}">
                                            <button type="submit" 
                                                    class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 
                                                           {{ $quote->status === $status ? 'font-bold text-emerald-600 dark:text-emerald-400' : 'text-gray-700 dark:text-gray-300' }}">
                                                {{ __('quotes.status_' . $status) }}
                                            </button>
                                        </form>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Delete --}}
                            <form method="POST" action="{{ $quote->getDeleteUrl() }}" 
                                  onsubmit="return confirm('{{ __('quotes.confirm_delete') }}')"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        title="{{ __('ui.delete') }}"
                                        class="text-red-600 hover:text-red-800 dark:text-red-400">
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