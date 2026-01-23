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