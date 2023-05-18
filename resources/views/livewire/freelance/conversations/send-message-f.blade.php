<div class="bottom-0 w-full h-16 p-4 lg:relative" x-data="{photoName: null, photoPreview: null}">

    <div @click.away="theme = false" x-cloak x-show="attachement" class="fixed inset-0 z-50 overflow-y-auto"
        id="theme-modal">
        <form wire:submit.prevent="sendFile"
            class="flex items-center justify-center min-h-screen px-2 pt-4 pb-20 text-center sm:p-0">
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

        <div>

            <button type="button" id="emoji-picker-btn"
                class="items-center justify-center hidden text-gray-400 lg:flex hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </button>



        </div>



        <div class="flex-grow ml-1">


            <div class="relative w-full">


                <input contenteditable="true" wire:model.defer="body" id="input" type="text"
                    placeholder="Écrire un message" x-ref="myInput" required x-on:blur='resetPosition'
                    class="flex w-full h-10 border rounded-xl focus:outline-none focus:border-indigo-300" />

            </div>
        </div>





        <div class="ml-2">
            <button type="submit" wire:loading.attr='disabled'
                class="flex justify-center flex-shrink-0 px-4 py-1 text-white bg-indigo-500 hover:bg-indigo-600 rounded-xl">
                <span>Send</span>
                <span class="ml-2">
                    <svg class="w-4 h-4 -mt-px transform rotate-45" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </span>
            </button>
        </div>
    </form>
</div>


@push('script')

<script>
    function deletePhoto() {
    // réinitialiser la variable de prévisualisation photoPreview


    document.getElementById('attachment').value = '';
    }
</script>

<script>
    const button = document.querySelector('#emoji-picker-btn');
    const input = document.getElementById('input');
const picker = new EmojiButton();
picker.on('emoji', emoji => {
    input.value += emoji;
    // Insérer l'emoji sélectionné dans un champ de texte ou un textarea
});





button.addEventListener('click', () => {
    picker.togglePicker(button);
});


</script>

@endpush