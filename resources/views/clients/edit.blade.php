{{-- resources/views/clients/edit.blade.php --}}
<x-app-layout>
    <div class="max-w-4xl mx-auto space-y-6">
        
        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __('clients.edit_client') }}
                </h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ $client->name }}
                </p>
            </div>
            
            <a href="{{ route('clients.index') }}">
                <x-button variant="secondary">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    {{ __('clients.cancel') }}
                </x-button>
            </a>
        </div>

        {{-- Form Card with Tabs --}}
        <div 
            x-data="{ 
                activeTab: 'basic',
                errors: {{ json_encode($errors->messages()) }},
                hasErrors(tab) {
                    const errorFields = {
                        'basic': ['name', 'email', 'status', 'vat_number', 'phone', 'phone_prefix'],
                        'billing': ['billing_address', 'billing_city', 'billing_zip', 'billing_province', 'billing_country', 'billing_recipient_code', 'pec'],
                        'web': ['website', 'linkedin', 'notes']
                    };
                    return errorFields[tab]?.some(field => this.errors[field]) || false;
                }
            }"
            class="bg-white dark:bg-gray-800 rounded-lg shadow"
        >
            {{-- Tab Navigation (Same as create) --}}
            <div class="border-b border-gray-200 dark:border-gray-700">
                <nav class="flex -mb-px">
                    <button 
                        @click="activeTab = 'basic'"
                        :class="activeTab === 'basic' ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                        class="group inline-flex items-center py-4 px-6 border-b-2 font-medium text-sm transition relative"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ __('clients.contact_info') }}
                        
                        <span 
                            x-show="hasErrors('basic')"
                            class="ml-2 bg-red-500 text-white text-xs rounded-full w-2 h-2 flex items-center justify-center"
                        ></span>
                    </button>

                    <button 
                        @click="activeTab = 'billing'"
                        :class="activeTab === 'billing' ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                        class="group inline-flex items-center py-4 px-6 border-b-2 font-medium text-sm transition relative"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        {{ __('clients.billing_info') }}
                        
                        <span 
                            x-show="hasErrors('billing')"
                            class="ml-2 bg-red-500 text-white text-xs rounded-full w-2 h-2 flex items-center justify-center"
                        ></span>
                    </button>

                    <button 
                        @click="activeTab = 'web'"
                        :class="activeTab === 'web' ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
                        class="group inline-flex items-center py-4 px-6 border-b-2 font-medium text-sm transition relative"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                        </svg>
                        {{ __('clients.web_social') }}
                        
                        <span 
                            x-show="hasErrors('web')"
                            class="ml-2 bg-red-500 text-white text-xs rounded-full w-2 h-2 flex items-center justify-center"
                        ></span>
                    </button>
                </nav>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('clients.update', $client) }}" class="p-6">
                @csrf
                @method('PUT')
                
                @include('clients._form')

                {{-- Form Actions --}}
                <div class="flex justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('clients.index') }}">
                        <x-button type="button" variant="secondary">
                            {{ __('clients.cancel') }}
                        </x-button>
                    </a>
                    <x-button type="submit" variant="primary">
                        {{ __('clients.save') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>