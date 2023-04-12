<ul class="py-10 custom-scrollbar">

    <li class="relative px-6 py-3">
        @if(request()->routeIs('freelance.dashboard'))
        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-amber-600" aria-hidden="true"></span>
        @endif

        <x-asideLinkNav href="{{route('freelance.dashboard')}}" :active="request()->routeIs('freelance.dashboard')">
            <ion-icon name="albums-outline" class="w-6 h-6"></ion-icon>
            <span class="ml-4">Dashboard</span>
        </x-asideLinkNav>

    </li>
    <li x-data="{ linkHover: false, linkActive: false }" class="relative px-6 py-3">

        <button
            class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
            @click="linkActive=!linkActive" aria-haspopup="true">
            <span class="inline-flex items-center">

                <ion-icon name="bookmarks-outline" class="w-6 h-6"></ion-icon>
                <span class="ml-4">Service</span>
            </span>
            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div x-show="linkActive" x-cloak x-collapse>
            <ul x-transition:enter="transition-all ease-in-out duration-300"
                x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                x-transition:leave="transition-all ease-in-out duration-300"
                x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                aria-label="submenu">

                <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" x-on:click="linkActive=false" href="{{route('freelance.service.list')}}">
                        Mes Service
                    </a>
                </li>
                <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" x-on:click="linkActive=false" href="{{route('freelance.service.create')}}">
                        Creation
                    </a>
                </li>

            </ul>
        </div>
    </li>
    <li x-data="{ linkHover: false, linkActive: false }" class="relative px-6 py-3">

        <button
            class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
            @click="linkActive=!linkActive" aria-haspopup="true">
            <span class="inline-flex items-center">

                <ion-icon name="bookmarks-outline" class="w-6 h-6"></ion-icon>
                <span class="ml-4">Commande</span>
            </span>
            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div x-show="linkActive" x-cloak x-collapse>
            <ul x-transition:enter="transition-all ease-in-out duration-300"
                x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                x-transition:leave="transition-all ease-in-out duration-300"
                x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                aria-label="submenu">

                <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" x-on:click="linkActive=false" href="{{route('freelance.commande.list')}}">
                        Mes Commande
                    </a>
                </li>
                <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" x-on:click="linkActive=false" href="">
                        Evaluation
                    </a>
                </li>

            </ul>
        </div>
    </li>
    <li class="relative px-6 py-3">

        @if(request()->routeIs('freelance.transaction.list'))
        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-amber-600" aria-hidden="true"></span>
        @endif


        <x-asideLinkNav href="{{route('freelance.transaction.list')}}"
            :active="request()->routeIs('freelance.transaction.list')">
            <ion-icon name="bag-check-outline" class="w-6 h-6"></ion-icon>
            <span class="ml-4">Transaction</span>
        </x-asideLinkNav>

    </li>
    <li x-data="{ linkHover: false, linkActive: false }" class="relative px-6 py-3">

        <button
            class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
            @click="linkActive=!linkActive" aria-haspopup="true">
            <span class="inline-flex items-center">

                <ion-icon name="bookmarks-outline" class="w-6 h-6"></ion-icon>
                <span class="ml-4">Missions</span>
            </span>
            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div x-show="linkActive" x-cloak x-collapse>
            <ul x-transition:enter="transition-all ease-in-out duration-300"
                x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                x-transition:leave="transition-all ease-in-out duration-300"
                x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                aria-label="submenu">

                <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" x-on:click="linkActive=false" href="{{route('freelance.projet.list')}}">
                        Mission
                    </a>
                </li>
                <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" x-on:click="linkActive=false" href="{{route('freelance.proposition')}}">
                        Mission Accepter
                    </a>
                </li>

            </ul>
        </div>
    </li>

    <li x-data="{ linkHover: false, linkActive: false }" class="relative px-6 py-3">

        <button
            class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
            @click="linkActive=!linkActive" aria-haspopup="true">
            <span class="inline-flex items-center">
                <ion-icon name="mail-outline" class="w-6 h-6"></ion-icon>
                <span class="ml-4">Conversation</span>
            </span>
            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div x-show="linkActive" x-cloak x-collapse>
            <ul x-transition:enter="transition-all ease-in-out duration-300"
                x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                x-transition:leave="transition-all ease-in-out duration-300"
                x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                aria-label="submenu">

                <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" x-on:click="linkActive=false" href="{{route('freelance.messages')}}">
                        Messages
                    </a>
                </li>
                <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" x-on:click="linkActive=false" href="">
                        Messages Projet
                    </a>
                </li>

            </ul>
        </div>
    </li>


    <li class="relative px-6 py-3">

        @if(request()->routeIs('transactionUser'))
        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-amber-600" aria-hidden="true"></span>
        @endif

        <x-asideLinkNav href="{{route('transactionUser')}}" :active="request()->routeIs('transactionUser')">
            <ion-icon name="card-outline" class="w-6 h-6"></ion-icon>
            <span class="ml-4">Portefolio</span>
        </x-asideLinkNav>



    </li>
    <li class="relative px-6 py-3">

        @if(request()->routeIs('transactionUser'))
        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-amber-600" aria-hidden="true"></span>
        @endif

        <x-asideLinkNav href="{{route('transactionUser')}}" :active="request()->routeIs('transactionUser')">
            <ion-icon name="card-outline" class="w-6 h-6"></ion-icon>
            <span class="ml-4">Evalution</span>
        </x-asideLinkNav>



    </li>
    <li class="relative px-6 py-3">


        @if(request()->routeIs('paiementUser'))
        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-amber-600" aria-hidden="true"></span>
        @endif

        <x-asideLinkNav href="{{route('paiementUser')}}" :active="request()->routeIs('paiementUser')">

            <ion-icon name="cash-outline" class="w-6 h-6"></ion-icon>
            <span class="ml-4">Paiment</span>
        </x-asideLinkNav>
    </li>

    <li x-data="{ linkHover: false, linkActive: false }" class="relative px-6 py-3">

        @if(request()->routeIs('freelance.profile')|| request()->routeIs('profile.show'))
        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-amber-600" aria-hidden="true"></span>
        @endif
        <button
            class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
            @click="linkActive=!linkActive" aria-haspopup="true">
            <span class="inline-flex items-center">
                <ion-icon name="person-outline" class="w-6 h-6"></ion-icon>
                <span class="ml-4">Profile</span>
            </span>
            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div x-show="linkActive" x-cloak x-collapse>
            <ul x-transition:enter="transition-all ease-in-out duration-300"
                x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                x-transition:leave="transition-all ease-in-out duration-300"
                x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                aria-label="submenu">

                <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" x-on:click="linkActive=false" href="{{route('freelance.profile')}}">
                        Profile
                    </a>
                </li>
                <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <a class="w-full" x-on:click="linkActive=false" href="{{route('freelance.securite')}}">
                        Securite
                    </a>
                </li>

            </ul>
        </div>
    </li>



</ul>