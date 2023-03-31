<div x-data="{search:false}">


    <header class="fixed z-50 w-full bg-skin-fill dark:bg-gray-800">
        <div class="container flex items-center justify-between h-20 px-4 py-6 mx-auto ">
            <div class="flex-shrink-0">
                <h1 class="text-lg font-semibold tracking-widest text-white uppercase">
                    <a href="{{url('/')}}">
                        <img src="/images/logo/find_03.png" alt="logo-find" class="h-20 dark:hidden">
                    </a>
                    <a href="{{url('/')}}">
                        <img src="/images/logo/find_02.png" alt="logo-find" class="hidden w-24 dark:block ">
                    </a>
                </h1>

            </div>
            <nav class="hidden md:flex">
                <ul class="flex items-center justify-center font-semibold">
                    <li class="relative px-3 py-2 ">
                        <a href="{{url("/")}}"
                            class="flex flex-row items-center px-3 py-2 font-medium text-white border-b border-gray-100 rounded-md dark:border-amber-800 text-md focus:outline-none focus:text-white focus:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span class="ml-2">{{__('Accueil')}}</span>
                        </a>
                    </li>
                    <li class="relative px-3 py-2 group">
                        <button
                            class="flex flex-row items-center px-3 py-2 font-medium text-white rounded-md cursor-default hover:opacity-50 text-md focus:outline-none focus:text-white focus:bg-gray-700">
                            <ion-icon name="albums-outline" class="w-4 h-4 text-white"></ion-icon>
                            <span class="ml-2">{{__('Category')}}</span>
                        </button>
                        <div
                            class="absolute top-0 -left-48 transition group-hover:translate-y-5 translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-500 ease-in-out group-hover:transform z-50 min-w-[560px] transform">
                            <div class="relative w-full p-6 bg-white shadow-xl top-6 rounded-xl">
                                <div
                                    class="w-10 h-10 bg-white transform rotate-45 absolute top-0 z-0 translate-x-0 transition-transform group-hover:translate-x-[12rem] duration-500 ease-in-out rounded-sm">
                                </div>

                                <div class="relative z-10">
                                    <p
                                        class="uppercase tracking-wider text-gray-500 dark:text-gray-800 font-medium text-[13px]">
                                        The
                                        Categorie
                                    </p>
                                    <div class="grid grid-cols-2 gap-4">

                                        @foreach($categories as $categorie)




                                        <a href="#" wire:click="getCategory({{$categorie->id}})"
                                            class="block p-2 -mx-2 font-semibold text-gray-800 transition duration-300 ease-in-out rounded-lg dark:text-gray-50 hover:bg-gradient-to-br hover:dark:text-gray-900 hover:text-indigo-600">
                                            {{$categorie->name}}

                                        </a>




                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="relative px-3 py-2 group">
                        <button
                            class="flex flex-row items-center px-3 py-2 font-medium text-white rounded-md cursor-default hover:opacity-50 text-md focus:outline-none focus:text-white focus:bg-gray-700">

                            <ion-icon name="person-add-outline" class="w-4 h-4"></ion-icon>
                            <span class="ml-2">{{__('Freelance')}}</span>
                        </button>
                        <div
                            class="absolute top-0 -left-2 transition group-hover:translate-y-5 translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-500 ease-in-out group-hover:transform z-50 min-w-[260px] transform">
                            <div class="relative w-full p-6 bg-white shadow-xl top-6 rounded-xl">
                                <div
                                    class="absolute top-0 z-0 w-10 h-10 transition-transform duration-500 ease-in-out transform rotate-45 -translate-x-4 bg-white rounded-sm group-hover:translate-x-3">
                                </div>
                                <div class="relative z-10">
                                    <p class="uppercase tracking-wider text-gray-500 font-medium text-[13px]">Freelance
                                    </p>
                                    <ul class="mt-3 text-[15px]">
                                        <li>
                                            <a href="{{url('/register.begin')}}"
                                                class="block py-1 font-semibold text-transparent bg-transparent bg-clip-text bg-gradient-to-br from-indigo-400 to-pink-700 via-blue-500 hover:from-blue-600 hover:to-indigo-600 hover:via-pink-400">
                                                Creer un compte
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="relative px-3 py-2 group">
                        <button
                            class="flex flex-row items-center px-3 py-2 font-medium text-white rounded-md cursor-default hover:opacity-50 text-md focus:outline-none focus:text-white focus:bg-gray-700">
                            <ion-icon name="globe-outline" class="w-4 h-4 text-white"></ion-icon>
                            <span class="ml-2">{{__('Decouverte')}}</span>
                        </button>
                        <div
                            class="absolute top-0 -left-2 transition group-hover:translate-y-5 translate-y-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-500 ease-in-out group-hover:transform z-50 min-w-[200px] transform">
                            <div class="relative w-full p-6 bg-white shadow-xl top-6 rounded-xl">
                                <div
                                    class="absolute top-0 z-0 w-10 h-10 transition-transform duration-500 ease-in-out transform rotate-45 -translate-x-4 bg-white rounded-sm group-hover:translate-x-3">
                                </div>
                                <div class="relative z-10">
                                    <ul class="text-[15px]">
                                        <li>
                                            <a href="{{url('/Project.pending')}}"
                                                class="block py-1 font-semibold text-transparent bg-transparent bg-clip-text bg-gradient-to-br from-indigo-400 to-pink-700 via-blue-500 hover:from-blue-600 hover:to-indigo-600 hover:via-pink-400">
                                                Project en Attente
                                            </a>
                                        </li>


                                        <li>
                                            <a href="{{url('/find-freelancer')}}"
                                                class="block py-1 font-semibold text-transparent bg-transparent bg-clip-text bg-gradient-to-br from-indigo-400 to-pink-700 via-blue-500 hover:from-blue-600 hover:to-indigo-600 hover:via-pink-400">
                                                Trouver un Freelanncer
                                            </a>
                                        </li>

                                    </ul>


                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="relative px-3 py-2 ">
                        <a href="{{url("/")}}"
                            class="flex flex-row items-center px-3 py-2 font-medium text-white border-b border-gray-100 rounded-md dark:border-amber-800 text-md focus:outline-none focus:text-white focus:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span class="ml-2">{{__('Service')}}</span>
                        </a>
                    </li>


                </ul>
                <div class="flex items-center justify-center">


                    <div class="relative px-3 py-2 ">

                        <button
                            class="text-gray-800 rounded-md dark:text-white focus:outline-none focus:shadow-outline-purple"
                            @click="toggleTheme" aria-label="Toggle color mode">
                            <template x-if="!dark">
                                <svg class="w-5 h-5 text-white" aria-hidden="true" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                            </template>
                            <template x-if="dark">
                                <svg class="w-5 h-5 text-white" aria-hidden="true" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </template>
                        </button>
                    </div>



                </div>
            </nav>
            <nav class="hidden md:flex">
                <ul>

                    @auth
                    <li class="relative ml-3">

                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravelstreamstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                    @if (!empty(Auth::user()->profile_photo_path))
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{Storage::disk('s3')->url('profiles-photos/'.Auth::user()->profile_photo_path) }}"
                                        alt="">
                                    @else
                                    <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                        alt="">
                                    @endif
                                </button>
                                @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ url('/profile.show') }}">
                                    <ion-icon name="person-outline" class="w-4 h-4"></ion-icon>
                                    <span class="ml-2">{{__('Profile')}}</span>
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ url('/Project.user.list') }}">
                                    <ion-icon name="albums-outline" class="w-4 h-4"></ion-icon>
                                    <span class="ml-2">{{__('Prs')}}</span>
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ url('/profile.show') }}">
                                    <ion-icon name="settings-outline" class="w-4 h-4"></ion-icon>
                                    <span class="ml-2">{{__('messages.Settings')}}</span>
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ url('/profile.show') }}">
                                    <ion-icon name="notifications-outline" class="w-4 h-4"></ion-icon>
                                    <span class="ml-2">{{__('Notification')}}</span>
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ url('/profile.show') }}">
                                    <ion-icon name="notifications-outline" class="w-4 h-4"></ion-icon>
                                    <span class="ml-2">{{__('Favoris')}}</span>
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ url('/conversations') }}">
                                    <ion-icon name="chatbox-ellipses-outline" class="w-4 h-4"></ion-icon>

                                    <span class="ml-2">{{__('Conversation')}}</span>
                                </x-dropdown-link>



                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ url('/logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ url('/logout') }}" @click.prevent="$root.submit();">
                                        <ion-icon name="log-in-outline" class="w-4 h-4text-white"></ion-icon>
                                        <span class="ml-2">{{__('se deconnecter')}}</span>
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>

                    </li>
                    @else
                    <li class="flex gap-2">
                        <a href="{{url('/register')}}"
                            class="relative flex items-center justify-center h-12 px-4 mx-auto mr-4 text-sm duration-300 rounded-md bg-gray-50 before:absolute before:inset-0 before:transition hover:scale-105 active:duration-75 active:scale-95 sm:w-max">
                            <span class="relative text-base font-semibold text-amber-600">{{__("connexion")}}</span>
                        </a>


                        <a href="{{url('/register')}}"
                            class="relative flex items-center justify-center w-full h-12 px-8 mx-auto bg-white rounded-full group dark:bg-skin-fill hover:scale-105 active:duration-75 active:scale-95 sm:w-max">
                            <span
                                class="relative text-base font-semibold dark:text-white text-amber-600">{{__("S'inscrire")}}</span>
                            <svg class="stroke-current dark:text-white text-amber-600 " width="10" height="10"
                                stroke-width="2" viewBox="0 0 10 10" aria-hidden="true">
                                <g fill-rule="evenodd">
                                    <path class="transition duration-200 ease-in-out opacity-0 group-hover:opacity-100"
                                        d="M0 5h7">
                                    </path>
                                    <path
                                        class="transition duration-200 ease-in-out opacity-100 group-hover:transform group-hover:translate-x-1"
                                        d="M1 1l4 4-4 4"></path>
                                </g>
                            </svg>
                        </a>
                    </li>
                    @endauth


                </ul>
            </nav>

            <div class="flex -mr-2 lg:hidden">
                @guest

                <a href="{{url('/register')}}"
                    class="relative flex items-center justify-center h-10 px-4 mx-auto mr-4 text-sm duration-300 rounded-md bg-gray-50 before:absolute before:inset-0 before:transition hover:scale-105 active:duration-75 active:scale-95 sm:w-max">
                    <span class="relative text-base font-semibold text-amber-600">{{__("s'inscrire")}}</span>
                </a>
                @else

                @endguest


                <button @click="navOpen = !navOpen"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-50 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white"
                    x-bind:aria-label="navOpen ? 'Close main menu' : 'Main menu'" x-bind:aria-expanded="navOpen">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': navOpen, 'inline-flex': !navOpen }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !navOpen, 'inline-flex': navOpen }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div x-show="navOpen" :class="{'block': navOpen, 'hidden': !navOpen}" @click.away="navOpen = false" x-cloak
                class="fixed inset-0 bottom-0 left-0 z-30 w-10/12 p-4 overflow-auto origin-left transform shadow-lg bg-gray-50 dark:bg-gray-800 lg:hidden"
                x-transition:enter=" transition ease-in duration-300"
                x-transition:enter-start="opacity-0 transform -translate-x-40"
                x-transition:enter-end="opacity-100 transform translate-x-0"
                x-transition:leave="transition ease-out duration-300"
                x-transition:leave-start="opacity-0 transform translate-x-40"
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
                            class="relative flex items-center justify-center w-full h-12 px-8 mx-auto duration-300 rounded-full dark:border dark:border-white bg-skin-fill before:absolute before:inset-0 before:transition hover:scale-105 active:duration-75 active:scale-95 sm:w-max">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                    <span class="ml-2">{{__('messages.Home')}}</span>
                                </a>
                                <a href="{{url('/register.begin')}}"
                                    class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-white hover:dark:text-white hover:bg-gray-700 focus:outline-none focus:dark:text-white focus:text-white focus:bg-amber-600">
                                    <ion-icon name="person-add-outline" class="w-4 h-4"></ion-icon>
                                    <span class="ml-2">{{__('messages.DevenirFreelancer')}}</span>
                                </a>
                                <div class="relative" x-data="{ open: false }">
                                    <button @click="open = true"
                                        class="flex flex-row items-center w-full px-3 py-2 mt-1 text-lg font-medium text-left text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-700 focus:outline-none focus:dark:text-white focus:text-white focus:bg-amber-600">
                                        <ion-icon name="albums-outline" class="w-4 h-4 dark:text-white"></ion-icon>
                                        <span class="ml-2">{{__('messages.OurServices')}}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            :class="{'rotate-180': open, 'rotate-0': !open}"
                                            class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </button>
                                    <div x-show="open" x-collapse @click.away="open = false"
                                        class="flex flex-col px-2 py-2 mt-2 rounded-md shadow-xs bg-inherit" role="menu"
                                        aria-orientation="vertical" aria-labelledby="user-menu" role="menuitem">

                                        @foreach($categories as $categorie)


                                        <a href="#" @click="navOpen = false"
                                            wire:click="getCategory({{$categorie->id}})"
                                            class="flex flex-row items-center px-3 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white hover:text-gray-900 hover:bg-gray-200 focus:outline-none focus:text-gray-900 focus:bg-gray-200"
                                            role="menuitem">
                                            {{$categorie->name}}
                                        </a>

                                        @endforeach



                                    </div>
                                </div>
                                <a href="{{url('/service_favoris')}}"
                                    class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-700 focus:outline-none focus:dark:text-white focus:text-white focus:bg-amber-600">
                                    <ion-icon name="star-outline" class="w-4 h-4 dark:text-white"></ion-icon>
                                    <span class="ml-2">{{__('Favoris')}}</span>
                                </a>
                                <a href="{{url('/freelancer/find')}}"
                                    class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-700 focus:outline-none focus:dark:text-white focus:text-white focus:bg-amber-600">
                                    <ion-icon name="reader-outline" class="w-4 h-4 dark:text-white"></ion-icon>
                                    <span class="ml-2">{{__('Trouver un Freelancer')}}</span>
                                </a>

                                <div class="relative" x-data="{ open: false }">
                                    <button @click="open = true"
                                        class="flex flex-row items-center w-full px-3 py-2 mt-1 text-lg font-medium text-left text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-700 focus:outline-none focus:dark:text-white focus:text-white focus:bg-amber-600">
                                        <ion-icon name="globe-outline" class="w-4 h-4 dark:text-white"></ion-icon>
                                        <span class="ml-2">{{__('Decouverte')}}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            :class="{'rotate-180': open, 'rotate-0': !open}"
                                            class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </button>
                                    <div x-show="open" x-collapse @click.away="open = false"
                                        class="px-2 py-2 mt-2 rounded-md shadow-xs bg-inherit" role="menu"
                                        aria-orientation="vertical" aria-labelledby="user-menu" role="menuitem">



                                        <a href="{{url('/demande.service')}}" @click="navOpen = false"
                                            class="flex flex-row items-center px-3 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white hover:text-gray-900 hover:bg-gray-200 focus:outline-none focus:text-gray-900 focus:bg-gray-200"
                                            role="menuitem">
                                            <span class="ml-2">{{__('Faire Une Demande')}}</span>
                                        </a>
                                        <a href="#" @click="navOpen = false"
                                            class="flex flex-row items-center px-3 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white hover:text-gray-900 hover:bg-gray-200 focus:outline-none focus:text-gray-900 focus:bg-gray-200"
                                            role="menuitem">
                                            <span class="ml-2">{{__('Faire Une Demande')}}</span>
                                        </a>

                                    </div>
                                </div>
                                <a href="{{url('/about')}}" @click="navOpen = false"
                                    class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-700 focus:outline-none focus:dark:text-white focus:text-white focus:bg-amber-600">
                                    <ion-icon name="chatbubbles-outline" class="w-4 h-4 dark:text-white"></ion-icon>
                                    <span class="ml-2">{{__('Approps')}}</span>
                                </a>

                                <button
                                    class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-700 focus:outline-none focus:dark:text-white focus:text-white "
                                    @click="toggleTheme" aria-label="Toggle color mode">
                                    <template x-if="!dark">
                                        <svg class="w-5 h-5 " aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                            </path>
                                        </svg>
                                    </template>
                                    <template x-if="dark">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </template>
                                </button>
                            </div>
                        </div>
                        @auth
                        <div class="container mt-4 border-t border-gray-800 dark:border-gray-50 ">
                            <div class="pt-2 pb-3">
                                <a href="{{url('/profile.show')}}" @click="navOpen = false"
                                    class="flex flex-row items-center px-3 py-2 text-base font-medium text-gray-800 rounded-md hover:text-gray-900 hover:bg-gray-200 focus:outline-none focus:text-gray-900 focus:bg-gray-200"
                                    role="menuitem">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ml-2">{{__('messages.profile')}}</span>
                                </a>


                                <a href="{{url('/conversations')}}" @click="navOpen = false"
                                    class="flex flex-row items-center px-4 py-2 text-gray-800 text-md focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100"
                                    role="menuitem">
                                    <ion-icon name="cash-outline" class="w-4 h-4"></ion-icon>
                                    <span class="ml-2">{{__('Conversation')}}</span>
                                </a>
                                <a href="{{url('/profile.show')}}"
                                    class="flex flex-row items-center px-4 py-2 text-gray-800 text-md focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100"
                                    role="menuitem">
                                    <ion-icon name="cash-outline" class="w-4 h-4"></ion-icon>
                                    <span class="ml-2">{{__('Paiment')}}</span>
                                </a>

                                <form method="POST" action="{{ url('/logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link
                                        class="flex flex-row items-center px-4 py-2 text-red-500 text-md hover:text-red-700 hover:bg-red-100 focus:outline-none focus:text-red-700 focus:bg-red-100"
                                        href="{{ url('/logout') }}" @click.prevent="$root.submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
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
        </div>


    </header>


</div>

@push('script')





@endpush