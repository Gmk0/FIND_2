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

    @livewire('user.navigation.mobile-navigation')
</nav>