{{-- BRAND + Toggle --}}
<div class="h-16 flex items-center justify-between px-4 border-b border-gray-200 dark:border-gray-700">
    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2" x-show="!collapsed">
        <x-application-logo class="h-8 w-auto fill-current text-gray-800 dark:text-gray-200" />
        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">Gest</span>
    </a>
    
    <button 
        @click="collapsed = !collapsed"
        class="p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition"
        :title="collapsed ? 'Expand sidebar' : 'Collapse sidebar'"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  :d="collapsed ? 'M13 5l7 7-7 7M5 5l7 7-7 7' : 'M11 19l-7-7 7-7m8 14l-7-7 7-7'" />
        </svg>
    </button>
</div>