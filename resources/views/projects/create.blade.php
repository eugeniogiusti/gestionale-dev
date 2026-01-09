<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Header --}}
            <div class="mb-6">
                <a href="{{ route('projects.index') }}" 
                   class="inline-flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    {{ __('projects.back_to_list') }}
                </a>
                
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    {{ __('projects.create_project') }}
                </h1>
            </div>

            {{-- Form --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                <form method="POST" action="{{ route('projects.store') }}" 
                      x-data="{ 
                          activeTab: 'info',
                          errors: {{ json_encode($errors->messages()) }},
                          hasErrors(tab) {
                              const tabFields = {
                                  'info': ['name', 'client_id', 'description', 'status', 'priority'],
                                  'links': ['repo_url', 'staging_url', 'production_url', 'figma_url', 'docs_url'],
                                  'notes': ['notes']
                              };
                              return tabFields[tab]?.some(field => this.errors[field]);
                          }
                      }">
                    @csrf

                    {{-- Tab Navigation --}}
                    <div class="border-b border-gray-200 dark:border-gray-700">
                        <nav class="flex -mb-px">
                            <button 
                                type="button"
                                @click="activeTab = 'info'"
                                :class="activeTab === 'info' 
                                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                                class="relative w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm transition">
                                {{ __('projects.tab_info') }}
                                <span x-show="hasErrors('info')" class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>
                            
                            <button 
                                type="button"
                                @click="activeTab = 'links'"
                                :class="activeTab === 'links' 
                                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                                class="relative w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm transition">
                                {{ __('projects.tab_links') }}
                                <span x-show="hasErrors('links')" class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>
                            
                            <button 
                                type="button"
                                @click="activeTab = 'notes'"
                                :class="activeTab === 'notes' 
                                    ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                                class="relative w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm transition">
                                {{ __('projects.tab_notes') }}
                                <span x-show="hasErrors('notes')" class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>
                        </nav>
                    </div>

                    {{-- Tab Content --}}
                    <div class="p-6">
                        @include('projects._form')
                    </div>

                    {{-- Form Actions --}}
                    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900 rounded-b-lg flex justify-between">
                        <a href="{{ route('projects.index') }}" 
                           class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">
                            {{ __('projects.cancel') }}
                        </a>
                        
                        <x-button type="submit" variant="primary">
                            {{ __('projects.save') }}
                        </x-button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>