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
                            {{ __('Certification') }} <span class="text-red-600"></span>
                        </h3>

                    </div>


                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form>
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-gray-300 rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

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
                                        <tr x-data="{open:false}" x-on:close.window="open=false"
                                            class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 ">

                                                <span x-show="!open">{{$value['certificate']}}</span>

                                                <x-input x-show="open" wire:model.defer="certificate.certificate" />

                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 truncate">


                                                <span x-show="!open">{{$value['delivrer']}}</span>
                                                <x-input x-show="open" wire:model.defer="certificate.delivrer" />
                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100  p-3 truncate">

                                                <span x-show="!open">{{$value['annee']}}</span>


                                                <x-input x-show="open" wire:model.defer="certificate.annee" />
                                            </td>
                                            <td
                                                class="border-grey-light border flex gap-1 hover:bg-gray-100 dark:hover:bg-gray-800 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">



                                                <x-button.circle negative sm x-show="!open"
                                                    wire:click="remove({{$key}},'certificate')" icon="trash">
                                                    </x-button>
                                                    <x-button.circle x-show="!open" @click="open=true"
                                                        wire:click='modalCertificate({{$key}})' sm icon="pencil">
                                                        </x-button>

                                                        <x-button x-show="open" spinner="modifierCertificate"
                                                            wire:click='modifierCertificate({{$key}})' sm label="Edit"
                                                            icon="pencil">
                                                        </x-button>


                                                        <x-button wire:click="resetAll()" x-show="open"
                                                            @click="open=false" sm label="annuler">
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
                    <form x-data="{form:false}" x-on:close.window="form=false">
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-gray-300 rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

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
                                        <tr x-data="{open:false}" x-on:close.window="open=false"
                                            class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 ">

                                                <span x-show="!open">{{$value['universite']}}</span>


                                                <div x-bind:class="{ 'hidden': !open }">
                                                    <x-input wire:model.defer="diplome.universite" />

                                                </div>


                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 truncate">


                                                <span x-show="!open">{{$value['diplome']}}</span>
                                                <div x-bind:class="{ 'hidden': !open }">
                                                    <x-input wire:model.defer="diplome.diplome" />

                                                </div>

                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100  p-3 truncate">


                                                <span x-show="!open">{{$value['annee']}}</span>
                                                <div x-bind:class="{ 'hidden': !open }">


                                                    <x-native-select placeholder="Choisissez un niveau" :options="$date"
                                                        wire:model.defer="diplome.annee" />
                                                </div>


                                            </td>
                                            <td
                                                class="border-grey-light lg:border flex gap-1 hover:bg-gray-100 dark:hover:bg-gray-800 p-3  hover:font-medium cursor-pointer">
                                                <x-button.circle negative spinner="remove({{$key}},'universite')"
                                                    wire:click="remove({{$key}},'universite')" sm x-show="!open"
                                                    icon="trash">
                                                    </x-button>
                                                    <x-button.circle x-show="!open" @click="open=true"
                                                        wire:click='modalDiplome({{$key}})' sm icon="pencil">
                                                        </x-button>

                                                        <x-button x-show="open" spinner="modifierDiplome"
                                                            wire:click='modifierDiplome({{$key}})' sm label="Edit"
                                                            icon="pencil">
                                                        </x-button>


                                                        <x-button wire:click="resetAll()" x-show="open"
                                                            @click="open=false" sm label="annuler">
                                                        </x-button>

                                            </td>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </tbody>
                                </table>

                            </div>

                            <div class="grid gap-3 md:grid-cols-3" x-collapse x-show="form">


                                <x-input x-show="form" wire:model.defer="diplome.universite" />


                                <x-input x-show="open" wire:model.defer="diplome.diplome" />

                                <x-native-select x-show="form" placeholder="Choisissez un niveau" :options="$date"
                                    wire:model.defer="diplome.annee" />





                            </div>
                            <div class="mt-4">
                                <x-button x-show="!form" @click="form=true" label="New"></x-button>
                                <x-button x-show="form" spinner="addDiplome" wire:click='addDiplome()' label="Ajouter">
                                </x-button>
                                <x-button x-show="form" @click="form=false" wire:click="resetAll" label="Annuler">
                                </x-button>

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
                    <form x-data="{form:false}" x-on:close.window="form=false">
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-gray-300 rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

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
                                        <tr x-data="{open:false}" x-on:close.window="open=false"
                                            class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 ">



                                                <span class="truncate"
                                                    x-bind:class="{ 'hidden': open }">{{$value['skill']}}</span>

                                                <div x-bind:class="{ 'hidden': !open }">
                                                    <x-input wire:model.defer="competences.skill" />
                                                </div>


                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 truncate">

                                                <span x-bind:class="{ 'hidden': open }">{{$value['level']}}</span>

                                                <x-native-select x-bind:class="{ 'hidden': !open }"
                                                    placeholder="Choisissez un niveau"
                                                    :options="['Débutant', 'Intermédiaire', 'expert']"
                                                    wire:model.defer="competences.level" />


                                            </td>

                                            <td
                                                class="border-grey-light boder-t  flex gap-1 hover:bg-gray-100 dark:hover:bg-gray-800 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                                                <x-button.circle negative sm x-show="!open"
                                                    wire:click="remove({{$key}},'skill')"
                                                    spinner="remove({{$key}},'skill')" icon="trash">
                                                    </x-button>
                                                    <x-button.circle x-show="!open" @click="open=true"
                                                        wire:click='modaleCompentences({{$key}})' sm icon="pencil">
                                                        </x-button>

                                                        <x-button x-show="open" spinner="modifierCompentences"
                                                            wire:click='modifierCompentences({{$key}})' sm label="Edit"
                                                            icon="pencil">
                                                        </x-button>


                                                        <x-button wire:click="resetAll()" x-show="open"
                                                            @click="open=false" sm label="annuler">
                                                        </x-button>
                                            </td>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </tbody>
                                </table>



                            </div>

                            <div class="grid gap-3 md:grid-cols-3" x-collapse x-show="form">


                                <x-input wire:model.defer="competences.skill" />

                                <x-native-select x-show="form" placeholder="Choisissez un niveau"
                                    :options="['Débutant', 'Intermédiaire', 'expert']"
                                    wire:model.defer="competences.level" />





                            </div>
                            <div class="mt-4">
                                <x-button x-show="!form" @click="form=true" label="New"></x-button>
                                <x-button x-show="form" spinner="addCompetences" wire:click='addCompetences()'
                                    label="Ajouter"></x-button>
                                <x-button x-show="form" @click="form=false" label="Annuler"></x-button>

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
                    <form x-data="{form:@entangle('langueEdit')}" x-on:close.window="form=false">
                        <div
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-gray-300 rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

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
                                    <tbody wire:ignore.self class="flex-1 sm:flex-none">
                                        @forelse ($freelance['langue'] as $key=>$value )
                                        <tr x-data="{open:false}" x-on:close.window="open=false"
                                            class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 ">

                                                <span x-show="!open">{{$value['name']}}</span>




                                                <div x-bind:class="{ 'hidden': !open }">
                                                    <x-native-select label="" placeholder=" Choisissez une langue"
                                                        :options="['Français', 'Anglais', 'Lingala', 'Swahili', 'Kikongo','Tshiluba']"
                                                        wire:model.defer="langue.name" />
                                                </div>



                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 truncate">



                                                <span x-bind:class="{ 'hidden': open }">{{$value['level']}}</span>

                                                <div x-bind:class="{ 'hidden': !open }">
                                                    <x-native-select placeholder="Choisissez un niveau"
                                                        :options="['Débutant', 'Intermédiaire', 'Avancé']"
                                                        wire:model.defer="langue.level" />
                                                </div>

                                            </td>

                                            <td
                                                class="border-grey-light border-t md:border  flex gap-1 hover:bg-gray-100 dark:hover:bg-gray-800 p-2.5 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                                                <x-button.circle wire:click="remove({{$key}},'Langue')"
                                                    spinner="remove({{$key}},'Langue')"
                                                    wire:click="remove({{$key}},'Langue')" negative sm x-show="!open"
                                                    icon="trash" />

                                                <x-button.circle x-show="!open" @click="open=true"
                                                    wire:click='modalLangue({{$key}})' sm icon="pencil" />


                                                <x-button x-show="open" spinner="modifierLangue"
                                                    wire:click='modifierLangue({{$key}})' sm label="Edit" icon="pencil">
                                                </x-button>


                                                <x-button wire:click="resetAll()" x-show="open" @click="open=false" sm
                                                    label="annuler">
                                                </x-button>
                                            </td>
                                        </tr>

                                        @empty

                                        <tr>
                                            <td colspan="1" class="text-center py-4">Aucune langue ajoutée'
                                            </td>
                                        </tr>

                                        @endforelse

                                    </tbody>
                                </table>

                            </div>

                            <div class="grid gap-3 md:grid-cols-3" x-collapse x-show="form">


                                <x-native-select placeholder="Choisissez un niveau"
                                    :options="['Débutant', 'Intermédiaire', 'Avancé']"
                                    wire:model.defer="langueSelected.level" />

                                <x-native-select label="" placeholder="Choisissez une langue"
                                    :options="['Français', 'Anglais', 'Lingala', 'Swahili', 'Kikongo','Tshiluba']"
                                    wire:model.defer="langueSelected.name" />





                            </div>
                            <div class="mt-4">
                                <x-button x-show="!form" @click="form=true" label="New"></x-button>
                                <x-button x-show="form" wire:click='addLanguage()' label="Ajouter"></x-button>
                                <x-button x-show="form" @click="form=false" label="Annuler"></x-button>

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
                        <div x-data="{form:false}" x-on:close.window="form=false"
                            class="px-4 py-5 bg-white dark:bg-gray-800 dark:border dark:border-gray-300 rounded-lg  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">

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
                                        <tr x-data="{open:false}" x-on:close.window="open=false"
                                            class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 ">



                                                <span x-bind:class="{ 'hidden': open }">{{$value['comptes']}}</span>

                                                <x-native-select x-bind:class="{ 'hidden': !open }"
                                                    placeholder="Choisissez un niveau"
                                                    :options="['Tiktok', 'instagram', 'twitter', 'youtube','Facebook', 'whatsapp']"
                                                    wire:model.defer="compte.comptes" />






                                            </td>
                                            <td
                                                class="border-grey-light border dark:text-gray-200 text-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 p-3 truncate">
                                                <span x-bind:class="{ 'hidden': open }">{{$value['lien']}}</span>

                                                <x-input x-bind:class="{ 'hidden': !open }"
                                                    wire:model.defer="compte.lien" />



                                            </td>

                                            <td
                                                class="border-grey-light border flex gap-1 hover:bg-gray-100 dark:hover:bg-gray-800 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                                                <x-button.circle negative wire:click="remove({{$key}},'Comptes')"
                                                    spinner="remove({{$key}},'Comptes')" sm x-show="!open" icon="trash">
                                                    </x-button>
                                                    <x-button.circle x-show="!open" @click="open=true"
                                                        wire:click='modalComptes({{$key}})' sm icon="pencil">
                                                        </x-button>

                                                        <x-button x-show="open" spinner=""
                                                            wire:click='modifierCompte({{$key}})' sm label="Edit"
                                                            icon="pencil">
                                                        </x-button>


                                                        <x-button wire:click="resetAll()" x-show="open"
                                                            @click="open=false" sm label="annuler">
                                                        </x-button>
                                            </td>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </tbody>
                                </table>

                            </div>

                            <div class="grid gap-3 md:grid-cols-3" x-collapse x-show="form">


                                <x-native-select x-show="form" placeholder="Choisissez un niveau"
                                    :options="['Tiktok', 'instagram', 'twitter', 'youtube','Facebook', 'whatsapp']"
                                    wire:model.defer="compte.comptes" />

                                <x-input x-show="form" wire:model.defer="compte.lien" />





                            </div>
                            <div class="mt-4">
                                <x-button x-show="!form" @click="form=true" label="New"></x-button>
                                <x-button x-show="form" wire:click='addComptes()' spinner="addComptes" label="Ajouter">
                                </x-button>
                                <x-button x-show="form" @click="form=false" label="Annuler"></x-button>

                            </div>

                        </div>


                    </form>
                </div>

            </div>



        </div>



    </div>
    {{-- The whole world belongs to you. --}}
</div>