<div>

    <div>
        @include('include.breadcumbFreelance',['mission'=>'mission','missionView'=>$projet->id])
    </div>
    <div class="container max-w-6xl px-4 py-8 mx-auto">
        <h1 class="mb-4 text-xl font-semibold tracking-wide text-indigo-600 uppercase lg:text-2xl">
            Détails de la mission</h1>
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h2 class="mb-4 text-lg font-bold text-gray-800 lg:text-xl">{{$projet->title}}</h2>
            <p class="mb-4 text-gray-600 dark:text-gray-500">Description de la mission :</p>
            <p class="mb-4 leading-loose text-gray-800">
                {{$projet->description}}
            </p>
            <p class="mb-4 text-gray-600 dark:text-gray-500">Détails du projet :</p>
            <ul class="mb-4 list-disc list-inside">
                <li class="text-gray-800 ">Durée du de la mission : Du <span
                        class="font-bold">{{$projet->begin_project}}</span> au
                    <span class="font-bold">
                        {{$projet->end_project}}
                    </span>

                </li>
                <li class="mt-4 text-gray-800 dark:text-gray-500">Budget : <span
                        class="text-lg font-bold text-gray-800">{{$projet->bid_amount}} $</span>
                </li>

            </ul>
            <p class="mb-4 text-gray-600 dark:text-gray-500">Exigences de la mission :</p>
            <ul class="mb-4 list-disc list-inside">

            </ul>
            <p class="mb-4 text-gray-600 dark:text-gray-500">Fichier Inclus :</p>




            <p class="mb-4 text-gray-800 dark:text-gray-200">Postuler à cette mission</p>
            @if($response ==null)
            <x-button label="Postuler" primary @click='$wire.openModal()' />
            @else
            <div>
                <x-button wire:click="modalEdit()" spinner='modalEdit' label="Voir votre propositon" primary />

            </div>
            @endif

        </div>


        <x-modal.card title='Proposition' blur wire:model.defer="modal">

            <div class="grid grid-cols-1 gap-4">

                <x-textarea label="Description" wire:model.defer='content' />

                <div x-data="{isOpen:false}" x-on:open.window="isOpen=true">

                    <div class="flex">
                        <label class="inline-flex items-center">
                            <input type="checkbox" x-model="isOpen"
                                class="w-5 h-5 text-gray-600 rounded-full form-checkbox" name="example" value="">
                            <span class="ml-2 text-sm text-gray-700 md:text-base dark:text-gray-300">Proposer un prix
                            </span>
                        </label>

                    </div>

                    <div x-show="isOpen">
                        <x-inputs.currency label="Budjet" placeholder="Montant" icon="currency-dollar" thousands="."
                            decimal="," precision="2" wire:model.defer="amount" />

                    </div>


                </div>


                <x-input type='number' label="delai" placeholder="delai" wire:model.defer="delai" />

                <div>
                    <x-slot name="footer">
                        <div class="flex gap-4">

                            <x-button flat label='fermer' x-on:click='close' />

                            @if($modalEdit)
                            <x-button wire:click="editResponse()" flat primary label='envoyer' spinner='editResponse' />

                            @else
                            <x-button wire:click="sendResponse()" flat primary label='envoyer' spinner='sendResponse' />

                            @endif

                        </div>

                    </x-slot>
                </div>

        </x-modal.card>


    </div>
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>

@push('script')

<script>
    window.addEventListener('error', event=> {
    Swal.fire({
    // position: 'top-end',
    icon:'error',
    //toast: true,
    title:"operation echoue",
    text:event.detail.message,
    showConfirmButton: true,
    //timer:5000
    })
    
    });
</script>

@endpush