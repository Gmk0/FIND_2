<div class="fixed bottom-0 w-full px-6 top-4 lg:relative" x-data="{photoName: null, photoPreview: null}">
    <div x-show="photoPreview" style="display: none;"
        class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="p-4 bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <img :src="photoPreview" alt="Prévisualisation de l'image" class="w-80">

                    <x-errors only="attachment" />

                    <div class="flex gap-2 mt-4">

                        <x-button.circle @click="photoPreview=null" onclick="deletePhoto()" icon='trash'>
                            </x-button>




                            <x-button label='send' wire:click="filename()">

                            </x-button>




                    </div>

                </div>
            </div>
        </div>
    </div>
    <form wire:submit.prevent='sendMessage'
        class="flex items-center justify-between w-full p-3 border-t border-gray-300 ">


        <input wire:model="attachment" type="file" class="hidden" id="attachment" x-ref="photo" x-on:change="
                                                photoName = $refs.photo.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.photo.files[0]);
                                        " />

        <button type="button" class="mr-2" onclick="document.getElementById('attachment').click()">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
            </svg>
        </button>

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
