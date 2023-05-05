<div class="w-full px-6 lg:relative" x-data="{photoName: null, photoPreview: null}">

    <div @click.away="theme = false" x-cloak x-show="attachement" class="fixed inset-0 z-50 overflow-y-auto"
        id="theme-modal">
        <form wire:submit.prevent="sendFile"
            class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-800" id="modal-headline">
                        Envoyer un fichier
                    </h3>
                    <div class="mt-4">
                        {{$this->form}}
                    </div>
                </div>
                <div class="flex gap-4 mt-5 sm:mt-6">
                    <button type="submit"
                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                        Envoyer
                    </button>
                    <x-button x-on:click="attachement=!attachement" negative>
                        Annuler
                    </x-button>
                </div>
            </div>
        </form>
    </div>
    <form wire:submit.prevent='sendMessage'
        class="flex items-center justify-between w-full p-3 border-t border-gray-300 ">






        <input wire:model.defer="body" id="input" type="text" placeholder="Écrire un message" x-ref="myInput" required
            x-on:blur='resetPosition'
            class="flex-1 p-2 mr-1 bg-white border border-gray-300 rounded-full md:mr-4 focus:outline-none focus:ring focus:border-blue-300">

        <button type="submit" wire:loading.attr='disabled' @click="photoPreview=null">

            <i class="w-8 h-8 fa-regular fa-paper-plane"></i>
        </button>
    </form>
</div>
@push('script')

<script>
    function deletePhoto() {
    // réinitialiser la variable de prévisualisation photoPreview


    document.getElementById('attachment').value = '';
    }
</script>

@endpush