{{-- PROJECT SEARCH DROPDOWN --}}
<div class="flex-1 max-w-2xl hidden md:block" x-data="projectSearch">
    <div class="relative">
        {{-- Input --}}
        <input 
            type="text" 
            x-model="query"
            @input.debounce.300ms="performSearch()"
            @focus="openDropdownIfHasResults()"
            @click.away="closeDropdown()"
            placeholder="{{ __('navbar.search_placeholder') }}"
            class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
        >
        
        {{-- Search Icon --}}
        <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>

        {{-- Loading Spinner --}}
        <div x-show="isSearching" x-cloak class="absolute right-3 top-2.5">
            <svg class="animate-spin h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>

        {{-- Dropdown Results --}}
        <div 
            x-show="showDropdown"
            x-cloak
            x-transition
            class="absolute z-50 w-full mt-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-xl max-h-96 overflow-auto"
        >
            @include('layouts.navigation._project-search-results')
        </div>
    </div>
</div>