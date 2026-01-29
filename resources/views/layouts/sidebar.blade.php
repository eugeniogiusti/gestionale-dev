<aside 
    x-data="{ 
        collapsed: localStorage.getItem('sidebar-collapsed') === 'true' 
    }"
    x-init="
        $nextTick(() => document.documentElement.classList.add('sidebar-ready'));
        $watch('collapsed', value => {
            localStorage.setItem('sidebar-collapsed', value);
            document.documentElement.classList.toggle('sidebar-collapsed', value);
        })
    "
    :class="collapsed ? 'w-16' : 'w-64'"
    class="sidebar-element min-h-screen bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col"
>
    
    {{-- Brand + Toggle --}}
    @include('layouts.sidebar._brand')

    {{-- Navigation --}}
    <nav class="flex-1 px-3 py-4 space-y-1">
        
        {{-- Main Navigation --}}
        @include('layouts.sidebar._nav-main')
        
        {{-- Divider --}}
        <div
        class="my-3 border-t border-gray-200 dark:border-gray-600"
        x-show="!collapsed"
        x-cloak
        ></div>
        
        {{-- Settings Navigation --}}
        @include('layouts.sidebar._nav-settings')
        
    </nav>

    {{-- Footer --}}
    @include('layouts.sidebar._footer')
    
</aside>