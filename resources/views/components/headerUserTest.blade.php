<div class="">
    <header class="py-4 bg-white shadow-md lg:block dark:bg-gray-800">
        <div class="container flex items-center justify-between h-full px-6 mx-auto text-amber-600 dark:text-amber-300">
            <!-- Mobile hamburger -->
            <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-amber"
                @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                class="p-2 transition-colors rounded-lg shadow-md hover:bg-primary-darker hover:text-white focus:outline-none focus:ring focus:ring-primary focus:ring-offset-white focus:ring-offset-2"
                :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-primary' : 'text-gray-500 bg-white'">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>


            <!-- Search input -->
            <div class="flex justify-center flex-1 lg:mr-32">
                <a class="flex md:hidden" href="{{url('/')}}">
                    <img class="w-24" src="/images/logo/find_02.png" alt="" />
                </a>


                <div class="relative hidden w-full max-w-xl mr-6 md:block focus-within:text-amber-600">
                    <div class="absolute inset-y-0 flex items-center pl-2">
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input autocomplete="text" value=""
                        class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-amber-600 focus:outline-none focus:shadow-outline-purple "
                        type="text" placeholder="Rechereche" aria-label="Search" />
                </div>
            </div>

            <ul class="flex items-center flex-shrink-0 space-x-6">
                <!-- Theme toggler -->

                <li class="flex md:hidden">
                    <div @click="isSettingsPanelOpen = !isSettingsPanelOpen" class="flex cursor-pointer">
                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <sub>
                            <span class="bg-red-600 text-gray-100 px-1.5 py-0.5 rounded-full -ml-1 animate-pulse">
                                0
                            </span>
                        </sub>
                    </div>

                </li>

                <!-- Notifications menu -->
                {{--<li class="relative">
                    <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                        @click="isNotificationsMenuOpen=!isNotificationsMenuOpen"
                        @keydown.escape="closeNotificationsMenu" aria-label="Notifications" aria-haspopup="true">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                            </path>
                        </svg>
                        <!-- Notification badge -->
                        <span aria-hidden="true"
                            class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
                    </button>
                    <div>
                        <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" @click.away="closeNotificationsMenu"
                            @keydown.escape="closeNotificationsMenu"
                            class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700"
                            aria-label="submenu">
                            <li class="flex">
                                <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                    href="#">
                                    <span>Messages</span>
                                    <span
                                        class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                        13
                                    </span>
                                </a>
                            </li>
                            <li class="flex">
                                <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                    href="#">
                                    <span>Sales</span>
                                    <span
                                        class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                        2
                                    </span>
                                </a>
                            </li>
                            <li class="flex">
                                <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                    href="#">
                                    <span>Alerts</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>--}}
                <!-- Profile menu -->
                <li class="relative">
                    <x-user-info />


                </li>
            </ul>
        </div>


    </header>
</div>


{{--<nav aria-label="Options"
    class="flex flex-row items-center justify-between px-4 py-2 mb-4 bg-white border-b lg:hidden shadow-b border-primary-100">
    <!-- Menu button -->
    <button
        @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
        class="p-2 transition-colors rounded-lg shadow-md hover:bg-primary-darker hover:text-white focus:outline-none focus:ring focus:ring-primary focus:ring-offset-white focus:ring-offset-2"
        :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-primary' : 'text-gray-500 bg-white'">
        <span class="sr-only">Toggle sidebar</span>
        <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
        </svg>
    </button>

    <!-- Logo -->
    <a href="#">
        <img class="w-12" src="/images/logo/find_02.png" alt="K-UI" />
    </a>

    <div class="flex">
        <x-user-info></x-user-info>

    </div>
    <!-- User avatar button -->

</nav>--}}
