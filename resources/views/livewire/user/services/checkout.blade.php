<div x-data="app()" class="min-w-screen dark:bg-gray-900 min-h-screen pt-24 bg-gray-100 py-5">

    <div class="md:px-12">
        <div>
            <div class="mb-2">
                @include('include.breadcumb',['serviceAll'=>'services','checkout'=>'checkout'])
            </div>
            <div class="mb-2">
                <h1 class="text-3xl md:text-5xl font-bold text-gray-600 dark:text-gray-200">Checkout.</h1>
            </div>

        </div>

        @if(Session::has('cart'))



        <div
            class="w-full mx-0 bg-white dark:bg-gray-800 border-t rounded-md border-b border-gray-200 px-5 py-10 text-gray-800">
            <div class="w-full">
                <div class="-mx-3 md:flex items-start">
                    <div class="px-3 md:w-7/12 lg:pr-10">
                        @foreach ($products as $item)
                        <div class="w-full mx-auto text-gray-800 font-light mb-6 border-b border-gray-200 pb-6">
                            <div class="w-full flex items-center">
                                <div class="overflow-hidden rounded-lg w-16 h-16 bg-gray-50 border border-gray-200">
                                    <img src="{{Storage::disk('local')->url('public/service/'.$item['image']) }}"
                                        alt="">
                                </div>
                                <div class="flex-grow pl-3">
                                    <h6 class="font-semibold uppercase text-gray-600 dark:text-gray-200">
                                        {{$item['title']}}</h6>
                                    <p class="text-gray-400 dark:text-gray-50">{{$item['quantity']}}</p>
                                </div>
                                <div>
                                    <span
                                        class="font-semibold text-gray-600 dark:text-gray-200 text-xl">${{$item['basic_price']}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="mb-6 pb-6 border-b border-gray-200">
                            <div class="-mx-2 flex items-end justify-end">
                                <div class="flex-grow px-2 lg:max-w-xs">
                                    <label
                                        class="text-gray-600 dark:text-gray-200 font-semibold text-sm mb-2 ml-1">Discount
                                        code</label>
                                    <div>
                                        <input
                                            class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                            placeholder="XXXXXX" type="text" />
                                    </div>
                                </div>
                                <div class="px-2">
                                    <button
                                        class="block w-full max-w-xs mx-auto border border-transparent bg-gray-400 hover:bg-gray-500 focus:bg-gray-500 text-white rounded-md px-5 py-2 font-semibold">APPLY</button>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6 pb-6 border-b border-gray-200 text-gray-800">
                            <div class="w-full flex mb-3 items-center">
                                <div class="flex-grow">
                                    <span class="text-gray-600 dark:text-gray-200">Subtotal</span>
                                </div>
                                <div class="pl-3">
                                    <span
                                        class="font-semibold dark:text-gray-50">${{Session('cart')->totalPrice}}</span>
                                </div>
                            </div>
                            <div class="w-full flex items-center">
                                <div class="flex-grow">
                                    <span class="text-gray-600 dark:text-gray-200">Taxes (GST)</span>
                                </div>
                                <div class="pl-3">
                                    <span class="font-semibold dark:text-gray-50">$0</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6 pb-6 border-b border-gray-200 md:border-none text-gray-800 text-xl">
                            <div class="w-full flex items-center">
                                <div class="flex-grow">
                                    <span class="text-gray-600 dark:text-gray-200">Total</span>
                                </div>
                                <div class="pl-3">
                                    <span class="font-semibold text-gray-400 dark:text-gray-20 text-sm"></span> <span
                                        class="font-semibold">${{Session('cart')->totalPrice}}</span>
                                </div>
                            </div>
                        </div>


                        <div
                            class="w-full hdidden mx-auto rounded-lg bg-white  dark:bg-gray-700 border border-gray-200 p-3 text-gray-800 font-light mb-6">
                            <div class="w-full flex flex-col gap-2 mb-3 ">
                                <div class="w-32">
                                    <span class="text-gray-600 dark:text-gray-200 font-semibold">Contact</span>
                                </div>

                                <x-input placeholder='name' />


                            </div>
                            <div class="w-full flex flex-col gap-2 ">
                                <div class="w-32">
                                    <span class="text-gray-600 dark:text-gray-200 font-semibold">Billing Address</span>
                                </div>

                                <x-input placeholder='adrresse 1' />
                                <x-input placeholder='adrresse 1' />
                                <x-input placeholder='commune' />
                                <x-input placeholder='Ville' />
                                <x-input placeholder='Pays' />


                            </div>
                        </div>
                    </div>
                    <div class="px-3 md:w-5/12">

                        <div
                            class="w-full sticky top-8 mx-auto rounded-lg bg-white dark:bg-gray-700 border border-gray-200 text-gray-800 font-light mb-6">
                            <div class="w-full p-3 border-b border-gray-200 ">
                                <div class="mb-5">
                                    <label for="type1" class="flex items-center cursor-pointer">
                                        <input type="checkbox" class="form-radio h-5 w-5 text-indigo-500"="type"
                                            id="type1" x-model="isCard" @click="isOther=false">
                                        <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png"
                                            class="h-6 ml-3">
                                    </label>
                                </div>
                                <div x-collapse x-cloak x-show="isCard">
                                    <div class="mb-3">
                                        <label class="text-gray-600 dark:text-gray-200 font-semibold text-sm mb-2 ml-1">
                                            on
                                            card</label>
                                        <div>
                                            <input
                                                class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                placeholder="John Smith" type="text" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            class="text-gray-600 dark:text-gray-200 font-semibold text-sm mb-2 ml-1">Card
                                            number</label>
                                        <div>
                                            <x-input placeholder="0000 0000 0000 0000" />
                                        </div>
                                    </div>
                                    <div class="mb-3 -mx-2 flex items-end">
                                        <div class="px-2 w-1/4">
                                            <label
                                                class="text-gray-600 dark:text-gray-200 font-semibold text-sm mb-2 ml-1">Expiration
                                                date</label>
                                            <div>
                                                <select
                                                    class="form-select w-full px-3 py-2 mb-1 border dark:text-gray-800 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
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
                                        <div class="px-2 w-1/4">
                                            <select
                                                class="form-select dark:text-gray-800 w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">

                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                            </select>
                                        </div>
                                        <div class="px-2 w-1/4">
                                            <label
                                                class="text-gray-600 dark:text-gray-200 font-semibold text-sm mb-2 ml-1">Security
                                                code</label>
                                            <div>
                                                <input
                                                    class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                    placeholder="000" type="text" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full p-6 border-b border-gray-200">
                                <div class="mb-5">
                                    <label for="type1" class="flex items-center cursor-pointer">
                                        <input type="checkbox" class="form-radio h-5 w-5 text-indigo-500"="type"
                                            id="type1" x-model="isOther" @click="isCard=false">
                                        <label class="text-gray-600 dark:text-gray-200 font-semibold text-sm mb-2 ml-1">
                                            Autres</label>
                                    </label>
                                </div>
                                <div x-collapse x-cloak x-show="isOther">
                                    <div class="mb-3">
                                        <label class="text-gray-600 dark:text-gray-200 font-semibold text-sm mb-2 ml-1">
                                            on
                                            Mobile</label>
                                        <div>
                                            <x-button primary lg label='Mobile' />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="text-gray-600 dark:text-gray-200 font-semibold text-sm mb-2 ml-1">
                                            on
                                            Maxi Cash</label>
                                        <div>
                                            <x-button primary lg label='Maxi Cash' />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="text-gray-600 dark:text-gray-200 font-semibold text-sm mb-2 ml-1">
                                            on
                                            PayPal</label>
                                        <div>
                                            <x-button primary lg label='PayPal' />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <button wire:click="payer()" wire:loading.attr='disabled'
                                class="block w-full  max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-2 font-semibold"><i
                                    class="mdi mdi-lock-outline mr-1"></i> <span wire:loading.remove>PAYER</span>
                                <span wire:loading wire:target='payer'>PAIEMENT...</span>
                            </button>

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