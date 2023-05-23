<div class="min-h-screen">

    <div>
        @include('include.breadcumbUser',['projet'=>'Projet'])
    </div>
    <div class="container mx-6">


        <h2 class="mb-8 text-xl font-semibold tracking-wide text-indigo-600 uppercase">Mes Projet</h2>
        <div class="my-4">

            <x-button href="{{route('createProject')}}" positive label="Soumettre"></x-button>
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

            @forelse($projets as $projet)
            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="mb-2 text-lg font-bold text-gray-800">{{$projet->title}}</h3>

                <p class="mb-2 text-gray-700 dark:text-gray-400">Date: {{$projet->begin_project}}</p>

                <p class="mb-2 text-gray-700 dark:text-gray-400">Budget: <span
                        class="font-bold">{{$projet->bid_amount}}</span></p>
                <div class="flex justify-between">
                    <span class="text-gray-500 "></span>
                    @if($projet->active=="active")
                    <span class="font-bold text-green-500 ">En cours</span>
                    @elseif($projet->status=="en attente")

                    <span class="font-bold text-yellow-500 ">en attente</span>
                    @endif
                </div>
                <div class="mt-4 flex gap-4">
                    @if($projet->active=="active")
                    <div>
                        <x-button href="{{route('PropostionProjet',[$projet->id])}}" primary
                            label="propositions {{$projet->projectRepsonsesCount()}}" />
                    </div>



                    @else
                    <div>
                        <x-button href="{{route('PropostionProjet',[$projet->id])}}" primary
                            label="Propositions {{$projet->projectRepsonsesCount()}}" />

                    </div>
                    <div>
                        <x-button wire:click="openModalEdit({{$projet->id}})" label="Modifier">
                        </x-button>
                    </div>

                    <div>
                        <x-button.circle wire:click="openModal({{$projet->id}})" icon="trash">

                            </x-button>

                    </div>








                    @endif



                </div>
            </div>
            @empty

            <div class="col-span-2 items-center justify-center font-semibold text-xl">
                <div class="text-gray-800">
                    <p>Si vous avez besoin d'un service particulier, n'hésitez pas à
                        soumettre
                        votre projet et
                        notre communauté de freelances
                        talentueux sera ravie de vous aider</p>
                </div>


            </div>
            @endforelse

            <!-- Ajouter d'autres projets ici -->
        </div>

        <div>

            {{$projets->links()}}
        </div>
    </div>

    <x-confirmation-modal wire:model.defer="deleteProjet">

        <x-slot name="title">
            Effacer la mission

        </x-slot>

        <x-slot name="content">
            Voulez-vous supprimer cette mission ?
            vous allez aussi supprimer les propositions de freelannce lier a cette mission.

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('deleteProjet')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Effacer la mission') }}
            </x-danger-button>
        </x-slot>

    </x-confirmation-modal>
    {{-- The whole world belongs to you. --}}

    <x-modal.card title="Modifier" wire:model.defer="modalEdit">
        <div class="grid grid-cols-1  gap-4 ">

            <x-input wire:model.defer="editProjet.title" label="Titre">

            </x-input>
            <x-textarea wire:model.defer="editProjet.description" label="Description">

            </x-textarea>

        </div>
        <div class="grid gap-4 lg:grid-cols-2">


            <x-datetime-picker label=" Date Debut" wire:model.defer="editProjet.begin_project"
                parse-format="YYYY-MM-DD HH:mm:ss" placeholder="Date Debut" />

            <x-datetime-picker label=" Date Fin" without wire:model.defer="editProjet.end_project"
                parse-format="YYYY-MM-DD HH:mm:ss" placeholder="Date Fin" />
        </div>
        <div class="mt-2">
            <x-inputs.currency placeholder="Budget" icon="currency-dollar" thousands="." decimal="," precision="4"
                wire:model.defer="editProjet.bid_amount" />

        </div>

        <x-slot name="footer">
            <x-danger-button wire:click="cancelEdit()" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-danger-button>

            <x-secondary-button class="ml-3" wire:click="modifier()" wire:loading.attr="disabled">
                {{ __('Modifier') }}
            </x-secondary-button>
        </x-slot>
        </x-modal>
</div>


@push('script')


<script>
    window.addEventListener('success', event=> {
        Swal.fire({
        // position: 'top-end',
        icon:'success',
        //toast: true,
        title:"operation reussie",
        text:event.detail.message,
        showConfirmButton: true,
        timer:5000

        })
        });

        window.addEventListener('error', event=> {
        Swal.fire({
        // position: 'top-end',
        icon:'error',
        //toast: true,
        title:"operation echoué",
        text:event.detail.message,
        showConfirmButton: true,
        timer:5000

        })
        });
</script>
</script>

@endpush