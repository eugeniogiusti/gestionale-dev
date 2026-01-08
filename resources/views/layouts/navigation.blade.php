{{-- NAVIGATION BAR (TOPBAR) --}}
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            {{-- LOGO / BRAND   --}}
            <div class="shrink-0 flex items-center">
                
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


                    {{-- Dropdown language --}}
                    <x-dropdown align="right" width="32">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md
                                    text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800
                                    hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition">
                                🌐 <span class="ms-2 uppercase">{{ app()->getLocale() }}</span>
                                <svg class="h-4 w-4 ms-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            {{-- languages availables --}}
                            <x-dropdown-link :href="route('locale.switch', 'it')">
                                🇮🇹 Italiano
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('locale.switch', 'en')">
                                🇬🇧 English
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

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