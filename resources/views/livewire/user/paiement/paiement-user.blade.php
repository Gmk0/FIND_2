{{-- Success is as dangerous as failure. --}}


<div class="min-h-screen">
    <div>
        @include('include.breadcumbUser',['paiment'=>'Paiement'])
    </div>
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">


        <div class="max-w-3xl mb-8">
            <h2 class="mb-8 text-xl font-semibold tracking-wide text-indigo-600 uppercase">Méthodes de paiement
                enregistrées</h2>

            <p class="mt-4 text-gray-500 md:text-xl dark:text-gray-100 lg:mx-auto">
                Vous pouvez ajouter ou supprimer des méthodes de paiement à tout moment dans votre profil
                utilisateur.
            </p>
        </div>


        <div class="mt-10">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-2">


                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium leading-6 text-gray-800">Carte de crédit</h3>
                            <span class="px-2 py-1 text-xs text-white bg-red-600 rounded-full">Désactivé</span>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm text-gray-500 dark:text-gray-100">Nom du titulaire de la carte</p>
                            <p class="mt-2 text-xl font-semibold text-gray-800">**** **** **** 1234</p>
                        </div>


                    </div>
                </div>


                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium leading-6 text-gray-800">Mobile</h3>
                            <span class="px-2 py-1 text-xs text-green-800 bg-green-400 rounded-full">Activer</span>
                        </div>
                        <div class="mt-4 divide-y ">

                            @empty(!$methodePaiment)
                            @forelse ($methodePaiment->mobile as $key => $value)
                            <div x-data="{linkHover:false}" class="flex justify-between gap-4">

                                <p class="flex mt-2 text-lg font-semibold text-gray-800"><span
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





                            {{-- <div x-data="{ selected: '' }">
                                <div class="flex items-center">
                                    <select x-model="selected"
                                        class="w-24 px-3 py-2 bg-white border border-gray-300 shadow-sm rounded-l-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">+</option>
                                        @foreach ($pays as $p)
                                        <option
                                            value="{{ $p['idd']['root'] }}{{ isset($p['idd']['suffixes'][0]) ? $p['idd']['suffixes'][0] : '' }}">
                                            {{
                                            $p['name']['common'] }} ({{ $p['idd']['root'] }}{{
                                            isset($p['idd']['suffixes'][0]) ?
                                            $p['idd']['suffixes'][0] : ''
                                            }})</option>
                                        @endforeach
                                    </select>



                                    <input x-bind:value="selected"
                                        class="flex-1 px-3 py-2 bg-white border border-gray-300 shadow-sm rounded-r-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        placeholder="Numéro de téléphone">
                                </div>
                            </div>
                            --}}

                        </div>

                        <div class="mt-3">
                            <x-button positive @click="$wire.openModalMobile()" label="Ajouter" />
                        </div>
                    </div>
                </div>



            </div>
            <div class="grid grid-cols-2 mt-10">
                <div class="w-full p-4 mb-4 font-semibold bg-white border border-gray-200 rounded-md">
                    <div>
                        <h1>Address de Facturation / Livraison</h1>

                    </div>
                    <div class="flex flex-col gap-2">

                        <x-input placeholder="Rue" />
                        <x-input placeholder="Quartier" />
                        <x-input placeholder="Commune" />
                        <x-input placeholder="Ville" />

                    </div>

                </div>
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