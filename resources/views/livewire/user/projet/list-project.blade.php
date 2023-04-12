<div class="p-6">

    <div>
        @include('include.breadcumbUser',['projet'=>'Projet'])
    </div>
    <div class="container mx-auto">


        <h2 class="mb-8 text-xl font-semibold tracking-wide text-indigo-600 uppercase">Mes Projet</h2>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

            @forelse($projets as $projet)
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="mb-2 text-lg font-bold text-gray-800">{{$projet->title}}</h3>
                <p class="mb-2 text-gray-700 dark:text-gray-200">{{$projet->description}}</p>

                <p class="mb-2 text-gray-700 dark:text-gray-200">Budget:{{$projet->bid_amount}}</p>
                <div class="flex justify-between">
                    <span class="text-gray-500 ">{{$projet->projectRepsonsesCount()}}</span>
                    @if($projet->status=="active")
                    <span class="font-bold text-yellow-500 ">En cours</span>
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