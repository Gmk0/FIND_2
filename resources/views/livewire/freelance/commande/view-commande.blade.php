<!-- Exemple de section pour afficher les détails d'une commande avec options supplémentaires -->
<section wire:ignore class="px-4 py-4 md:px-6 lg:px-12 xl:px-20">
    <div>
        @include('include.breadcumbFreelance',['commande'=>'commande','commandeID'=>$Order->id])
    </div>
    <div class="mx-auto md:max-w-5xl">

        <!-- Titre de la section -->
        <h2 class="mb-4 text-3xl font-semibold text-gray-800 dark:text-gray-200">Détails de la commande</h2>

        <!-- Contenu de la section -->
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <!-- Informations sur la commande -->
            <div class="grid grid-cols-1 px-6 py-4 md:grid-cols-2 ">
                <p class="mb-2 text-lg text-gray-800 font-inter dark:text-gray-200">Commande #{{$Order->order_numero}}
                </p>
                <p class="mb-2 text-lg text-gray-800 dark:text-gray-200">Service : {{$Order->service->title}}</p>
                <p class="text-base text-gray-600 dark:text-gray-300">Date de commande : {{$Order->created_at}}</p>
                <p class="text-base text-gray-600 dark:text-gray-300">Délai de livraison :
                    {{$Order->service->basic_delivery_time}} jour</p>

                <p class="text-base text-gray-600 dark:text-gray-300">Paiement : <span
                        class="font-bold text-green-600">{{$Order->status}}</span>
                </p>
                <p class="text-base text-gray-600 dark:text-gray-300">statut : <span
                        class="font-bold text-green-600">{{$Order->status}}</span>
                </p>


            </div>

            <!-- Freelance lié à la commande -->
            <div class="px-6 py-4 border-t border-gray-200">
                <p class="mb-2 text-lg text-gray-800">Client </p>
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/48" alt="Avatar du freelance" class="w-12 h-12 rounded-full">
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{$Order->user->name}}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            {{$Order->user->email}}</p>
                    </div>
                </div>
            </div>

            <!-- Avancement de la commande -->


            <div class="w-full p-4 bg-white rounded-lg shadow-md">
                <!-- Titre de la section -->
                <h2 class="mb-4 text-lg font-semibold">Gestion de projet</h2>
                <!-- Barre de progression -->
                <p class="mb-2 text-lg text-gray-800">Avancement</p>
                <div x-data="{range:''}" class="flex items-center">
                    <div class="flex-1">
                        <div class="w-full h-3 rounded-lg">
                            <input type="range" class="w-full" wire:model.defer="progress" id="" min="0" max="100">

                        </div>
                    </div>
                    <span x-text='range'></span>
                    <p class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{$Order->progress}}%</p>
                </div>

                <!-- Boutons d'action -->
                <div class="flex justify-end my-6">
                    <button wire:click="changePercent()"
                        class="px-4 py-2 mr-2 text-white bg-blue-500 rounded-md">Modifier</button>
                    <button class="px-4 py-2 text-white bg-green-500 rounded-md">Terminer</button>
                </div>

                <!-- Formulaire de rapport d'avancement -->
                <div class="flex flex-col space-y-4">
                    <label class="text-sm font-semibold" for="progress">Rapport d'avancement</label>

                    <x-textarea wire:model.defer='description' />

                    <button wire:click="SendRapport()" class="self-end px-4 py-2 text-white bg-blue-500 rounded-md">
                        <span wire:target='SendRapport' wire:loading.remove>Soumettre</span> <span wire:loading
                            wire:target='SendRapport'>Soumission...</span></button>
                </div>


                <div class="mt-6">
                    <div class="w-full px-4 overflow-y-hidden bg-white rounded-lg lg:w-1/3">
                        <h4 class="p-6 text-xl font-semibold text-gray-800 capitalize">Activity</h4>
                        <div class="relative h-full px-8 pt-2">
                            <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>

                            <!-- start::Timeline item -->

                            <div class="flex items-center w-full my-6 -ml-1.5">
                                <div class="w-1/12">
                                    <div class="w-3.5 h-3.5 bg-primary rounded-full"></div>
                                </div>
                                <div class="w-11/12">

                                    <p class="text-sm text-gray-700 dark:text-gray-300">.</p>




                                    <p class="text-sm text-gray-700 dark:text-gray-300">
                                        <a href="#" class="font-bold text-primary"></a>
                                        a
                                        Procedé au paiement <a href="#" class="font-bold text-primary"></a>.
                                    </p>


                                    <p class="text-xs text-gray-500 dark:text-gray-300 ">
                                    </p>
                                </div>
                            </div>


                            <!-- end::Timeline item -->

                            <!-- start::Timeline item -->

                            <!-- end::Timeline item -->
                        </div>
                    </div>
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
                            <svg x-show="open" class="w-4 h-4 fill-current text-dark" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
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
                            <svg x-show="open" class="w-4 h-4 fill-current text-dark" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M14.293 15.293a1 1 0 01-1.414 0L10 12.414l-2.293 2.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 010 1.414z" />
                            </svg>
                        </span>
                    </a>
                    <div x-cloak x-show="open" x-collapse>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Numéro de transaction :
                            #{{$Order->transaction->id}}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Méthode de paiement : Carte de crédit</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Montant payé : {{$Order->total_amount}}
                        </p>
                        <button class="px-4 py-2 mt-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Voir
                            transaction</button>

                    </div>

                </div>
            </div>


            <!-- Options supplémentaires -->


            <!-- Transaction de paiement liée -->

        </div>
    </div>
</section>