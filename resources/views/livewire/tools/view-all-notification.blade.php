<div>

    <section x-data="notifications()" class="py-8 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="mb-4 text-2xl font-bold">Mes Notifications</h2>

            <div class="flex items-center mb-4 space-x-4">
                <button class="px-4 py-2 font-semibold text-gray-800 bg-gray-300 rounded-lg hover:bg-gray-400"
                    x-on:click="afficherToutes = true" :class="{ 'bg-gray-400': afficherToutes }">
                    Toutes
                </button>
                <button class="px-4 py-2 font-semibold text-gray-800 bg-gray-300 rounded-lg hover:bg-gray-400"
                    x-on:click="afficherToutes = false" :class="{ 'bg-gray-400': !afficherToutes }">
                    Catégorie
                </button>
            </div>


            <div class="grid gap-4">


                @forelse ($notifications as $notification)

                <div class="p-4 bg-white rounded shadow cursor-pointer"
                    x-on:click="notificationActive = notificationActive === 0 ? -1 : 0"
                    x-bind:class="{ 'bg-gray-100': notificationActive === 0 }">
                    <h3 class="mb-2 text-lg font-semibold">Nouvelle notification</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in
                        ipsum
                        vel leo vulputate finibus.</p>
                    <span class="text-sm text-gray-500">Il y a 1 heure</span>
                    <div class="mt-2 text-gray-600" x-show.transition="notificationActive === 0">
                        Contenu de la notification ici...
                    </div>
                </div>
                @empty

                @endforelse




                <!-- Ajoutez d'autres notifications ici -->

            </div>


            <template x-if="!afficherToutes">
                <!-- Afficher les notifications par catégorie ici -->
            </template>

        </div>
    </section>


    <script>
        function  notifications(){
            return {
    afficherToutes: true,
    notificationActive: -1,
    
            }
          }
    </script>
    {{-- Do your work, then step back. --}}
</div>