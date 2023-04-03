<div class="min-h-screen">
    <div>
        @include('include.breadcumbUser',['transation'=>'transation'])
    </div>
    <div class="max-w-7xl mx-auto py-4 px-6 lg:px-8">


        <div class="max-w-3xl  mb-8">
            <h2 class="text-xl text-indigo-600 mb-8 font-semibold tracking-wide uppercase">Mes transactions</h2>
        </div>

        <div class="flex   md:flex-wrap gap-4 mb-4">
            <div class="w-1/2 md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
                <label for="sort-by-date" class="block text-sm font-medium text-gray-700">Trier par date</label>
                <div class="relative">

                    <x-select :options="['Plus récentes en premier','Plus anciennes en premier']" />

                </div>
            </div>
            <div class="w-1/2 md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
                <label for="sort-by-amount" class="block text-sm font-medium text-gray-700">Trier par
                    montant</label>
                <div class="relative">

                    <x-select :options="['Du plus petit au plus grand','Du plus grand au plus petit']" />




                </div>
            </div>
        </div>

        <ul class="space-y-4">
            <!-- Example transaction item -->
            <li x-data="{open:false}">
                <div
                    class="block dark:bg-gray-800 bg-white cursor-pointer hover:bg-gray-400 focus:outline-none focus:bg-gray-200 transition duration-150 ease-in-out">
                    <div class="px-4 py-4 sm:px-6 flex flex-col md:flex-row  md:items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-gray-200 rounded-md p-2">
                                <!-- Transaction icon -->
                                <svg class="h-8 w-8 text-gray-600" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 5h3v3H3V5zm0 6h3v3H3v-3zm4-6h10v10H7V5zm1 1v8h8V6H8z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">Nom du service</p>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-200">Transaction effectuée le
                                    1er avril 2023
                                </p>
                            </div>
                        </div>
                        <div class="flex justify-between mt-4 md:mt-0  items-center">
                            <p class="text-lg font-semibold text-gray-900 dark:text-white">$50</p>
                            <p class="text-sm font-medium text-gray-500 ml-2 text-green">Paiement complet</p>
                        </div>
                    </div>

                    <div x-show="open" x-cloak class="p-2">
                        <x-input />

                    </div>
                </div>
            </li>
            <!-- Ajoutez ici les éléments de transaction pour chaque transaction effectuée par l'utilisateur -->
        </ul>
    </div>
</div>