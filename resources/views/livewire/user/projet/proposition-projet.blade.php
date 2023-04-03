<div class="p-6">


    <div>
        @include('include.breadcumbUser',['projet'=>'Projet','projectId'=>'id'])
    </div>


    <div class="container mx-auto">

        <div class="my-8">
            <h3 class="text-lg leading-6 font-medium dark:text-white text-gray-900">Propositions de freelances pour
                votre projet</h3>
            <ul class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                @for($i=0;$i<6 ;$i++) <li>
                    <a href="#" class="block bg-white">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-indigo-600 truncate">Titre de la proposition</p>
                                <div class="ml-2 flex-shrink-0 flex">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Disponible</span>
                                </div>
                            </div>
                            <div class="mt-2 flex flex-col sm:justify-between">
                                <div class="sm:flex">
                                    <p class="flex items-center text-sm text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M2 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4zm2 2v8l2.5-1.5L8 14l5-5-1.5-1.5L10 11l-3.5-3.5L4 10z" />
                                        </svg>
                                        Nom du freelance
                                    </p>
                                    <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm0 1a9 9 0 1 0 0-18 9 9 0 0 0 0 18zM9 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9zm1-5a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V5a1 1 0 0 1 1-1z" />
                                        </svg>
                                        Prix : 200€
                                    </p>
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm-2.707-2.293a1 1 0 0 0 1.414 0L10 13.414l1.293 1.293a1 1 0 1 0 1.414-1.414L11.414 12l1.293-1.293a1 1 0 0 0-1.414-1.414L10 10.586l-1.293-1.293a1 1 0 0 0-1.414 1.414L8.586 12l-1.293 1.293a1 1 0 0 0 0 1.414z" />
                                    </svg>
                                    3 jours de délai
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-4 sm:px-6">
                            <div class="text-sm font-medium text-indigo-600 truncate">Description de la proposition
                            </div>
                            <div class="mt-2 text-sm text-gray-500">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut ante euismod,
                                    fringilla dolor
                                    id, congue velit. Aenean bibendum erat vel nisi ultricies, et luctus nunc laoreet.
                                    Donec in
                                    dolor id odio hendrerit imperdiet at nec quam. In et tellus sit amet nisl
                                    ullamcorper
                                    interdum. </p>
                            </div>
                        </div>
                    </a>
                    </li>

                    @endfor

                    <!-- Répéter le code pour chaque proposition de freelance -->
            </ul>
        </div>
    </div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>