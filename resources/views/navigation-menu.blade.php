<nav x-data="{ navOpen: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ url('/') }}">
                        <img src="/images/logo/find_02.png" class="block w-auto h-9" />
                    </a>

                </div>








            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                <div class="relative ml-3">
                    <button
                        class="text-gray-800 rounded-md dark:text-white focus:outline-none focus:shadow-outline-purple"
                        @click="toggleTheme" aria-label="Toggle color mode">
                        <template x-if="!dark">
                            <svg class="w-5 h-5 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                        </template>
                        <template x-if="dark">
                            <svg class="w-5 h-5 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </template>
                    </button>

                </div>

                <!-- Settings Dropdown -->
                @auth
                <div class="relative ml-3">
                    <x-user-info />
                </div>

                @endauth

            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="navOpen = ! navOpen"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': navOpen, 'inline-flex': ! navOpen }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! navOpen, 'inline-flex': navOpen }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    {{-- <div :class="{'block': navOpen, 'hidden': ! navOpen}"
        class="fixed inset-y-0 left-0 z-50 hidden w-10/12 shadow-md bg-gray-50 sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="mr-3 shrink-0">
                    <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </div>
                @endif

                <div>
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-8 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ url('/') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Home') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                    :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>


                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->

            </div>
        </div>
    </div>--}}

    <div x-cloak x-show="navOpen" :class="{'block': navOpen, 'hidden': !navOpen}" @click.away="navOpen = false" x-cloak
        class="fixed inset-0 bottom-0 left-0 z-30 w-10/12 p-4 overflow-auto origin-left transform shadow-lg bg-gray-50 dark:bg-gray-800 lg:hidden"
        x-transition:enter=" transition ease-in duration-300"
        x-transition:enter-start="opacity-0 transform -translate-x-40"
        x-transition:enter-end="opacity-100 transform translate-x-0"
        x-transition:leave="transition ease-out duration-300"
        x-transition:leave-start="opacity-0 transform -translate-x-40"
        x-transition:leave-end="opacity-0 transform translate-x-0">

        <div class="flex h-24 mt-4 rounded-md ">
            <div class="p-3 mx-1 ">
                @auth
                <div class="flex w-full text-left">
                    <div class="flex-shrink-0">
                        @if (!empty(Auth::user()->profile_photo_path))
                        <img class="w-12 h-12 rounded-full"
                            src="{{Storage::disk('s3')->url('profiles-photos/'.Auth::user()->profile_photo_path) }}"
                            alt="">
                        @else
                        <img class="w-16 h-16 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="">
                        @endif
                    </div>
                    <div class="px-4 py-3">
                        <span
                            class="block text-base text-gray-800 truncate dark:text-white ">{{Auth::user()->name}}</span>

                    </div>
                </div>
                @else
                <a href="{{url('/login')}}"
                    class="relative flex items-center justify-center w-full h-12 px-8 mx-auto duration-300 rounded-full bg-skin-fill before:absolute before:inset-0 before:transition hover:scale-105 active:duration-75 active:scale-95 sm:w-max">
                    <span class="relative text-base font-semibold text-white">{{__('messages.SignIn')}}</span>
                </a>
                @endauth
            </div>

        </div>
        <div class="overflow-auto custom-scrollbar">
            <div class="flex flex-col ">

                <div class="flex-1 border-gray-800 dark:border-white custom-scrollbar">
                    <div class="pt-4 pb-3">
                        <a href="{{url('/')}}"
                            class="flex flex-row items-center px-3 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white focus:outline-none focus:dark:text-white focus:text-white focus:bg-amber-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span class="ml-2">{{__('messages.Home')}}</span>
                        </a>
                        <a href="{{route('register.begin')}}"
                            class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-white hover:dark:text-white hover:bg-gray-700 focus:outline-none focus:dark:text-white focus:bg-amber-600">
                            <ion-icon name="person-add-outline" class="w-4 h-4"></ion-icon>
                            <span class="ml-2">{{__('messages.DevenirFreelancer')}}</span>
                        </a>
                        <div class="relative" x-data="{ navOpen: false }">
                            <button @click="navOpen = true"
                                class="flex flex-row items-center w-full px-3 py-2 mt-1 text-lg font-medium text-left text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-700 focus:outline-none focus:dark:text-white focus:bg-amber-600">
                                <ion-icon name="albums-outline" class="w-4 h-4 dark:text-white"></ion-icon>
                                <span class="ml-2">{{__('messages.OurServices')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    :class="{'rotate-180': navOpen, 'rotate-0': !navOpen}"
                                    class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-down">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div x-show="navOpen" x-collapse @click.away="navOpen = false"
                                class="px-2 py-2 mt-2 rounded-md shadow-xs bg-inherit" role="menu"
                                aria-orientation="vertical" aria-labelledby="user-menu" role="menuitem">




                            </div>
                        </div>
                        <a href="{{url('/about')}}"
                            class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-700 focus:outline-none focus:dark:text-white focus:bg-amber-600">
                            <ion-icon name="chatbubbles-outline" class="w-4 h-4 dark:text-white"></ion-icon>
                            <span class="ml-2">{{__('Favoris')}}</span>
                        </a>
                        <a href="{{url('/about')}}"
                            class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-700 focus:outline-none focus:dark:text-white focus:bg-amber-600">
                            <ion-icon name="chatbubbles-outline" class="w-4 h-4 dark:text-white"></ion-icon>
                            <span class="ml-2">{{__('Faire Une Demande')}}</span>
                        </a>

                        <div class="relative" x-data="{ navOpen: false }">
                            <button @click="navOpen = true"
                                class="flex flex-row items-center w-full px-3 py-2 mt-1 text-lg font-medium text-left text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-700 focus:outline-none focus:dark:text-white focus:bg-amber-600">
                                <ion-icon name="albums-outline" class="w-4 h-4 dark:text-white"></ion-icon>
                                <span class="ml-2">{{__('Decouverte')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    :class="{'rotate-180': navOpen, 'rotate-0': !navOpen}"
                                    class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-down">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div x-show="navOpen" x-collapse @click.away="navOpen = false"
                                class="px-2 py-2 mt-2 rounded-md shadow-xs bg-inherit" role="menu"
                                aria-orientation="vertical" aria-labelledby="user-menu" role="menuitem">


                                <a href="#"
                                    class="flex flex-row items-center px-3 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white hover:text-gray-900 hover:bg-gray-200 focus:outline-none focus:text-gray-900 focus:bg-gray-200"
                                    role="menuitem">
                                    Blog
                                </a>
                                <a href="#"
                                    class="flex flex-row items-center px-3 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white hover:text-gray-900 hover:bg-gray-200 focus:outline-none focus:text-gray-900 focus:bg-gray-200"
                                    role="menuitem">
                                    Communaute
                                </a>
                                <a href="#"
                                    class="flex flex-row items-center px-3 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white hover:text-gray-900 hover:bg-gray-200 focus:outline-none focus:text-gray-900 focus:bg-gray-200"
                                    role="menuitem">
                                    Guides
                                </a>

                            </div>
                        </div>
                        <a href="{{url('/about')}}"
                            class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-700 focus:outline-none focus:dark:text-white focus:bg-amber-600">
                            <ion-icon name="chatbubbles-outline" class="w-4 h-4 dark:text-white"></ion-icon>
                            <span class="ml-2">{{__('Approps')}}</span>
                        </a>

                        <button type="button" @click="isDarkMode = !isDarkMode"
                            class="flex py-2 text-sm text-gray-800 rounded-lg dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700">

                            <ion-icon x-show="!isDarkMode" name="moon-outline" class="w-5 h-5 ml-2 ">
                            </ion-icon>

                            <ion-icon x-show="isDarkMode" class="w-5 h-5 ml-2" name="sunny-outline">

                            </ion-icon>
                            <Span x-show="!isDarkMode" class="ml-2 text-gray-800 ">Sombre</Span>
                            <Span x-show="isDarkMode" class="flex ml-2 text-gray-50 ">Light</Span>

                        </button>
                    </div>
                </div>
                @auth
                <div class="container mt-4 border-t border-gray-800 dark:border-gray-50 ">
                    <div class="pt-2 pb-3">
                        <a href="{{route('profile.show')}}"
                            class="flex flex-row items-center px-3 py-2 text-base font-medium text-gray-800 rounded-md hover:text-gray-900 hover:bg-gray-200 focus:outline-none focus:text-gray-900 focus:bg-gray-200"
                            role="menuitem">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span class="ml-2">{{__('messages.profile')}}</span>
                        </a>

                        <a href="#"
                            class="flex flex-row items-center px-4 py-2 text-gray-800 text-md focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100"
                            role="menuitem">
                            <ion-icon name="notifications-outline" class="w-4 h-4"></ion-icon>
                            <span class="ml-2">{{__('Notification')}}</span>
                        </a>
                        <a href="#"
                            class="flex flex-row items-center px-4 py-2 text-gray-800 text-md focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100"
                            role="menuitem">
                            <ion-icon name="cash-outline" class="w-4 h-4"></ion-icon>
                            <span class="ml-2">{{__('Paiment')}}</span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link
                                class="flex flex-row items-center px-4 py-2 text-red-500 text-md hover:text-red-700 hover:bg-red-100 focus:outline-none focus:text-red-700 focus:bg-red-100"
                                href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                {{ __('messages.logOut') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
                @endauth

            </div>
        </div>


    </div>
</nav>