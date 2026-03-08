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

        <button
            type="button"
            @click="activeTab = 'integrations'; window.location.hash = 'integrations'"
            :class="activeTab === 'integrations'
                ? 'border-emerald-500 text-emerald-600 dark:text-emerald-400'
                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300'"
            class="px-6 py-4 border-b-2 font-medium text-sm transition whitespace-nowrap">
            🔗 {{ __('business_settings.integrations') }}
        </button>
    </nav>
</div>