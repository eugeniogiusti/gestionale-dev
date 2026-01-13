<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- Header --}}
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    {{ __('business_settings.title') }}
                </h1>
            </div>
            <p class="text-gray-600 dark:text-gray-400">
                {{ __('business_settings.description') }}
            </p>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('settings.business.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700" 
                 x-data="{ activeTab: 'personal' }"
                 x-init="
                     const hash = window.location.hash.substring(1);
                     if (hash) activeTab = hash;
                 ">
                
                {{-- Tabs Navigation --}}
                <div class="border-b border-gray-200 dark:border-gray-700">
                    <nav class="flex -mb-px overflow-x-auto">
                        <button 
                            type="button"
                            @click="activeTab = 'personal'; window.location.hash = 'personal'"
                            :class="activeTab === 'personal' 
                                ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                            class="px-6 py-4 border-b-2 font-medium text-sm transition whitespace-nowrap">
                            👤 {{ __('business_settings.personal_info') }}
                        </button>
                        
                        <button 
                            type="button"
                            @click="activeTab = 'legal'; window.location.hash = 'legal'"
                            :class="activeTab === 'legal' 
                                ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                            class="px-6 py-4 border-b-2 font-medium text-sm transition whitespace-nowrap">
                            📍 {{ __('business_settings.legal_address') }}
                        </button>
                        
                        <button 
                            type="button"
                            @click="activeTab = 'tax'; window.location.hash = 'tax'"
                            :class="activeTab === 'tax' 
                                ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                            class="px-6 py-4 border-b-2 font-medium text-sm transition whitespace-nowrap">
                            🧾 {{ __('business_settings.tax_info') }}
                        </button>
                        
                        <button 
                            type="button"
                            @click="activeTab = 'contacts'; window.location.hash = 'contacts'"
                            :class="activeTab === 'contacts' 
                                ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                            class="px-6 py-4 border-b-2 font-medium text-sm transition whitespace-nowrap">
                            📧 {{ __('business_settings.contacts') }}
                        </button>
                        
                        <button 
                            type="button"
                            @click="activeTab = 'business'; window.location.hash = 'business'"
                            :class="activeTab === 'business' 
                                ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' 
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                            class="px-6 py-4 border-b-2 font-medium text-sm transition whitespace-nowrap">
                            🏢 {{ __('business_settings.business_info') }}
                        </button>
                    </nav>
                </div>

                {{-- Tab Content --}}
                <div class="p-6">
                    
                    {{-- TAB: Personal Info --}}
                    <div x-show="activeTab === 'personal'" x-cloak>
                        @include('settings.business._personal-info')
                    </div>

                    {{-- TAB: Legal Address --}}
                    <div x-show="activeTab === 'legal'" x-cloak>
                        @include('settings.business._legal-address')
                    </div>

                    {{-- TAB: Tax Info --}}
                    <div x-show="activeTab === 'tax'" x-cloak>
                        @include('settings.business._tax-info')
                    </div>

                    {{-- TAB: Contacts --}}
                    <div x-show="activeTab === 'contacts'" x-cloak>
                        @include('settings.business._contacts')
                    </div>

                    {{-- TAB: Business Info --}}
                    <div x-show="activeTab === 'business'" x-cloak>
                        @include('settings.business._business-info')
                    </div>

                </div>

                {{-- Actions (sempre visibili sotto i tab) --}}
                <div class="border-t border-gray-200 dark:border-gray-700 px-6 py-4 bg-gray-50 dark:bg-gray-900/50">
                    <div class="flex justify-end gap-3">
                        
                        <button type="submit"
                                class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                            {{ __('business_settings.save') }}
                        </button>
                    </div>
                </div>

            </div>
        </form>

        {{-- Hidden form for delete logo --}}
        <form id="delete-logo-form" 
              method="POST" 
              action="{{ route('settings.business.delete-logo') }}" 
              class="hidden">
            @csrf
            @method('DELETE')
        </form>

    </div>
</x-app-layout>