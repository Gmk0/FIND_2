<div x-data="{search:false }">

    @php
    if (request()->routeIs('home')){
    $height = "h-24";
    $fixed="fixed";
    }else{
    $height = "h-20";
    $fixed="sticky";
    }
    @endphp

    <header x-data="{isSearchBoxOpen:false}" class="fixed z-50 w-full bg-skin-fill dark:bg-gray-800">
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
            <nav class="hidden lg:flex">
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
                            <div class="relative w-full p-6 bg-white shadow-xl dark:bg-gray-800 top-6 rounded-xl">
                                <div
                                    class="w-10 h-10 bg-white dark:bg-gray-800 transform rotate-45 absolute top-0 z-0 translate-x-0 transition-transform group-hover:translate-x-[12rem] duration-500 ease-in-out rounded-sm">
                                </div>

                                <div class="relative z-10">
                                    <p
                                        class="uppercase tracking-wider text-gray-500 dark:text-gray-100 font-medium text-[13px]">
                                        The
                                        Categorie
                                    </p>
                                    <div class="grid grid-cols-2 gap-4">

                                        @forelse($categories as $categorie)




                                        <a href="{{route('categoryByName',[$categorie->name])}}"
                                            class="block p-2 -mx-2 font-semibold text-gray-800 transition duration-300 ease-in-out rounded-lg dark:text-gray-50 hover:bg-gradient-to-br hover:dark:text-gray-200 hover:text-indigo-600">
                                            {{$categorie->name}}

                                        </a>

                                        @empty


                                        @endforelse
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
                                            <a href="{{route('register.begin')}}"
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
                                            <a href="{{route('createProject')}}"
                                                class="block py-1 font-semibold text-transparent bg-transparent bg-clip-text bg-gradient-to-br from-indigo-400 to-pink-700 via-blue-500 hover:from-blue-600 hover:to-indigo-600 hover:via-pink-400">
                                                Soumettre un Projet
                                            </a>
                                        </li>


                                        <li>
                                            <a href="{{route('find_freelance')}}"
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
                        <a href="{{url("/services")}}"
                            class="flex flex-row items-center px-3 py-2 font-medium text-white border-gray-100 rounded-md dark:border-amber-800 text-md focus:outline-none focus:text-white focus:bg-gray-700">
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

                    @guest
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

                    @endguest


                    <div class="relative px-3 py-2 ">

                        <button
                            class="text-gray-800 rounded-md dark:text-white focus:outline-none focus:shadow-outline-purple"
                            @click="toggleSearch" aria-label="Toggle color mode">

                            <ion-icon name="search-outline" class="w-5 h-5 text-white"></ion-icon>

                        </button>
                    </div>


                    @auth
                    {{-- @livewire('user.navigation.notifications-component')
                    --}}
                    @livewire('user.navigation.card-component')
                    @endauth



                </div>
            </nav>
            <nav class="hidden lg:flex">

                <ul>

                    @auth


                    <li class="relative ml-3">

                        <x-user-info />

                    </li>
                    @else
                    <li class="flex gap-2">
                        <a href="{{url('/login')}}"
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



                <div class="relative px-3 py-2 ">

                    <button
                        class="text-gray-800 rounded-md dark:text-white focus:outline-none focus:shadow-outline-purple"
                        @click="isSearchBoxOpen=!isSearchBoxOpen" aria-label="Toggle color mode">

                        <ion-icon name="search-outline" class="w-5 h-5 text-white"></ion-icon>

                    </button>

                </div>
                <div class="relative px-3 py-2 ">
                    @livewire('user.navigation.card-component')


                </div>

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

            <div x-cloak x-show.in.out.opacity="navOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
                style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"></div>
            @livewire('user.navigation.search-mobile')
            @livewire('user.navigation.mobile-navigation')
        </div>

        @livewire('user.services.search-component')

    </header>


</div>

@push('script')





@endpush
