{{-- resources/views/clients/show/_header.blade.php --}}

<div class="sticky top-0 z-10 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 -mx-6 px-6 py-4 mb-6">
    <div class="flex items-start justify-between gap-6">

        {{-- LEFT: Back + Title + Meta --}}
        <div class="flex items-start gap-4 min-w-0">

            {{-- Back --}}
            <a href="{{ route('clients.index') }}"
               class="mt-1 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition shrink-0"
               aria-label="{{ __('clients.back_to_list') }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>

            {{-- Title + meta --}}
            <div class="min-w-0">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white truncate">
                    {{ $client->name }}
                </h1>

                {{-- META ROW --}}
                <div class="mt-2 flex flex-wrap items-center gap-x-6 gap-y-2">

                    {{-- Status --}}
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            {{ __('clients.status') }}:
                        </span>
                        <x-client-status-badge :status="$client->status" />
                    </div>

                    {{-- Projects count --}}
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            {{ __('projects.title') }}:
                        </span>
                        <span class="text-sm text-gray-700 dark:text-gray-300">
                            {{ $client->projects->count() }}
                        </span>
                    </div>

                    {{-- Created at --}}
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            {{ __('clients.table.created_at') }}:
                        </span>
                        <span class="text-sm text-gray-700 dark:text-gray-300">
                            {{ $client->created_at->format('d/m/Y') }}
                        </span>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
