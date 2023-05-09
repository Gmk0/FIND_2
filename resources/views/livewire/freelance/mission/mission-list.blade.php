<div class="p-6">

    <div>
        @include('include.breadcumbUser',['projet'=>'Projet'])
    </div>
    <div class="container mx-auto">


        <h2 class="mb-8 text-xl font-semibold tracking-wide text-indigo-600 uppercase">Projet</h2>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

            @forelse($projets as $projet)
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="mb-2 text-lg font-bold text-gray-800">{{$projet->title}}</h3>
                <p class="mb-2 text-gray-600 dark:text-gray-200">{{$projet->description}}</p>

                <p class="mb-2 text-gray-600 dark:text-gray-300">Budget: <span>{{$projet->bidAmount()}}</span></p>
                <div class="flex justify-between">
                    <span class="text-gray-500 ">Client <span>{{$projet->user->name}}</span></span>
                    @if($projet->status=="active")
                    <span class="font-bold text-yellow-500 ">En cours</span>
                    @endif
                </div>
                <div class="flex justify-between mt-4">
                    <x-button href="{{route('freelance.projet.view',[$projet->id])}}" primary label="proposer" />

                    <x-button href="{{route('PropostionProjet',[$projet->id])}}" primary flat label="voir" />

                </div>
            </div>
            @empty

            <div>
                <h1>Pas de mission pour l'instant dans votre category</h1>
            </div>
            @endforelse

            <!-- Ajouter d'autres projets ici -->
        </div>

        <div>

            {{$projets->links()}}
        </div>
    </div>
    {{-- The whole world belongs to you. --}}
</div>
