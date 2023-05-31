<x-user-profile2>

    <div class="min-h-screen">

        <section class="bg-gray-100 dark:bg-gray-900 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white shadow-lg rounded-lg">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-4">Succès de la commande</h2>
                        <div class="bg-green-100 p-4 rounded-lg mb-6">
                            <p class="text-green-600 font-semibold">Votre transaction a été passée avec succès !</p>
                            <p class="mt-2">Merci d'avoir effectué votre paiement.</p>
                        </div>
                        <h3 class="text-xl font-semibold mb-4">Récapitulatif de la transaction</h3>
                        <!-- Informations de la transaction -->
                        <p class="mb-2"><span class="font-semibold">Montant :</span> {{$response->project->bidAmount()}}
                        </p>
                        <p class="mb-2"><span class="font-semibold">Date :</span>
                            {{$response->project->transaction->created_at}}</p>
                        <h3 class="text-xl font-semibold mt-8 mb-4">Récapitulatif de la mission</h3>
                        <!-- Informations de la mission -->
                        <p class="mb-2"><span class="font-semibold">Titre :</span> </p>{{$response->project->title}}
                        <p class="mb-2"><span class="font-semibold">Description :</span>
                            {{$response->project->description}}
                        </p>
                        <p class="mb-2"><span class="font-semibold">Budget :</span> {{$response->project->bidAmount()}}
                        </p>

                        <div>
                            <x-button href="{{route('PropostionProjet',[$response->project->id])}}" positive
                                label="Evolution" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</x-user-profile2>