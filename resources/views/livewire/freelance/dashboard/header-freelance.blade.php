<div>

    <header class="sticky top-0 flex-shrink-0 py-2 bg-white border-b md:relative" x-data="scrollToReveal()"
        x-ref="header" x-on:scroll.window="scroll()" x-bind:class="{
                       'sticky top-0': sticky,
                       'relative': !sticky
                       }">
        <div class="flex items-center justify-between p-2">
            <!-- Navbar left -->
            <div class="flex items-center space-x-3">

                <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
                    <svg class="w-4 h-4 text-gray-600"
                        :class="{'transform transition-transform -rotate-180': isSidebarOpen}"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                </button>


                <!-- Toggle sidebar button -->

            </div>
            <a class="lg:hidden" href="#">
                <img class="w-24" src="/images/logo/find_02.png" alt="" />
            </a>

            <!-- Mobile search box -->
            <div x-show.transition="isSearchBoxOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20"
                style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
                <div @click.away="isSearchBoxOpen = false"
                    class="absolute inset-x-0 flex items-center justify-between p-2 bg-white shadow-md">
                    <div class="flex items-center flex-1 px-2 space-x-2">
                        <!-- search icon -->
                        <span><svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Search"
                            class="w-full px-4 py-3 text-gray-600 rounded-md focus:bg-gray-100 focus:outline-none" />
                    </div>
                    <!-- close button -->
                    <button @click="$dispatch('toggle-spotlight')" class="flex-shrink-0 p-4 rounded-md">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Desktop search box -->
            <div class="items-center hidden px-2 space-x-2 md:flex-1 md:flex md:mr-auto md:ml-5">
                <!-- search icon --><svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>

                <input type="text" placeholder="Search" x-on:focus="$dispatch('toggle-spotlight')"
                    class="px-4 py-3 rounded-md hover:bg-gray-100 dark:bg-gray-800 lg:max-w-sm md:py-2 md:flex-1 focus:outline-none md:focus:bg-gray-100 md:focus:shadow md:focus:border" />
            </div>

            <!-- Navbar right -->
            <div class="relative flex items-center space-x-3">
                <!-- Search button -->

                <button @click="$dispatch('toggle-spotlight')"
                    class="p-2 bg-gray-100 rounded-full md:hidden focus:outline-none focus:ring hover:bg-gray-200">
                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                <button @click="isSettingsPanelOpen = true"
                    class="p-2 bg-gray-100 rounded-full dark:bg-gray-800 md:hidden focus:outline-none focus:ring hover:bg-gray-200">
                    <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>

                <div class="items-center hidden space-x-3 md:flex">
                    <!-- Notification Menu -->




                    <div @click="isSettingsPanelOpen = !isSettingsPanelOpen" class="flex cursor-pointer">
                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <sub>
                            <span class="bg-red-600 text-gray-100 px-1.5 py-0.5 rounded-full -ml-1 animate-pulse">
                                {{count(Auth::user()->unreadNotifications)}}
                            </span>
                        </sub>
                    </div>


                    <!-- Options Menu -->

                </div>


                <!-- User Menu -->
                <div class="relative" x-data="{ isOpen: false }">
                    <x-freelance-info />


                </div>
            </div>
        </div>
    </header>

    <div wire:offline>
        <div class="w-full p-4 text-orange-700 bg-orange-100 border-l-4 border-orange-500" role="alert">
            <p class="font-bold">Deconnexion</p>
            <p>Vous etes hors ligne.</p>
        </div>
        Titled
    </div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
</div>