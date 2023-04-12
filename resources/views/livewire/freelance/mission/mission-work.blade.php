<!-- Exemple de section pour afficher les détails d'une commande avec options supplémentaires -->
<section wire:ignore class="px-4 py-4 md:px-6 lg:px-12 xl:px-20">
    <div>
        @include('include.breadcumbFreelance',['commande'=>'commande','commandeID'=>5])
    </div>
    <div class="mx-auto md:max-w-7xl">

        <!-- Titre de la section -->
        <h2 class="mb-4 text-3xl font-semibold text-gray-800 dark:text-gray-200">Détails de la mission</h2>

        <!-- Contenu de la section -->
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <!-- Informations sur la commande -->
            <div class="grid grid-cols-1 px-6 py-4 md:grid-cols-2 ">
                <p class="mb-2 text-lg text-gray-800 font-inter dark:text-gray-200">Mission #{{$projet->id}}
                </p>
                <p class="mb-2 text-lg text-gray-800 dark:text-gray-200">Titre : {{$projet->title}}</p>
                <p class="text-base text-gray-600 dark:text-gray-300">Date de debut : {{$projet->begin_project}}</p>
                <p class="text-base text-gray-600 dark:text-gray-300">Délai de livraison :
                    {{$projet->end_project}} jour</p>

                <p class="text-base text-gray-600 dark:text-gray-300">Paiement : <span
                        class="font-bold text-green-600"></span>
                </p>
                <p class="text-base text-gray-600 dark:text-gray-300">statut : <span
                        class="font-bold text-green-600"></span>
                </p>


            </div>

            <!-- Freelance lié à la commande -->
            <div class="px-6 py-4 border-t border-gray-200">
                <p class="mb-2 text-lg text-gray-800">Client </p>
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/48" alt="Avatar du freelance" class="w-12 h-12 rounded-full">
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{$projet->user->name}}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            {{$projet->user->email}}</p>
                    </div>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                <p class="mb-2 text-lg text-gray-800">Description </p>
                <div class="flex items-center">

                    <p class="text-sm text-gray-600 dark:text-gray-300">{{$projet->description}}</p>


                </div>
            </div>
            <div x-data="{open:false}" class="px-6 py-4 border-t border-gray-200">

                <h2 class="mb-4 text-lg font-semibold">Gestion de projet</h2>

                <div class="grid gap-4 md:grid-cols-3 ">
                    <div>


                        <x-select wire:modeldefer='status' label="Statut de la commande">


                            <x-select.option label="En attente de traitement" value="En attente de traitement" />
                            <x-select.option label="En cours de préparation" value="En cours de préparation" />
                            <x-select.option label="En transit" value="En transit" />
                            <x-select.option label="Livré" value="Livré" />

                        </x-select>
                    </div>
                    <div>
                        <x-datetime-picker wire:modeldefer='jour' label='Date de livraison' />


                    </div>
                    <div>
                        <x-inputs.number max="100" wire:model.defer='progress' label='Progression'>
                            </x-input>
                    </div>
                    <div class="">

                        <x-button wire:click="modLivre()" label="Modifier"></x-button>
                    </div>

                </div>

            </div>

            <!-- Avancement de la commande -->


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
                            <svg x-show="open" class="w-4 h-4 fill-current text-dark" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M14.293 15.293a1 1 0 01-1.414 0L10 12.414l-2.293 2.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 010 1.414z" />
                            </svg>
                        </span>
                    </a>

                    <div x-cloak x-show="open" x-collapse class="">



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
                            #</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Méthode de paiement : Carte de crédit</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Montant payé :
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