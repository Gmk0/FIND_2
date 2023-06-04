<div>
    <div class="flex flex-col w-full mt-6">
        <div class="relative">

            <div class="relative flex p-1 mb-4 bg-white shadow-2xl rounded-xl md:p-2">

                <input wire:model.debounce.100ms="search"
                    class="w-full p-4 mr-2 text-gray-600 border-white focus:border-white rounded-xl " type="text">
                <button wire:click="search()" class="px-6 py-3 ml-auto text-center transition rounded-lg bg-skin-fill">
                    <span class="hidden font-semibold text-white md:block">
                        Search
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mx-auto text-white md:hidden" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>






            </div>

            @if($search != null)
            <div
                class="absolute w-full mt-1 overflow-y-auto bg-white border divide-y rounded-lg shadow z-[60] custom-scrollbar max-h-72">
                @forelse($results as $index => $result)
                {{-- <a class="block p-2 hover:bg-indigo-50" href="#">Tailwind</a>--}}
                <a href="{{route('ServicesViewOne',['service_numero'=>$result->service_numero,'category'=>$result->category->name])}}"
                    wire:key="{{
                                $index }}"
                    class="block p-2 text-sm cursor-pointer md:text-base hover:bg-amber-700 hover:text-white">{{
                    $result->title
                    }}
                    - {{
                    $result->category->name }}</a>
                @empty
                <a class="block p-2 hover:bg-indigo-50" href="#">Pas de resultat</a>
                @endforelse


            </div>
            @endif

        </div>




        <div class="flex justify-center gap-4 mt-4">
            <div class="flex items-center space-x-2">

                <a href=""
                    class="flex items-center h-8 px-2 text-gray-100 border border-gray-100 rounded-full dark:border-purple-500">
                    Photographie</a>
            </div>
            <div class="flex items-center space-x-2">

                <a href=""
                    class="flex items-center h-8 px-2 text-gray-100 border border-gray-100 rounded-full dark:border-purple-500">
                    Design
                </a>
            </div>
            <div class="flex items-center space-x-2">

                <a href=""
                    class="flex items-center h-8 px-2 text-gray-100 border border-gray-100 rounded-full dark:border-purple-500">
                    Technologie</a>
            </div>
        </div>
        <p class="mt-2 text-center text-gray-200 dark:text-gray-500">Catégories les plus populaires</p>


    </div>
</div>