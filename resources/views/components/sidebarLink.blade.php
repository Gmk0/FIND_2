<nav class="flex-1 overflow-hidden hover:overflow-y-auto custom-scrollbar">
    <ul class="p-2 overflow-hidden custom-scrollbar">
        <li>
            <a href="{{url('/freelance/dashboard')}}" {{route('freelance.dashboard')}}"
                class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900"
                :class="{'justify-center': !isSidebarOpen}">
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



            <a @click="linkActive=!linkActive" href="#"
                class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900"
                :class="{'justify-center': !isSidebarOpen}">
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

                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">

                        <a class="flex w-full gap-2" x-on:click="linkActive=false"
                            href="{{route('freelance.service.list')}}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                </svg>
                            </span>
                            <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Mes services</span>
                        </a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="flex w-full gap-2" x-on:click="linkActive=false"
                            href="{{route('freelance.service.create')}}">
                            <span>
                                <ion-icon class="w-4 h-4" name="add-circle-outline"></ion-icon>
                            </span>
                            <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Creer</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>

        <li x-data="{ linkHover: false, linkActive: false }" class="">

            <a @click="linkActive=!linkActive" href="#"
                class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900"
                :class="{'justify-center': !isSidebarOpen}">
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

                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">

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
        </li>

        <li>
            <a href="{{route('freelance.transaction.list')}}"
                class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900"
                :class="{'justify-center': !isSidebarOpen}">
                <span>
                    <ion-icon name="cash-outline" class="w-6 h-6 text-gray-400"></ion-icon>
                </span>
                <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Transaction</span>
            </a>
        </li>

        <li x-data="{ linkHover: false, linkActive: false }" class="">

            <a @click="linkActive=!linkActive" href="#"
                class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900"
                :class="{'justify-center': !isSidebarOpen}">
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

                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">

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
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="flex w-full gap-2" x-on:click="linkActive=false"
                            href="{{route('freelance.proposition')}}">
                            <span>
                                <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </span>
                            <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Mission accepter</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
        <li x-data="{ linkHover: false, linkActive: false }" class="">

            <a @click="linkActive=!linkActive" href="#"
                class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900"
                :class="{'justify-center': !isSidebarOpen}">
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

                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">

                        <a class="flex w-full gap-2" x-on:click="linkActive=false"
                            href="{{route('freelance.messages')}}">
                            <span>
                                <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </span>
                            <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Mes Messages</span>
                        </a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="flex w-full gap-2" x-on:click="linkActive=false"
                            href="{{route('freelance.service.list')}}">
                            <span>
                                <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </span>
                            <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Mission accepter</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>

        <li>
            <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900"
                :class="{'justify-center': !isSidebarOpen}">
                <span>
                    <ion-icon class="w-6 h-6 text-gray-400" name="person-circle-outline"></ion-icon>
                </span>
                <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Portefolio</span>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900"
                :class="{'justify-center': !isSidebarOpen}">
                <span>
                    <ion-icon class="w-6 h-6 text-gray-400" name="wallet-outline">
                    </ion-icon>

                </span>
                <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Paiment</span>
            </a>
        </li>

        <li x-data="{ linkHover: false, linkActive: false }" class="">

            <a @click="linkActive=!linkActive" href="#"
                class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-900"
                :class="{'justify-center': !isSidebarOpen}">
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

                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">

                        <a class="flex w-full gap-2" x-on:click="linkActive=false"
                            href="{{route('freelance.profile')}}">
                            <span>
                                <ion-icon name="person-outline" class="w-6 h-6 text-gray-400"></ion-icon>
                            </span>
                            <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Profile</span>
                        </a>
                    </li>
                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <a class="flex w-full gap-2" x-on:click="linkActive=false"
                            href="{{route('freelance.securite')}}">
                            <span>
                                <ion-icon name="lock-closed-outline" class="w-6 h-6 text-gray-400"></ion-icon>
                            </span>
                            <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800">Securite</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
        <!-- Sidebar Links... -->
    </ul>
</nav>