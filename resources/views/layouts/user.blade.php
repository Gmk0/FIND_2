<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'dark': dark }" x-data="data()">

@include('include.head')

<body class="flex flex-col justify-between overflow-x-hidden bg-gray-50 custom-scrollbar dark:bg-gray-900"
    x-data="{navOpen: false,notificationActive: false, isLoading:true, scrolledFromTop: false}" :class="{
            'overflow-hidden': navOpen,
            'overflow-scroll': !navOpen

        }">





    @livewire('user.navigation.navigation')

    <x-notifications z-index="z-50" position='top-right' />



    @yield('content')


    @livewire('user.cookies.cookie-sent')



    @livewire('user.navigation.footer')

    @include('include.script')

</body>

</html>
