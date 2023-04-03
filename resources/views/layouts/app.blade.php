<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'dark': dark }" x-data="data()">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <script src="/js/alpine-init.js">
        <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
   
    @vite(['resources/css/app.css'])
    @livewireStyles
    
</head>

<body class="antialiased">
    <div class="min-h-screen custom-scrollbar">
        @livewire('user.navigation.navigation-two')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main class="">
            {{ $slot }}
        </main>
    </div>

    @livewire('notifications')


    @wireUiScripts
    @livewireScripts
    @stack('scripts')
    <script src="/build/assets/app.js" defer>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    </script>
    </body>

</html>