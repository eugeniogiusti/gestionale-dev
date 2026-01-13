<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('clients.table.name') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('clients.table.email') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('clients.table.phone') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('clients.table.status') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('clients.table.created_at') }}
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('clients.table.actions') }}
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($clients as $client)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">

                        {{-- Name + VAT --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-client-name-cell :client="$client" />
                        </td>

                        {{-- Email --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $client->email }}
                            </div>
                        </td>

                        {{-- Phone --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-client-phone :client="$client" />
                        </td>

                        {{-- Status --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-client-status-badge :status="$client->status" />
                        </td>

                        {{-- Created at --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                            {{ $client->created_at->format('d/m/Y') }}
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4 text-right">
                            <div class="flex flex-col items-end gap-2">
                                <x-action-button :href="route('clients.edit', $client)" variant="primary" :title="__('clients.edit')">
                                    <svg class="w-4 h-4 mr-1.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <span class="text-xs font-medium">{{ __('clients.edit') }}</span>
                                </x-action-button>

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

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700">
        {{ $clients->links() }}
    </div>
</div>