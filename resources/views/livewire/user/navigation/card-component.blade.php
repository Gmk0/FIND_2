<div>
    <div x-data="{ linkActive: false }" class="relative mx-6 rounded-md">
        <!-- start::Main link -->
        <div @click="linkActive = !linkActive" class="flex cursor-pointer">
            <ion-icon wire:ignore name="cart-outline" class="w-5 h-5 text-white"></ion-icon>
            <sub>
                <span class="bg-red-600 text-gray-100 px-1.5 py-0.5 rounded-full -ml-1 animate-pulse">
                    {{Session::has('cart')?
                    count($products):0}}
                </span>
            </sub>
        </div>
        <!-- end::Main link -->



        <div x-cloak x-show="linkActive" @click.away="linkActive = false"
            x-transition:enter="transition transform duration-300"
            x-transition:enter-start="translate-x-full opacity-30  ease-in"
            x-transition:enter-end="translate-x-0 opacity-100 ease-out"
            x-transition:leave="transition transform duration-300"
            x-transition:leave-start="translate-x-0 opacity-100 ease-out"
            x-transition:leave-end="translate-x-full opacity-0 ease-in"
            class="fixed inset-y-0 right-0 z-50 flex flex-col bg-white shadow-lg bg-opacity-20 w-80"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
            <div class="flex items-center justify-between flex-shrink-0 p-2">
                <h6 class="p-2 text-lg text-gray-800">Panier</h6>
                <button @click="linkActive = false" class="p-2 rounded-md focus:outline-none focus:ring">
                    <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 max-h-full p-4 overflow-hidden ">

                <!-- Settings Panel Content ... -->


                @if(Session::has('cart'))
                <div class="flex-1 overflow-y-auto">


                    @foreach ($products as $item)

                    <div class="flex items-center p-4 space-x-4">

                        <img class="object-cover w-16 h-16 rounded-lg"
                            src="{{Storage::disk('local')->url('public/service/'.$item['image']) }}" alt="Service 1">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-800 dark:text-gray-100">{{$item['title']}}</h3>
                            <p class="text-gray-500 dark:text-gray-100">{{$item['basic_price']}} $</p>

                            <p class="text-gray-500 dark:text-gray-100">qty: {{$item['quantity']}}</p>
                        </div>
                        <button wire:click="remove({{$item['id']}})"
                            class="text-gray-500 hover:text-gray-600 focus:outline-none">
                            <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">

                                <path d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    @endforeach
                    <div wire:loading wire:target='add_cart' class="">

                        <h1 class="px-2">Chargement....</h1>

                    </div>
                </div>
                <div class="flex flex-col gap-4 p-4 border-t border-gray-200">
                    <p class="mb-2 text-xl font-semibold text-gray-600 dark:text-gray-100">Total :
                        {{Session('cart')->totalPrice}} $
                    </p>

                    <x-button href="{{route('checkout')}}" class="w-full" primary label="Payer"></x-button>
                </div>

                @else
                <div class="">
                    <div wire:loading wire:target='add_cart' class="">

                        <h1 class="px-2">Chargement....</h1>

                    </div>
                    <h1>Votre Carte est vide</h1>

                </div>
                @endif
            </div>
        </div>

    </div>
</div>