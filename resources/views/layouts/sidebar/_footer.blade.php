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