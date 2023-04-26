<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'dark': dark }" x-data="data()">

@include('include.head')

@php
if(request()->routeIs('MessageUser')){
$overflow="overflow-y-auto overflow-y-hidden";
}else{
$overflow="overflow-y-auto";
}
@endphp


<body x-data="setup()" x-init="$refs.loading.classList.add('hidden');" @resize.window="watchScreen()"
    class="flex flex-col justify-between overflow-x-hidden overflow-y-hidden bg-gray-100 custom-scrollbar dark:text-gray-100 dark:bg-gray-900">
    <x-notifications z-index="z-50" position='top-left' />
    <div>
        <div class="flex h-screen overflow-x-hidden bg-gray-100 dark:bg-gray-900 custom-scrollbar">
            <!-- Loading screen -->
            <div x-ref="loading"
                class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white ">
                Chargement.....
            </div>

            <!-- Sidebar -->
            <div class="flex flex-shrink-0 transition-all">
                <div x-show="isSidebarOpen" @click="isSidebarOpen = false"
                    class="fixed inset-0 z-10 bg-black bg-opacity-50 lg:hidden"></div>
                <div x-show="isSidebarOpen" class="fixed inset-y-0 z-10 w-16 bg-white"></div>

                <!-- Mobile bottom bar -->


                <!-- Left mini bar -->
                <nav aria-label="Options"
                    class="z-20 flex-col items-center flex-shrink-0 hidden py-2 bg-white border-r-2 shadow-md w-14 sm:flex rounded-tr-xl rounded-br-xl border-primary-100">
                    <!-- Logo -->
                    <div class="flex-shrink-0 pb-4">
                        <a href="#">
                            <img class="w-10 h-auto" src="/images/logo/find_01.png" alt="FIND" />
                        </a>
                    </div>
                    <div class="flex flex-col items-center flex-1 p-2 py-4 space-y-4">
                        <!-- Menu button -->
                        <button
                            @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                            class="p-2 transition-colors rounded-lg shadow-md hover:bg-primary-darker dark:hover:text-white focus:outline-none focus:ring focus:ring-amber-600 focus:ring-offset-white focus:ring-offset-2"
                            :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-amber-600' : 'text-gray-500 bg-white'">
                            <span class="sr-only">Toggle sidebar</span>
                            <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                        </button>
                        <!-- Messages button -->
                        <button
                            @click="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'messagesTab'"
                            class="p-2 transition-colors rounded-lg shadow-md hover:bg-primary-darker hover:text-gray-400 focus:outline-none focus:ring focus:ring-primary focus:ring-offset-white focus:ring-offset-2"
                            :class="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? 'text-white bg-amber-600' : 'text-gray-500 bg-white'">
                            <span class="sr-only">Toggle message panel</span>
                            <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </button>
                        <!-- Notifications button -->
                        <button
                            @click="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'notificationsTab'"
                            class="p-2 transition-colors rounded-lg shadow-md hover:bg-primary-darker hover:text-gray-400 focus:outline-none focus:ring focus:ring-primary focus:ring-offset-white focus:ring-offset-2"
                            :class="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? 'text-white bg-amber-600' : 'text-gray-500 bg-white'">
                            <span class="sr-only">Toggle notifications panel</span>
                            <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                    </div>

                    <!-- User avatar -->
                    <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">

                        <form method="POST" action="{{ url('/logout') }}" x-data>
                            @csrf

                            <a href="{{ url('/logout') }}" @click.prevent="$root.submit();">
                                <ion-icon name="log-in-outline" class="w-8 h-8 text-white"></ion-icon>

                            </a>
                        </form>


                    </div>
                </nav>

                <div x-transition:enter="transform transition-transform duration-300"
                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition-transform duration-300"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                    x-show="isSidebarOpen" x-cloak
                    class="fixed inset-y-0 left-0 z-10 flex-shrink-0 w-64 bg-white border-r-2 border-blue-400 shadow-lg sm:left-16 rounded-tr-3xl rounded-br-3xl sm:w-64 lg:static lg:w-64">
                    <nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main"
                        class="flex flex-col h-full pl-5 overflow-y-auto custom-scrollbar">
                        <!-- Logo -->
                        <div class="flex items-center justify-center flex-shrink-0 py-2">
                            <a href="#">
                                <img src="/images/logo/find_02.png" alt="logo-find" class="h-12 ">
                            </a>
                        </div>


                        <x-asideUserLink />

                    </nav>

                    <section x-show="currentSidebarTab == 'messagesTab'" class="px-4 py-6">
                        <h2 class="text-xl">Messages</h2>
                    </section>

                    <section x-show="currentSidebarTab == 'notificationsTab'" class="px-4 py-6">
                        <h2 class="text-xl">Notifications</h2>

                        @livewire("user.navigation.notification-freelance")


                    </section>
                </div>
            </div>
            <div class="flex flex-col flex-1">
                <x-headerUserTest />

                <main class="h-full pb-16 overflow-y-auto">
                    <!-- Main -->
                    @yield('content')




                </main>

                @if(request()->routeIs('MessageUser'))


                @else

                <footer class="bottom-0 text-center text-white bg-gray-300 dark:bg-gray-800" style="">


                    <!--Copyright section-->
                    <div class="p-2 text-center text-gray-800">
                        © 2023 Copyright:
                        <a class="text-white" href="https://tailwind-elements.com/">FIND</a>
                    </div>
                </footer>
                @endif




                <!--Footer container-->



            </div>
        </div>

        <!-- Panels -->

        <!-- Settings Panel -->
        <!-- Backdrop -->
        <div x-cloak x-show="isSettingsPanelOpen" @click.away="isSettingsPanelOpen = false"
            x-transition:enter="transition transform duration-300"
            x-transition:enter-start="translate-x-full opacity-30  ease-in"
            x-transition:enter-end="translate-x-0 opacity-100 ease-out"
            x-transition:leave="transition transform duration-300"
            x-transition:leave-start="translate-x-0 opacity-100 ease-out"
            x-transition:leave-end="translate-x-full opacity-0 ease-in"
            class="fixed inset-y-0 right-0 flex flex-col bg-white shadow-lg bg-opacity-20 w-80"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
            <div class="flex items-center justify-between flex-shrink-0 p-2">
                <h6 class="p-2 text-gray-800">Notification</h6>
                <button @click="isSettingsPanelOpen = false" class="p-2 rounded-md focus:outline-none focus:ring">
                    <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 max-h-full p-4 overflow-hidden overflow-y-auto">
                <span></span>

                @livewire("user.navigation.notification-freelance")
                <!-- Settings Panel Content ... -->
            </div>
        </div>
    </div>

    <script>
        const setup = () => {
        return {
          isSidebarOpen: false,
          currentSidebarTab: null,
          isSettingsPanelOpen: false,
          isSubHeaderOpen: false,
          watchScreen() {
            if (window.innerWidth <= 1024) {
              this.isSidebarOpen = false
            }
          },
        }
      }
    </script>


    @include('include.script')

</html>
