<div x-data="{message:@entangle('openMessage')}">

    <!-- Exemple de section pour afficher les détails d'une commande avec options supplémentaires -->
    <section class="px-4 py-6 md:px-6 lg:px-12 xl:px-20">
        <div>
            @include('include.breadcumbUser',['commande'=>'commande','commandeID'=>'1'])
        </div>
        <div class="md:max-w-6xl mx-auto">

            <!-- Titre de la section -->
            <h2 class="mb-4 text-3xl font-semibold text-gray-800 dark:text-gray-300">Détails de la commande</h2>

            <!-- Contenu de la section -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <!-- Informations sur la commande -->
                <div class="grid grid-cols-1 px-6 py-4 lg:grid-cols-2">
                    <p class="mb-4 font-sans text-lg text-gray-800 dark:text-gray-300">Commande
                        <span class="font-bold font-inter ">{{$Order->order_numero}}</span>
                    </p>
                    <p class="mb-4 text-lg text-gray-800 md:mb-2 dark:text-gray-300">Service : <span>
                            {{$Order->service->title}}</span> </p>
                    <p class="mb-4 text-base text-gray-600 dark:text-gray-400 md:mb-2">Date de commande :
                        <span>{{$Order->created_at}}</span>
                    </p>
                    <p class="mb-4 text-base text-gray-600 md:mb-2 dark:text-gray-300">Délai de livraison :
                        {{$Order->feedback->delai_livraison_estimee ? $Order->feedback->delai_livraison_estimee:'Pas
                        disponible'}} jour
                    </p>

                    <p class="mb-4 text-base text-gray-600 md:mb-2 dark:text-gray-300">Paiement :

                        @if($Order->status =="pending")
                        <span class="text-red-300 px-1.5 py-0.5 rounded-lg ">en Attente</span>
                        @elseif ($Order->status =="completed")
                        <span class="text-green-500 px-1.5 py-0.5 rounded-lg ">Payé</span>
                        @else
                        <span class="bg-red-500 px-1.5 py-0.5 rounded-lg ">Rejeter</span>
                        @endif


                    </p>
                    <p class="mb-4 text-base text-gray-600 md:mb-2 dark:text-gray-300">statut :



                        @if($Order->feedback->etat =="En attente de traitement")
                        <span class="text-red-300 px-1.5 py-0.5 rounded-lg ">En attente de traitement</span>
                        @elseif ($Order->feedback->etat =="Livré")
                        <span class="text-green-500 px-1.5 py-0.5 rounded-lg ">Livré</span>

                        @elseif ($Order->feedback->etat =="En cours de préparation")
                        <span class="text-red-200 px-1.5 py-0.5 rounded-lg ">En cours de préparation</span>
                        @else
                        <span class="bg-red-500 px-1.5 py-0.5 rounded-lg ">En transit</span>
                        @endif



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

                    <h1 @click="open = !open" class="flex items-start gap-2 text-xl font-bold cursor-pointer">
                        Freelance lié
                        <button @click="open = !open">
                            <svg :class="{ 'rotate-180': open }" class="w-6 h-6 fill-current"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M14.707 7.293a1 1 0 0 0-1.414 0L10 10.586 6.707 7.293a1 1 0 0 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0 0-1.414z" />
                            </svg>
                        </button>
                    </h1>

                    <div x-cloak x-show="open" x-collapse class="flex items-center mt-4">
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


                    <h1 @click="open = !open" class="flex items-start gap-2 text-xl font-bold cursor-pointer">
                        Rapport Envoyer
                        <button @click="open = !open">
                            <svg :class="{ 'rotate-180': open }" class="w-6 h-6 fill-current"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M14.707 7.293a1 1 0 0 0-1.414 0L10 10.586 6.707 7.293a1 1 0 0 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0 0-1.414z" />
                            </svg>
                        </button>
                    </h1>


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
                    <div class="flex flex-col justify-end gap-4 md:flex-row">
                        @if (empty($Order->transaction))
                        <div>

                            <x-button primary label="Proceder Au
                                                        Paiement"> </x-button>

                        </div>

                        @endif

                        @if($Order->feedback->statut=="Livré")
                        <div class="w-full">
                            <x-button wire:click='openModal()' class="mr-2" label='Evaluer' />

                        </div>

                        @endif
                        <div>
                            <x-button wire:click="conversation()" spinner="conversation()" label="contacter"></x-button>
                        </div>

                        <div>
                            <x-button negative label="Annuler la commande"></x-button>


                        </div>



                    </div>

                </div>

                <div>


                    <!-- Transaction de paiement liée -->


                    <div x-data="{open:false}" class="px-6 py-4 border-t border-gray-200">

                        <h1 @click="open = !open" class="flex items-start gap-2 text-xl font-bold cursor-pointer">
                            Transaction de paiement liée
                            <button @click="open = !open">
                                <svg :class="{ 'rotate-180': open }" class="w-6 h-6 fill-current"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M14.707 7.293a1 1 0 0 0-1.414 0L10 10.586 6.707 7.293a1 1 0 0 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0 0-1.414z" />
                                </svg>
                            </button>
                        </h1>




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

            <x-jet-modal wire:model.defer="confirmModal">



            </x-jet-modal>

            <div class="fixed bottom-0 right-0 z-10 mb-4 mr-4">


                <div x-cloak x-show="message" class=" sm:block">
                    <div class="w-64 rounded-lg shadow-lg h-96">
                        <div class="flex flex-col h-full">
                            <div class="flex items-center justify-between p-4 bg-gray-800 rounded-t-lg">
                                <h3 class="text-lg font-medium text-white">Chat</h3>
                                <button class="text-gray-400 hover:text-white focus:outline-none focus:text-white"
                                    @click="message=false">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex-1 p-4 overflow-y-auto bg-white messages custom-scrollbar">
                                <!-- contenu de la discussion -->

                                <div class="flex flex-col space-y-2">

                                    @if($freelance_id !== null)
                                    @if($messages !== null)

                                    @foreach($messages as $message)
                                    <!-- message de l'expéditeur -->
                                    <div
                                        class="flex items-start {{auth()->id() == $message->sender_id ? 'justify-end':''}}">
                                        <div
                                            class="px-4 py-2 bg-blue-600 {{auth()->id() == $message->sender_id ? 'bg-gray-200':'bg-blue-600'}} rounded-lg text-white max-w-xs">
                                            <p class="text-sm text-gray-700">{{$message->body}}</p>
                                        </div>
                                    </div>
                                    <!-- message du récepteur -->

                                    @endforeach
                                    @else
                                    <p>Ecrivez lui un message</p>
                                    @endif
                                    @else
                                    <p>Chargement de messages</p>
                                    @endif

                                </div>
                            </div>
                            <div class="flex items-center p-4 bg-gray-200 rounded-b-lg">

                                <x-input wire:model.defer='body'></x-input>


                                <button wire:click="sendMessage()" class="" wire:loading.attr='disabled'
                                    @click="photoPreview=null">

                                    <svg fill="#000000" class="w-5 h-5" version="1.1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 512.001 512.001" xml:space="preserve">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <path
                                                        d="M509.532,34.999c-2.292-2.233-5.678-2.924-8.658-1.764L5.213,225.734c-2.946,1.144-4.967,3.883-5.192,7.034 c-0.225,3.151,1.386,6.149,4.138,7.7l102.719,57.875l35.651,174.259c0.222,1.232,0.723,2.379,1.442,3.364 c0.072,0.099,0.131,0.175,0.191,0.251c1.256,1.571,3.037,2.668,5.113,3c0.265,0.042,0.531,0.072,0.795,0.088 c0.171,0.011,0.341,0.016,0.511,0.016c1.559,0,3.036-0.445,4.295-1.228c0.426-0.264,0.831-0.569,1.207-0.915 c0.117-0.108,0.219-0.205,0.318-0.306l77.323-77.52c3.186-3.195,3.18-8.369-0.015-11.555c-3.198-3.188-8.368-3.18-11.555,0.015 l-60.739,60.894l13.124-112.394l185.495,101.814c1.868,1.02,3.944,1.239,5.846,0.78c0.209-0.051,0.4-0.105,0.589-0.166 c1.878-0.609,3.526-1.877,4.574-3.697c0.053-0.094,0.1-0.179,0.146-0.264c0.212-0.404,0.382-0.8,0.517-1.202L511.521,43.608 C512.6,40.596,511.824,37.23,509.532,34.999z M27.232,234.712L432.364,77.371l-318.521,206.14L27.232,234.712z M162.72,316.936 c-0.764,0.613-1.429,1.374-1.949,2.267c-0.068,0.117-0.132,0.235-0.194,0.354c-0.496,0.959-0.784,1.972-0.879,2.986L148.365,419.6 l-25.107-122.718l275.105-178.042L162.72,316.936z M359.507,419.195l-177.284-97.307L485.928,66.574L359.507,419.195z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    {{-- The Master doesn't talk, he acts. --}}
</div>

@push('script')


<script>
    window.addEventListener('rowChatToBottom', event => {

            $('.messages').scrollTop($('.messages')[0].scrollHeight);

        });
</script>

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