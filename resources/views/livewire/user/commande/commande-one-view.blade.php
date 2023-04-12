<div>

    <!-- Exemple de section pour afficher les détails d'une commande avec options supplémentaires -->
    <section class="px-4 py-6 md:px-6 lg:px-12 xl:px-20">
        <div>
            @include('include.breadcumbUser',['commande'=>'commande','commandeID'=>'1'])
        </div>
        <div class="max-w-6xl mx-auto">

            <!-- Titre de la section -->
            <h2 class="mb-4 text-3xl font-semibold text-gray-800 dark:text-gray-300">Détails de la commande</h2>

            <!-- Contenu de la section -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <!-- Informations sur la commande -->
                <div class="grid grid-cols-1 px-6 py-4 lg:grid-cols-2">
                    <p class="mb-2 font-sans text-lg text-gray-800 dark:text-gray-300">Commande
                        <span class="font-bold font-inter ">{{$Order->order_numero}}</span>
                    </p>
                    <p class="mb-2 text-lg text-gray-800 dark:text-gray-300">Service : <span>
                            {{$Order->service->title}}</span> </p>
                    <p class="text-base text-gray-600 dark:text-gray-400">Date de commande :
                        <span>{{$Order->created_at}}</span>
                    </p>
                    <p class="text-base text-gray- dark:text-gray-300">Délai de livraison :
                        {{$Order->feedback->delai_livraison_estimee ? $Order->feedback->delai_livraison_estimee:'Pas
                        disponible'}} jour
                    </p>

                    <p class="text-base text-gray-600 dark:text-gray-300">Paiement : <span
                            class="font-bold text-green-600">{{$Order->status}}</span>
                    </p>
                    <p class="text-base text-gray-600 dark:text-gray-300">statut : <span
                            class="font-bold text-green-600">{{$Order->feedback->etat}}</span>
                    </p>
                </div>

                <!-- Avancement de la commande -->
                <div class="px-6 py-4 border-t border-gray-200">
                    <p class="mb-2 text-lg text-gray-800">Avancement</p>
                    <div class="flex items-center">
                        <div class="flex-1">
                            <div class="w-full h-3 bg-gray-300 rounded-lg">
                                <div class="h-3 bg-green-500 rounded-lg" style="width: {{$Order->progress}}%;"></div>
                            </div>
                        </div>
                        <p class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{$Order->progress}}%</p>
                    </div>
                </div>

                <!-- Freelance lié à la commande -->
                <div x-data="{open:false}" class="px-6 py-4 border-t border-gray-200">
                    <a @click="open=!open" class="mb-2 text-lg font-bold text-gray-800 cursor-pointer">Freelance lié</a>
                    <div x-cloak x-show="open" x-collapse class="flex items-center">
                        <img src="https://via.placeholder.com/48" alt="Avatar du freelance"
                            class="w-12 h-12 rounded-full">
                        <div class="ml-4">
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{$Order->service->freelance->nom}}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">
                                {{$Order->service->freelance->user->email}}</p>
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
                        <div>
                            <p class="text-base text-gray-600 dark:text-gray-300">Pas de raport</p>
                        </div>

                        @endforelse


                    </div>


                </div>



                <!-- Options supplémentaires -->
                <div class="px-6 py-4 border-t border-gray-200">
                    <p class="mb-2 text-lg text-gray-800">Options supplémentaires</p>
                    <div class="flex justify-end">
                        @if (empty($Order->transaction))
                        <button class="px-4 py-2 mr-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Proceder Au
                            Paiement </button>
                        @endif

                        <x-button wire:click='openModal()' class="mr-2" label='Evaluer' />
                        <button
                            class="px-4 py-2 mr-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Contacter</button>
                        <button class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Annuler
                            commande</button>
                    </div>

                </div>

                <div>


                    <!-- Transaction de paiement liée -->


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

                        @if (!empty($Order->transaction))


                        <div x-cloak x-show="open" x-collapse>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Numéro de transaction :
                                #{{$Order->transaction->id}}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Méthode de paiement : Carte de
                                crédit</p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Montant payé :
                                {{$Order->total_amount}}
                            </p>
                            <button class="px-4 py-2 mt-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Voir
                                transaction</button>

                        </div>

                        @else
                        <div x-cloak x-show="open" x-collapse>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Numéro de transaction :
                                Pas de transaction en cours</p>

                            <x-button label="Proceder au Paiment ">

                            </x-button>


                        </div>

                        @endif

                    </div>
                </div>
            </div>

            <x-modal wire:model.defer="modal">
                <x-card title="Success">

                    <div class="flex flex-col">
                        <div>

                            <div class="flex items-center">
                                <p class="mr-2">Notez votre satisfaction :</p>
                                <div wire:ignore class="flex justify-center">
                                    <div class="flex items-center ">
                                        <input value="0" type="" class="hidden" id="rating" name="rating">
                                        <label for="star1" class="text-gray-400 cursor-pointer"
                                            onclick="updateRating(1)">
                                            <svg id="star1" class="w-5 h-5 fill-current"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2L14.1386 7.26493L20.831 9.25184L16.6281 13.8239L17.9716 20.0291L12 17.6066L6.02837 20.0291L7.3719 13.8239L3.169 9.25184L9.86144 7.26493L12 2Z" />
                                            </svg>
                                        </label>
                                        <label for="star2" class="text-gray-400 cursor-pointer"
                                            onclick="updateRating(2)">
                                            <svg id="star2" class="w-5 h-5 fill-current"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2L14.1386 7.26493L20.831 9.25184L16.6281 13.8239L17.9716 20.0291L12 17.6066L6.02837 20.0291L7.3719 13.8239L3.169 9.25184L9.86144 7.26493L12 2Z" />
                                            </svg>
                                        </label>
                                        <label for="star3" class="text-gray-400 cursor-pointer"
                                            onclick="updateRating(3)">
                                            <svg id="star3" class="w-5 h-5 fill-current"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2L14.1386 7.26493L20.831 9.25184L16.6281 13.8239L17.9716 20.0291L12 17.6066L6.02837 20.0291L7.3719 13.8239L3.169 9.25184L9.86144 7.26493L12 2Z" />
                                            </svg>
                                        </label>
                                        <label for="star4" class="text-gray-400 cursor-pointer"
                                            onclick="updateRating(4)">
                                            <svg id="star4" class="w-5 h-5 fill-current"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2L14.1386 7.26493L20.831 9.25184L16.6281 13.8239L17.9716 20.0291L12 17.6066L6.02837 20.0291L7.3719 13.8239L3.169 9.25184L9.86144 7.26493L12 2Z" />
                                            </svg>
                                        </label>
                                        <label for="star5" class="text-gray-400 cursor-pointer"
                                            onclick="updateRating(5)">
                                            <svg id="star5" class="w-5 h-5 fill-current"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2L14.1386 7.26493L20.831 9.25184L16.6281 13.8239L17.9716 20.0291L12 17.6066L6.02837 20.0291L7.3719 13.8239L3.169 9.25184L9.86144 7.26493L12 2Z" />
                                            </svg>
                                        </label>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <x-textarea wire:model.defer="feedback.description" />
                    </div>

                    <x-slot name="footer">
                        <div class="flex justify-end gap-x-4">
                            <x-button flat label="Cancel" x-on:click="close" />

                            <x-button flat label="Envoyer" wire:click="sendFeedback()" primary />


                        </div>
                    </x-slot>

                </x-card>

            </x-modal>
    </section>
    {{-- The Master doesn't talk, he acts. --}}
</div>

@push('script')

<script>
    function updateRating(rating) {
      document.getElementById('rating').value = rating;
      
      for (let i = 1; i <= 5; i++) {
        const star = document.getElementById('star' + i);
        if (i <= rating) {
          star.classList.add('text-yellow-400');
        } else {
          star.classList.remove('text-yellow-400');
        }
      }
      @this.satisfaction=rating;
    }
</script>

@endpush