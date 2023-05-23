<div x-data="app()" class="flex">

    <div class="px-3 md:w-6/12">

        <div class="rounded-lg">

            <div class="w-full p-4 mb-4 font-semibold bg-white border border-gray-200 rounded-md">
                <div>
                    <h1>Paiement Projet</h1>

                </div>


            </div>


        </div>

    </div>

    <div class="px-3 md:w-6/12">

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
                        <input type="checkbox" class="w-5 h-5 text-indigo-500 form-radio" id="type1" x-model="isCard"
                            @click="isOther=false">
                        <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-6 ml-3">
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
                                ()</span>
                            <span wire:loading wire:target='pay'>PAIEMENT...</span>
                        </button>

                    </div>

                </div>

            </div>

            <div class="w-full p-6 border-b border-gray-200">
                <div class="mb-5">
                    <label for="type2" class="flex items-center cursor-pointer">
                        <input type="checkbox" class="w-5 h-5 text-indigo-500 form-radio"="type" id="type2"
                            x-model="isOther" @click="isCard=false">

                        <img src="{{asset('/images/icon/maxicash.png')}}" class="h-6 ml-3">
                        <span>MaxiCash</span>

                    </label>
                </div>
                <div x-collapse x-cloak x-show="isOther">

                    <div class="flex flex-col gap-4 mb-3">


                        <x-input label="Nom" wire:model.defer="name" />



                        <x-input label="telephone" wire:model.defer="telephone" />

                        <button wire:click="checkoutmaxi()" wire:loading.attr='disabled'
                            class="block w-full max-w-xs px-3 py-2 mx-auto font-semibold text-white bg-indigo-500 rounded-lg hover:bg-indigo-700 focus:bg-indigo-700"><i
                                class="mr-1 mdi mdi-lock-outline"></i> <span wire:loading.remove>PAYER</span>
                            <span wire:loading wire:target='checkoutmaxi'>PAIEMENT...</span>
                        </button>

                    </div>

                </div>
            </div>
        </div>


    </div>
    {{-- Be like water. --}}
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