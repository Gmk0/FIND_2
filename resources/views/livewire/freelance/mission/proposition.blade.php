<div>


    <div x-data="{ isOpen:false,isLoading: true,showFilters: false,showSearch: false }"
        x-init="setTimeout(() => { isLoading = false }, 3000) "
        class="flex flex-col min-h-screen px-4 pt-8 mx-auto max-w-7xl">

        <div>
            @include('include.breadcumbFreelance',['missionAccepter'=>'mission'])
        </div>

        <div class="mx-4 mb-4">
            <h1 class='text-2xl text-gray-800'>Mission Traiter</h1>
        </div>

        <div x-show="isLoading">

            <div class="flex flex-col gap-4 p-8 overflow-y-hidden">
                <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-3">
                    <div class="h-48 bg-gray-300 rounded-md animate-pulse"></div>
                    <div class="h-48 bg-gray-300 rounded-md animate-pulse"></div>
                    <div class="h-48 bg-gray-300 rounded-md animate-pulse"></div>
                </div>

                <div
                    class="flex-1 h-48 p-4 mb-2 overflow-y-auto text-xs bg-gray-200 border-r border-indigo-300 rounded-md animate-pulse custom-scrollbar">



                </div>
            </div>
        </div>




        <div x-show="!isLoading" x-cloak class="pt-4">


            {{ $this->table }}






        </div>


        {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    </div>

    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
</div>