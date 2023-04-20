<div class="space">

    @forelse ($notifications as $notification)
    <a x-data="{ linkHover: false }" href="#"
        class="flex items-center justify-between w-64 px-1.5 py-3.5 hover:bg-gray-100 dark:hover:bg-gray-700 bg-opacity-20"
        @mouseover="linkHover = true" @mouseleave="linkHover = false">
        <div class="flex items-center">
            <svg class="w-6 h-6 bg-blue-600 bg-opacity-20 text-blue-600 px-1.5 py-0.5 rounded-full" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            <div class="ml-2 text-sm">
                <p class="text-sm font-bold capitalize" :class=" linkHover ? 'text-red-600' : 'text-gray-800'">
                    Order
                    Completed</p>
                <p class="p-2 text-xs text-gray-600 truncate whitespace-normal dark:text-gray-200">
                    {{$notification->content}}
                </p>
            </div>
        </div>
        <span class="flex-1 ml-1 text-xs font-bold text-gray-600 dark:text-gray-200">
            <span x-show="!linkHover">{{$notification->created_at->DiffForHumans()}}</span>

            <button wire:click="remove({{$notification->id}})" x-show="linkHover" @click="linkHover=false" type="button"
                class="flex items-center px-2 py-1 pl-0 space-x-1">
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
                </svg>

            </button>
        </span>

    </a>

    @empty
    <div>Pas de notification</div>

    @endforelse
</div