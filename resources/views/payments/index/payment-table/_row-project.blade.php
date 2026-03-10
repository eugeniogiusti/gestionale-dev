{{-- Project Cell --}}
<td class="px-6 py-4 whitespace-nowrap">
    <a href="{{ route('projects.show', [$payment->project, 'tab' => 'payments']) }}"
       class="text-sm font-medium text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400">
        {{ $payment->project->name }}
    </a>
    @if($payment->project->client)
        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
            {{ $payment->project->client->name }}
        </div>
    @endif
    <div class="mt-1">
        <x-projects.type-badge :type="$payment->project->type" />
    </div>
</td>
