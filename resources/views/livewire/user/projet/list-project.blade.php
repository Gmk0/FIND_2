<div class="p-6">

    <div>
        @include('include.breadcumbUser',['projet'=>'Projet'])
    </div>
    <div class="container mx-auto">


        <h2 class="text-xl text-indigo-600 mb-8 font-semibold tracking-wide uppercase">Mes Projet</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            @forelse($projets as $projet)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
                <h3 class="text-lg text-gray-800 font-bold mb-2">{{$projet->title}}</h3>
                <p class="text-gray-700 dark:text-gray-200 mb-2">{{$projet->description}}</p>

                <p class="text-gray-700 dark:text-gray-200 mb-2">Budget:{{$projet->bid_amount}}</p>
                <div class="flex justify-between">
                    <span class="text-gray-500 ">3 propositions</span>
                    @if($projet->status=="active")
                    <span class="text-yellow-500 font-bold ">En cours</span>
                    @endif
                </div>
                <div class="mt-4">
                    <x-button href="{{route('PropostionProjet',[$projet->id])}}" primary
                        label="Voir les propositions" />

                </div>
            </div>
            @empty
            @endforelse

            <!-- Ajouter d'autres projets ici -->
        </div>

        <div>

            {{$projets->links()}}
        </div>
    </div>
    {{-- The whole world belongs to you. --}}
</div>