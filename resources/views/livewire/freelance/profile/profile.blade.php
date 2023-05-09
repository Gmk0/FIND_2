<div class="min-h-screen">

    <div>
        @include('include.breadcumbFreelance',['profile'=>'profile'])
    </div>
    <div class="container mx-auto">


        <h2 class="mb-4 text-xl font-semibold tracking-wide text-indigo-600 uppercase">Informations</h2>


        <div class="md:px-6 ">

            <x-section-border />
            <div class='mx-auto md:grid md:grid-cols-3 md:gap-6'>
                <div class="flex justify-between md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Nom & Prenom') }}
                        </h3>


                    </div>


                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">

                    <div class="px-4 py-5 bg-white rounded-lg shadow dark:bg-gray-800 ">
                        <div class="grid grid-cols-1 gap-4 md:gap-6 md:grid-cols-2 md:mb-2">
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
                            class="flex items-center justify-end px-4 py-3 mt-2 text-right shadow bg-gray-50 dark:bg-gray-800 sm:rounded-bl-md sm:rounded-br-md">
                            <x-action-message class="mr-3 " on="updateFirts">
                                {{ __('profiles.Saved') }}
                            </x-action-message>

                            <x-jet-button wire:click="updateFirts()">
                                <span wire:loading.remove wire:target='updateFirts'>{{ __('profiles.Save')
                                    }}</span>

                                <span wire:loading wire:target='updateFirts'>Modification...</span>

                            </x-jet-button>

                        </div>

                    </div>



                </div>
            </div>

            <x-section-border />
            <div class='mt-4 md:grid md:grid-cols-3 md:gap-6'>
                <div class="flex justify-between md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Localisaction') }} <span class="text-red-600"></span>
                        </h3>


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
                                class="flex items-center justify-end px-4 py-3 mt-4 text-right shadow bg-gray-50 dark:bg-gray-800 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
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
                            {{ __('Education') }} <span class="text-red-600"></span>
                        </h3>

                    </div>


                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form>
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-white rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

                            <div class="gap-6 md:grid ">



                                <table id="table"
                                    class="w-full flex flex-row flex-no-wrap sm:bg-white dark:bg-gray-700 rounded-lg overflow-hidden sm:shadow-lg my-5">
                                    <thead class="text-white">
                                        @forelse ($freelance['certificat'] as $key=>$value )
                                        <tr
                                            class=" bg-gray-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                            <th class="p-3 text-left">certificat</th>
                                            <th class="p-3 text-left">Delivrer par</th>
                                            <th class="p-3 text-left">Annee</th>
                                            <th class="p-3 text-left" width="110">Actions</th>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </thead>
                                    <tbody class="flex-1 sm:flex-none">
                                        @forelse ($freelance['certificat'] as $key=>$value )
                                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 ">


                                                {{$value['certificate']}}

                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 truncate">

                                                {{$value['delivrer']}}
                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100  p-3 truncate">
                                                {{$value['annee']}}
                                            </td>
                                            <td
                                                class="border-grey-light border flex gap-1 hover:bg-gray-100 dark:hover:bg-gray-800 p-2 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                                                <x-button.circle sm icon="trash">
                                                    </x-button>
                                                    <x-button.circle wire:click='modifierCertificate({{$key}})' sm
                                                        icon="pencil">
                                                        </x-button>
                                            </td>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </tbody>
                                </table>

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
                            {{ __('Photo de Profile') }} <span class="text-red-600"></span>
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


                                <table id="table"
                                    class="w-full flex flex-row flex-no-wrap sm:bg-white dark:bg-gray-700 rounded-lg overflow-hidden sm:shadow-lg my-5">
                                    <thead class="text-white">
                                        @forelse ($freelance['diplome'] as $key=>$value )
                                        <tr
                                            class=" bg-gray-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                            <th class="p-3 text-left">universite</th>
                                            <th class="p-3 text-left">Diplome</th>
                                            <th class="p-3 text-left">Annee</th>
                                            <th class="p-3 text-left" width="110">Actions</th>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </thead>
                                    <tbody class="flex-1 sm:flex-none">
                                        @forelse ($freelance['diplome'] as $key=>$value )
                                        <tr x-data="{open:@entangle('diplomeEdit')}"
                                            class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 ">

                                                <span x-show="!open">{{$value['universite']}}</span>


                                                <x-input x-show="open" wire:model.defer="diplome.universite" />

                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 truncate">


                                                <span x-show="!open">{{$value['diplome']}}</span>

                                                <x-input x-show="open" wire:model.defer="diplome.diplome" />
                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100  p-3 truncate">


                                                <span x-show="!open">{{$value['annee']}}</span>

                                                <x-input x-show="open" wire:model.defer="diplome.annee" />
                                            </td>
                                            <td
                                                class="border-grey-light lg:border flex gap-1 hover:bg-gray-100 dark:hover:bg-gray-800 p-2  hover:font-medium cursor-pointer">
                                                <x-button.circle negative sm x-show="!open" icon="trash">
                                                    </x-button>
                                                    <x-button.circle x-show="!open" @click="open=true"
                                                        wire:click='modalDiplome({{$key}})' sm icon="pencil">
                                                        </x-button>

                                                        <x-button x-show="open" spinner="modifierDiplome"
                                                            wire:click='modifierDiplome({{$key}})' sm label="Edit"
                                                            icon="pencil">
                                                        </x-button>


                                                        <x-button x-show="open" @click="open=false" sm label="annuler">
                                                        </x-button>

                                            </td>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </tbody>
                                </table>

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
                            {{ __('Vos competences') }} <span class="text-red-600"></span>
                        </h3>


                    </div>


                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form>
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-white rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

                            <div class="gap-6 md:grid ">

                                <table id="table"
                                    class="w-full flex flex-row flex-no-wrap sm:bg-white dark:bg-gray-700 rounded-lg overflow-hidden sm:shadow-lg my-5">
                                    <thead class="text-white">
                                        @forelse ($freelance['competences'] as $key=>$value )
                                        <tr
                                            class=" bg-gray-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                            <th class="p-3 text-left">Compentences</th>
                                            <th class="p-3 text-left">Niveau</th>

                                            <th class="p-3 text-left" width="110">Actions</th>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </thead>
                                    <tbody class="flex-1 sm:flex-none">
                                        @forelse ($freelance['competences'] as $key=>$value )
                                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 ">


                                                {{$value['skill']}}

                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 truncate">

                                                {{$value['level']}}
                                            </td>

                                            <td
                                                class="border-grey-light border flex gap-1 hover:bg-gray-100 dark:hover:bg-gray-800 p-2 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                                                <x-button.circle sm icon="trash">
                                                    </x-button>
                                                    <x-button.circle wire:click='modifierCompentences({{$key}})' sm
                                                        icon="pencil">
                                                        </x-button>
                                            </td>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </tbody>
                                </table>



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
                            {{ __('Langue') }} <span class="text-red-600"></span>
                        </h3>

                    </div>


                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form>
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-white rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

                            <div class="gap-6 md:grid ">



                                <table id="table"
                                    class="w-full flex flex-row flex-no-wrap sm:bg-white dark:bg-gray-700 rounded-lg overflow-hidden sm:shadow-lg my-5">
                                    <thead class="text-white">
                                        @forelse ($freelance['langue'] as $key=>$value )
                                        <tr
                                            class=" bg-gray-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                            <th class="p-3 text-left">Langue</th>
                                            <th class="p-3 text-left">Niveau</th>

                                            <th class="p-3 text-left" width="110">Actions</th>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </thead>
                                    <tbody class="flex-1 sm:flex-none">
                                        @forelse ($freelance['langue'] as $key=>$value )
                                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 ">


                                                {{$value['name']}}

                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 truncate">

                                                {{$value['level']}}
                                            </td>

                                            <td
                                                class="border-grey-light border flex gap-1 hover:bg-gray-100 dark:hover:bg-gray-800 p-2 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                                                <x-button.circle sm icon="trash">
                                                    </x-button>
                                                    <x-button.circle wire:click='modifierCompentences({{$key}})' sm
                                                        icon="pencil">
                                                        </x-button>
                                            </td>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </tbody>
                                </table>

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
                            {{ __('Comptes lie') }}
                        </h3>


                    </div>


                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form>
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-white rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

                            <div class="gap-6 md:grid ">

                                <table id="table"
                                    class="w-full flex flex-row flex-no-wrap sm:bg-white dark:bg-gray-700 rounded-lg overflow-hidden sm:shadow-lg my-5">
                                    <thead class="text-white">
                                        @forelse ($freelance['comptes'] as $key=>$value )
                                        <tr
                                            class=" bg-gray-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                            <th class="p-3 text-left">comptes</th>
                                            <th class="p-3 text-left">lien</th>

                                            <th class="p-3 text-left" width="110">Actions</th>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </thead>
                                    <tbody class="flex-1 sm:flex-none">
                                        @forelse ($freelance['comptes'] as $key=>$value )
                                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 ">


                                                {{$value['comptes']}}

                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 truncate">

                                                {{$value['lien']}}
                                            </td>

                                            <td
                                                class="border-grey-light border flex gap-1 hover:bg-gray-100 dark:hover:bg-gray-800 p-2 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                                                <x-button.circle sm icon="trash">
                                                    </x-button>
                                                    <x-button.circle wire:click='modifierCompentences({{$key}})' sm
                                                        icon="pencil">
                                                        </x-button>
                                            </td>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </tbody>
                                </table>

                            </div>

                        </div>


                    </form>
                </div>

            </div>



        </div>



    </div>
    {{-- The whole world belongs to you. --}}
</div>