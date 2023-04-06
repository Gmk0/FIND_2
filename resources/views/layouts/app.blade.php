<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'dark': dark }" x-data="data()">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
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
   <script src="/build/assets/app.bc6ec2bd.js" defer>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    </script>
    </body>

</html>