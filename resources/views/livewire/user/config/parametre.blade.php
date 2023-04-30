<div class="min-h-screen  ">

    <div>
        @include('include.breadcumbUser',['config'=>'configuration'])
    </div>

    <div class="py-8 mx-4">

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-medium mb-4">Configuration</h2>

            <!-- Gestion des abonnements -->


            <!-- Gestion des notifications -->


            <div class="p-4 mb-6">
                <h2 class="text-lg font-medium mb-2">Paramètres de notification</h2>
                <div class="space-y-4">
                    <div class="flex items-center">

                        <x-checkbox label="Recevoir des notifications par e-mail" />
                    </div>
                    <div class="flex items-center">

                        <x-checkbox label="Recevoir des notifications par telephone" />
                    </div>


                    <div class="flex items-center">

                        <x-checkbox label="Recevoir des messages
                            privés" />
                    </div>
                    <div class="flex items-center">


                        <x-checkbox label="Recevoir des mises à jour de service" />
                    </div>
                    <div class="flex items-center">


                        <x-checkbox label="Recevoir des mises à jour de service" />
                    </div>
                </div>

            </div>

            <div class="mb-6">
                <h3 class="text-lg font-medium mb-2">Abonnements</h3>
                <p class="text-gray-500 mb-4">Gérez vos abonnements et vos paiements ici.</p>

                <a href="#" class="bg-indigo-500 text-white rounded-md py-2 px-4 hover:bg-indigo-600">Gérer les
                    abonnements</a>
            </div>

            <!-- Gestion des intégrations -->
            <div>
                <h3 class="text-lg font-medium mb-2">Intégrations</h3>
                <p class="text-gray-500 mb-4">Intégrez notre application avec d'autres outils et services.</p>

                <a href="#" class="bg-indigo-500 text-white rounded-md py-2 px-4 hover:bg-indigo-600">Gérer les
                    intégrations</a>
            </div>

        </div>




    </div>
