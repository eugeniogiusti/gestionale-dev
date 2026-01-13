{{-- MOBILE MENU --}}
<div x-cloak x-show="open" x-transition class="sm:hidden">
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        
        {{-- User Info --}}
        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                {{ Auth::user()->name }}
            </div>
            <div class="font-medium text-sm text-gray-500">
                {{ Auth::user()->email }}
            </div>
        </div>

        {{-- Menu Items --}}
        <div class="mt-3 space-y-1">
            
            {{-- Toggle Theme --}}
            <button
                type="button"
                onclick="toggleTheme()"
                class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-900 transition"
                title="{{ __('ui.theme') }}"
                aria-label="{{ __('ui.theme') }}"
            >
                🌓 {{ __('ui.theme') }}
            </button>

            {{-- Profile --}}
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('navbar.profile') }}
            </x-responsive-nav-link>

            {{-- Logout --}}
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