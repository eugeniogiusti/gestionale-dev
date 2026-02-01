{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Critical CSS (no flash) - MUST be before any scripts -->
    <style>
        /* Hide Alpine elements until ready */
        [x-cloak] { display: none !important; }

        /* Sidebar critical styles - prevents FOUC */
        .sidebar-element {
            width: 16rem; /* w-64 default */
            transition: none !important;
        }
        .sidebar-collapsed .sidebar-element {
            width: 4rem; /* w-16 collapsed */
        }
        .sidebar-ready .sidebar-element {
            transition: width 300ms ease-in-out !important;
        }

        /* Hide sidebar text labels when collapsed - pure CSS, no Alpine flash */
        .sidebar-collapsed .sidebar-label {
            display: none !important;
        }

        /* Icon margin - default has margin, collapsed has none */
        .sidebar-icon {
            margin-right: 0.75rem; /* mr-3 */
            flex-shrink: 0;
        }
        .sidebar-collapsed .sidebar-icon {
            margin-right: 0 !important;
        }

        /* Hide elements that should only show when expanded */
        .sidebar-collapsed .sidebar-expanded-only {
            display: none !important;
        }

        /* Center nav links when collapsed */
        .sidebar-collapsed .sidebar-nav-link {
            justify-content: center;
        }
    </style>

    <!-- Theme (no flash) -->
    <meta name="color-scheme" content="dark light">
    <script>
      const useDark = localStorage.theme === 'dark'
        || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
      if (useDark) document.documentElement.classList.add('dark');
    </script>

    <!-- Sidebar state (no flash) -->
    <script>
    if (localStorage.getItem('sidebar-collapsed') === 'true') {
        document.documentElement.classList.add('sidebar-collapsed');
    }
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <!-- Global toast container  -->
        <x-ui.toast-container />
    @include('layouts._flash-messages')

         <!-- Main layout -->
    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- On the right --}}
        <div class="flex-1 flex flex-col min-w-0">
            {{-- Breeze Navabar --}}
            @include('layouts.navigation')

            {{-- page content --}}
            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
        
        {{-- Footer --}}
        @include('layouts.footer')

</body>
</html>