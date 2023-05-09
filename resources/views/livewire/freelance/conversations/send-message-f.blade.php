{{--<div class="">
    <div class="mt-2 mb-2" x-show="photoPreview" style="display: none;">
        <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-lg "
            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
        </span>
    </div>
    <form wire:submit.prevent='sendMessage' class="flex items-center p-4 bg-gray-100 ">
        <div class="relative" class="mr-2 md:mr-4">


            <input wire:model.defer="attachment" type="file" class="hidden" id="attachment" x-ref="photo" x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                photoPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                    " />
            <button type="button"
                class="flex items-center justify-center p-2 mr-2 text-white rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300"
                onclick="document.getElementById('attachment').click()">
                <svg class="w-5 h-5 text-blue-500" viewBox="0 0 24.00 24.00" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M20 10.9696L11.9628 18.5497C10.9782 19.4783 9.64274 20 8.25028 20C6.85782 20 5.52239 19.4783 4.53777 18.5497C3.55315 17.6211 3 16.3616 3 15.0483C3 13.7351 3.55315 12.4756 4.53777 11.547L12.575 3.96687C13.2314 3.34779 14.1217 3 15.05 3C15.9783 3 16.8686 3.34779 17.525 3.96687C18.1814 4.58595 18.5502 5.4256 18.5502 6.30111C18.5502 7.17662 18.1814 8.01628 17.525 8.63535L9.47904 16.2154C9.15083 16.525 8.70569 16.6989 8.24154 16.6989C7.77738 16.6989 7.33224 16.525 7.00403 16.2154C6.67583 15.9059 6.49144 15.4861 6.49144 15.0483C6.49144 14.6106 6.67583 14.1907 7.00403 13.8812L14.429 6.88674"
                            stroke="#009dff" stroke-width="0.624" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
            </button>

        </div>
        <input wire:model.defer="body" type="text" placeholder="Écrire un message"
            class="flex-1 p-2 mr-1 bg-white border border-gray-300 rounded-full md:mr-4 focus:outline-none focus:ring focus:border-blue-300">

        <button type="submit" class="" wire:loading.attr='disabled' @click="photoPreview=null">

            <svg fill="#000000" class="w-5 h-5" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001" xml:space="preserve">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <g>
                        <g>
                            <path
                                d="M509.532,34.999c-2.292-2.233-5.678-2.924-8.658-1.764L5.213,225.734c-2.946,1.144-4.967,3.883-5.192,7.034 c-0.225,3.151,1.386,6.149,4.138,7.7l102.719,57.875l35.651,174.259c0.222,1.232,0.723,2.379,1.442,3.364 c0.072,0.099,0.131,0.175,0.191,0.251c1.256,1.571,3.037,2.668,5.113,3c0.265,0.042,0.531,0.072,0.795,0.088 c0.171,0.011,0.341,0.016,0.511,0.016c1.559,0,3.036-0.445,4.295-1.228c0.426-0.264,0.831-0.569,1.207-0.915 c0.117-0.108,0.219-0.205,0.318-0.306l77.323-77.52c3.186-3.195,3.18-8.369-0.015-11.555c-3.198-3.188-8.368-3.18-11.555,0.015 l-60.739,60.894l13.124-112.394l185.495,101.814c1.868,1.02,3.944,1.239,5.846,0.78c0.209-0.051,0.4-0.105,0.589-0.166 c1.878-0.609,3.526-1.877,4.574-3.697c0.053-0.094,0.1-0.179,0.146-0.264c0.212-0.404,0.382-0.8,0.517-1.202L511.521,43.608 C512.6,40.596,511.824,37.23,509.532,34.999z M27.232,234.712L432.364,77.371l-318.521,206.14L27.232,234.712z M162.72,316.936 c-0.764,0.613-1.429,1.374-1.949,2.267c-0.068,0.117-0.132,0.235-0.194,0.354c-0.496,0.959-0.784,1.972-0.879,2.986L148.365,419.6 l-25.107-122.718l275.105-178.042L162.72,316.936z M359.507,419.195l-177.284-97.307L485.928,66.574L359.507,419.195z">
                            </path>
                        </g>
                    </g>
                </g>
            </svg>
        </button>
    </form>
</div>--}}


<div class="w-full p-4 lg:relative" x-data="{photoName: null, photoPreview: null}">

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
                    class="flex w-full h-10 border  rounded-xl focus:outline-none focus:border-indigo-300" />

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
