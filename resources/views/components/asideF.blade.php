{{--<aside x-transition:enter="transition transform duration-300"
    x-transition:enter-start="-translate-x-full opacity-30  ease-in"
    x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300"
    x-transition:leave-start="translate-x-0 opacity-100 ease-out"
    x-transition:leave-end="-translate-x-full opacity-0 ease-in"
    class="fixed inset-y-0  top-0 left-0 z-20 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
    :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}">
    <!-- sidebar header -->
    <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
        <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">


            <a :class="{'lg:hidden':!isSidebarOpen}" href="{{url('/')}}">
                <img src="/images/logo/find_02.png" alt="logo-find" class="h-12 ">
            </a>
            <a :class="{'hidden':isSidebarOpen}" href="{{url('/')}}">
                <img class="h-12" src="/images/logo/find_01.png" alt="FIND" />
            </a>
        </span>
        <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
            <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <x-sidebarLink></x-sidebarLink>
    <!-- Sidebar links -->
    <!-- Sidebar footer -->
    <div class="flex-shrink-0 p-2 border-t max-h-12">
        <button
            class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring">
            <span>
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </span>
            <span :class="{'lg:hidden': !isSidebarOpen}"> Deconnexion </span>
        </button>
    </div>
</aside>--}}

<aside id="logo-sidebar" x-bind:class="isSidebarOpen ? '' : '-translate-x-full lg:translate-x-0 lg:w-20'"
    x-transition:enter="transition ease-in-out duration-500 transform" x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-500 transform"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full custom-scrollbar bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div :class="{'lg:justify-center': !isSidebarOpen}"
        class="lg:h-full h-screen px-3 pb-4 justify-between  overflow-y-auto custom-scrollbar bg-white dark:bg-gray-800">

        <ul class="p-2 overflow-hidden custom-scrollbar">
            <li>
                <a :class="{'lg:justify-center': !isSidebarOpen}" href="{{url('/freelance/dashboard')}}"
                    {{route('freelance.dashboard')}}"
                    class="flex items-center p-2 space-x-2 rounded-md sm:w-full hover:bg-gray-100  dark:hover:bg-gray-900">
                    <span>
                        <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Dashboard</span>
                </a>

            </li>



            <li x-data="{ linkHover: false, linkActive: false }" class="">



                <a data-tooltip-target="tooltip-Service" @click="linkActive=!linkActive" href="#"
                    class="flex items-center p-2 space-x-2 rounded-md sm:w-full hover:bg-gray-100  dark:hover:bg-gray-900"
                    :class="{'lg:justify-center': !isSidebarOpen}">
                    <span>
                        <ion-icon name="albums-outline" class="w-6 h-6 text-gray-400"></ion-icon>
                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Service</span>
                </a>
                <div x-show="linkActive" x-cloak x-collapse>
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">

                        <li data-tooltip-target="tooltip-services" :class="{ 'px-2': isSidebarOpen }"
                            class=" py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">

                            <a class="flex w-full gap-2" x-on:click="linkActive=false"
                                href="{{route('freelance.service.list')}}">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                    </svg>
                                </span>
                                <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Mes
                                    services</span>
                            </a>

                            <div id="tooltip-services" role="tooltip"
                                class="absolute z-[60] invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                                liste services
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </li>
                        <li data-tooltip-target="tooltip-creer" :class="{ 'px-2': isSidebarOpen }"
                            class=" py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="flex w-full gap-2" x-on:click="linkActive=false"
                                href="{{route('freelance.service.create')}}">
                                <span>
                                    <ion-icon class="w-4 h-4" name="add-circle-outline"></ion-icon>
                                </span>
                                <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Creer</span>
                            </a>

                            <div id="tooltip-creer" role="tooltip"
                                class="absolute z-[60] invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                                creer services
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </li>

                    </ul>
                </div>
                <div id="tooltip-Service" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                    Service
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </li>


            <li data-tooltip-target="tooltip-Commande" x-data="{ linkHover: false, linkActive: false }" class="">

                <a @click="linkActive=!linkActive" href="#"
                    class="flex items-center p-2 space-x-2 rounded-md sm:w-full hover:bg-gray-100  dark:hover:bg-gray-900"
                    :class="{'lg:justify-center': !isSidebarOpen}">
                    <span>
                        <ion-icon name="cart-outline" class="w-6 h-6 text-gray-400"></ion-icon>
                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Commande</span>
                </a>
                <div x-show="linkActive" x-cloak x-collapse>
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">

                        <li :class="{ 'px-2': isSidebarOpen }"
                            class="py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">

                            <a class="flex w-full gap-2" x-on:click="linkActive=false"
                                href="{{route('freelance.commande.list')}}">
                                <span>
                                    <ion-icon name="cart-outline" class="w-4 h-4 text-gray-400"></ion-icon>
                                </span>
                                <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Commande</span>
                            </a>
                        </li>


                    </ul>
                </div>
                <div id="tooltip-Commande" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                    Commande
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </li>

            <li data-tooltip-target="tooltip-Transaction">
                <a href="{{route('freelance.transaction.list')}}"
                    class="flex items-center p-2 space-x-2 rounded-md w-full hover:bg-gray-100  dark:hover:bg-gray-900"
                    :class="{'lg:justify-center': !isSidebarOpen}">
                    <span>
                        <ion-icon name="cash-outline" class="w-6 h-6 text-gray-400"></ion-icon>
                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Transaction</span>
                </a>
                <div id="tooltip-Transaction" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                    Transaction
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </li>

            <li x-data="{ linkHover: false, linkActive: false }" class="">

                <a data-tooltip-target="tooltip-Mission" @click="linkActive=!linkActive" href="#"
                    class="flex items-center p-2 space-x-2 rounded-md sm:w-full hover:bg-gray-100  dark:hover:bg-gray-900"
                    :class="{'lg:justify-center': !isSidebarOpen}">
                    <span>

                        <ion-icon name="file-tray-outline" class="w-6 h-6 text-gray-400"></ion-icon>
                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Mission</span>
                </a>
                <div x-show="linkActive" x-cloak x-collapse>
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">

                        <li data-tooltip-target="tooltip-MissionListe" :class="{ 'px-2': isSidebarOpen }"
                            class="py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">

                            <a class="flex w-full gap-2" x-on:click="linkActive=false"
                                href="{{route('freelance.projet.list')}}">
                                <span>
                                    <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </span>
                                <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Mission</span>
                            </a>
                            <div id="tooltip-MissionListe" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                                Liste de Mission
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </li>
                        <li data-tooltip-target="tooltip-MissionAccepter" :class="{ 'px-2': isSidebarOpen }"
                            class="py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="flex w-full gap-2" x-on:click="linkActive=false"
                                href="{{route('freelance.proposition')}}">
                                <span>
                                    <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </span>
                                <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Mission
                                    accepter</span>
                            </a>
                            <div id="tooltip-MissionAccepter" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                                Mission Accepter
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </li>

                    </ul>
                </div>
                <div id="tooltip-Mission" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                    Transaction
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </li>
            <li data-tooltip-target="tooltip-Messages" x-data="{ linkHover: false, linkActive: false }" class="">

                <a @click="linkActive=!linkActive" href="#"
                    class="flex items-center p-2 space-x-2 rounded-md sm:w-full hover:bg-gray-100  dark:hover:bg-gray-900"
                    :class="{'lg:justify-center': !isSidebarOpen}">
                    <span>
                        <ion-icon name="mail-outline" class="w-6 h-6 text-gray-400"></ion-icon>
                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Messages</span>
                </a>
                <div x-show="linkActive" x-cloak x-collapse>
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">

                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">

                            <a class="flex w-full gap-2" x-on:click="linkActive=false"
                                href="{{route('freelance.messages')}}">
                                <span>
                                    <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </span>
                                <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Mes
                                    Messages</span>
                            </a>
                        </li>


                    </ul>
                </div>
                <div id="tooltip-Messages" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                    Transaction
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </li>

            <li data-tooltip-target="tooltip-Portefolio">
                <a href="#"
                    class="flex items-center p-2 space-x-2 rounded-md sm:w-full hover:bg-gray-100  dark:hover:bg-gray-900"
                    :class="{'lg:justify-center': !isSidebarOpen}">
                    <span>
                        <ion-icon class="w-6 h-6 text-gray-400" name="person-circle-outline"></ion-icon>
                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Portefolio</span>
                </a>

                <div id="tooltip-Portefolio" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                    Portefolio
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </li>
            <li data-tooltip-target="tooltip-Paiement">
                <a href="{{route('freelance.PaiementInfo')}}"
                    class="flex items-center p-2 space-x-2 rounded-md sm:w-full hover:bg-gray-100  dark:hover:bg-gray-900"
                    :class="{'lg:justify-center': !isSidebarOpen}">
                    <span>
                        <ion-icon class="w-6 h-6 text-gray-400" name="wallet-outline">
                        </ion-icon>

                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Paiement</span>
                </a>

                <div id="tooltip-Paiement" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                    Paiement
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </li>

            <li x-data="{ linkHover: false, linkActive: false }" class="">

                <a data-tooltip-target="tooltip-Profile" @click="linkActive=!linkActive" href="#"
                    class="flex items-center p-2 space-x-2 rounded-md sm:w-full hover:bg-gray-100  dark:hover:bg-gray-900"
                    :class="{'lg:justify-center': !isSidebarOpen}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                        </svg>
                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Profile</span>
                </a>
                <div x-show="linkActive" x-cloak x-collapse>
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">

                        <li data-tooltip-target="tooltip-ProfileP" :class="{ 'px-2': isSidebarOpen }"
                            class="py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">

                            <a class="flex w-full gap-2" x-on:click="linkActive=false"
                                href="{{route('freelance.profile')}}">
                                <span>
                                    <ion-icon name="person-outline" class="w-4 h-4 text-gray-400"></ion-icon>
                                </span>
                                <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Profile</span>
                            </a>

                            <div id="tooltip-ProfileP" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                                Profile freelance
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </li>
                        <li data-tooltip-target="tooltip-securite" :class="{ 'px-2': isSidebarOpen }"
                            class="py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="flex w-full gap-2" x-on:click="linkActive=false"
                                href="{{route('freelance.securite')}}">
                                <span>
                                    <ion-icon name="lock-closed-outline" class="w-4 h-4 text-gray-400"></ion-icon>
                                </span>
                                <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Securite</span>
                            </a>

                            <div id="tooltip-securite" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                                securite freelance
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </li>

                    </ul>
                </div>
                <div id="tooltip-Profile" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                    Profile
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </li>
            <!-- Sidebar Links... -->
        </ul>

        <div class="flex-shrink-0 p-2 border-t max-h-12">
            <button
                class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring">
                <span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </span>
                <span :class="{'lg:hidden': !isSidebarOpen}"> Deconnexion </span>
            </button>
        </div>
    </div>
</aside>