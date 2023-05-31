<div>
    <section class="px-4 py-4 md:px-6 lg:px-12 xl:px-20">
        <div>
            @include('include.breadcumbFreelance',['missionAccepter'=>'mission','missionView'=>$projet->id])
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

                    <p class="text-base text-gray-600 dark:text-gray-300">Paiement :


                        @if ($projetResponse->is_paid=='payer')
                        <span class="font-bold text-green-600">{{$projetResponse->is_paid}}</span>
                        @else
                        <span class="font-bold text-yellow-200">{{$projetResponse->is_paid}}</span>
                        @endif
                    </p>
                    <p class="text-base text-gray-600 dark:text-gray-300">statut :



                        @if($projet->feedbackProjet->etat =="En attente de traitement")
                        <span class="text-red-300 px-1.5 py-0.5 rounded-lg ">En attente de traitement</span>
                        @elseif ($projet->feedbackProjet->etat =="Livré")
                        <span class="text-green-500 px-1.5 py-0.5 rounded-lg ">Livré</span>

                        @elseif ($projet->feedbackProjet->etat =="En cours de préparation")
                        <span class="text-red-200 px-1.5 py-0.5 rounded-lg ">En cours de préparation</span>
                        @else
                        <span class="bg-red-500 px-1.5 py-0.5 rounded-lg ">En transit</span>
                        @endif
                    </p>

                    <p class="text-base text-gray-600 dark:text-gray-300">Progression : <span
                            class="font-bold text-green-600">{{$projet->progress}} %</span>
                    </p>


                </div>

                <!-- Freelance lié à la commande -->
                <div class="px-6 py-4 border-t border-gray-200">
                    <p class="mb-2 text-lg text-gray-800">Client </p>
                    <div class="flex items-center">
                        @if (!empty($projet->user->profile_photo_path))
                        <img class="w-12 h-12 rounded-full"
                            src="{{Storage::disk('local')->url('profiles-photos/'.$projet->user->profile_photo_path) }}"
                            alt="">
                        @else
                        <img class="w-12 h-12 rounded-full" src="{{ $projet->user->profile_photo_url }}" alt="">
                        @endif
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

                <div class="px-6 py-4 border-t border-gray-200">
                    <p class="mb-2 text-lg text-gray-800">Fichier </p>
                    <div class="flex items-center">

                        @if(isset($projet->files) && !empty($projet->files))

                        @forelse ($projet->files as $key => $file)
                        @if (Str::endsWith($file, ['.jpg', '.jpeg', '.png', '.gif']))
                        <!-- Afficher une image -->
                        <img class="" src="{{ Storage::disk('local')->url('Project/'.$file) }}" alt="Image" />
                        @elseif (Str::endsWith($file, ['.pdf', '.doc', '.docx', '.xls', '.xlsx']))
                        <!-- Afficher un lien vers le document -->
                        <a href="{{ Storage::disk('local')->url('Project/'.$file) }}" target="_blank">Voir le
                            document</a>
                        @else
                        <!-- Afficher un message pour les autres types de fichiers -->
                        <p>Ce type de fichier n'est pas pris en charge.</p>
                        @endif
                        @empty
                        <!-- Aucun fichier trouvé -->
                        @endforelse



                        @else

                        <p>Pas de fichier.</p>

                        @endif







                    </div>
                </div>
                <div x-data="{open:false}" class="px-6 py-4 border-t border-gray-200">

                    <h2 class="mb-4 text-lg font-semibold">Gestion de projet</h2>


                    @if($projet->feedbackprojet->etat=="Livré")

                    <div>
                        <h1 class="mb-4 text-dark-800">Vous avez deja livrer(realiser) la commande</h1>

                        <div class="mb-4">
                            <h1 class="text-dark-800">Le feedback Projet du client</h1>
                        </div>
                        <div class="flex flex-col gap-4">

                            <h1 class="text-base text-gray-900 dark:text-white">Satifisfation:
                                {{$projet->feedbackprojet->satisfaction}}/5</h1>

                            <h1 class="text-base text-gray-900 dark:text-white">Commentaires</h1>

                            <p class="text-base text-gray-900 dark:text-white">
                                {{$projet->feedbackprojet->commentaires?
                                $projet->feedbackprojet->commentaires:'pas de commentaire'}}
                            </p>

                            <div>

                                <x-toggle wire:model="publier" x-on:change='$wire.toogle()' label="Publier" />
                            </div>

                        </div>

                    </div>


                    @else

                    <div class="grid gap-4 md:grid-cols-3 ">
                        <div>


                            <x-select wire:model.defer='status' label="Statut de la order">


                                <x-select.option label="En attente de traitement" value="En attente de traitement" />
                                <x-select.option label="En cours de préparation" value="En cours de préparation" />
                                <x-select.option label="En transit" value="En transit" />
                                <x-select.option label="Livré" value="Livré" />

                            </x-select>
                        </div>
                        <div>
                            <x-datetime-picker wire:model.defer='jour' parse-format="YYYY-MM-DD HH:mm:ss"
                                label='Date de livraison' />


                        </div>
                        <div>

                            <x-select wire:model.defer="progress" label="Progression {{$progress}} %">

                                @for ($i=0; $i
                                <=10; $i++) <x-select.option label="{{$i*10}}%" value="{{$i*10}}" />

                                @endfor




                            </x-select>




                        </div>
                        <div class="">

                            <x-button wire:click="modLivre()" primary spinner="modLivre" label="Appliquer"></x-button>
                        </div>

                    </div>


                    @endif



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
                                <svg x-show="open" class="w-4 h-4 fill-current text-dark"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
                                <svg x-show="open" class="w-4 h-4 fill-current text-dark"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M14.293 15.293a1 1 0 01-1.414 0L10 12.414l-2.293 2.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 010 1.414z" />
                                </svg>
                            </span>
                        </a>
                        <div x-cloak x-show="open" x-collapse>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Numéro de transaction :
                                #</p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Méthode de paiement : Carte de crédit
                            </p>
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

</div>