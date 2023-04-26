<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'dark': dark }" x-data="data()">

@include('include.head')

<body class="flex flex-col justify-between overflow-x-hidden bg-gray-50 custom-scrollbar dark:bg-gray-900"
    x-data="{navOpen: false,notificationActive: false, loading: true, scrolledFromTop: false}" :class="{
            'overflow-hidden': navOpen,
            'overflow-scroll': !navOpen

        }" x-init="$refs.loading.classList.add('hidden')">


    <div x-ref="loading"
        class="fixed inset-0 z-[200] flex items-center justify-center text-white bg-black bg-opacity-50"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
        Loading.....
    </div>


    @livewire('user.navigation.navigation')

    <x-notifications z-index="z-50" position='top-right' />



    @yield('content')


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
