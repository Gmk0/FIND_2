<div class="p-4">

    <div>
        @include('include.breadcumbUser',['projet'=>'Projet'])
    </div>
    <div class="container mx-auto">


        <h2 class="mb-4 text-xl font-semibold tracking-wide text-indigo-600 uppercase">Profil</h2>


        <div class="md:px-6 ">

            <x-section-border />
            <div class='md:grid  mx-auto md:grid-cols-3 md:gap-6'>
                <div class="flex justify-between md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Nom & Prenom') }}
                        </h3>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-100">
                            {{ __('Prive*') }}
                        </p>
                    </div>


                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">

                    <div class="px-4 py-5 bg-white dark:bg-gray-800  rounded-lg   shadow ">
                        <div class="grid md:gap-6 gap-4 grid-cols-1 md:grid-cols-2 md:mb-2">
                            <x-input label='Use name' value="" wire:model.defer="user.name" />
                            <x-input label='Nom' wire:model.defer="freelance.nom" />
                            <x-input label='Prenom' wire:model.defer="freelance.prenom" />

                            <x-input label='Numero' wire:model.defer="user.phone" />
                            <x-input label='Taux journalier' wire:model.defer="freelance.taux_journalier" />
                            <x-select wire:model.defer="freelance.experience" label="Anciennete">
                                <x-select.option label="0-2 ans" value="0-2" />
                                <x-select.option label="2-7 ans" value="2-7" />
                                <x-select.option label="+7ans" value="7" />

                            </x-select>
                            <div class="md:col-span-2">
                                <x-input label='Email' clas="cols-span-2" wire:model.defer="user.email" />
                            </div>

                        </div>

                        <div
                            class="flex items-center justify-end px-4 py-3 text-right shadow bg-gray-50 dark:bg-gray-800  sm:rounded-bl-md sm:rounded-br-md">
                            <x-action-message class="mr-3 " on="updateFirts">
                                {{ __('profiles.Saved') }}
                            </x-action-message>

                            <x-button label="Enregistrer" stone wire:click="updateFirts()">

                            </x-button>
                        </div>

                    </div>



                </div>
            </div>

            <x-section-border />
            <div class='mt-4 md:grid md:grid-cols-3 md:gap-6'>
                <div class="flex justify-between md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Photo de Profile') }} <span class="text-red-600">*</span>
                        </h3>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-100">
                            {{ __('Ajoutez une photo de profil de vous-même afin que les clients sachent
                            exactement
                            avec qui ils travailleront.') }}
                        </p>
                    </div>


                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div>
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800  rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                            <div class="grid gap-6 md:grid-cols-2 md:mb-2">
                                <x-input label='Avenue' value="" wire:model.defer="freelance.localisation.avenue" />
                                <x-input label='ville' wire:model.defer="freelance.localisation.ville" />
                                <x-input label='commune' wire:model.defer="freelance.localisation.commune" />

                                <x-input label='Site web' wire:model.defer="freelance.site" />




                            </div>

                            <div
                                class="flex items-center justify-end px-4 py-3 text-right shadow bg-gray-50 dark:bg-gray-800 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                                <x-action-message class="mr-3 " on="saved">
                                    {{ __('profiles.Saved') }}
                                </x-action-message>

                                <x-jet-button wire:click="updateLocalisation()">
                                    <span wire:loading.remove wire:target='updateLocalisation'>{{ __('profiles.Save')
                                        }}</span>

                                    <span wire:loading wire:target='updateLocalisation'>Modification...</span>

                                </x-jet-button>
                            </div>

                        </div>


                    </div>
                </div>

            </div>
            <x-section-border />
            <div class='mt-4 md:grid md:grid-cols-3 md:gap-6'>
                <div class="flex justify-between md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Photo de Profile') }} <span class="text-red-600">*</span>
                        </h3>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-100">
                            {{ __('Ajoutez une photo de profil de vous-même afin que les clients sachent
                            exactement
                            avec qui ils travailleront.') }}
                        </p>
                    </div>


                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form>
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-white rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

                            <div class="gap-6 md:grid ">

                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-400">
                                                <thead class="bg-gray-50 dark:bg-gray-800">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Certificat
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Delivrer par
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Annee
                                                        </th>
                                                        <th scope="col" class="relative px-6 py-3">


                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-400">


                                                    @forelse ($freelance['certificat'] as $key=>$value )

                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 whitespace-nowrap">


                                                            <x-input
                                                                wire:model.defer="freelance.certificat.{{$key}}.certificate" />

                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">


                                                            <x-input
                                                                wire:model.defer="freelance.certificat.{{$key}}.delivrer" />
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400whitespace-nowrap">

                                                            <x-input
                                                                wire:model.defer="freelance.certificat.{{$key}}.annee" />
                                                        </td>

                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                            <x-button label="Modifier"
                                                                wire:click="modifierCertificate({{$key}})"></x-button>
                                                        </td>
                                                    <tr>
                                                        @empty

                                                        @endforelse





                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </form>
                </div>

            </div>

            <x-section-border />
            <div class='mt-4 md:grid md:grid-cols-3 md:gap-6'>
                <div class="flex justify-between md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Photo de Profile') }} <span class="text-red-600">*</span>
                        </h3>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-100">
                            {{ __('Ajoutez une photo de profil de vous-même afin que les clients sachent
                            exactement
                            avec qui ils travailleront.') }}
                        </p>
                    </div>


                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form>
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-white rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

                            <div class="gap-6 md:grid ">

                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <div class="overflow-hidden border-b border-gray-400 shadow sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-400">
                                                <thead class="bg-gray-50 dark:bg-gray-800">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Certificat
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Delivrer par
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Annee
                                                        </th>
                                                        <th scope="col" class="relative px-6 py-3">


                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-400">


                                                    @forelse ($freelance['diplome'] as $key=> $value )

                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 whitespace-nowrap">

                                                            <x-input
                                                                wire:model.defer="freelance.diplome.{{$key}}.diplome" />
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">

                                                            <x-input
                                                                wire:model.defer="freelance.diplome.{{$key}}.universite" />
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400whitespace-nowrap">

                                                            <x-input
                                                                wire:model.defer="freelance.diplome.{{$key}}.annee" />
                                                        </td>

                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                            <x-button label="modifier"
                                                                wire:click="modifierDiplome({{$key}})"></x-button>
                                                        </td>
                                                    <tr>
                                                        @empty

                                                        @endforelse





                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </form>
                </div>

            </div>

            <x-section-border />
            <div class='mt-4 md:grid md:grid-cols-3 md:gap-6'>
                <div class="flex justify-between md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Photo de Profile') }} <span class="text-red-600">*</span>
                        </h3>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-100">
                            {{ __('Ajoutez une photo de profil de vous-même afin que les clients sachent
                            exactement
                            avec qui ils travailleront.') }}
                        </p>
                    </div>


                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form>
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-white rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

                            <div class="gap-6 md:grid ">

                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-400">
                                                <thead class="bg-gray-50 dark:bg-gray-800">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Compentences
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Niveau
                                                        </th>

                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Niveau
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-400">


                                                    @forelse ($freelance['competences'] as $key=> $value )

                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 whitespace-nowrap">

                                                            <x-input
                                                                wire:model.defer="freelance.competences.{{$key}}.skill">
                                                            </x-input>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                                            <x-select label="" placeholder="Choisissez un niveau"
                                                                :options="['Débutant', 'Intermédiaire', 'expert']"
                                                                wire:model.defer="freelance.competences.{{$key}}.level" />
                                                        </td>


                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">

                                                            <x-button wire:click="modifierCompentences({{$key}})">
                                                            </x-button>
                                                        </td>
                                                    <tr>
                                                        @empty

                                                        @endforelse





                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </form>
                </div>

            </div>

            <x-section-border />
            <div class='mt-4 md:grid md:grid-cols-3 md:gap-6'>
                <div class="flex justify-between md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Photo de Profile') }} <span class="text-red-600">*</span>
                        </h3>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-100">
                            {{ __('Ajoutez une photo de profil de vous-même afin que les clients sachent
                            exactement
                            avec qui ils travailleront.') }}
                        </p>
                    </div>


                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form>
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-white rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

                            <div class="gap-6 md:grid ">

                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-400">
                                                <thead class="bg-gray-50 dark:bg-gray-800">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Langue
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Niveau
                                                        </th>

                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Niveau
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-400">


                                                    @forelse ($freelance['langue'] as $key=> $value )

                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 ">



                                                            <x-select label="" placeholder="Choisissez une langue"
                                                                :options="['Français', 'Anglais', 'Lingala', 'Swahili', 'Kikongo','Tshiluba']"
                                                                wire:model.defer='freelance.langue.{{$key}}.name' />




                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 ">

                                                            <x-select label="" placeholder="Choisissez un niveau"
                                                                :options="['Débutant', 'Intermédiaire', 'Avancé']"
                                                                wire:model.defer="freelance.langue.{{$key}}.level" />
                                                        </td>


                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">

                                                            <x-button label="modifier"
                                                                wire:click="modifierLangue({{$key}})" />

                                                        </td>
                                                    <tr>
                                                        @empty

                                                        @endforelse





                                                </tbody>


                                            </table>

                                            <div>


                                                <div class="grid gap-4 mb-4 md:grid-cols-3">

                                                    <x-select wire:model.defer="selected.name"
                                                        placeholder="Choisissez une langue">

                                                        <x-select.option label="Français" value="Français" />
                                                        <x-select.option label="Lingala" value="Lingala" />
                                                        <x-select.option label="Anglais" value="Anglais" />
                                                        <x-select.option label="Swahili" value="Swahili" />
                                                        <x-select.option label="Kikongo" value="Kikongo" />
                                                        <x-select.option label="Tshiluba" value="Tshiluba" />

                                                    </x-select>


                                                    <x-select label="" placeholder="Choisissez un niveau"
                                                        :options="['Débutant', 'Intermédiaire', 'Avancé']"
                                                        wire:model.defer="selected.level" />
                                                    <div>
                                                        <x-button stone outline wire:click="addLanguage()"
                                                            icon="plus-circle" spinner="addLanguage" label="Ajouter" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </form>
                </div>

            </div>
            <x-section-border />
            <div class='mt-4 md:grid md:grid-cols-3 md:gap-6'>
                <div class="flex justify-between md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Photo de Profile') }} <span class="text-red-600">*</span>
                        </h3>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-100">
                            {{ __('Ajoutez une photo de profil de vous-même afin que les clients sachent
                            exactement
                            avec qui ils travailleront.') }}
                        </p>
                    </div>


                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form>
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-white rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

                            <div class="gap-6 md:grid ">

                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-400">
                                                <thead class="bg-gray-50 dark:bg-gray-800">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Langue
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Niveau
                                                        </th>

                                                        <th scope="col"
                                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                                            Niveau
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-400">


                                                    @forelse ($freelance['comptes'] as $value )

                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                                            {{$value}}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">

                                                        </td>


                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">

                                                        </td>
                                                    <tr>
                                                        @empty

                                                        @endforelse





                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </form>
                </div>

            </div>



        </div>



    </div>
    {{-- The whole world belongs to you. --}}
</div>