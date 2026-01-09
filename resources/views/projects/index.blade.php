<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Header --}}
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    {{ __('projects.title') }}
                </h1>
                <a href="{{ route('projects.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    {{ __('projects.add_project') }}
                </a>
            </div>

            {{-- Success message --}}
            @if(session('success'))
                <x-alert type="success" :dismissible="true" class="mb-6">
                    {{ session('success') }}
                </x-alert>
            @endif

            {{-- Filters --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-6">
                <form method="GET" action="{{ route('projects.index') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        
                        {{-- Search --}}
                        <div>
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}"
                                placeholder="{{ __('projects.search_placeholder') }}"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            >
                        </div>

                        {{-- Filter by Status --}}
                        <div>
                            <select 
                                name="status"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            >
                                <option value="">{{ __('projects.all_statuses') }}</option>
                                <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>
                                    {{ __('projects.status_draft') }}
                                </option>
                                <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>
                                    {{ __('projects.status_in_progress') }}
                                </option>
                                <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>
                                    {{ __('projects.status_completed') }}
                                </option>
                                <option value="archived" {{ request('status') === 'archived' ? 'selected' : '' }}>
                                    {{ __('projects.status_archived') }}
                                </option>
                            </select>
                        </div>

                        {{-- Filter by Priority --}}
                        <div>
                            <select 
                                name="priority"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                            >
                                <option value="">{{ __('projects.all_priorities') }}</option>
                                <option value="low" {{ request('priority') === 'low' ? 'selected' : '' }}>
                                    {{ __('projects.priority_low') }}
                                </option>
                                <option value="medium" {{ request('priority') === 'medium' ? 'selected' : '' }}>
                                    {{ __('projects.priority_medium') }}
                                </option>
                                <option value="high" {{ request('priority') === 'high' ? 'selected' : '' }}>
                                    {{ __('projects.priority_high') }}
                                </option>
                            </select>
                        </div>

                        {{-- Submit button --}}
                        <div>
                            <button 
                                type="submit"
                                class="w-full px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition"
                            >
                                Filtra
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Projects Table --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                @if($projects->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('projects.table.name') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('projects.table.client') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('projects.table.status') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('projects.table.priority') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('projects.table.links') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('projects.table.created_at') }}
                                    </th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('projects.table.actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($projects as $project)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        
                                        {{-- Name --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $project->name }}
                                            </div>
                                            @if($project->description)
                                                <div class="text-sm text-gray-500 dark:text-gray-400 truncate max-w-xs">
                                                    {{ Str::limit($project->description, 50) }}
                                                </div>
                                            @endif
                                        </td>

                                        {{-- Client --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($project->client)
                                                <div class="text-sm text-gray-900 dark:text-white">
                                                    {{ $project->client->name }}
                                                </div>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                                    {{ __('projects.internal_project') }}
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Status --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $statusColors = [
                                                    'draft' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
                                                    'in_progress' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                                                    'completed' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
                                                    'archived' => 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400',
                                                ];
                                            @endphp
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$project->status] ?? '' }}">
                                                {{ __('projects.status_' . $project->status) }}
                                            </span>
                                        </td>

                                        {{-- Priority --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($project->priority)
                                                @php
                                                    $priorityColors = [
                                                        'low' => 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400',
                                                        'medium' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
                                                        'high' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
                                                    ];
                                                @endphp
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $priorityColors[$project->priority] ?? '' }}">
                                                    {{ __('projects.priority_' . $project->priority) }}
                                                </span>
                                            @else
                                                <span class="text-gray-400 dark:text-gray-600">-</span>
                                            @endif
                                        </td>

                                        {{-- Quick Links --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex space-x-2">
                                                @if($project->repo_url)
                                                    <a href="{{ $project->repo_url }}" target="_blank" 
                                                       class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                                       title="{{ __('projects.open_repo') }}">
                                                        🔗
                                                    </a>
                                                @endif
                                                @if($project->staging_url)
                                                    <a href="{{ $project->staging_url }}" target="_blank" 
                                                       class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                                       title="{{ __('projects.open_staging') }}">
                                                        🌐
                                                    </a>
                                                @endif
                                                @if($project->production_url)
                                                    <a href="{{ $project->production_url }}" target="_blank" 
                                                       class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                                       title="{{ __('projects.open_production') }}">
                                                        ✅
                                                    </a>
                                                @endif
                                                @if($project->figma_url)
                                                    <a href="{{ $project->figma_url }}" target="_blank" 
                                                       class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                                       title="{{ __('projects.open_figma') }}">
                                                        📐
                                                    </a>
                                                @endif
                                                @if($project->docs_url)
                                                    <a href="{{ $project->docs_url }}" target="_blank" 
                                                       class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                                       title="{{ __('projects.open_docs') }}">
                                                        📚
                                                    </a>
                                                @endif
                                                @if(!$project->repo_url && !$project->staging_url && !$project->production_url && !$project->figma_url && !$project->docs_url)
                                                    <span class="text-gray-400 dark:text-gray-600">-</span>
                                                @endif
                                            </div>
                                        </td>

                                        {{-- Created At --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ $project->created_at->format('d/m/Y') }}
                                        </td>

                                    {{-- Actions --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end gap-3">
                                            <a href="{{ route('projects.show', $project) }}" 
                                            class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                                {{ __('projects.details') }}
                                            </a>
                                            <a href="{{ route('projects.edit', $project) }}" 
                                            class="text-emerald-600 hover:text-emerald-900 dark:text-emerald-400 dark:hover:text-emerald-300">
                                                {{ __('projects.edit') }}
                                            </a>
                                            <form action="{{ route('projects.destroy', $project) }}" 
                                                method="POST" 
                                                class="inline"
                                                onsubmit="return confirm('{{ __('projects.confirm_delete') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                    {{ __('projects.delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                        {{ $projects->links() }}
                    </div>

                @else
                    {{-- Empty State --}}
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('projects.no_projects') }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            {{ __('projects.no_projects_description') }}
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('projects.create') }}" 
                               class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                {{ __('projects.create_first_project') }}
                            </a>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>