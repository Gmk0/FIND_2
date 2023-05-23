<div class="p-6">


    <div>
        @include('include.breadcumbUser',['projet'=>'Projet','projectId'=>$proposition_id])
    </div>


    <div class="container mx-auto">

        <div class="my-8">
            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">Propositions de freelances pour
                votre projet</h3>
            <ul class="grid gap-4 mt-4 md:grid-cols-2 xl:grid-cols-3">

                @forelse($proposition as $proposition)
                <li>
                    <a href="#" class="block bg-white ">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-indigo-600 truncate">Titre de la proposition</p>
                                <div class="flex flex-shrink-0 ml-2 ">
                                    @if($proposition->freelance->isOnline())
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Disponible</span>

                                    @else
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-gray-300 bg-green-100 rounded-full">No
                                        Disponible</span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex flex-col mt-2 sm:justify-between">
                                <div class="flex justify-between">
                                    <p class="flex items-center  gap-2 text-sm text-gray-500">

                                        @if (!empty($proposition->freelance->user->profile_photo_path))
                                        <img class="object-cover w-10 h-10 rounded-full"
                                            src="{{Storage::disk('local')->url('public/profiles-photos/'.$proposition->freelance->user->profile_photo_path) }}"
                                            alt="">
                                        @else
                                        <img class="object-cover w-10 h-10 rounded-full"
                                            src="{{$proposition->freelance->user->profile_photo_url }}" alt="">
                                        @endif
                                        {{$proposition->freelance->user->name}}
                                    </p>
                                    <p
                                        class="flex items-center mt-2 text-base font-semibold text-gray-500 sm:mt-0 sm:ml-6">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm0 1a9 9 0 1 0 0-18 9 9 0 0 0 0 18zM9 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9zm1-5a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V5a1 1 0 0 1 1-1z" />
                                        </svg>
                                        Prix : {{$proposition->bid_amount}} $
                                    </p>
                                </div>
                                <div class="flex hidden items-center mt-2 text-sm text-gray-500 sm:mt-0">
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm-2.707-2.293a1 1 0 0 0 1.414 0L10 13.414l1.293 1.293a1 1 0 1 0 1.414-1.414L11.414 12l1.293-1.293a1 1 0 0 0-1.414-1.414L10 10.586l-1.293-1.293a1 1 0 0 0-1.414 1.414L8.586 12l-1.293 1.293a1 1 0 0 0 0 1.414z" />
                                    </svg>
                                    3 jours de délai
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-4 bg-gray-50 dark:bg-gray-800 sm:px-4">
                            <div class="text-sm font-medium text-indigo-600 truncate">Description de la proposition
                            </div>
                            <div class="mt-2 text-sm text-gray-500">
                                <p>{{$proposition->content}} </p>
                            </div>
                        </div>
                        @if($proposition->status=="accepter")
                        <div class="flex gap-4 px-4 py-4 bg-gray-50 dark:bg-gray-700">
                            <div>
                                <h1 class="text-gray-800">Vous avez accepter cette proposiotion </h1>
                            </div>
                            <div>
                                <x-button href="{{route('projetEvolution',['idP'=>$proposition->id,'id'=>
                                    $proposition->project->id])}}" sm primary label="l'evolution" />

                            </div>

                        </div>
                        @else


                        <div class="flex gap-4 px-4 py-4 dark:bg-gray-800 bg-gray-50">
                            <x-button wire:click="refuser({{$proposition->id}})" sm danger label="Rejeter" />
                            <x-button wire:click="accepter({{$proposition->id}})" sm primary label="Accepter" />
                        </div>
                        @endif
                    </a>
                </li>

                @empty
                <li class="text-gray-800">
                    Vous Avez Zero Proposition pour ce projet
                </li>
                @endforelse

                <!-- Répéter le code pour chaque proposition de freelance -->
            </ul>
        </div>
    </div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>