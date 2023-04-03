<div>
    {{-- Success is as dangerous as failure. --}}


    <div class="min-h-screen">
        <div>
            @include('include.breadcumbUser',['commande'=>'commande'])
        </div>

        <div class="max-w-7xl mx-auto py-4 px-4 lg:px-8">
            <div class="max-w-3xl  mb-8">
                <h2 class="text-xl text-indigo-600 mb-8 font-semibold tracking-wide uppercase">Mes Commandes</h2>
            </div>

            <div class="flex   md:flex-wrap gap-4 mb-4">
                <div class="w-1/2 md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
                    <label for="sort-by-date" class="block text-sm font-medium dark:text-gray-200 text-gray-700">Trier
                        par date</label>
                    <div class="relative">

                        <x-select :options="['Plus récentes en premier','Plus anciennes en premier']" />

                    </div>
                </div>
                <div class="w-1/2 md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
                    <label for="sort-by-date" class="block text-sm font-medium dark:text-gray-200 text-gray-700">Trier
                        par date</label>
                    <div class="relative">

                        <x-select :options="['Plus récentes en premier','Plus anciennes en premier']" />

                    </div>
                </div>
                <div class="w-1/2 md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
                    <label for="sort-by-amount" class="block text-sm font-medium dark:text-gray-200 text-gray-700">Trier
                        par
                        montant</label>
                    <div class="relative">

                        <x-select :options="['Du plus petit au plus grand','Du plus grand au plus petit']" />




                    </div>
                </div>
            </div>


            <ul class="space-y-4">
                <!-- Example order item -->
                @for($i=0; $i<6 ; $i++) <li>
                    <a href="#"
                        class="block bg-white hover:bg-gray-200 focus:outline-none focus:bg-gray-200 transition duration-150 ease-in-out">
                        <div class="px-4 py-4 sm:px-6 flex items-center justify-between">
                            <div class="flex flex-col md:flex-row md:items-center">
                                <div class="flex-shrink-0 bg-gray-200 rounded-md p-2">
                                    <!-- Service icon -->
                                    <svg class="h-8 w-8 text-gray-600" xmlns="http://www.w3.org/2000/svg"
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
                                    <p class="text-lg font-semibold dark:text-gray-50 text-gray-900">Nom du service</p>
                                    <p class="text-sm font-medium dark:text-gray-200 text-gray-500">Commandé le 1er
                                        avril 2023</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Commande
                                    en cours</span>

                                <!-- Chevron icon -->
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10.707 5.293a1 1 0 010 1.414L8.414 9.5l2.293 2.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </a>

                    </li>

                    @endfor
                    <!-- Ajoutez ici les éléments de commande pour chaque service commandé par l'utilisateur -->
            </ul>
        </div>
    </div>
</div>