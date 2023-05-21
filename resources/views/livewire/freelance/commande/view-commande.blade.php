<!-- Exemple de section pour afficher les détails d'une Order avec options supplémentaires -->

<div>

    <div class="px-4 py-4 md:px-6 lg:px-12 xl:px-20">
        <div>
            @include('include.breadcumbFreelance',['Order'=>'Order','OrderID'=>$Order->transaction->transaction_numero])
        </div>
        <div class="mx-auto md:max-w-5xl">

            <!-- Titre de la section -->
            <h2 class="mb-4 text-3xl font-semibold text-gray-800 dark:text-gray-200">Détails de la Order</h2>

            <!-- Contenu de la section -->
            <div wire:ignore. class="overflow-hidden bg-white rounded-lg shadow-md">
                <!-- Informations sur la Order -->
                <div class="grid grid-cols-1 px-6 py-4 md:grid-cols-2 ">
                    <p class="mb-2 text-lg text-gray-800 font-inter dark:text-gray-200">Commande
                        #{{$Order->order_numero}}
                    </p>
                    <p class="mb-2 text-lg text-gray-800 dark:text-gray-200">Service : {{$Order->service->title}}</p>
                    <p class="text-base text-gray-600 dark:text-gray-300">Date de Order : {{$Order->created_at}}
                    </p>
                    <p class="text-base text-gray-600 dark:text-gray-300">Délai de livraison :
                        {{$Order->feedback->delai_livraison_estimee}} jour</p>

                    <p class="text-base text-gray-600 dark:text-gray-300">Paiement : <span
                            class="font-bold text-green-600">{{$Order->status}}</span>
                    </p>
                    <p class="text-base text-gray-600 dark:text-gray-300">statut : <span
                            class="font-bold text-green-600">{{$Order->feedback->etat}}</span>
                    </p>


                </div>

                <!-- Freelance lié à la Order -->
                <div class="px-6 py-4 border-t border-gray-200">
                    <p class="mb-2 text-lg text-gray-800">Client </p>
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/48" alt="Avatar du freelance"
                            class="w-12 h-12 rounded-full">
                        <div class="ml-4">
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{$Order->user->name}}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">
                                {{$Order->user->email}}</p>
                        </div>
                    </div>
                </div>
                <div x-data="{open:false}" class="px-6 py-4 border-t border-gray-200">

                    <h2 class="mb-4 text-lg font-semibold">Gestion de projet</h2>

                    <div class="grid gap-4 md:grid-cols-3 ">
                        <div>


                            <x-select disabled wire:model.defer='status' label="Statut de la Order">


                                <x-select.option label="En attente de traitement" value="En attente de traitement" />
                                <x-select.option label="En cours de préparation" value="En cours de préparation" />
                                <x-select.option label="En transit" value="En transit" />
                                <x-select.option label="Livré" value="Livré" />

                            </x-select>
                        </div>
                        <div>
                            <x-datetime-picker disabled wire:model.defer='jour' label='Date de livraison' />


                        </div>
                        <div>
                            <x-inputs.number disabled max="100" wire:model.defer='progress' label='Progression'>
                                </x-input>
                        </div>
                        <div class="">

                            <x-button wire:click="openModal()" spinner="modLivre" label="Modifier"></x-button>
                        </div>

                    </div>

                </div>

                <!-- Avancement de la Order -->


                <div class="w-full p-4 bg-white border-t border-gray-200 rounded-lg shadow-md">
                    <!-- Titre de la section -->

                    <!-- Barre de progression -->


                    <!-- Formulaire de rapport d'avancement -->
                    <div class="flex flex-col space-y-4">
                        <label class="text-sm font-semibold" for="progress">Rapport d'avancement</label>

                        <x-textarea wire:model.defer='description' />

                        <button wire:click="SendRapport()" class="self-end px-4 py-2 text-white bg-blue-500 rounded-md">
                            <span wire:target='SendRapport' wire:loading.remove>Soumettre</span> <span wire:loading
                                wire:target='SendRapport'>Soumission...</span></button>
                    </div>




                    <div x-data="{open:false}" class="px-6 py-4 border-t border-gray-200">
                        <a @click="open=!open" class="flex gap-2 mb-2 text-lg font-bold text-gray-800 cursor-pointer">
                            <span>Rapport Envoyer</span>
                            <span>
                                <svg x-show="!open" class="w-4 h-4 fill-current text-dark"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M5.293 6.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" />
                                </svg>
                                <svg x-show="open" class="w-4 h-4 fill-current text-dark"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M14.293 15.293a1 1 0 01-1.414 0L10 12.414l-2.293 2.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 010 1.414z" />
                                </svg>
                            </span>
                        </a>

                        <div x-cloak x-show="open" x-collapse class="">

                            @forelse ($Order->rapports as $rappors)
                            <div>
                                <p class="text-base text-gray-600 dark:text-gray-300">{{$rappors->description}}</p>
                                <Span class="mt-4 text-sm text-gray-500">{{$rappors->created_at->formatLocalized('%e
                                    %B')}}</Span>

                            </div>

                            @empty

                            @endforelse


                        </div>


                    </div>


                    <div x-data="{open:false}" class="px-6 py-4 border-t border-gray-200">

                        <a @click="open=!open" class="flex mb-2 text-lg font-bold text-gray-800 ">
                            <span>Transaction de paiement liée</span>
                            <span>
                                <svg x-show="!open" class="w-4 h-4 fill-current text-dark"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M5.293 6.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" />
                                </svg>
                                <svg x-show="open" class="w-4 h-4 fill-current text-dark"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M14.293 15.293a1 1 0 01-1.414 0L10 12.414l-2.293 2.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 010 1.414z" />
                                </svg>
                            </span>
                        </a>
                        <div x-cloak x-show="open" x-collapse>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Numéro de transaction :
                                #{{$Order->transaction->id}}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Méthode de paiement : Carte de crédit
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Montant payé :
                                {{$Order->total_amount}}
                            </p>
                            <button class="px-4 py-2 mt-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Voir
                                transaction</button>

                        </div>

                    </div>
                </div>


                <x-modal wire:model.defer="modal">
                    <x-card title="Success">

                        <div class="flex flex-col">

                        </div>

                        <x-slot name="footer">
                            <div class="flex justify-end gap-x-4">
                                <x-button flat label="Cancel" x-on:click="close" />

                                <x-button flat label="Envoyer" wire:click="sendFeedback()" primary />


                            </div>
                        </x-slot>

                    </x-card>

                </x-modal>

                <!-- Options supplémentaires -->


                <!-- Transaction de paiement liée -->

            </div>
        </div>
    </div>
</div>