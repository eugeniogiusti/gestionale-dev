@if($project->client_id)
    {{-- Cliente associato --}}
    <div class="space-y-6">
        
        {{-- Header Cliente --}}
        <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 dark:from-indigo-900/20 dark:to-indigo-800/20 rounded-lg p-6 border border-indigo-200 dark:border-indigo-800">
            <div class="flex items-center gap-3 mb-4">
                <span class="text-3xl">👤</span>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        {{ $project->client->name }}
                    </h3>
                    @if($project->client->company)
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{ $project->client->company }}
                        </p>
                    @endif
                </div>
            </div>
            
            {{-- Quick Actions --}}
            <div class="flex gap-2 mt-4">
                <a href="{{ route('clients.show', $project->client) }}" 
                   class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-gray-800 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700">
                    <span>👁️</span>
                    {{ __('clients.view_profile') }}
                </a>
                @if($project->client->email)
                    <a href="mailto:{{ $project->client->email }}" 
                       class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-gray-800 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700">
                        <span>📧</span>
                        {{ __('clients.send_email') }}
                    </a>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            {{-- Contatti --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <span>📞</span>
                    {{ __('clients.contact_info') }}
                </h4>
                
                <div class="space-y-3">
                    @if($project->client->email)
                        <div class="flex items-start gap-3">
                            <span class="text-xl mt-0.5">📧</span>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Email</p>
                                <a href="mailto:{{ $project->client->email }}" 
                                   class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline break-all">
                                    {{ $project->client->email }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($project->client->phone)
                        <div class="flex items-start gap-3">
                            <span class="text-xl mt-0.5">📱</span>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">{{ __('clients.phone') }}</p>
                                <a href="tel:{{ $project->client->phone }}" 
                                   class="text-sm font-medium text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400">
                                    {{ $project->client->phone }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if($project->client->address)
                        <div class="flex items-start gap-3">
                            <span class="text-xl mt-0.5">📍</span>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">{{ __('clients.address') }}</p>
                                <p class="text-sm text-gray-900 dark:text-white">
                                    {{ $project->client->address }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if(!$project->client->email && !$project->client->phone && !$project->client->address)
                        <p class="text-sm text-gray-500 dark:text-gray-400 italic">
                            {{ __('clients.no_contact_info') }}
                        </p>
                    @endif
                </div>
            </div>

            {{-- Dati Fatturazione --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <span>🧾</span>
                    {{ __('clients.billing_info') }}
                </h4>
                
                <div class="space-y-3">
                    @if($project->client->vat_number)
                        <div class="flex items-start gap-3">
                            <span class="text-xl mt-0.5">🏢</span>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">{{ __('clients.vat_number') }}</p>
                                <p class="text-sm font-mono font-medium text-gray-900 dark:text-white">
                                    {{ $project->client->vat_number }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if($project->client->fiscal_code)
                        <div class="flex items-start gap-3">
                            <span class="text-xl mt-0.5">🆔</span>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">{{ __('clients.fiscal_code') }}</p>
                                <p class="text-sm font-mono font-medium text-gray-900 dark:text-white">
                                    {{ $project->client->fiscal_code }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if($project->client->sdi_code)
                        <div class="flex items-start gap-3">
                            <span class="text-xl mt-0.5">💼</span>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">{{ __('clients.sdi_code') }}</p>
                                <p class="text-sm font-mono font-medium text-gray-900 dark:text-white">
                                    {{ $project->client->sdi_code }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if($project->client->pec)
                        <div class="flex items-start gap-3">
                            <span class="text-xl mt-0.5">📨</span>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">PEC</p>
                                <a href="mailto:{{ $project->client->pec }}" 
                                   class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline break-all">
                                    {{ $project->client->pec }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if(!$project->client->vat_number && !$project->client->fiscal_code && !$project->client->sdi_code && !$project->client->pec)
                        <p class="text-sm text-gray-500 dark:text-gray-400 italic">
                            {{ __('clients.no_billing_info') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>

        {{-- Web & Social --}}
<div class="bg-white dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
    <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
        <span>🌐</span>
        {{ __('clients.web_social') }}
    </h4>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @if($project->client->website)
            <a href="{{ $project->client->website }}" 
               target="_blank"
               class="flex items-center gap-3 p-4 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg border border-blue-200 dark:border-blue-800 hover:shadow-md transition">
                <span class="text-2xl">🌐</span>
                <div class="flex-1 min-w-0">
                    <p class="text-xs text-blue-700 dark:text-blue-300 uppercase tracking-wide">Website</p>
                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                        {{ parse_url($project->client->website, PHP_URL_HOST) ?: $project->client->website }}
                    </p>
                </div>
                <span class="text-gray-400">↗️</span>
            </a>
        @endif

        @if($project->client->linkedin)
            <a href="{{ $project->client->linkedin }}" 
               target="_blank"
               class="flex items-center gap-3 p-4 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg border border-blue-200 dark:border-blue-800 hover:shadow-md transition">
                <span class="text-2xl">💼</span>
                <div class="flex-1 min-w-0">
                    <p class="text-xs text-blue-700 dark:text-blue-300 uppercase tracking-wide">LinkedIn</p>
                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                        {{ __('clients.view_profile') }}
                    </p>
                </div>
                <span class="text-gray-400">↗️</span>
            </a>
        @endif
    </div>

    @if(!$project->client->website && !$project->client->linkedin)
        <p class="text-sm text-gray-500 dark:text-gray-400 italic">
            {{ __('clients.no_web_social') }}
        </p>
    @endif
</div>

    </div>

@else
    {{-- Progetto Interno --}}
    <div class="flex items-center justify-center py-16">
        <div class="text-center max-w-md">
            <span class="text-6xl mb-4 block">💼</span>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                {{ __('projects.internal_project') }}
            </h3>
            <p class="text-gray-600 dark:text-gray-400">
                {{ __('projects.internal_project_desc') }}
            </p>
        </div>
    </div>
@endif