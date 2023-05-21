<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'dark': dark }" x-data="data()">

@include('include.head')






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
                    class="z-20 flex-col items-center flex-shrink-0 hidden py-2 bg-white border-r-2 shadow-md w-14 sm:flex rounded-tr-3xl rounded-br-3xl border-primary-100">
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
                            class="p-2 transition-colors rounded-lg shadow-md hover:bg-primary-darker hover:text-white focus:outline-none focus:ring focus:ring-primary focus:ring-offset-white focus:ring-offset-2"
                            :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-primary' : 'text-gray-500 bg-white'">
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
                            class="p-2 transition-colors rounded-lg shadow-md hover:bg-primary-darker hover:text-white focus:outline-none focus:ring focus:ring-primary focus:ring-offset-white focus:ring-offset-2"
                            :class="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? 'text-white bg-primary' : 'text-gray-500 bg-white'">
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
                            class="p-2 transition-colors rounded-lg shadow-md hover:bg-primary-darker hover:text-white focus:outline-none focus:ring focus:ring-primary focus:ring-offset-white focus:ring-offset-2"
                            :class="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? 'text-white bg-primary' : 'text-gray-500 bg-white'">
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
                        <button @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
                            class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-primary focus:ring-offset-white focus:ring-offset-2">
                            <img class="w-10 h-10 rounded-lg shadow-md"
                                src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                alt="Ahmed Kamel" />
                            <span class="sr-only">User menu</span>
                        </button>

                    </div>
                </nav>

                <div x-transition:enter="transform transition-transform duration-300"
                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition-transform duration-300"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                    x-show="isSidebarOpen" x-cloak
                    class="fixed inset-y-0 left-0 z-10 flex-shrink-0 w-64 bg-white border-r-2 border-blue-400 shadow-lg sm:left-16 rounded-tr-3xl rounded-br-3xl sm:w-64 lg:static lg:w-64">
                    <nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main"
                        class="flex flex-col h-full pl-10 overflow-y-auto custom-scrollbar">
                        <!-- Logo -->
                        <div class="flex items-center justify-center flex-shrink-0 py-2">
                            <a href="#">
                                <img src="/images/logo/find_02.png" alt="logo-find" class="h-12 ">
                            </a>
                        </div>


                        <x-asideFreelanceLink />

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
                <x-headerFreelance />

                <main class="h-full pb-16 overflow-y-auto">
                    <!-- Main -->
                    @yield('content')
                </main>



            </div>
        </div>

        <!-- Panels -->

        <!-- Settings Panel -->
        <!-- Backdrop -->
        <div x-show="isSettingsPanelOpen" class="fixed inset-0 bg-black bg-opacity-50"
            @click="isSettingsPanelOpen = false" aria-hidden="true"></div>
        <!-- Panel -->
        <section x-cloak x-transition:enter="transform transition-transform duration-300"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition-transform duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full" x-show="isSettingsPanelOpen"
            class="fixed inset-y-0 right-0 w-64 bg-white border-l border-primary-100 rounded-l-3xl">
            <div class="px-4 py-8">
                <h2 class="text-lg font-semibold">Settings</h2>
            </div>
        </section>
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
</body>

</html>