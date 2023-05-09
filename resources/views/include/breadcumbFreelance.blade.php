<nav aria-label="breadcrumb" class="w-full p-4 dark:text-gray-100">
    <ol class="flex h-8 space-x-2">
        <li class="flex items-center">
            <a rel="noopener noreferrer" href="{{url('/freelance/dashboard')}}" title="Back to homepage"
                class="hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="w-5 h-5 pr-1 dark:text-gray-400">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                    </path>
                </svg>
            </a>
        </li>
        @if(isset($serviceName))
        <li class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" fill="currentColor"
                class="w-2 h-2 mt-1 transform rotate-90 fill-current dark:text-gray-600">
                <path d="M32 30.031h-32l16-28.061z"></path>
            </svg>
            <a rel="noopener noreferrer" href="{{route('freelance.service.list')}}"
                class="flex items-center px-1 text-sm capitalize hover:underline">{{$serviceName}}</a>
        </li>
        @endif
        @if(isset($serviceCreate))
        <li class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" fill="currentColor"
                class="w-2 h-2 mt-1 transform rotate-90 fill-current dark:text-gray-600">
                <path d="M32 30.031h-32l16-28.061z"></path>
            </svg>
            <a rel="noopener noreferrer" href="{{route('freelance.service.create')}}"
                class="flex items-center px-1 text-sm capitalize hover:underline">{{$serviceCreate}}</a>
        </li>
        @endif
        @if(isset($serviceEdit))
        <li class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" fill="currentColor"
                class="w-2 h-2 mt-1 transform rotate-90 fill-current dark:text-gray-600">
                <path d="M32 30.031h-32l16-28.061z"></path>
            </svg>
            <a rel="noopener noreferrer" href="{{route('freelance.service.edit',[$serviceEdit])}}"
                class="flex items-center px-1 text-sm capitalize hover:underline">{{$serviceEdit}}</a>
        </li>
        @endif


        @if(isset($transaction))
        <li class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" fill="currentColor"
                class="w-2 h-2 mt-1 transform rotate-90 fill-current dark:text-gray-600">
                <path d="M32 30.031h-32l16-28.061z"></path>
            </svg>
            <a rel="noopener noreferrer" href="{{route('freelance.transaction.list')}}"
                class="flex items-center px-1 text-sm capitalize hover:underline">{{$transaction}}</a>
        </li>
        @endif
        @if(isset($commande))
        <li class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" fill="currentColor"
                class="w-2 h-2 mt-1 transform rotate-90 fill-current dark:text-gray-600">
                <path d="M32 30.031h-32l16-28.061z"></path>
            </svg>
            <a rel="noopener noreferrer" href="{{route('freelance.commande.list')}}"
                class="flex items-center px-1 text-sm capitalize hover:underline">{{$commande}}</a>
        </li>
        @endif
        @if(isset($commandeID))
        <li class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" fill="currentColor"
                class="w-2 h-2 mt-1 transform rotate-90 fill-current dark:text-gray-600">
                <path d="M32 30.031h-32l16-28.061z"></path>
            </svg>
            <a rel="noopener noreferrer" href="{{route('freelance.Order.view',[$commandeID])}}"
                class="flex items-center px-1 text-sm capitalize hover:underline">{{$commandeID}}</a>
        </li>
        @endif
        @if(isset($checkout))
        <li class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" fill="currentColor"
                class="w-2 h-2 mt-1 transform rotate-90 fill-current dark:text-gray-600">
                <path d="M32 30.031h-32l16-28.061z"></path>
            </svg>
            <a rel="noopener noreferrer" href="{{route('checkout')}}"
                class="flex items-center px-1 text-sm capitalize hover:underline">{{$checkout}}</a>
        </li>
        @endif
        @if(isset($profile))
        <li class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" fill="currentColor"
                class="w-2 h-2 mt-1 transform rotate-90 fill-current dark:text-gray-600">
                <path d="M32 30.031h-32l16-28.061z"></path>
            </svg>
            <a rel="noopener noreferrer" href="{{route('freelance.profile')}}"
                class="flex items-center px-1 text-sm capitalize hover:underline">{{$profile}}</a>
        </li>
        @endif
        @if(isset($ServiceName))
        <li class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" fill="currentColor"
                class="w-2 h-2 mt-1 transform rotate-90 fill-current dark:text-gray-600">
                <path d="M32 30.031h-32l16-28.061z"></path>
            </svg>
            <a rel="noopener noreferrer" href="#"
                class="flex items-center px-1 text-sm capitalize hover:underline">{{$ServiceName}}</a>
        </li>
        @endif
        @if(isset($mission))
        <li class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" fill="currentColor"
                class="w-2 h-2 mt-1 transform rotate-90 fill-current dark:text-gray-600">
                <path d="M32 30.031h-32l16-28.061z"></path>
            </svg>
            <a rel="noopener noreferrer" href="{{route('freelance.projet.list')}}"
                class="flex items-center px-1 text-sm capitalize hover:underline">Mission</a>
        </li>
        @endif
        @if(isset($missionView))
        <li class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" fill="currentColor"
                class="w-2 h-2 mt-1 transform rotate-90 fill-current dark:text-gray-600">
                <path d="M32 30.031h-32l16-28.061z"></path>
            </svg>
            <a rel="noopener noreferrer" href="{{route('freelance.projet.view',[$missionView])}}"
                class="flex items-center px-1 text-sm capitalize hover:underline">{{$missionView}}</a>
        </li>
        @endif
    </ol>
</nav>
