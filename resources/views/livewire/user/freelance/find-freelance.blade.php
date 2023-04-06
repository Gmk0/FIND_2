<div>

    <style>
        @media screen and (min-width: 768px) {
            #menu-content {
                top: 6rem;
            }
        }
    </style>
    <div class="flex flex-col bg-gray-100 pt-20 dark:bg-gray-900"
        x-data="{ isOpen:false,message:@entangle('message'),isLoading: true,showFilters: false,showSearch: false }"
        x-init="setTimeout(() => { isLoading = false }, 3000)">




        <div x-show="isLoading">

            <div class="flex flex-row flex-1 h-screen p-8 overflow-y-hidden">
                <div
                    class="order-first hidden w-64 h-screen p-2 px-2 mx-2 overflow-y-auto bg-gray-300 rounded-md animate-pulse custom-scrollbar md:flex ">
                    <div>

                    </div>
                </div>
                <div
                    class="flex-1 h-screen p-4 overflow-y-auto text-xs bg-gray-200 border-r border-indigo-300 rounded-md animate-pulse custom-scrollbar">
                    <div class="h-8 mb-2 bg-gray-300 rounded-md animate-pulse">

                    </div>
                    <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-3">
                        <div class="h-64 bg-gray-300 rounded-md animate-pulse"></div>
                        <div class="h-64 bg-gray-300 rounded-md animate-pulse"></div>
                        <div class="h-64 bg-gray-300 rounded-md animate-pulse"></div>
                    </div>

                </div>
            </div>
        </div>


        <div x-cloak x-show="!isLoading" class=" flex flex-wrap w-full p-6 mx-auto ">
            <div class="w-full text-xl leading-normal text-gray-800 lg:w-1/5  lg:px-2">



                <div x-bind:class="showFilters ? 'fixed inset-0  top-0  bottom-0  dark:bg-gray-800 bg-white z-50 p-4 transition-all duration-200 w-full' : 'hidden w-full h-64 mt-0  md:top-[6rem] sticky inset-0 z-20'"
                    class=" md:h-64  overflow-x-hidden border border-gray-400 rounded-md shadow lg:h-auto lg:block lg:border-transparent lg:shadow-none lg:bg-transparent overflow-y-auto custom-scrollbar"
                    id="menu-content">

                    <nav>
                        <!-- Filtres -->
                        <div x-data=" toggleAccordion()"
                            class="w-full p-4  bg-white custom-scrollbar  overflow-y-auto rounded-lg dark:bg-gray-800">
                            <h3 class="mb-6 font-bold text-gray-700 dark:text-gray-100">Filtres</h3>
                            <div class="mt-4 mb-4 border-t py-2.5 border-b border-gray-400 ">
                                <button @click="setCategory()"
                                    class="flex items-center justify-between w-full mb-2 font-bold text-gray-700 focus:outline-none">
                                    <span class="text-base dark:text-gray-100"> Catégorie</span>
                                    <svg x-show="!showCategoryFilter" class="w-4 h-4 fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M5.293 6.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" />
                                    </svg>
                                    <svg x-show="showCategoryFilter" class="w-4 h-4 fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M14.293 15.293a1 1 0 01-1.414 0L10 12.414l-2.293 2.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 010 1.414z" />
                                    </svg>
                                </button>
                                <div x-show="showCategoryFilter" x-collapse class="w-full mt-2">
                                    <x-select wire:model.debounce.500ms="category" placeholder="Compentences"
                                        :async-data="route('api.services')" option-label="name" option-value="id" />
                                </div>
                            </div>

                            <div class="py-3 mb-4 border-b border-gray-400">
                                <button x-on:click="setSpecialite()"
                                    class="flex items-center justify-between w-full mb-2 font-bold text-gray-700 dark:text-gray-100 focus:outline-none">
                                    <span class="text-base dark:text-gray-100">Specialite</span>
                                    <svg x-show="!Specialite" class="w-4 h-4 fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M5.293 6.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" />
                                    </svg>
                                    <svg x-show="Specialite" class="w-4 h-4 fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M14.293 15.293a1 1 0 01-1.414 0L10 12.414l-2.293 2.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 010 1.414z" />
                                    </svg>
                                </button>
                                <div x-collapse x-show="Specialite" class="mt-2">

                                    <x-select placeholder="Specialite">
                                        @forelse($specialites as $specialite)

                                        <x-select.option label="{{$specialite->name}}" value="{{$specialite->name}}" />

                                        @empty
                                        @endforelse

                                    </x-select>


                                </div>
                            </div>


                            <div class="py-3 mb-4 border-b border-gray-400">
                                <button x-on:click="setExperience()"
                                    class="flex items-center justify-between w-full mb-2 font-bold text-gray-700 dark:text-gray-100 focus:outline-none">
                                    <span class="text-base dark:text-gray-100">Experience</span>
                                    <svg x-show="!Experience" class="w-4 h-4 fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M5.293 6.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" />
                                    </svg>
                                    <svg x-show="Experience" class="w-4 h-4 fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M14.293 15.293a1 1 0 01-1.414 0L10 12.414l-2.293 2.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 010 1.414z" />
                                    </svg>
                                </button>
                                <div x-collapse x-show="Experience" class="mt-2">

                                    <x-radio label="0-2 Ans" id="radio" value="0-2" wire:model="experience" />
                                    <x-radio label="2-7 Ans" id="radio" value="2-7" wire:model="experience" />
                                    <x-radio label="7 + Ans" id="radio" value="7-20" wire:model="experience" />

                                </div>
                            </div>


                            <div class="py-3 mb-4 border-b border-gray-400">
                                <button x-on:click="setPrice()"
                                    class="flex items-center justify-between w-full mb-2 font-bold text-gray-700 focus:outline-none">
                                    <span class="text-base dark:text-gray-100">Taux Journalier</span>
                                    <svg x-show="!showAvaible" class="w-4 h-4 fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M5.293 6.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" />
                                    </svg>
                                    <svg x-show="showAvaible" class="w-4 h-4 fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M14.293 15.293a1 1 0 01-1.414 0L10 12.414l-2.293 2.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 010 1.414z" />
                                    </svg>
                                </button>
                                <div x-collapse x-show="showPriceFilter" class="mt-2">
                                    <fieldset x-data="{message:'10'}" class="space-y-1 sm:w-48 dark:text-gray-100">
                                        <input type="range" x-model="message" wire:model.debounce.500ms="taux"
                                            class="w-full accent-violet-400" min="10" max="10000">
                                        <div aria-hidden="true" class="flex justify-between px-1">
                                            <span>10$</span>

                                            <span x-text="message">$</span>

                                        </div>
                                    </fieldset>


                                </div>
                            </div>

                            <div class="py-3 mb-4 border-gray-400">
                                <button x-on:click="setAvaible()"
                                    class="flex items-center justify-between w-full mb-2 font-bold text-gray-700 focus:outline-none">
                                    <span class="text-base dark:text-gray-100">Disponibilite</span>
                                    <svg x-show="!showAvaible" class="w-4 h-4 fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M5.293 6.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" />
                                    </svg>
                                    <svg x-show="showAvaible" class="w-4 h-4 fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M14.293 15.293a1 1 0 01-1.414 0L10 12.414l-2.293 2.293a1 1 0 01-1.414-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 010 1.414z" />
                                    </svg>
                                </button>
                                <div x-collapse x-show="showAvaible" class="mt-2">

                                    <x-radio label="Temps partiel" id="radio" value="Temps partiel"
                                        wire:model.debounce.500ms="disponibilite" />
                                    <x-radio label="Temps plein" id="radio" value="Temps plein"
                                        wire:model.debounce.500ms="disponibilite" />

                                </div>
                            </div>

                        </div>





                        <div class="w-full md:hidden ">
                            <x-button x-on:click="showFilters=!showFilters" label="appliquer"></x-button>

                        </div>


                    </nav>
                </div>


            </div>

            <div
                class="w-full px-2    mt-4 leading-normal px-auto md:px-0  text-gray-900 px-auto lg:w-4/5 lg:mt-0 border-rounded">
                <!--Title-->

                <header id="" class="p-2  border-gray-300 ">
                    <div class="px-2 ">

                        <div x-data="{open:false}" class="">
                            <!-- search example -->

                            <div class="relative">
                                <x-input wire:model.debounce.500ms="query"
                                    class="w-3/4 py-3 rounded-full focus:border-amber-600" placeholder="Serach">
                                    <x-slot name="append">
                                        <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                                            <x-button class="h-full rounded-r-md" icon="search" amber squared />
                                        </div>
                                    </x-slot>
                                </x-input>

                                <!-- search result -->
                                <div x-cloak x-show="open"
                                    class="absolute z-10 w-full mt-1 overflow-y-auto bg-white border divide-y rounded-lg shadow max-h-72">
                                    <a class="block p-2 hover:bg-indigo-50" href="#">Tailwind</a>
                                    <a class="block p-2 hover:bg-indigo-50" href="#">Bootstrap</a>

                                </div>
                                <!-- end search result -->
                            </div>


                        </div>
                    </div>
                    <div class=" flex flex-wrap justify-between mt-4">

                        <div class='flex flex-wrap gap-2'>
                            @empty(!$query)
                            <div class="flex flex-nowrap items-center gap-1">

                                <span
                                    class=" items-center py-1 pl-2 pr-0.5 rounded-md text-[12px] font-medium border border-secondary-200 shadow-sm bg-secondary-100 text-secondary-700 dark:bg-secondary-700 dark:text-secondary-400 dark:border-none">
                                    <span style="" class="">Resultat {{$query}} </span>
                                    <button
                                        class="shrink-0 h-4 w-4 flex items-center text-secondary-400 justify-center hover:text-secondary-500"
                                        wire:click="unselect('query')" type="button">
                                        <ion-icon wire:ignore name="close-circle-outline" class="w-4 h-4"></ion-icon>

                                    </button>
                                </span>

                            </div>
                            @endempty
                            @empty(!$experience)
                            <div class="flex flex-nowrap items-center gap-1">

                                <span
                                    class="inline-flex items-center py-1 pl-2 pr-0.5 rounded-full text-[12px] font-medium border border-secondary-200 shadow-sm bg-secondary-100 text-secondary-700 dark:bg-secondary-700 dark:text-secondary-400 dark:border-none">
                                    <span style="max-width: 6rem" class="truncate">{{$experience}} Ans </span>
                                    <button
                                        class="shrink-0 h-4 w-4 flex items-center text-secondary-400 justify-center hover:text-secondary-500"
                                        wire:click="unselect('experience')" type="button">
                                        <ion-icon wire:ignore name="close-circle-outline" class="w-4 h-4"></ion-icon>

                                    </button>
                                </span>

                            </div>
                            @endempty
                            @empty(!$taux)
                            <div class="flex flex-nowrap items-center gap-1">

                                <span
                                    class="inline-flex items-center py-1 pl-2 pr-0.5 rounded-full text-[12px] font-medium border border-secondary-200 shadow-sm bg-secondary-100 text-secondary-700 dark:bg-secondary-700 dark:text-secondary-400 dark:border-none">
                                    <span style="max-width: 6rem" class="truncate">10 a {{$taux}} $</span>
                                    <button
                                        class="shrink-0 h-4 w-4 flex items-center text-secondary-400 justify-center hover:text-secondary-500"
                                        wire:click="unselect('taux')" type="button">
                                        <ion-icon wire:ignore name="close-circle-outline" class="w-4 h-4"></ion-icon>

                                    </button>
                                </span>

                            </div>
                            @endempty
                        </div>


                        <div class="flex flex-nowrap justify-between">
                            <button @click="showFilters=!showFilters"
                                class="inline-flex md:hidden items-center px-2  py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm16 5a1 1 0 01-1 1H2a1 1 0 010-2h16a1 1 0 011 1zm-2 5a1 1 0 01-1 1H6a1 1 0 110-2h10a1 1 0 011 1z"
                                        clip-rule="evenodd"></path>
                                </svg>

                            </button>

                            <div class="items-end">
                                <x-select label="" placeholder="trier" wire:model.defer="model">
                                    <x-select.option label="Par taux ascendant " value="1" />
                                    <x-select.option label="Par taux descendant" value="2" />
                                    <x-select.option label="Par Niveau ascendant " value="1" />
                                    <x-select.option label="Par Niveau descendant" value="2" />
                                    >
                                </x-select>
                            </div>



                        </div>


                    </div>
                </header>



                <div class="  grid grid-cols-1 gap-8  md:mx-auto  md:px-2  md:grid-cols-3">



                    @forelse($freelancers as $freelancer)
                    <div class="max-w-64 mx-auto md:mx-2 ">
                        <div class="relative h-48 bg-center bg-cover rounded-t-lg w-72"
                            style="background-image: url('https://randomuser.me/api/portraits/women/77.jpg')">
                            <div class="absolute bottom-0 left-0 p-2 bg-gray-500 bg-opacity-50 ">
                                <h2 class="text-base md:text-lg font-thin tracking-wide text-white">{{$freelancer->nom}}
                                </h2>
                            </div>
                            <div class="absolute top-0 right-0 flex items-center p-2">
                                <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <circle cx="10" cy="10" r="10" />
                                </svg>

                            </div>
                            <div class="absolute top-0 left-0 flex items-center p-2">
                                <button wire:click.prevent="favoris({{$freelancer->id}})"
                                    class="text-gray-500 hover:text-green-500 focus:outline-none">


                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>

                                </button>



                            </div>
                        </div>
                        <div class="h-60 p-4 overflow-hidden bg-white rounded-b-lg shadow-md dark:bg-gray-800 w-72">

                            <div class="flex justify-between">
                                <p class="mb-2 text-base text-start text-gray-700 dark:text-gray-100">
                                    {{$freelancer->category->name}}
                                </p>
                                <span class="mb-2 text-base text-start text-gray-700 dark:text-gray-100">

                                    {{$freelancer->level}}
                                </span>
                            </div>



                            <div class="px-4 py-1 rounded-md ">
                                <div class="flex gap-1">

                                    @foreach($freelancer->Sub_categorie as $value)
                                    <span
                                        class="px-3    text-[10px] font-semibold text-gray-700 bg-gray-200 rounded-lg">#
                                        {{$value}}</span>

                                    @endforeach
                                </div>

                            </div>

                            <div class="pt-3">
                                <div class="flex items-center mb-3">
                                    <svg class="w-6 h-6 mr-2 text-gray-500 fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M12 0a12 12 0 1 0 12 12A12 12 0 0 0 12 0zM6.25 12a5.75 5.75 0 1 1 5.75-5.75A5.75 5.75 0 0 1 6.25 12zm9.71 0a4.71 4.71 0 1 1-4.71 4.71 4.71 4.71 0 0 1 4.71-4.71z" />
                                    </svg>
                                    <p class="text-sm text-gray-700 dark:text-gray-100">3 years of experience</p>
                                </div>

                            </div>
                            <div class="flex justify-end mt-4">
                                <a href="{{route('profile.freelance',[$freelancer->identifiant])}}"
                                    class="mr-4 font-medium text-indigo-500">Voir mon profil FIND</a>
                                <x-button wire:click="conversations({{$freelancer->id}})" label="Contacter" primary />
                            </div>
                        </div>
                    </div>



                    @empty
                    <h1 class="text-lg text-gray-800 md:text-2xl">Pas de Resultat</h1>

                    @endforelse
                    <div wire:loading wire:target="query" class="h-64 bg-gray-300 rounded-md animate-pulse"></div>
                    <div wire:loading wire:target="query" class="h-64 bg-gray-300 rounded-md animate-pulse"></div>
                    <div wire:loading wire:target="query" class="h-64 bg-gray-300 rounded-md animate-pulse"></div>


                </div>
                <div class="mt-4">

                    {{$freelancers->links()}}
                </div>


                <!-- /Useful -->
            </div>
            <!--Back link -->

        </div>

        <div class="fixed bottom-0 right-0 z-10 mb-4 mr-4">
            <button
                class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-6 7h6">
                    </path>
                </svg>
            </button>

            <div x-cloak x-show="message" class=" sm:block">
                <div class="w-64 h-96 rounded-lg shadow-lg">
                    <div class="flex flex-col h-full">
                        <div class="flex items-center justify-between p-4 bg-gray-800 rounded-t-lg">
                            <h3 class="text-lg font-medium text-white">Chat</h3>
                            <button class="text-gray-400 hover:text-white focus:outline-none focus:text-white"
                                @click="message=false">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="flex-1 p-4 bg-white overflow-y-auto">
                            <!-- contenu de la discussion -->

                            <div class="flex flex-col space-y-2">

                                @if($freelance_id !== null)
                                @if($conversations !== null)

                                @foreach($conversations as $message)
                                <!-- message de l'expéditeur -->
                                <div
                                    class="flex items-start {{auth()->id() == $message->sender_id ? 'justify-end':''}}">
                                    <div
                                        class="px-4 py-2 bg-blue-600 {{auth()->id() == $message->sender_id ? 'bg-gray-200':'bg-blue-600'}} rounded-lg text-white max-w-xs">
                                        <p class="text-sm text-gray-700">{{$message->body}}</p>
                                    </div>
                                </div>
                                <!-- message du récepteur -->

                                @endforeach
                                @else
                                <p>Ecrivez lui un message</p>
                                @endif
                                @else
                                <p>Chargement de messages</p>
                                @endif

                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-gray-200 rounded-b-lg">
                            <input wire:model.defer='body'
                                class="flex-1 w-full px-3 py-2 mr-4 text-gray-700 bg-white border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                type="text" placeholder="Message">
                            <x-button primary wire:click="sendMessage()" label='Envoyer'>

                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <!-- end main container -->


    </div>

    @push('script')




    <script>
        Livewire.on('gotoTop', () => {
    window.scrollTo({
    top: 15,
    left: 15,
    behaviour: 'smooth'
    })
    })
    </script>

    <script>
        window.addEventListener('error', event=> {
        Swal.fire({
        // position: 'top-end',
        icon:'error',
        //toast: true,
        title:"Inscrivez Vous",
        text:event.detail.message,
        showConfirmButton: true,
        footer: '<a class="text-green-600" href="{{route('login')}}">liste des proposition</a>',
        //timer:5000
        
        })
        
        });


    </script>


    <script>
        function toggleAccordion() {
        return {
          open: false,
          showCategoryFilter:false,
          Langue:false,
          isOpen: false,

    
          showPriceFilter:false,
          Experience:false,
          SousCategorie:false,
          showAvaible:false,
          Specialite:false,
          setLangue(){
            this.Langue=!this.Langue
          },
          setSpecialite(){
            this.Specialite=!this.Specialite
          },
          setExperience(){
            this.Experience = !this.Experience
          },
          setAvaible (){
    this.showAvaible = !this.showAvaible
          },
          setSousCategorie(){
    this.SousCategorie = !this.SousCategorie
          },
          setCategory(){
            this.showCategoryFilter = !this.showCategoryFilter
          },
          setPrice(){
        this.showPriceFilter = !this.showPriceFilter
        },
          toggle() {
            this.open = !this.open
          }
        }
      }
    
    
    // Récupérer l'élément div
    var fixedDiv = document.getElementById("fixed-div");
    
    var fixedNav= document.getElementById('fixed-nav');
    
    // Récupérer la position de l'élément div par rapport au haut de la page
    var divOffsetTop = fixedDiv.offsetTop;
    
    
    
    // Ajouter un événement de défilement à la fenêtre
    window.addEventListener("scroll", function() {
    // Récupérer la position de défilement actuelle de la fenêtre
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
    
    // Vérifier si l'élément div est en haut de la page
    if (scrollPosition >= divOffsetTop) {
    // Ajouter la classe "fixed" à l'élément div
    fixedDiv.classList.add("fixed-top");
    
    
    } else {
    // Supprimer la classe "fixed" de l'élément div
    fixedDiv.classList.remove("fixed-top");
    
    }
    });
    </script>

    @endpush
    {{-- Success is as dangerous as failure. --}}
</div>