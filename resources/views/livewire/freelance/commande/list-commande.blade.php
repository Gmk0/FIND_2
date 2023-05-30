<div x-data="{ isOpen:false,isLoading: true,showFilters: false,showSearch: false }"
    x-init="setTimeout(() => { isLoading = false }, 3000) " class="flex flex-col min-h-screen px-4 pt-8">


    <div>
        @include('include.breadcumbFreelance',['Commande'=>'Commande'])
    </div>
    <div class="mx-4 mb-4">
        <h1 class='text-2xl text-gray-800'>Commande</h1>
    </div>

    <div x-show="isLoading">

        <div class="flex flex-col gap-4 p-8 overflow-y-hidden">
            <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-3">
                <div class="h-48 bg-gray-300 rounded-md animate-pulse"></div>
                <div class="h-48 bg-gray-300 rounded-md animate-pulse"></div>
                <div class="h-48 bg-gray-300 rounded-md animate-pulse"></div>
            </div>

            <div
                class="flex-1 w-full h-80 p-4 mb-2 overflow-y-auto text-xs bg-gray-200 border-r border-indigo-300 rounded-md animate-pulse custom-scrollbar">



            </div>
        </div>
    </div>


    <div x-show="!isLoading" x-cloak class="grid gap-4 md:grid-cols-3">
        <div class="px-6 py-3 bg-white rounded-lg shadow-xl">
            <div class="flex items-center justify-between">
                <span class="text-sm font-bold text-indigo-600">En attente</span>

            </div>
            <div class="flex items-center justify-between mt-6">
                <div>
                    <svg class="w-12 h-12 p-1 text-indigo-600 bg-indigo-400 border border-indigo-600 rounded-full 2xl:w-16 2xl:h-16 2xl:p-3 bg-opacity-20"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <div class="flex items-end">
                        <span class="text-2xl font-bold dark:text-gray-200 2xl:text-4xl">{{$pending}}</span>

                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 py-3 bg-white rounded-lg shadow-xl">
            <div class="flex items-center justify-between">
                <span class="text-sm font-bold text-indigo-600">Payer</span>

            </div>
            <div class="flex items-center justify-between mt-6">
                <div>
                    <svg class="w-12 h-12 p-1 text-indigo-600 bg-indigo-400 border border-indigo-600 rounded-full 2xl:w-16 2xl:h-16 2xl:p-3 bg-opacity-20"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <div class="flex items-end">
                        <span class="text-2xl font-bold dark:text-gray-200 2xl:text-4xl">{{$payer}}</span>

                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 py-3 bg-white rounded-lg shadow-xl">
            <div class="flex items-center justify-between">
                <span class="text-sm font-bold text-indigo-600">Annuler</span>

            </div>
            <div class="flex items-center justify-between mt-6">
                <div>
                    <svg class="w-12 h-12 p-1 text-indigo-600 bg-indigo-400 border border-indigo-600 rounded-full 2xl:w-16 2xl:h-16 2xl:p-3 bg-opacity-20"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <div class="flex items-end">
                        <span class="text-2xl font-bold dark:text-gray-200 2xl:text-4xl">{{$rejeted}}</span>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div x-show="!isLoading" x-cloak class="pt-4">


        {{ $this->table }}






    </div>


    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>