{{-- NAVIGATION BAR (TOPBAR) --}}
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center gap-4">

    {{-- LOGO / BRAND   --}}
    <div class="shrink-0 flex items-center">
        
    </div>

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
            <div x-show="isSearching" class="absolute right-3 top-2.5">
                <svg class="animate-spin h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>

            {{-- Dropdown Results --}}
            <div 
                x-show="showDropdown"
                x-transition
                class="absolute z-50 w-full mt-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-xl max-h-96 overflow-auto"
            >
                @include('layouts.partials._project-search-results')
            </div>
        </div>
    </div>
          

            {{-- On the right: Toggle Tema + Menu User --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-3">

                {{-- Toggle Dark/Light (richiede window.toggleTheme in resources/js/theme.js) --}}
                <button
                    type="button"
                    onclick="toggleTheme()"
                    class="p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition"
                    title="{{ __('ui.theme') }}"
                    aria-label="{{ __('ui.theme') }}"
                >🌓</button>

                {{-- Dropdown user (Breeze) --}}
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md
                                   text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800
                                   hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('navbar.profile') }}
                        </x-dropdown-link>

                        {{-- Logout --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('navbar.logout') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- HAMBURGER (mobile) --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md
                               text-gray-400 dark:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-900 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- MENU RESPONSIVE (mobile) --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                {{-- Toggle theme even on mobile --}}
                <button
                    type="button"
                    onclick="toggleTheme()"
                    class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-900 transition"
                    title="{{ __('ui.theme') }}"
                    aria-label="{{ __('ui.theme') }}"
                >🌓 {{ __('ui.theme') }}</button>

                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('navbar.profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('navbar.logout') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>