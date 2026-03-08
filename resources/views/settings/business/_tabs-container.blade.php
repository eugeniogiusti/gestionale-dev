<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700" 
     x-data="{ activeTab: '{{ request()->query('tab', 'personal') }}' }">
    
    {{-- Hidden input per passare il tab attivo al submit --}}
    <input type="hidden" name="_active_tab" :value="activeTab">
    
    {{-- Tabs Navigation --}}
    @include('settings.business._tabs-navigation')
    
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

        {{-- TAB: Integrations --}}
        <div x-show="activeTab === 'integrations'" x-cloak>
            @include('settings.business._integrations')
        </div>
    </div>

    {{-- Actions --}}
    @include('settings.business._actions')
</div>