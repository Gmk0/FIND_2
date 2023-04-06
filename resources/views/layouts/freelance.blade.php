<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'dark': dark }" x-data="data()">

@include('include.head')

<body
    class="flex flex-col justify-between overflow-x-hidden overflow-y-hidden bg-gray-100 custom-scrollbar dark:bg-gray-900"
    x-data="{navOpen: false,notificationActive: false,isAside:true, isLoading:true, scrolledFromTop: false}" :class="{
            'overflow-hidden': navOpen,
            'overflow-scroll': !navOpen
           
        }">


    <div class="flex h-screen overflow-x-hidden bg-gray-100 dark:bg-gray-900 custom-scrollbar"
        :class="{ 'overflow-hidden': isSideMenuOpen}">

        <x-asideFreelance />

        <div class="flex flex-col flex-1">
            <x-headerFreelance />

            <main class="h-full pb-16 overflow-y-auto">

                @yield('content')

            </main>

        </div>




    </div>







    @include('include.script')



</body>

</html>