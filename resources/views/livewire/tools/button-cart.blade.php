<div class="max-h-[14rem] flex flex-col justify-between p-2 dark:text-gray-200 md:p-6">
    <div>
        <a href="{{route('ServicesViewOne',['service_numero'=>$service->service_numero,'category'=>$service->category->name])}}"
            class="mb-2 text-sm font-semibold md:text-base "
            :class="linkHover ? 'text-amber-600' : 'text-gray-800 dark:text-gray-200'">{{$service->title}}
        </a>
        <div class="flex items-center mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 text-yellow-500" viewBox="0 0 20 20"
                fill="currentColor">
                <path
                    d="M10 13.165l-4.53 2.73 1.088-5.997L.976 6.305l6.018-.873L10 0l2.006 5.432 6.018.873-4.582 3.593 1.088 5.997L10 13.165z" />
            </svg>
            <p class="text-sm text-gray-700 dark:text-gray-200">{{$service->averageFeedback()}}
                ({{$service->orderCount()}})
            </p>
        </div>
        <div class="flex items-center mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 text-gray-500" viewBox="0 0 20 20"
                fill="currentColor">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12z"
                    clip-rule="evenodd" />
            </svg>
            <p class="text-sm text-gray-700 dark:text-gray-200">
                {{$service->freelance->user->name}}</p>
        </div>
    </div>
    <div class="flex items-center justify-between dark:text-gray-200">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
            {{$service->basic_price}} $</h4>



        @auth
        <div x-data="{ like: @json($service->isFavorite()) }" class="flex items-center">
            <button class="mr-2" x-on:click="like=!like" @click="$wire.toogleFavorite({{$service->id}})">


                <span x-cloak x-show="!like" class="">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </span>
                <span x-cloak x-show="like">
                    <svg class="w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </span>


            </button>



        </div>
        @endauth
    </div>
    <div class="flex items-center justify-between pt-2 dark:text-gray-200">
        <x-button wire:click="add_cart({{$service->id}})" sm label="ajouter" />
    </div>
</div>