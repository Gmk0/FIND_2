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

    <link rel="stylesheet" href="/build/assets/app.css">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts

    {{-- @vite(['resources/css/app.css'])--}}
    @livewireStyles

</head>

<body class="flex flex-col justify-between overflow-x-hidden bg-gray-50 custom-scrollbar dark:bg-gray-900"
    x-data="{navOpen: false,notificationActive: false, isLoading:true, scrolledFromTop: false}" :class="{
            'overflow-hidden': navOpen,
            'overflow-scroll': !navOpen

        }">





    @livewire('user.navigation.navigation')

    <x-notifications z-index="z-50" position='top-right' />



    @yield('content')





    @livewire('user.navigation.footer')

    @include('include.script')

</body>

</html>