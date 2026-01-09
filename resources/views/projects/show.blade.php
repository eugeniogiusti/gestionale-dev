<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Header with Quick Links --}}
            <div class="mb-6">
                <a href="{{ route('projects.index') }}" 
                   class="inline-flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    {{ __('projects.back_to_list') }}
                </a>
                
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                            {{ $project->name }}
                        </h1>
                        
                        {{-- Status Badge --}}
                        @php
                            $statusColors = [
                                'draft' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
                                'in_progress' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                                'completed' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
                                'archived' => 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400',
                            ];
                        @endphp
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusColors[$project->status] ?? '' }}">
                            {{ __('projects.status_' . $project->status) }}
                        </span>

                        {{-- Priority Badge --}}
                        @if($project->priority)
                            @php
                                $priorityColors = [
                                    'low' => 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400',
                                    'medium' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
                                    'high' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
                                ];
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $priorityColors[$project->priority] ?? '' }}">
                                {{ __('projects.priority_' . $project->priority) }}
                            </span>
                        @endif
                    </div>

                    {{-- Quick Links --}}
                    <div class="flex items-center gap-3">
                        @if($project->repo_url)
                            <a href="{{ $project->repo_url }}" target="_blank" 
                               class="inline-flex items-center px-3 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg transition"
                               title="{{ __('projects.open_repo') }}">
                                🔗 Repo
                            </a>
                        @endif
                        @if($project->staging_url)
                            <a href="{{ $project->staging_url }}" target="_blank" 
                               class="inline-flex items-center px-3 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg transition"
                               title="{{ __('projects.open_staging') }}">
                                🌐 Staging
                            </a>
                        @endif
                        @if($project->production_url)
                            <a href="{{ $project->production_url }}" target="_blank" 
                               class="inline-flex items-center px-3 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg transition"
                               title="{{ __('projects.open_production') }}">
                                ✅ Prod
                            </a>
                        @endif
                        @if($project->figma_url)
                            <a href="{{ $project->figma_url }}" target="_blank" 
                               class="inline-flex items-center px-3 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg transition"
                               title="{{ __('projects.open_figma') }}">
                                📐 Figma
                            </a>
                        @endif
                        @if($project->docs_url)
                            <a href="{{ $project->docs_url }}" target="_blank" 
                               class="inline-flex items-center px-3 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg transition"
                               title="{{ __('projects.open_docs') }}">
                                📚 Docs
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Main Content --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                {{-- Left Column: Project Info --}}
                <div class="lg:col-span-1 space-y-6">
                    
                    {{-- Client Info --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            {{ __('projects.client') }}
                        </h2>
                        
                        @if($project->client)
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $project->client->name }}
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $project->client->email }}
                                </p>
                                @if($project->client->phone)
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                        {{ $project->client->phone_prefix }} {{ $project->client->phone }}
                                    </p>
                                @endif
                            </div>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                {{ __('projects.internal_project') }}
                            </span>
                        @endif
                    </div>

                    {{-- Project Details --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            Dettagli
                        </h2>
                        
                        <dl class="space-y-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Stato</dt>
                                <dd class="mt-1">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$project->status] ?? '' }}">
                                        {{ __('projects.status_' . $project->status) }}
                                    </span>
                                </dd>
                            </div>

                            @if($project->priority)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Priorità</dt>
                                    <dd class="mt-1">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $priorityColors[$project->priority] ?? '' }}">
                                            {{ __('projects.priority_' . $project->priority) }}
                                        </span>
                                    </dd>
                                </div>
                            @endif

                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Creato il</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                    {{ $project->created_at->format('d/m/Y H:i') }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Ultimo aggiornamento</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                    {{ $project->updated_at->format('d/m/Y H:i') }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                {{-- Right Column: Description & Notes & Future Sections --}}
                <div class="lg:col-span-2 space-y-6">
                    
                    {{-- Description --}}
                    @if($project->description)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                {{ __('projects.description') }}
                            </h2>
                            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap">
                                {{ $project->description }}
                            </p>
                        </div>
                    @endif

                    {{-- Notes --}}
                    @if($project->notes)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                {{ __('projects.notes') }}
                            </h2>
                            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap">
                                {{ $project->notes }}
                            </p>
                        </div>
                    @endif

                    {{-- Placeholder for future sections --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border-2 border-dashed border-gray-300 dark:border-gray-600">
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tasks, Pagamenti e Documenti
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Verranno visualizzati qui quando collegheremo i moduli
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Actions Footer --}}
            <div class="mt-6 flex justify-between">
                <form action="{{ route('projects.destroy', $project) }}" 
                      method="POST" 
                      onsubmit="return confirm('{{ __('projects.confirm_delete') }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition">
                        {{ __('projects.delete') }}
                    </button>
                </form>

                <a href="{{ route('projects.edit', $project) }}" 
                   class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition">
                    {{ __('projects.edit') }}
                </a>
            </div>

        </div>
    </div>
</x-app-layout>