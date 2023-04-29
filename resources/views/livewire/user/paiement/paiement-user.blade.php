{{-- Success is as dangerous as failure. --}}


<div class="min-h-screen">
    <div>
        @include('include.breadcumbUser',['paiment'=>'Paiement'])
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <div class="max-w-3xl  mb-8">
            <h2 class="text-xl text-indigo-600 mb-8 font-semibold tracking-wide uppercase">Méthodes de paiement
                enregistrées</h2>

            <p class="mt-4  md:text-xl  text-gray-500 dark:text-gray-100 lg:mx-auto">
                Vous pouvez ajouter ou supprimer des méthodes de paiement à tout moment dans votre profil
                utilisateur.
            </p>
        </div>


        <div class="mt-10">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-2">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg leading-6 font-medium text-gray-800">Carte de crédit</h3>
                            <span class="bg-red-600 text-white py-1 px-2 rounded-full text-xs">Désactivé</span>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm text-gray-500 dark:text-gray-100">Nom du titulaire de la carte</p>
                            <p class="mt-2 text-xl font-semibold text-gray-800">**** **** **** 1234</p>
                        </div>
                    </div>
                </div>


                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg leading-6 font-medium text-gray-800">Mobile</h3>
                            <span class="bg-green-400 text-green-800 py-1 px-2 rounded-full text-xs">Activer</span>
                        </div>
                        <div class="mt-4 divide-y ">

                            @empty(!$methodePaiment)
                            @forelse ($methodePaiment->mobile as $key => $value)
                            <div x-data="{linkHover:false}" class="flex gap-4 justify-between">

                                <p class="mt-2 flex text-lg font-semibold text-gray-800"><span
                                        class=''>{{$value['operateur']}} :</span>
                                    +{{$value['mobile']}}</p>

                                <div class="mb-1">
                                    <x-button.circle icon='pencil' wire:click="editMobile({{$key}})">
                                        </x-button>
                                        <x-button.circle wire:click="removeMobile({{$key}})" icon='trash'>
                                            </x-button>
                                </div>
                            </div>


                            @empty

                            @endforelse

                            @endempty


                        </div>

                        <div class="mt-3">
                            <x-button positive @click="$wire.openModalMobile()" label="Ajouter" />
                        </div>
                    </div>
                </div>



            </div>
            <div class="grid grid-cols-2 mt-10">

            </div>


        </div>


        <x-modal wire:model="modalMobile">

            <x-card title="Mobile">

                <div class="flex flex-col gap-3">

                    <x-select wire:model.defer="operateur" label="operateur"
                        :options="['Vodacom', 'Orange', 'Airtel','Africell']">

                    </x-select>
                    <x-inputs.phone mask="['(###) ####-###-###']" placeholder="243844720350" label="Numero"
                        wire:model.defer="mobile">
                        </x-input>
                </div>

                <x-slot name="footer">
                    <div class="flex justify-end gap-x-4">
                        <x-button flat label="Cancel" x-on:click="close" />

                        @if($editModal)

                        <x-button flat positive wire:click="editMobileNumber()" spinner="addMobile" label="Modifier" />

                        @else

                        <x-button flat positive wire:click="addMobile()" spinner="addMobile" label="Ajouter" />

                        @endif



                    </div>
                </x-slot>

            </x-card>

        </x-modal>

        <x-modal wire:model="modalVirement">

        </x-modal>

        <x-modal wire:model="modalCarte">

        </x-modal>


    </div>
</div> {{-- Be like water. --}}
