<x-jet-dropdown align="right" width="48">
    <x-slot name="trigger">

        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <button
            class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
            @if (!empty(Auth::user()->profile_photo_path))
            <img class="w-8 h-8 rounded-full"
                src="{{Storage::disk('local')->url('profiles-photos/'.Auth::user()->profile_photo_path) }}" alt="">
            @else
            <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="">
            @endif
        </button>
        @else
        <span class="inline-flex rounded-md">
            <button type="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                {{ Auth::user()->name }}

                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor">
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

        <x-dropdown-link href="{{ url('/user') }}">
            <ion-icon name="person-outline" class="w-4 h-4"></ion-icon>
            <span class="ml-2">{{__('Profile')}}</span>
        </x-dropdown-link>

        @if(Auth::user()->freelance()->exists())

        <x-dropdown-link href="{{route('freelance.dashboard')}}">
            <ion-icon name="person-outline" class="w-4 h-4"></ion-icon>
            <span class="ml-2">{{__('Dashbord Freelance')}}</span>
        </x-dropdown-link>
        @endif


        <x-dropdown-link href="{{ route('listProjet') }}">
            <ion-icon name="albums-outline" class="w-4 h-4"></ion-icon>
            <span class="ml-2">{{__('Mes projet')}}</span>
        </x-dropdown-link>

        <x-dropdown-link href="{{ url('/profile.show') }}">
            <ion-icon name="settings-outline" class="w-4 h-4"></ion-icon>
            <span class="ml-2">{{__('messages.Settings')}}</span>
        </x-dropdown-link>
        <x-dropdown-link href="{{ url('/profile.show') }}">
            <ion-icon name="notifications-outline" class="w-4 h-4"></ion-icon>
            <span class="ml-2">{{__('Notification')}}</span>
        </x-dropdown-link>
        <x-dropdown-link href="{{ url('/user/favoris') }}">

            <ion-icon class="w-4 h-4" name="star-outline"></ion-icon>
            <span class="ml-2">{{__('Favoris')}}</span>
        </x-dropdown-link>



        <button
            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 transition duration-150 ease-in-out dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800"
            @click="toggleTheme" aria-label="Toggle color mode">
            <template x-if="!dark">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>

            </template>
            <template x-if="dark">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        clip-rule="evenodd"></path>
                </svg>

            </template>
            <span x-show="!dark" class="ml-2">Sombre</span>
            <span x-show="dark" class="ml-2">Clair</span>
        </button>


        <x-dropdown-link href="{{ route('MessageUser') }}">
            <ion-icon name="chatbox-ellipses-outline" class="w-4 h-4"></ion-icon>

            <span class="ml-2">{{__('Mes messages')}}</span>
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
</x-jet-dropdown>