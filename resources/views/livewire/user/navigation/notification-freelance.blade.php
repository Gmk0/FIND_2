<div class="space">

    @forelse ($notifications as $notification)
    <div x-data="{ linkHover: false }" href="#"
        class="flex items-center justify-between w-64 max-h-64 px-1.5 py-3.5 hover:bg-gray-100 dark:hover:bg-gray-700 bg-opacity-20"
        @mouseover="linkHover = true" @mouseleave="linkHover = false">
        <div class="flex items-center">
            @if($notification->content=="service_commande")
            <svg class="w-6 h-6 bg-blue-600 bg-opacity-20 text-blue-600 px-1.5 py-0.5 rounded-full" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            @endif
            <div class="ml-2 text-sm">
                <p class="text-sm font-bold capitalize" :class=" linkHover ? 'text-red-600' : 'text-gray-800'">
                    {{$notification->type}}</p>
                <p class="p-2 text-xs text-gray-600 truncate whitespace-normal dark:text-gray-200">
                    {{$notification->content}}
                </p>
            </div>

            <button wire:click="remove({{$notification->id}})" x-show="linkHover" @click="linkHover=false"
                class="absolute left-1/2 top-1/4 -translate-x-1/2 -translate-y-1/2 transform rounded bg-red-500 px-2 py-1.5 text-white hover:bg-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3 h-3 fill-current">
                    <path
                        d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z">
                    </path>
                    <rect width="32" height="200" x="168" y="216"></rect>
                    <rect width="32" height="200" x="240" y="216"></rect>
                    <rect width="32" height="200" x="312" y="216"></rect>
                    <path
                        d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z">
                    </path>
                </svg></button>






            <a href="" x-show="linkHover" @click="linkHover=false"
                class="absolute right-1/4 top-1/4 -translate-y-1/2 translate-x-1/2 transform rounded bg-blue-500 px-2 py-1.5 text-white hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </a>




        </div>
        <span class="flex-1 ml-1 text-xs font-bold text-gray-600 dark:text-gray-200">
            <span x-show="!linkHover">{{$notification->created_at->DiffForHumans()}}</span>
        </span>



    </div>

    @empty
    <div>Pas de notification</div>

    @endforelse
</div
