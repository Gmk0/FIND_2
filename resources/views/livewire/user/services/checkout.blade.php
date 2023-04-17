<div x-data="app()" class="min-h-screen py-5 pt-20 bg-gray-50 min-w-screen dark:bg-gray-900">

    <div class="md:px-12">
        <div>
            <div class="mb-2">
                @include('include.breadcumb',['serviceAll'=>'services','checkout'=>'checkout'])
            </div>
            <div class="mb-2">
                <h1 class="text-3xl font-bold text-gray-600 md:text-5xl dark:text-gray-200">Checkout.</h1>
            </div>

        </div>
        <div>

        </div>

        <div>




            @if ($errors->has('message'))
            <div
                class="relative flex items-center max-w-xl overflow-hidden rounded shadow-md dark:bg-gray-600 dark:text-gray-100">
                <div class="flex items-center self-stretch flex-shrink-0 px-3 dark:bg-gray-700 dark:text-violet-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="flex-1 p-4">
                    <h3 class="text-xl font-bold">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Erreur</font>
                        </font>
                    </h3>
                    <p class="text-sm dark:text-gray-400">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Le mot de passe est incorrect. </font>
                            <font style="vertical-align: inherit;">Avez-vous besoin de </font>
                        </font>
                        <a href="#" rel="referrer noopener" class="underline">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">récupérer votre mot de passe ?</font>
                            </font>
                        </a>
                    </p>
                </div>
                <button class="absolute top-2 right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="w-4 h-4 p-2 rounded cursor-pointer">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
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
                                        src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?ixlib=rb-1.2.1&amp;ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;auto=format&amp;fit=crop&amp;w=1350&amp;q=80"
                                        alt="Polaroid camera">
                                    <div class="flex flex-col justify-between w-full pb-4">
                                        <div class="flex justify-between w-full pb-2 space-x-2">
                                            <div class="space-y-1">
                                                <h3 class="text-lg font-semibold leading-snug sm:pr-8">
                                                    {{$item['title']}}
                                                </h3>
                                                <p class="text-sm dark:text-gray-400">Classic</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-lg font-semibold">{{$item['basic_price']}}€</p>
                                                <p class="text-sm line-through dark:text-gray-600">75.50€</p>
                                            </div>
                                        </div>
                                        <div class="flex text-sm divide-x">
                                            <button type="button" class="flex items-center px-2 py-1 pl-0 space-x-1">
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
                                            <button type="button" class="flex items-center px-2 py-1 space-x-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    class="w-4 h-4 fill-current">
                                                    <path
                                                        d="M453.122,79.012a128,128,0,0,0-181.087.068l-15.511,15.7L241.142,79.114l-.1-.1a128,128,0,0,0-181.02,0l-6.91,6.91a128,128,0,0,0,0,181.019L235.485,449.314l20.595,21.578.491-.492.533.533L276.4,450.574,460.032,266.94a128.147,128.147,0,0,0,0-181.019ZM437.4,244.313,256.571,425.146,75.738,244.313a96,96,0,0,1,0-135.764l6.911-6.91a96,96,0,0,1,135.713-.051l38.093,38.787,38.274-38.736a96,96,0,0,1,135.765,0l6.91,6.909A96.11,96.11,0,0,1,437.4,244.313Z">
                                                    </path>
                                                </svg>
                                                <span>Add to favorites</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>





                        <div class="pb-6 mb-6 border-b border-gray-200">
                            <div class="flex items-end justify-end -mx-2">
                                <div class="flex-grow px-2 lg:max-w-xs">
                                    <label
                                        class="mb-2 ml-1 text-sm font-semibold text-gray-600 dark:text-gray-200">Discount
                                        code</label>
                                    <div>
                                        <input
                                            class="w-full px-3 py-2 transition-colors border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500"
                                            placeholder="XXXXXX" type="text" />
                                    </div>
                                </div>
                                <div class="px-2">
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

                        <div
                            class="sticky w-full mx-auto mb-6 font-light text-gray-800 bg-white border border-gray-200 rounded-lg top-8 dark:bg-gray-900">
                            <div class="w-full p-3 border-b border-gray-200 ">
                                <div class="mb-5">
                                    <label for="type1" class="flex items-center cursor-pointer">
                                        <input type="checkbox" class="w-5 h-5 text-indigo-500 form-radio" id="type1"
                                            x-model="isCard" @click="isOther=false">
                                        <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png"
                                            class="h-6 ml-3">
                                    </label>
                                </div>
                                <div x-collapse x-cloak x-show="isCard">
                                    <div class="mb-3">
                                        <label class="mb-2 ml-1 text-sm font-semibold text-gray-600 dark:text-gray-200">
                                            on
                                            card</label>
                                        <div>
                                            <input
                                                class="w-full px-3 py-2 mb-1 transition-colors border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500"
                                                placeholder="John Smith" type="text" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            class="mb-2 ml-1 text-sm font-semibold text-gray-600 dark:text-gray-200">Card
                                            number</label>
                                        <div>
                                            <x-input placeholder="0000 0000 0000 0000" />
                                        </div>
                                    </div>
                                    <div class="flex items-end mb-3 -mx-2">
                                        <div class="w-1/4 px-2">
                                            <label
                                                class="mb-2 ml-1 text-sm font-semibold text-gray-600 dark:text-gray-200">Expiration
                                                date</label>
                                            <div>
                                                <select
                                                    class="w-full px-3 py-2 mb-1 transition-colors border border-gray-200 rounded-md cursor-pointer form-select dark:text-gray-800 focus:outline-none focus:border-indigo-500">
                                                    <option value="01">01 - January</option>
                                                    <option value="02">02 - February</option>
                                                    <option value="03">03 - March</option>
                                                    <option value="04">04 - April</option>
                                                    <option value="05">05 - May</option>
                                                    <option value="06">06 - June</option>
                                                    <option value="07">07 - July</option>
                                                    <option value="08">08 - August</option>
                                                    <option value="09">09 - September</option>
                                                    <option value="10">10 - October</option>
                                                    <option value="11">11 - November</option>
                                                    <option value="12">12 - December</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-1/4 px-2">
                                            <select
                                                class="w-full px-3 py-2 mb-1 transition-colors border border-gray-200 rounded-md cursor-pointer form-select dark:text-gray-800 focus:outline-none focus:border-indigo-500">

                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                            </select>
                                        </div>
                                        <div class="w-1/4 px-2">
                                            <label
                                                class="mb-2 ml-1 text-sm font-semibold text-gray-600 dark:text-gray-200">Security
                                                code</label>
                                            <div>
                                                <input
                                                    class="w-full px-3 py-2 mb-1 transition-colors border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500"
                                                    placeholder="000" type="text" />
                                            </div>
                                        </div>

                                    </div>
                                    <div>
                                        <button wire:click="payer()" wire:loading.attr='disabled'
                                            class="block w-full max-w-xs px-3 py-2 mx-auto font-semibold text-white bg-indigo-500 rounded-lg hover:bg-indigo-700 focus:bg-indigo-700"><i
                                                class="mr-1 mdi mdi-lock-outline"></i> <span
                                                wire:loading.remove>PAYER</span>
                                            <span wire:loading wire:target='payer'>PAIEMENT...</span>
                                        </button>

                                    </div>
                                </div>
                            </div>
                            <div class="w-full p-6 border-b border-gray-200">
                                <div class="mb-5">
                                    <label for="type2" class="flex items-center cursor-pointer">
                                        <input type="checkbox" class="w-5 h-5 text-indigo-500 form-radio"="type"
                                            id="type2" x-model="isOther" @click="isCard=false">
                                        <img src="/images/icon/maxicash.png" class="h-6 ml-3">

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

        @endif

    </div>
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>





@push('script')




<script>
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


    function app() {
        return {
            isOther: false,
            isCard: false,

        }
    }
</script>
@endpush