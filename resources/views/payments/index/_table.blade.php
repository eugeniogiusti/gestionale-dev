<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('payments.project') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('payments.amount') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('payments.method') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('payments.paid_at') }}
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('payments.reference') }}
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        {{ __('ui.actions') }}
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($payments as $payment)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        
                        {{-- Project --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('projects.show', [$payment->project, '#payments']) }}" 
                               class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 hover:underline font-medium">
                                {{ $payment->project->name }}
                            </a>
                            @if($payment->project->client)
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $payment->project->client->name }}
                                </div>
                            @endif
                        </td>

                        {{-- Amount --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-lg font-bold text-gray-900 dark:text-white">
                                {{ $payment->getFormattedAmount() }}
                            </div>
                            @if($payment->currency !== 'EUR')
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $payment->currency }}
                                </div>
                            @endif
                        </td>

                        {{-- Method --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-payments.method-badge :method="$payment->method" />
                        </td>

                        {{-- Paid At --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">
                                {{ $payment->paid_at->format('d/m/Y') }}
                            </div>
                            @if($payment->isRecent())
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                                    {{ __('payments.recent') }}
                                </span>
                            @endif
                        </td>

                        {{-- Reference --}}
                        <td class="px-6 py-4">
                            @if($payment->reference)
                                <div class="text-sm text-gray-900 dark:text-white font-mono">
                                    {{ $payment->reference }}
                                </div>
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                            @if($payment->notes)
                                <div class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-xs mt-1">
                                    {{ Str::limit($payment->notes, 50) }}
                                </div>
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('projects.show', [$payment->project, '#payments']) }}" 
                               class="inline-flex items-center px-3 py-1.5 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-lg text-xs font-medium hover:bg-emerald-200 dark:hover:bg-emerald-800/50 transition group">
                                <svg class="w-3.5 h-3.5 mr-1.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span>{{ __('payments.view_project') }}</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
        {{ $payments->links() }}
    </div>
</div>