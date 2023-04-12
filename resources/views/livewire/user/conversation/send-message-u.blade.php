<div class="flex-none" x-data="{photoName: null, photoPreview: null}">
    <div class="mt-2 mb-2" x-show="photoPreview" style="display: none;">
        <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-lg "
            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
        </span>
    </div>
    <form wire:submit.prevent='sendMessage' class="flex items-center p-4 bg-gray-100 ">
        <div class="relative" class="mr-4">


            <input wire:model.defer="attachment" type="file" class="hidden" id="attachment" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />
            <button type="button"
                class="flex items-center justify-center p-2 mr-2 text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300"
                onclick="document.getElementById('attachment').click()">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </button>

        </div>
        <input wire:model.defer="body" type="text" placeholder="Écrire un message"
            class="flex-1 p-2 mr-2 bg-white border border-gray-300 rounded-full focus:outline-none focus:ring focus:border-blue-300">

        <button type="submit" wire:loading.attr='disabled' @click="photoPreview=null"
            class="p-2 ml-4 text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
            Envoyer
        </button>
    </form>
</div>