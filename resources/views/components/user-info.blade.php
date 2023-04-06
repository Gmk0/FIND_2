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

        <x-dropdown-link href="{{ route('profile.show') }}">
            <ion-icon name="person-outline" class="w-4 h-4"></ion-icon>
            <span class="ml-2">{{__('Profile')}}</span>
        </x-dropdown-link>
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
        <x-dropdown-link href="{{ url('/profile.show') }}">
            <ion-icon name="notifications-outline" class="w-4 h-4"></ion-icon>
            <span class="ml-2">{{__('Favoris')}}</span>
        </x-dropdown-link>

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