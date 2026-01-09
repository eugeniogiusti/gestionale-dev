{{-- resources/views/layouts/sidebar.blade.php --}}
<aside 
    x-data="{ 
        collapsed: localStorage.getItem('sidebar-collapsed') === 'true' 
    }"
    x-init="$watch('collapsed', value => localStorage.setItem('sidebar-collapsed', value))"
    :class="collapsed ? 'w-16' : 'w-64'"
    class="min-h-screen bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col transition-all duration-300"
>
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

    {{-- NAV --}}
    <nav class="flex-1 px-3 py-4 space-y-1">
        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
           class="flex items-center px-3 py-2 rounded-md text-sm font-medium
                  text-gray-700 dark:text-gray-300
                  hover:bg-gray-100 dark:hover:bg-gray-700
                  {{ request()->routeIs('dashboard') ? 'bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white' : '' }}
                  transition"
           :title="collapsed ? '{{ __('navbar.dashboard') }}' : ''"
        >
            <svg class="w-5 h-5" :class="collapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span x-show="!collapsed">{{ __('navbar.dashboard') }}</span>
        </a>

        {{-- Clients --}}
        <a href="{{ route('clients.index') }}"
           class="flex items-center px-3 py-2 rounded-md text-sm font-medium
                  text-gray-700 dark:text-gray-300
                  hover:bg-gray-100 dark:hover:bg-gray-700
                  {{ request()->routeIs('clients.*') ? 'bg-gray-200 text-gray-900 dark:bg-gray-700 dark:text-white' : '' }}
                  transition"
           :title="collapsed ? '{{ __('clients.title') }}' : ''"
        >
            <svg class="w-5 h-5" :class="collapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span x-show="!collapsed">{{ __('clients.title') }}</span>
        </a>
    </nav>

    {{-- FOOTER - Logout --}}
    <div class="p-4 border-t border-gray-200 dark:border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button 
                class="flex items-center w-full px-3 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-md transition"
                :title="collapsed ? '{{ __('navbar.logout') }}' : ''"
            >
                <svg class="w-5 h-5" :class="collapsed ? '' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span x-show="!collapsed">{{ __('navbar.logout') }}</span>
            </button>
        </form>
    </div>
</aside>