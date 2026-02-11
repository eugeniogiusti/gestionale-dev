{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('images/logo.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/critical.css') }}">

    <!-- Theme (no flash) -->
    <meta name="color-scheme" content="dark light">

    <script src="{{ asset('js/boot.js') }}"></script>

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
