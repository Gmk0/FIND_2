<div>
    {{-- Success is as dangerous as failure. --}}


    <div class="min-h-screen">
        <div>
            @include('include.breadcumbUser',['commande'=>'commande'])
        </div>

        <div class="px-4 py-4 mx-auto max-w-7xl lg:px-8">
            <div class="max-w-3xl mb-8">
                <h2 class="mb-8 text-xl font-semibold tracking-wide text-indigo-600 uppercase">Mes Commandes</h2>
            </div>

            <div class="flex gap-4 mb-4 md:flex-wrap">
                <div class="w-1/2 mb-4 md:w-1/2 lg:w-1/4 md:mb-0">
                    <label for="sort-by-amount"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-200">filtrer
                        par
                        Status</label>
                    <div class="relative">

                        <x-select label="" placeholder="Select one status" :options="[
                                            ['name' => 'pending',   'description' => 'The status is active'],
                                            ['name' => 'completed',  'description' => 'The status is completed'],
                                            ['name' => 'failed',    'description' => 'The status is failde']
                    
                                        ]" option-label="name" option-value="name"
                            wire:model.debounce.500ms="status" />




                    </div>
                </div>
                <div class="w-1/2 mb-4 md:w-1/2 lg:w-1/4 md:mb-0">
                    <label for="sort-by-date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Trier
                        par date</label>
                    <div class="relative">

                        <x-select wire:model.debounce.500ms="orderBy"
                            :options="['Plus récentes en premier','Plus anciennes en premier']" />

                    </div>
                </div>

            </div>


            <ul class="space-y-4">
                <!-- Example order item -->
                @forelse($Orders as $orders)

                <li x-data="{show:false}">
                    <a href="#" @click="show=!show"
                        class="block transition duration-150 ease-in-out bg-white hover:bg-gray-300 dark:hover:bg-gray-700 focus:outline-none">
                        <div class="flex items-center justify-between px-4 py-4 sm:px-6">
                            <div class="flex flex-col md:flex-row md:items-center">
                                <div class="flex-shrink-0 p-2 bg-gray-200 rounded-md sm:w-1/2">
                                    <!-- Service icon -->
                                    <svg class="w-8 h-8 text-gray-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 110-16 8 8 0 010 16zm-5.81-2.76a6 6 0 0111.62 0H4.19z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M12.07 4.52a4 4 0 00-4.14 0L3.54 7.23A2 2 0 003 8.84v2.32a2 2 0 001.54 1.95l4.39 1.1a4 4 0 003.14 0l4.39-1.1A2 2 0 0017 11.16V8.84a2 2 0 00-.54-1.61l-4.39-2.71zM5.5 10.5v-1h9v1h-9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-50">
                                        {{$orders->service->title}}</p>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-200">Commandé le
                                        {{$orders->created_at}}</p>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-200">Montant:
                                        {{$orders->total_amount}} $</p>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-200">Quantité:
                                        {{$orders->quantity}}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 {{$orders->status === 'completed'? 'text-green-600 ':'text-red-600'}} ">{{$orders->status}}</span>

                                <!-- Chevron icon -->
                                <button @click="show=!show">
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10.707 5.293a1 1 0 010 1.414L8.414 9.5l2.293 2.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                            </div>
                        </div>
                    </a>
                    <div x-cloak x-collapse x-show="show">
                        <div class="flex items-center p-2 mt-4">
                            <div>
                                <!-- Affichage de l'état d'avancement du service -->
                                <p class="text-base font-semibold text-gray-900 dark:text-gray-50">État d'avancement :
                                    {{$orders->progress}}%
                                </p>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-200">Délai du freelance :
                                    {{$orders->service->basic_delivery_time}} jours</p>
                            </div>
                            <div class="ml-auto">
                                <!-- Bouton "Voir plus" pour afficher plus de détails -->
                                <a href="{{route('commandeOneView',[$orders->id])}}"
                                    class="px-4 py-2 ml-4 text-sm font-medium text-white transition duration-150 ease-in-out bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                    Voir plus
                                </a>
                            </div>
                        </div>
                    </div>


                </li>



                @empty

                @endforelse
                <!-- Ajoutez ici les éléments de commande pour chaque service commandé par l'utilisateur -->
            </ul>
        </div>
    </div>
</div>