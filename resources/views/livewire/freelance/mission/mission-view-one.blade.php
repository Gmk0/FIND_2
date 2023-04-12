<div>

    <div class="container max-w-6xl px-4 py-8 mx-auto">
        <h1 class="mb-4 text-3xl font-bold text-gray-800">Détails du Projet</h1>
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h2 class="mb-4 text-2xl font-bold text-gray-800">{{$projet->title}}</h2>
            <p class="mb-4 text-gray-600">Description du projet :</p>
            <p class="mb-4 leading-loose text-gray-800">
                {{$projet->description}}
            </p>
            <p class="mb-4 text-gray-600">Détails du projet :</p>
            <ul class="mb-4 list-disc list-inside">
                <li class="text-gray-800">Durée du projet : 4 semaines</li>
                <li class="text-gray-800">Budget : {{$projet->bid_amount}}</li>
                <li class="text-gray-800">Technologies requises : Tailwind CSS, Vue.js, Laravel</li>
            </ul>
            <p class="mb-4 text-gray-600">Exigences du projet :</p>
            <ul class="mb-4 list-disc list-inside">
                <li class="text-gray-800">Expérience en développement Front-end avec Tailwind CSS</li>
                <li class="text-gray-800">Maîtrise des technologies requises</li>
                <li class="text-gray-800">Capacité à respecter les délais</li>
            </ul>
            <p class="mb-4 text-gray-600">Fichier Inclus :</p>

            <p class="mb-4 text-gray-800">Pour postuler à ce projet, veuillez envoyer votre CV et portfolio à l'adresse
                e-mail suivante : [adresse e-mail du client]</p>
            @if($response ==null)
            <x-button label="Postuler" primary @click='$wire.openModal()' />
            @else
            <div>
                <x-button label="Voir votre propositon" primary @click='$wire.openModal()' />
                <div>

                    <h1>Statut : {{$response->statut}} </h1>
                </div>
            </div>
            @endif

        </div>


        <x-modal.card title='Proposition' blur wire:model.defer="modal">

            <div class="grid grid-cols-1 gap-4">

                <x-textarea label="Description" wire:model.defer='content' />

                <x-inputs.currency label="Budjet" placeholder="Montant" icon="currency-dollar" thousands="." decimal=","
                    precision="4" wire:model.defer="amount" />

                <x-input type='number' label="delai" placeholder="delai" wire:model.defer="delai" />

                <div>
                    <x-slot name="footer">
                        <div class="flex gap-4">

                            <x-button flat label='fermer' x-on:click='close' />
                            <x-button wire:click="sendResponse()" flat primary label='envoyer' spinner='sendResponse' />
                        </div>

                    </x-slot>
        </x-modal.card>
    </div>
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>