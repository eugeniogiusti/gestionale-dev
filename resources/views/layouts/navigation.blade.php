{{-- NAVIGATION BAR (TOPBAR) --}}
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center gap-4">

            {{-- Logo / Brand --}}
            <div class="shrink-0 flex items-center">
                {{-- Vuoto per ora --}}
            </div>

            {{-- Project Search --}}
            @include('layouts.navigation._project-search')

            {{-- User Menu Desktop --}}
            @include('layouts.navigation._user-menu')

            {{-- Mobile Hamburger --}}
            @include('layouts.navigation._mobile-hamburger')

        </div>
    </div>

    {{-- Mobile Menu --}}
    @include('layouts.navigation._mobile-menu')
</nav>
{{-- END NAVIGATION BAR --}}