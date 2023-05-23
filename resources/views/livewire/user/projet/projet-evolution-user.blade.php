<div class="min-h-screen">

    <!-- Exemple de section pour afficher les détails d'une commande avec options supplémentaires -->
    <section class="px-2 py-6 dark:text-gray-400 md:px-6 lg:px-8 xl:px-20">
        <div>

        </div>
        <div class="max-w-6xl mx-auto">

            <!-- Titre de la section -->
            <h2 class="mb-4 text-xl font-semibold text-gray-800 dark:text-gray-300">Détails de la Mission</h2>

            <!-- Contenu de la section -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <!-- Informations sur la commande -->
                <div class="grid grid-cols-1 px-6 py-4 lg:grid-cols-2">
                    <p class="mb-4 font-sans text-lg text-gray-800 dark:text-gray-300">Commande
                        <span class="font-bold font-inter ">{{$response->project->id}}</span>
                    </p>
                    <p class="mb-4 text-lg text-gray-800 md:mb-2 dark:text-gray-300">Mission : <span>
                            {{$response->project->title}}</span> </p>
                    <p class="mb-4 text-base text-gray-600 dark:text-gray-400 md:mb-2">Date de creation :
                        <span>{{$response->project->created_at}}</span>
                    </p>
                    <p class="mb-4 text-base font-medium text-gray-600 md:mb-2 dark:text-gray-300">Délai d'echance :
                        Du {{$response->project->begin_project->format('d F, Y')}} au
                        {{$response->project->end_project->format('d F, Y')}}
                    </p>

                    <p class="mb-4 text-base text-gray-600 md:mb-2 dark:text-gray-300">Budjet :
                        <span class="font-bold">{{$response->project->bid_amount}}$</span>



                    </p>
                    <p class="mb-4 text-base text-gray-600 md:mb-2 dark:text-gray-300">Proposition :
                        <span class="font-bold">{{$response->bid_amount}}$</span>



                    </p>
                    <p class="mb-4 text-base text-gray-600 md:mb-2 dark:text-gray-300">Paiement :




                    </p>
                    <p class="mb-4 text-base text-gray-600 md:mb-2 dark:text-gray-300">statut :







                    </p>
                </div>

                <!-- Avancement de la commande -->
                <div class="px-6 py-4 border-t border-gray-200">
                    <p class="mb-2 text-lg text-gray-800">Avancement</p>
                    <div class="flex items-center">
                        <div class="flex-1">
                            <div class="w-full h-3 bg-gray-300 rounded-lg">
                                <div class="h-3 bg-green-500 rounded-lg" style="width: %;"></div>
                            </div>
                        </div>
                        <p class="ml-2 text-sm text-gray-600 dark:text-gray-300">%</p>
                    </div>
                </div>

                <!-- Freelance lié à la commande -->
                <div class="px-6 py-4 border-t border-gray-300">

                    <h1 class="flex items-start gap-2 text-lg font-bold cursor-pointer lg:text-xl">
                        Freelance lié

                    </h1>

                    <div class="flex items-center mt-4">
                        @if (!empty($response->freelance->user->profile_photo_path))
                        <img class="w-12 h-12 rounded-full"
                            src="{{Storage::disk('local')->url('profiles-photos/'.$response->freelance->user->profile_photo_path) }}"
                            alt="">
                        @else
                        <img class="w-12 h-12 rounded-full" src="{{ $response->user->profile_photo_url }}" alt="">
                        @endif




                        <div class="ml-4">
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{$response->freelance->nom}}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">
                                {{$response->freelance->user->email}}</p>
                        </div>
                    </div>
                </div>

                <div x-data="{open:false}" class="px-6 py-4 border-t border-gray-200">


                    <h1 @click="open = !open"
                        class="flex items-start gap-2 text-lg font-bold cursor-pointer lg:text-xl">
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



                    </div>


                </div>



                <!-- Options supplémentaires -->
                <div class="px-6 py-4 border-t border-gray-200">
                    <p class="mb-2 text-lg text-gray-800">Options supplémentaires</p>
                    <div class="flex flex-col justify-end gap-4 md:flex-row">
                        @if (empty($response->project->transaction))
                        <div>

                            <x-button href="{{route('checkoutProjet')}}" primary label="Proceder Au
                                                                Paiement"> </x-button>

                        </div>

                        @endif




                        <div>
                            <x-button wire:click="conversation()" spinner="conversation()" label="contacter"></x-button>
                        </div>

                        <div>
                            <x-button wire:click="$toggle('confirmModal')" negative label="Annuler la mission">
                            </x-button>


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




                        @if (!empty($reponse->project->transaction))


                        <div x-cloak x-show="open" x-collapse>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Numéro de transaction :
                                #{{$Order->transaction->transaction_numero}}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Méthode de paiement :

                                @if(isset($Order->transaction->payment_method['brand']) )

                                @switch($Order->transaction->payment_method['brand'])
                                @case("visa")
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 256 83">
                                    <defs>
                                        <linearGradient id="logosVisa0" x1="45.974%" x2="54.877%" y1="-2.006%"
                                            y2="100%">
                                            <stop offset="0%" stop-color="#222357" />
                                            <stop offset="100%" stop-color="#254AA5" />
                                        </linearGradient>
                                    </defs>
                                    <path fill="url(#logosVisa0)"
                                        d="M132.397 56.24c-.146-11.516 10.263-17.942 18.104-21.763c8.056-3.92 10.762-6.434 10.73-9.94c-.06-5.365-6.426-7.733-12.383-7.825c-10.393-.161-16.436 2.806-21.24 5.05l-3.744-17.519c4.82-2.221 13.745-4.158 23-4.243c21.725 0 35.938 10.724 36.015 27.351c.085 21.102-29.188 22.27-28.988 31.702c.069 2.86 2.798 5.912 8.778 6.688c2.96.392 11.131.692 20.395-3.574l3.636 16.95c-4.982 1.814-11.385 3.551-19.357 3.551c-20.448 0-34.83-10.87-34.946-26.428m89.241 24.968c-3.967 0-7.31-2.314-8.802-5.865L181.803 1.245h21.709l4.32 11.939h26.528l2.506-11.939H256l-16.697 79.963h-17.665m3.037-21.601l6.265-30.027h-17.158l10.893 30.027m-118.599 21.6L88.964 1.246h20.687l17.104 79.963h-20.679m-30.603 0L53.941 26.782l-8.71 46.277c-1.022 5.166-5.058 8.149-9.54 8.149H.493L0 78.886c7.226-1.568 15.436-4.097 20.41-6.803c3.044-1.653 3.912-3.098 4.912-7.026L41.819 1.245H63.68l33.516 79.963H75.473"
                                        transform="matrix(1 0 0 -1 0 82.668)" />
                                </svg>

                                @break
                                @case('mastercard')
                                <svg class="w-7 h-7" aria-hidden="true" enable-background="new 0 0 780 500"
                                    viewBox="0 0 780 500" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m449.01 250c0 99.143-80.371 179.5-179.51 179.5s-179.5-80.361-179.5-179.5c0-99.133 80.362-179.5 179.5-179.5 99.137 0 179.51 80.371 179.51 179.5"
                                        fill="#d9222a" />
                                    <path
                                        d="m510.49 70.496c-46.379 0-88.643 17.596-120.5 46.467-6.49 5.889-12.548 12.237-18.125 18.996h36.267c4.965 6.037 9.536 12.387 13.685 19.012h-63.635c-3.827 6.122-7.281 12.469-10.342 19.008h84.313c2.894 6.185 5.431 12.53 7.601 19.004h-99.513c-2.09 6.234-3.832 12.58-5.217 19.008h109.94c2.689 12.49 4.045 25.231 4.042 38.008 0 19.935-3.254 39.112-9.254 57.021h-99.513c2.164 6.477 4.7 12.824 7.596 19.008h84.316c-3.063 6.541-6.519 12.889-10.347 19.013h-63.625c4.147 6.62 8.719 12.966 13.685 18.996h36.259c-5.57 6.772-11.63 13.127-18.13 19.013 31.857 28.866 74.117 46.454 120.5 46.454 99.139 0 179.51-80.361 179.51-179.5 0-99.129-80.371-179.5-179.51-179.5"
                                        fill="#ee9f2d" />
                                    <path
                                        d="m666.07 350.06c0-3.199 2.592-5.801 5.796-5.801s5.796 2.602 5.796 5.801-2.592 5.801-5.796 5.801-5.796-2.602-5.796-5.801zm5.796 4.408c2.434-.001 4.407-1.974 4.408-4.408 0-2.432-1.971-4.402-4.402-4.404h-.006c-2.429-.003-4.4 1.963-4.404 4.391v.014c-.002 2.433 1.968 4.406 4.4 4.408.001-.001.003-.001.004-.001zm-.783-1.86h-1.187v-5.096h2.149c.45 0 .908 0 1.305.254.413.279.646.771.646 1.279 0 .571-.338 1.104-.884 1.312l.938 2.25h-1.315l-.779-2.017h-.871zm0-2.89h.658c.246 0 .505.021.726-.1.195-.125.296-.359.296-.584-.005-.209-.112-.402-.288-.518-.207-.129-.536-.101-.758-.101h-.634zm-443.5-80.063c-2.046-.238-2.945-.301-4.35-.301-11.046 0-16.638 3.787-16.638 11.268 0 4.611 2.729 7.545 6.987 7.545 7.939 0 13.659-7.559 14.001-18.512zm14.171 32.996h-16.146l.371-7.676c-4.926 6.065-11.496 8.949-20.426 8.949-10.563 0-17.804-8.25-17.804-20.229 0-18.024 12.596-28.541 34.217-28.541 2.208 0 5.042.199 7.941.57.604-2.441.763-3.488.763-4.801 0-4.908-3.396-6.737-12.5-6.737-9.533-.108-17.396 2.271-20.625 3.333.204-1.229 2.7-16.659 2.7-16.659 9.712-2.846 16.116-3.917 23.325-3.917 16.732 0 25.596 7.513 25.579 21.712.033 3.805-.597 8.5-1.579 14.671-1.691 10.734-5.32 33.721-5.816 39.325zm-62.158 0h-19.487l11.162-69.997-24.925 69.997h-13.279l-1.642-69.597-11.733 69.597h-18.242l15.237-91.056h28.021l1.7 50.968 17.092-50.968h31.167zm354.97-32.996c-2.037-.238-2.941-.301-4.342-.301-11.041 0-16.634 3.787-16.634 11.268 0 4.611 2.726 7.545 6.983 7.545 7.94 0 13.664-7.559 13.993-18.512zm14.184 32.996h-16.146l.366-7.676c-4.926 6.065-11.5 8.949-20.422 8.949-10.565 0-17.8-8.25-17.8-20.229 0-18.024 12.588-28.541 34.213-28.541 2.208 0 5.037.199 7.934.57.604-2.441.763-3.488.763-4.801 0-4.908-3.392-6.737-12.496-6.737-9.533-.108-17.387 2.271-20.629 3.333.204-1.229 2.709-16.659 2.709-16.659 9.712-2.846 16.112-3.917 23.313-3.917 16.74 0 25.604 7.513 25.587 21.712.032 3.805-.597 8.5-1.579 14.671-1.684 10.734-5.321 33.721-5.813 39.325zm-220.39-1.125c-5.333 1.679-9.491 2.398-14 2.398-9.962 0-15.399-5.725-15.399-16.267-.142-3.271 1.433-11.88 2.671-19.737 1.125-6.917 8.449-50.529 8.449-50.529h19.371l-2.263 11.208h11.699l-2.642 17.796h-11.742c-2.25 14.083-5.454 31.625-5.491 33.95 0 3.816 2.037 5.483 6.671 5.483 2.221 0 3.94-.227 5.254-.7zm59.392-.6c-6.654 2.034-13.075 3.017-19.879 3-21.684-.021-32.987-11.346-32.987-33.032 0-25.313 14.38-43.947 33.899-43.947 15.971 0 26.171 10.433 26.171 26.796 0 5.429-.7 10.729-2.388 18.212h-38.574c-1.305 10.741 5.57 15.217 16.837 15.217 6.935 0 13.188-1.429 20.142-4.663zm-10.888-43.9c.107-1.543 2.055-13.217-9.013-13.217-6.171 0-10.583 4.704-12.38 13.217zm-123.42-5.017c0 9.367 4.542 15.826 14.842 20.676 7.892 3.709 9.112 4.81 9.112 8.17 0 4.617-3.479 6.701-11.191 6.701-5.813 0-11.221-.908-17.458-2.922 0 0-2.563 16.321-2.68 17.102 4.43.967 8.38 1.861 20.279 2.19 20.563 0 30.059-7.829 30.059-24.75 0-10.175-3.976-16.146-13.737-20.634-8.171-3.75-9.108-4.587-9.108-8.045 0-4.004 3.237-6.046 9.537-6.046 3.825 0 9.05.408 14 1.112l2.775-17.175c-5.046-.8-12.696-1.442-17.15-1.442-21.801.001-29.347 11.388-29.28 25.063m229.09-23.116c5.412 0 10.458 1.421 17.412 4.921l3.188-19.763c-2.854-1.121-12.904-7.7-21.417-7.7-13.041 0-24.065 6.471-31.82 17.15-11.309-3.746-15.958 3.825-21.657 11.367l-5.063 1.179c.383-2.483.729-4.95.612-7.446h-17.896c-2.445 22.917-6.778 46.128-10.171 69.075l-.884 4.976h19.496c3.254-21.143 5.037-34.68 6.121-43.842l7.341-4.084c1.097-4.078 4.529-5.458 11.417-5.291-.926 5.008-1.389 10.091-1.383 15.184 0 24.225 13.07 39.308 34.05 39.308 5.404 0 10.041-.712 17.221-2.658l3.43-20.759c-6.458 3.181-11.759 4.677-16.559 4.677-11.329 0-18.184-8.363-18.184-22.185 0-20.051 10.196-34.109 24.746-34.109" />
                                    <path
                                        d="m185.21 297.24h-19.491l11.171-69.988-24.926 69.988h-13.283l-1.642-69.588-11.733 69.588h-18.241l15.237-91.042h28.021l.788 56.362 18.904-56.362h30.267z"
                                        fill="#fff" />
                                    <path
                                        d="m647.52 211.6-4.321 26.309c-5.329-7.013-11.054-12.088-18.612-12.088-9.833 0-18.783 7.455-24.642 18.425-8.158-1.692-16.597-4.563-16.597-4.563l-.004.067c.658-6.134.921-9.875.862-11.146h-17.9c-2.438 22.917-6.771 46.128-10.157 69.075l-.893 4.976h19.492c2.633-17.096 4.648-31.291 6.133-42.551 6.658-6.016 9.992-11.266 16.721-10.916-2.979 7.205-4.725 15.503-4.725 24.017 0 18.513 9.366 30.725 23.533 30.725 7.142 0 12.621-2.462 17.967-8.171l-.913 6.884h18.435l14.842-91.042zm-24.371 73.941c-6.634 0-9.983-4.908-9.983-14.596 0-14.555 6.271-24.875 15.112-24.875 6.695 0 10.32 5.104 10.32 14.509.001 14.679-6.37 24.962-15.449 24.962z" />
                                    <path
                                        d="m233.19 264.26c-2.042-.236-2.946-.299-4.346-.299-11.046 0-16.634 3.787-16.634 11.266 0 4.604 2.729 7.547 6.979 7.547 7.947-.001 13.668-7.559 14.001-18.514zm14.178 32.984h-16.146l.367-7.663c-4.921 6.054-11.5 8.95-20.421 8.95-10.567 0-17.805-8.25-17.805-20.229 0-18.032 12.592-28.542 34.217-28.542 2.208 0 5.042.2 7.938.571.604-2.441.763-3.487.763-4.808 0-4.909-3.392-6.729-12.496-6.729-9.537-.108-17.396 2.271-20.629 3.321.204-1.225 2.7-16.637 2.7-16.637 9.708-2.858 16.12-3.929 23.32-3.929 16.737 0 25.604 7.517 25.588 21.704.029 3.821-.604 8.513-1.584 14.675-1.687 10.724-5.319 33.724-5.812 39.316zm261.38-88.592-3.191 19.767c-6.95-3.496-12-4.92-17.407-4.92-14.551 0-24.75 14.058-24.75 34.106 0 13.821 6.857 22.181 18.184 22.181 4.8 0 10.096-1.492 16.554-4.675l-3.421 20.75c-7.184 1.957-11.816 2.67-17.225 2.67-20.977 0-34.051-15.084-34.051-39.309 0-32.55 18.059-55.3 43.888-55.3 8.507.001 18.561 3.609 21.419 4.73m31.443 55.608c-2.041-.236-2.941-.299-4.347-.299-11.041 0-16.633 3.787-16.633 11.266 0 4.604 2.729 7.547 6.983 7.547 7.938-.001 13.663-7.559 13.997-18.514zm14.178 32.984h-16.15l.371-7.663c-4.925 6.054-11.5 8.95-20.421 8.95-10.563 0-17.804-8.25-17.804-20.229 0-18.032 12.596-28.542 34.212-28.542 2.213 0 5.042.2 7.941.571.601-2.441.763-3.487.763-4.808 0-4.909-3.393-6.729-12.495-6.729-9.533-.108-17.396 2.271-20.63 3.321.204-1.225 2.704-16.637 2.704-16.637 9.709-2.858 16.116-3.929 23.316-3.929 16.741 0 25.604 7.517 25.583 21.704.033 3.821-.596 8.513-1.579 14.675-1.682 10.724-5.323 33.724-5.811 39.316zm-220.39-1.121c-5.338 1.679-9.496 2.408-14 2.408-9.962 0-15.399-5.726-15.399-16.268-.138-3.279 1.438-11.88 2.675-19.736 1.12-6.926 8.445-50.534 8.445-50.534h19.368l-2.26 11.212h9.941l-2.646 17.788h-9.975c-2.25 14.092-5.463 31.62-5.496 33.95 0 3.83 2.041 5.482 6.671 5.482 2.221 0 3.938-.216 5.254-.691zm59.391-.592c-6.65 2.033-13.079 3.012-19.879 3-21.685-.021-32.987-11.346-32.987-33.033 0-25.321 14.379-43.95 33.899-43.95 15.971 0 26.171 10.429 26.171 26.8 0 5.434-.7 10.733-2.384 18.212h-38.574c-1.306 10.741 5.569 15.222 16.837 15.222 6.93 0 13.188-1.435 20.138-4.677zm-10.891-43.912c.116-1.538 2.06-13.217-9.013-13.217-6.167 0-10.579 4.717-12.375 13.217zm-123.42-5.005c0 9.367 4.542 15.818 14.842 20.675 7.892 3.709 9.112 4.812 9.112 8.172 0 4.616-3.483 6.699-11.188 6.699-5.816 0-11.225-.908-17.467-2.921 0 0-2.554 16.321-2.671 17.101 4.421.967 8.375 1.85 20.275 2.191 20.566 0 30.059-7.829 30.059-24.746 0-10.18-3.971-16.15-13.737-20.637-8.167-3.759-9.113-4.584-9.113-8.046 0-4 3.246-6.059 9.542-6.059 3.821 0 9.046.421 14.004 1.125l2.771-17.179c-5.042-.8-12.692-1.441-17.146-1.441-21.804 0-29.346 11.379-29.283 25.066m398.45 50.63h-18.438l.917-6.893c-5.347 5.717-10.825 8.18-17.968 8.18-14.166 0-23.528-12.213-23.528-30.726 0-24.63 14.521-45.392 31.708-45.392 7.559 0 13.279 3.087 18.604 10.096l4.325-26.308h19.221zm-28.746-17.109c9.075 0 15.45-10.283 15.45-24.953 0-9.405-3.629-14.509-10.325-14.509-8.837 0-15.115 10.315-15.115 24.875-.001 9.686 3.357 14.587 9.99 14.587zm-56.842-56.929c-2.441 22.917-6.773 46.13-10.162 69.063l-.892 4.976h19.491c6.972-45.275 8.658-54.117 19.588-53.009 1.742-9.267 4.982-17.383 7.399-21.479-8.163-1.7-12.721 2.913-18.688 11.675.471-3.788 1.333-7.467 1.162-11.225zm-160.42 0c-2.446 22.917-6.779 46.13-10.167 69.063l-.888 4.976h19.5c6.963-45.275 8.646-54.117 19.57-53.009 1.75-9.267 4.991-17.383 7.399-21.479-8.154-1.7-12.717 2.913-18.679 11.675.471-3.788 1.324-7.467 1.162-11.225zm254.57 68.241c-.004-3.199 2.586-5.795 5.784-5.799h.012c3.197-.004 5.793 2.586 5.796 5.783v.016c-.001 3.201-2.595 5.795-5.796 5.797-3.201-.002-5.795-2.596-5.796-5.797zm5.796 4.405c2.431.002 4.402-1.969 4.403-4.399v-.004c.003-2.433-1.968-4.406-4.399-4.408h-.004c-2.435.001-4.407 1.974-4.408 4.408.002 2.432 1.975 4.403 4.408 4.403zm-.784-1.871h-1.188v-5.082h2.153c.446 0 .909.009 1.296.254.417.283.654.767.654 1.274 0 .575-.337 1.112-.888 1.317l.941 2.236h-1.32l-.779-2.009h-.87zm0-2.879h.653c.246 0 .513.019.729-.1.196-.125.296-.361.296-.588-.009-.21-.114-.404-.287-.523-.204-.117-.542-.084-.763-.084h-.629z"
                                        fill="#fff" />
                                </svg>

                                @break
                                @default

                                @endswitch






                                <span>••• {{$Order->transaction->payment_method['last4']}}</span>
                                @endif
                            </p>
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

    <x-confirmation-modal wire:model.defer="confirmModal">

        <x-slot name="title">
            Annuler la commande

        </x-slot>

        <x-slot name="content">
            Voulez-vous annuler cette commande ?

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmModal')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="AnnulerCommande()" wire:loading.attr="disabled">
                {{ __('Annuler la commande') }}
            </x-danger-button>
        </x-slot>

    </x-confirmation-modal>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>