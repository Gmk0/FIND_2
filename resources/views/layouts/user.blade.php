<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'dark': dark }" x-data="data()">

@include('include.head')

<body class="flex flex-col justify-between overflow-x-hidden bg-gray-50 custom-scrollbar dark:bg-gray-900"
    x-data="{navOpen: false,notificationActive: false, loading: true,linkActive: false, scrolledFromTop: false}" :class="{
            'overflow-hidden': navOpen,
            'overflow-scroll': !navOpen

        }" x-init="$refs.loading.classList.add('hidden')">

    <x-notifications z-index="z-90" position='top-right' />


    <div x-ref="loading"
        class="fixed inset-0 z-[200] flex items-center justify-center text-white bg-black bg-opacity-50"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
        Loading.....
    </div>

    <div x-cloak x-show.in.out.opacity="navOpen" class="fixed inset-0 z-[85] bg-black bg-opacity-20 lg:hidden"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"></div>

    @livewire('user.navigation.navigation')
    @livewire('user.navigation.card-component')

    @livewire('user.navigation.mobile-navigation')





    <main class="">
        @yield('content')
    </main>





    @livewire('user.cookies.cookie-sent')



    @livewire('user.navigation.footer')

    @include('include.script')

    <script>
        const setup = () => {
            return {
            loading: true,
            navOpen: false,
            notificationActive:false,
            scrolledFromTop:false,
            toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
            },
            isSettingsPanelOpen: false,
            isSearchBoxOpen: false,
            }
}
    </script>

</body>

</html>