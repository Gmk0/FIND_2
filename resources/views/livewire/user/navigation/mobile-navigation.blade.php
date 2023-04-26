<div x-cloak x-show="navOpen" :class="{'block': navOpen, 'hidden': !navOpen}" @click.away="navOpen = false" x-cloak
    class="fixed inset-0 bottom-0 left-0 z-30 w-10/12 overflow-auto origin-left transform shadow-lg bg-gray-50 dark:bg-gray-800 custom-scrollbar lg:hidden"
    x-transition:enter=" transition ease-in duration-300" x-transition:enter-start="opacity-0 transform -translate-x-40"
    x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-out duration-300"
    x-transition:leave-start="opacity-0 transform translate-x-40"
    x-transition:leave-end="opacity-0 transform translate-x-0">

    <div
        class="sticky top-0 z-20 flex justify-between h-24 p-2 bg-white border-b border-gray-700 dark:bg-gray-800 dark:border-gray-300 ">

        <div class="flex p-3 mx-1 ">
            @auth
            <div class="flex w-full text-left">
                <div class="flex-shrink-0">
                    @if (!empty(Auth::user()->profile_photo_path))
                    <img class="w-12 h-12 rounded-full"
                        src="{{Storage::disk('local')->url('profiles-photos/'.Auth::user()->profile_photo_path) }}"
                        alt="">
                    @else
                    <img class="w-16 h-16 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="">
                    @endif
                </div>
                <div class="px-4 py-3">
                    <span class="block text-base text-gray-800 truncate dark:text-white ">{{Auth::user()->name}}</span>

                </div>
            </div>
            @else
            <a href="{{url('/login')}}"
                class="relative flex items-center justify-center w-full h-12 px-8 mx-auto duration-300 rounded-full dark:border dark:border-white bg-skin-fill before:absolute before:inset-0 before:transition hover:scale-105 active:duration-75 active:scale-95 sm:w-max">
                <span class="relative text-base font-semibold text-white">{{__('messages.SignIn')}}</span>
            </a>
            @endauth
        </div>

        <div class="text-left">
            <x-button @click="navOpen = false" sm icon="x"></x-button>
        </div>

    </div>
    <div class="p-4 overflow-auto custom-scrollbar">
        <div class="flex flex-col ">

            <div class="flex-1 border-gray-800 dark:border-white custom-scrollbar">
                <div class="pt-4 pb-3">
                    <a href="{{url('/')}}" @click="navOpen = false"
                        class="flex flex-row items-center px-3 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white focus:outline-none focus:dark:text-white focus:text-white focus:bg-amber-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span class="ml-2">{{__('messages.Home')}}</span>
                    </a>
                    <a href="{{url('/registration')}}" @click="navOpen = false"
                        class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-white hover:dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:dark:text-white focus:text-white focus:bg-amber-600">
                        <ion-icon name="person-add-outline" class="w-6 h-6"></ion-icon>
                        <span class="ml-2">{{__('messages.DevenirFreelancer')}}</span>
                    </a>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = true"
                            class="flex flex-row items-center w-full px-3 py-2 mt-1 text-lg font-medium text-left text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 focus:dark:text-white focus:text-white focus:bg-amber-600">
                            <ion-icon name="albums-outline" class="w-6 h-6 dark:text-white"></ion-icon>
                            <span class="ml-2">{{__('Categories')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}"
                                class="w-6 h-6 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse @click.away="open = false"
                            class="flex flex-col px-2 py-2 mt-2 rounded-md shadow-xs bg-inherit" role="menu"
                            aria-orientation="vertical" aria-labelledby="user-menu" role="menuitem">

                            @forelse($categories as $categorie)


                            <a @click="navOpen = false" href="{{route('categoryByName',[$categorie->name])}}"
                                @click="navOpen = false"
                                class="flex flex-row items-center px-3 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white hover:text-gray-900 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:text-gray-900 focus:bg-gray-200"
                                role="menuitem">
                                {{$categorie->name}}
                            </a>

                            @empty
                            @endforelse



                        </div>
                    </div>
                    <a href="{{url('/services')}}" @click="navOpen = false"
                        class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:dark:text-white focus:text-white focus:bg-amber-600">
                        <ion-icon name="albums-outline" class="w-6 h-6 dark:text-white"></ion-icon>
                        <span class="ml-2">{{__('Services')}}</span>
                    </a>
                    <a href="{{url('/find_freelance')}}" @click="navOpen = false"
                        class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:dark:text-white focus:text-white focus:bg-amber-600">
                        <ion-icon name="reader-outline" class="w-6 h-6 dark:text-white"></ion-icon>
                        <span class="ml-2">{{__('Trouver un Freelancer')}}</span>
                    </a>

                    <a href="{{route('createProject')}}" @click="navOpen = false"
                        class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:dark:text-white focus:text-white focus:bg-amber-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12l-3-3m0 0l-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>

                        <span class="ml-2">{{__('Soumettre une mission')}}</span>
                    </a>


                    <a href="{{url('/apropos')}}" @click="navOpen = false"
                        class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:dark:text-white focus:text-white focus:bg-amber-600">
                        <ion-icon name="chatbubbles-outline" class="w-6 h-6 dark:text-white"></ion-icon>
                        <span class="ml-2">{{__('Apropos')}}</span>
                    </a>

                    <button
                        class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-800 rounded-md dark:text-gray-50 hover:dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 focus:dark:text-white focus:text-white "
                        @click="toggleTheme" aria-label="Toggle color mode">
                        <template x-if="!dark">
                            <svg class="w-5 h-5 text-gray-800" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                </path>
                            </svg>
                        </template>
                        <template x-if="dark">
                            <svg class="w-5 h-5 text-gray-800" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </template>
                        <span x-show="!dark" class="ml-2 text-gray-800">Sombre</span>
                        <span x-show="dark" class="ml-2 text-gray-800">Clair</span>
                    </button>
                </div>
            </div>
            @auth
            <div class="container mt-4 border-t border-gray-800 dark:border-gray-50 ">
                <div class="pt-2 pb-3">
                    <a href="{{url('/user')}}" @click="navOpen = false"
                        class="flex flex-row items-center px-3 py-2 text-base font-medium text-gray-800 rounded-md hover:text-gray-900 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:text-gray-900 focus:bg-gray-200"
                        role="menuitem">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="ml-2">{{__('messages.profile')}}</span>
                    </a>


                    <a href="{{url('/user/messages')}}" @click="navOpen = false"
                        class="flex flex-row items-center px-4 py-2 text-gray-800 text-md focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100"
                        role="menuitem">
                        <ion-icon name="chatbox-outline" class="w-6 h-6"></ion-icon>
                        <span class="ml-2">{{__('Conversation')}}</span>
                    </a>
                    <a href="{{route('paiementUser')}}"
                        class="flex flex-row items-center px-4 py-2 text-gray-800 text-md focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100"
                        role="menuitem">
                        <ion-icon name="cash-outline" class="w-6 h-6"></ion-icon>
                        <span class="ml-2">{{__('Paiment')}}</span>
                    </a>

                    <form method="POST" action="{{ url('/logout') }}" x-data>
                        @csrf

                        <x-dropdown-link
                            class="flex flex-row items-center px-4 py-2 text-red-500 text-md hover:text-red-700 hover:bg-red-100 focus:outline-none focus:text-red-700 focus:bg-red-100"
                            href="{{ url('/logout') }}" @click.prevent="$root.submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-log-out">
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
