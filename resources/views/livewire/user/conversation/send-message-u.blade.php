<div class="flex-none">
    <form wire:submit.prevent='sendMessage' class="flex items-center p-4 bg-gray-100 ">
        <input wire:model.defer="body" type="text" placeholder="Écrire un message"
            class="flex-1 mr-4 p-2 bg-white border border-gray-300 rounded-full focus:outline-none focus:ring focus:border-blue-300">
        <div class="relative">
            <input type="file" class="hidden" id="attachment">
            <button type="button"
                class="flex items-center justify-center p-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300"
                onclick="document.getElementById('attachment').click()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </button>
        </div>
        <button type="submit"
            class="p-2 ml-4 bg-blue-500 text-white rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
            Envoyer
        </button>
    </form>
</div>