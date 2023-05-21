<div x-data="app()" class="min-h-screen py-5 custom overflow-y-auto-scrollbar bg-gray-50 min-w-screen dark:bg-gray-900">

    <div class="px-6 md:px-12">
        <div>
            <div class="mb-2">
                @include('include.breadcumb',['serviceAll'=>'services','checkout'=>'checkout'])
            </div>
            <div class="mb-2">
                <h1 class="text-5xl font-bold text-gray-600 md:text-2xl dark:text-gray-200">Panier</h1>
            </div>

        </div>
        <div>

            <div wire:offline
                class="flex items-center justify-between w-full px-6 py-4 mb-6 text-white bg-red-500 rounded-md">
                <div class="flex items-center">

                    <p class="text-sm">vous etes hors ligne.</p>
                </div>
                <button @click="show=false" class="text-white" type="button">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>


            @if ($errors->has('message'))
            <div x-data="{show:true}" x-show="show"
                class="flex items-center justify-between px-6 py-4 text-white bg-red-500 rounded-md">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                    <p class="text-sm">Une erreur s'est produite. Veuillez réessayer.</p>
                </div>
                <button @click="show=false" class="text-white" type="button">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            @endif
        </div>

        @if(Session::has('cart'))



        <div
            class="w-full px-5 py-10 mx-0 text-gray-800 bg-white border-t border-b border-gray-200 rounded-md dark:bg-gray-800">
            <div class="w-full">
                <div class="items-start -mx-3 md:flex">
                    <div class="px-3 md:w-7/12 lg:pr-10">

                        <ul class="flex flex-col divide-y divide-gray-700">
                            @foreach ($products as $item)
                            <li class="flex flex-col py-6 sm:flex-row sm:justify-between">
                                <div class="flex w-full space-x-2 sm:space-x-4">
                                    <img class="flex-shrink-0 object-cover w-20 h-20 rounded outline-none dark:border-transparent sm:w-32 sm:h-32 dark:bg-gray-500"
                                        src="{{Storage::disk('local')->url('public/service/'.$item['image']) }}"
                                        alt="Polaroid camera">
                                    <div class="flex flex-col justify-between w-full pb-4">
                                        <div class="flex justify-between w-full pb-2 space-x-2">
                                            <div class="space-y-1">
                                                <h3 class="text-lg font-semibold leading-snug sm:pr-8">
                                                    {{$item['title']}}
                                                </h3>
                                                <p class="text-sm dark:text-gray-400">Basic</p>
                                            </div>
                                            @php
                                            $price = $item['basic_price'] *$item['quantity'];

                                            $reduction=$price +35;

                                            @endphp
                                            <div class="text-right">
                                                <p class="text-lg font-semibold">${{$item['basic_price'] *
                                                    $item['quantity'] }}</p>
                                                <p class="text-sm line-through dark:text-gray-600">
                                                    ${{$reduction}}</p>
                                            </div>
                                        </div>
                                        <div class="flex text-sm divide-x">
                                            <button type="button" wire:click="remove({{$item['id']}})"
                                                class="flex items-center px-2 py-1 pl-0 space-x-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    class="w-4 h-4 fill-current">
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
                                                <span>Remove</span>
                                            </button>


                                            <div>

                                                <div x-data="{ productQuantity: @json($item['quantity']) }">
                                                    <label for="Quantity" class="sr-only"> Quantity </label>

                                                    <div class="flex items-center gap-1">
                                                        <button type="button" x-on:click="productQuantity--"
                                                            :disabled="productQuantity === 0"
                                                            @click="$wire.updateQty({{$item['id']}},productQuantity)"
                                                            class="w-10 h-10 leading-10 text-gray-600 transition hover:opacity-75">
                                                            &minus;
                                                        </button>

                                                        <input type="number" id="Quantity" x-model="productQuantity"
                                                            x-on:change="$wire.updateQty(2,productQuantity)"
                                                            class="h-10 w-16 rounded border-gray-200 dark:bg-gray-700 text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none" />

                                                        <button type="button" x-on:click="productQuantity++"
                                                            @click="$wire.updateQty({{$item['id']}},productQuantity)"
                                                            class="w-10 h-10 leading-10 text-gray-600 transition hover:opacity-75">
                                                            &plus;
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>





                        <div x-data="{isShow:false}" class="pb-6 mb-6 border-b border-gray-200">

                            <button @click="isShow=!isShow" class="">
                                <label
                                    class="flex gap-1 mb-2 ml-1 text-sm font-semibold text-gray-600 dark:text-gray-200">Discount
                                    code <span class="py-1.5">
                                        <svg x-show="!isShow" class="w-4 h-4 fill-current"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 6.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" />
                                        </svg>

                                    </span>
                                    <span class="py-1.5">
                                        <svg x-show="isShow" class="w-4 h-4 fill-current"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M14.293 15.293a1 1 0 01-1.414 0L10 12.414l-2.293 2.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 010 1.414z" />
                                        </svg>

                                    </span>
                                </label>






                            </button>


                            <div class="flex items-end justify-end " x-show="isShow" x-collapse x-cloak>


                                <div class="flex-grow px-2 lg:max-w-md">

                                    <div class="p-2">
                                        <input
                                            class="w-full px-3 py-2 transition-colors border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500"
                                            placeholder="XXXXXX" type="text" />
                                    </div>
                                </div>
                                <div class="p-2">
                                    <button
                                        class="block w-full max-w-xs px-5 py-2 mx-auto font-semibold text-white bg-gray-400 border border-transparent rounded-md hover:bg-gray-500 focus:bg-gray-500">APPLY</button>
                                </div>
                            </div>
                        </div>
                        <div class="pb-6 mb-6 text-gray-800 border-b border-gray-200">
                            <div class="flex items-center w-full mb-3">
                                <div class="flex-grow">
                                    <span class="text-gray-600 dark:text-gray-200">Subtotal</span>
                                </div>
                                <div class="pl-3">
                                    <span
                                        class="font-semibold dark:text-gray-50">${{Session('cart')->totalPrice}}</span>
                                </div>
                            </div>
                            <div class="flex items-center w-full">
                                <div class="flex-grow">
                                    <span class="text-gray-600 dark:text-gray-200">Taxes (GST)</span>
                                </div>
                                <div class="pl-3">
                                    <span class="font-semibold dark:text-gray-50">$0</span>
                                </div>
                            </div>
                        </div>
                        <div class="pb-6 mb-6 text-xl text-gray-800 border-b border-gray-200 md:border-none">
                            <div class="flex items-center w-full">
                                <div class="flex-grow">
                                    <span class="text-gray-600 dark:text-gray-200">Total</span>
                                </div>
                                <div class="pl-3">
                                    <span class="text-sm font-semibold text-gray-400 dark:text-gray-20"></span> <span
                                        class="font-semibold">${{Session('cart')->totalPrice}}</span>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="px-3 md:w-5/12">

                        <div class="w-full p-4 mb-4 font-semibold bg-white border border-gray-200 rounded-md">
                            <div>
                                <h1>Address de Facturation / Livraison</h1>

                            </div>
                            <div class="flex flex-col gap-2">

                                <x-input wire:model.defer="address.rue" placeholder="Rue" />
                                <x-input wire:model.defer="address.quartier" placeholder="Quartier" />
                                <x-input wire:model.defer="address.commune" placeholder="Commune" />
                                <x-input wire:model.defer="address.ville" placeholder="Ville" />

                            </div>

                        </div>

                        <div
                            class="w-full mx-auto mb-6 font-light text-gray-800 bg-white border border-gray-200 rounded-lg top-8 dark:bg-gray-900">
                            <div class="w-full p-3 border-b border-gray-200 ">
                                <div class="mb-5">
                                    <label for="type1" class="flex items-center cursor-pointer">
                                        <input type="checkbox" class="w-5 h-5 text-indigo-500 form-radio" id="type1"
                                            x-model="isCard" @click="isOther=false">
                                        <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png"
                                            class="h-6 ml-3">
                                    </label>
                                </div>
                                <div x-collapse class="px-2" x-cloak x-show="isCard">
                                    <div class="mb-3">
                                        <label class="mb-2 ml-1 text-sm font-semibold text-gray-600 dark:text-gray-200">
                                            Nom sur la carte
                                        </label>
                                        <div>
                                            <x-input wire:model.defer="card.cardName" />
                                        </div>
                                    </div>
                                    <div class="mb-3">

                                        <div>



                                            <x-inputs.maskable wire:model.defer="card.cardNumber" label="Card"
                                                mask="['####-####-####-####']" placeholder="424242442424242" />
                                        </div>
                                    </div>
                                    <div class="relative grid grid-cols-3 gap-2 mb-3 ">



                                        <x-native-select label="Mois" placeholder="02"
                                            :options="['01', '02', '03', '05', '06', '07', '08', '09', '10', '11', '12']"
                                            wire:model.defer="card.cardExpiryMonth" />



                                        <x-native-select label="Mois" placeholder="2024"
                                            :options="['2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030']"
                                            wire:model.defer="card.cardExpiryYear" />




                                        <x-inputs.maskable wire:model.defer="card.cardCvc" label="CVV" mask="['###']"
                                            placeholder="123" />

                                    </div>

                                    <div>
                                        <button wire:click="pay()" wire:loading.attr='disabled'
                                            class="block w-full max-w-xs px-3 py-2 mx-auto font-semibold text-white bg-indigo-500 rounded-lg hover:bg-indigo-700 focus:bg-indigo-700"><i
                                                class="mr-1 mdi mdi-lock-outline"></i> <span wire:loading.remove>PAYER
                                                ({{$priceTotal}}$)</span>
                                            <span wire:loading wire:target='pay'>PAIEMENT...</span>
                                        </button>

                                    </div>

                                </div>

                            </div>

                            <div class="w-full p-6 border-b border-gray-200">
                                <div class="mb-5">
                                    <label for="type2" class="flex items-center cursor-pointer">
                                        <input type="checkbox" class="w-5 h-5 text-indigo-500 form-radio"="type"
                                            id="type2" x-model="isOther" @click="isCard=false">

                                        <img src="{{asset('images/icon/maxicash.png')}}" class="h-6 ml-3">
                                        <span>MaxiCash</span>

                                    </label>
                                </div>
                                <div x-collapse x-cloak x-show="isOther">

                                    <div class="flex flex-col gap-4 mb-3">


                                        <x-input label="Nom" wire:model.defer="name" />



                                        <x-input label="telephone" wire:model.defer="telephone" />

                                        <button wire:click="checkoutmaxi()" wire:loading.attr='disabled'
                                            class="block w-full max-w-xs px-3 py-2 mx-auto font-semibold text-white bg-indigo-500 rounded-lg hover:bg-indigo-700 focus:bg-indigo-700"><i
                                                class="mr-1 mdi mdi-lock-outline"></i> <span
                                                wire:loading.remove>PAYER</span>
                                            <span wire:loading wire:target='checkoutmaxi'>PAIEMENT...</span>
                                        </button>

                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>




                </div>
            </div>
        </div>

        @else

        <div class="flex flex-col items-center justify-center gap-4 py-8">

            <h1 class="text-2xl">Votre panier est vide</h1>

            <x-button label="service" href="{{url('/categories')}}" positive></x-button>


        </div>

        @endif
    </div>





</div>
{{-- Because she competes with no one, no one can compete with her. --}}
</div>





@push('script')




<script>
    function update(product)
    {
        alert(product);
    }
    window.addEventListener('success', event=> {
    Swal.fire({
    // position: 'top-end',
    icon:'success',
    //toast: true,
    title:"operation reussie",
    text:event.detail.message,
    showConfirmButton: true,
   // footer: '<a class="text-green-600" href="">liste des proposition</a>',
    //timer:5000

    })

    });

    window.addEventListener('error', event=> {
    Swal.fire({
    // position: 'top-end',
    icon:'error',
    //toast: true,
    title:"operation echoue",
    text:event.detail.message,
    showConfirmButton: true,
    //timer:5000
    })

    });


    function app() {
        return {
            isOther: false,
            isCard: false,

        }
    }
</script>
@endpush