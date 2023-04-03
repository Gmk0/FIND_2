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

        <!-- start::Submenu -->
        <div x-show="linkActive" @click.away="linkActive = false" x-cloak
            class="fixed inset-y-0  top-[4rem] bottom-0 flex flex-col right-0 z-30 w-9/12 md:w-96 p-4 overflow-auto origin-right transform shadow-lg bg-gray-50 dark:bg-gray-800">
            <!-- start::Submenu content -->

            <div class="flex items-center justify-between p-4 rounded-md border-b border-gray-200">
                <h2 class="text-lg dark:text-white font-semibold">Panier</h2>
                <button @click="linkActive = false" class="text-gray-500 hover:text-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            @if(Session::has('cart'))
            <div class="flex-1 overflow-y-auto">


                @foreach ($products as $item)

                <div class="flex items-center p-4 space-x-4">

                    <img class="object-cover w-16 h-16 rounded-lg"
                        src="{{Storage::disk('local')->url('public/service/'.$item['image']) }}" alt="Service 1">
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800 dark:text-gray-100">{{$item['title']}}</h3>
                        <p class="text-gray-500 dark:text-gray-100">{{$item['basic_price']}} $</p>

                        <p class="text-gray-500 dark:text-gray-100">{{$item['quantity']}}</p>
                    </div>
                    <button wire:click="remove({{$item['id']}})"
                        class="text-gray-500 hover:text-gray-600 focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                @endforeach
                <div wire:loading wire:target='add_cart' class="">

                    <h1 class="px-2">Chargement....</h1>

                </div>
            </div>
            <div class="flex flex-col gap-4  p-4  border-t border-gray-200">
                <p class="font-semibold text-xl mb-2 text-gray-600 dark:text-gray-100">Total :
                    {{Session('cart')->totalPrice}}
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