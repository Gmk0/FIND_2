<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'dark': dark }" x-data="data()">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>

    <script src="/js/alpine-init.js">

    </script>
    <title>{{ config('app.name') }}</title>
    {{--
    <link rel="stylesheet" href="/build/assets/app.css">--}}

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts

    @vite(['resources/css/app.css'])
    @livewireStyles

</head>

<body
    class="flex flex-col justify-between overflow-x-hidden overflow-y-hidden bg-gray-100 custom-scrollbar dark:bg-gray-900"
    x-data="{navOpen: false,notificationActive: false,isAside:true, isLoading:true, scrolledFromTop: false}" :class="{
            'overflow-hidden': navOpen,
            'overflow-scroll': !navOpen
           
        }">


    <div class="flex h-screen overflow-x-hidden bg-gray-100 dark:bg-gray-900 custom-scrollbar"
        :class="{ 'overflow-hidden': isSideMenuOpen}">

        <x-asideUser />

        <div class="flex flex-col flex-1">
            <x-headerUser />

            <main class="h-full pb-16 overflow-y-auto">

                @yield('content')

            </main>

        </div>




    </div>









    @stack('modals')


    @livewireScripts
    @livewire('notifications')

    @stack('script')

    <script src="/build/assets/app.js" defer>
    </script>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="/js/intlTelInput.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>