<div class="min-h-screen ">

    <div>
        @include('include.breadcumbUser',['config'=>'configuration'])
    </div>

    <div class="py-8 mx-4">

        <h2 class="mb-4 text-xl font-medium">Configuration</h2>
        <div class="grid p-6 bg-white rounded-lg shadow md:grid-cols-2">


            <!-- Gestion des abonnements -->


            <!-- Gestion des notifications -->


            <div class="p-4 mb-6">
                <h2 class="mb-2 text-lg font-medium">Paramètres de notification</h2>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <x-checkbox wire:model="enableEmail" wire:change="toogle()" label=" Recevoir des notifications
                            par e-mail" />
                    </div>
                    <div class="flex items-center">
                        <x-checkbox wire:change="toogle()" wire:model="enablePush" label=" Recevoir des notifications
                            push" />
                    </div>
                    <div class="flex items-center">
                        <x-checkbox wire:change="toogle()" wire:model=" enablePhone" label=" Recevoir des notifications
                            par telephone" />
                    </div>

                    <div class="flex items-center">
                        <x-checkbox wire:change="toogle()" label=" Recevoir des mises à jour de service" />
                    </div>
                    <div class="flex items-center">
                        <x-checkbox wire:model="enableInvoie" wire:change="toogle()"
                            label="Recevoir des facture par mail" />
                    </div>
                </div>

            </div>

            <div class="mb-6">
                <h3 class="mb-2 text-lg font-medium">Abonnements</h3>
                <p class="mb-4 text-gray-500">Gérez vos abonnements et vos paiements ici.</p>

                <a href="#" class="px-4 py-2 text-white bg-indigo-500 rounded-md hover:bg-indigo-600">Gérer les
                    abonnements</a>
            </div>

            <!-- Gestion des intégrations -->
            <div>
                <h3 class="mb-2 text-lg font-medium">Intégrations</h3>
                <p class="mb-4 text-gray-500">Intégrez notre application avec d'autres outils et services.</p>

                <a href="#" class="px-4 py-2 text-white bg-indigo-500 rounded-md hover:bg-indigo-600">Gérer les
                    intégrations</a>
            </div>

        </div>




    </div>