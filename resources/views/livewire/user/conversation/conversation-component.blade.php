<div x-data="{
    sidebarOpen:false,
     isLoading:true,
     isPanelOpen:false,
     theme:false,
     attachement:false,

    }" x-init="setTimeout(() => { isLoading = false }, 3000)"
    class="container mx-auto overflow-y-auto custom-scrollbar">

    <div x-show="isLoading">

        <div class="flex flex-row flex-1 h-screen px-2 overflow-y-hidden">
            <div
                class="order-first hidden w-1/3 h-screen p-2 px-2 mx-2 overflow-y-auto bg-gray-300 rounded-md animate-pulse custom-scrollbar md:flex ">
                <div>

                </div>
            </div>
            <div
                class="flex-1 h-screen p-4 w-2/3 overflow-y-auto text-xs bg-gray-200 border-r border-indigo-300 rounded-md animate-pulse custom-scrollbar">
                <div class="h-8 mb-2 bg-gray-300 rounded-md animate-pulse">

                </div>
                <div class="grid grid-cols-1 gap-4 mt-6 ">
                    <div class="h-full bg-gray-300 rounded-md animate-pulse"></div>

                </div>

            </div>
        </div>
    </div>
    <div x-cloak x-show="!isLoading"
        class="min-w-full min-h-screen overflow-y-hidden border rounded lg:h-screen custom-scrollbar lg:grid lg:grid-cols-3">



        <div x-bind:class="{'lg:block hidden': sidebarOpen, 'lg:block ': !sidebarOpen}"
            class="border border-gray-300 dark:border-gray-600 lg:col-span-1">

            <div
                class="flex flex-row items-center justify-between px-3 py-2 border dark:border-gray-500 bg-grey-lighter">
                <div>
                    @if (!empty(Auth::user()->profile_photo_path))
                    <img class="w-10 h-10 rounded-full""
                        src=" {{Storage::disk('local')->url('profiles-photos/'.Auth::user()->profile_photo_path) }}"
                    alt="">
                    @else
                    <img class="w-10 h-10 rounded-full"" src=" {{ Auth::user()->profile_photo_url }}" alt="">
                    @endif

                </div>

                <div class="flex">

                    <div class="ml-4">
                        <a href="{{route('find_freelance')}}">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>

                        </a>

                    </div>
                    <div class="ml-4">

                        <x-dropdown>
                            <x-slot name="trigger">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 dark:text-gray-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                </svg>

                            </x-slot>

                            <x-dropdown.item @click="theme=!theme" separator label="Configuration" />
                            <x-dropdown.item label="Favoris" />

                            <x-dropdown.item wire:click="BloquerConversation()" label="l'utilisateur bloquer" />
                        </x-dropdown>

                    </div>
                </div>
            </div>
            <div class="mx-3 my-3">
                <div class="relative text-gray-600">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 text-gray-300">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>

                    <input type="search" wire:model.debounce.500ms='query'
                        class="block w-full py-2 pl-10 bg-gray-100 rounded outline-none dark:bg-gray-800 dark:text-gray-300"
                        name="search" placeholder="Recherche" required />


                </div>

            </div>

            <ul class="overflow-auto h-[32rem]">


                <li>
                    @if (count($conversations) > 0)
                    @forelse ($conversations as $conversation)
                    <a wire:key='{{$conversation->id}}' href="#" @click="sidebarOpen=!sidebarOpen"
                        wire:click="chatUserSelected({{$conversation}},{{$conversation->freelance_id }})"
                        class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer dark:hover:bg-gray-800 hover:bg-gray-100 focus:outline-none">

                        @if (!empty($conversation->freelance->user->profile_photo_path))
                        <img class="object-cover w-10 h-10 rounded-full"
                            src="{{Storage::disk('local')->url('public/profiles-photos/'.$conversation->freelance->user->profile_photo_path) }}"
                            alt="">
                        @else
                        <img class="object-cover w-10 h-10 rounded-full"
                            src="{{$conversation->freelance->user->profile_photo_url }}" alt="">
                        @endif

                        @if ($conversation->freelance->user->is_online)
                        <span
                            class="absolute bottom-0 right-0 w-2 h-2 bg-green-600 border-2 border-white rounded-full"></span>
                        @else

                        @endif


                        <div class="w-full pb-2">
                            <div class="flex justify-between">
                                <span
                                    class="block ml-2 font-semibold text-gray-600 dark:text-gray-200">{{$conversation->freelance->user->name}}</span>
                                <span class="block ml-2 text-sm text-gray-600 dark:text-gray-300">{{
                                    $conversation->messages->last()?->created_at->shortAbsoluteDiffForHumans()
                                    }} </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex gap-1">
                                    @if ($conversation->messages->last()?->sender_id == auth()->user()->id)
                                    <span class="pl-3 text-sm text-gray-600 dark:text-gray-400">vous:</span>
                                    @endif

                                    <span
                                        class="block ml-2 text-sm text-gray-600 dark:text-gray-300">{{$conversation->messages->last()?->body}}</span>

                                </div>
                                <div>
                                    @if(count($conversation->messages->where('is_read',0)->where('sender_id',$conversation->freelance->user->id)))
                                    <small
                                        class="inline-block w-5 h-5 text-xs leading-6 text-center text-white bg-red-500 rounded-full">
                                        {{count($conversation->messages->where('is_read',0)->where('sender_id',$conversation->freelance->user->id))}}
                                    </small>

                                    @endif

                                </div>

                            </div>


                        </div>
                    </a>

                    @empty


                    @endforelse

                    @else

                    <div class="px-4">
                        <h1>
                            Pas de freelance trouver
                        </h1>
                    </div>

                    @endif
                </li>
            </ul>


        </div>
        <div x-bind:class="{'md:block': sidebarOpen, ' hidden md:block ': !sidebarOpen}"
            class=" lg:col-span-2 lg:block">
            <div class="w-full min-h-full ">


                <div class="flex flex-row items-center justify-between px-3 py-2 bg-grey-lighter">
                    <div class="flex items-center">

                        <div>
                            <button wire:ignore @click="sidebarOpen = false" class="block lg:hidden ">
                                <ion-icon class="w-6 h-6 text-gray-600 dark:text-gray-300" name="arrow-undo-outline">
                                </ion-icon>

                            </button>
                        </div>


                        @empty(!$selectedConversation)

                        <div @click="isPanelOpen=true" class="flex cursor-pointer ">

                            @if (!empty($selectedConversation->freelance?->user->profile_photo_path))
                            <img class="object-cover w-10 h-10 rounded-full"
                                src="{{Storage::disk('local')->url('public/profiles-photos/'.$selectedConversation->freelance?->user->profile_photo_path) }}"
                                alt="">
                            @else
                            <img class="object-cover w-10 h-10 rounded-full"
                                src="{{$selectedConversation->freelance?->user->profile_photo_url }}" alt="">
                            @endif

                        </div>
                        <div class="ml-4">
                            <p class="text-grey-darkest">
                                {{$selectedConversation->freelance?->user->name}}
                            </p>

                            @if($selectedConversation->freelance->user->is_online)
                            <p class="mt-1 text-xs text-grey-darker">
                                online
                            </p>
                            @else
                            <span
                                class="mt-1 text-sm text-gray-600">{{$selectedConversation->freelance?->user->last_activity?->DiffForHumans()}}<span>
                                    @endif
                        </div>



                        @endempty

                    </div>

                    @empty(!$selectedConversation)
                    <div class="flex">
                        <div class="hidden md:flex">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="#263238" fill-opacity=".5"
                                    d="M15.9 14.3H15l-.3-.3c1-1.1 1.6-2.7 1.6-4.3 0-3.7-3-6.7-6.7-6.7S3 6 3 9.7s3 6.7 6.7 6.7c1.6 0 3.2-.6 4.3-1.6l.3.3v.8l5.1 5.1 1.5-1.5-5-5.2zm-6.2 0c-2.6 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2 4.6-4.6 4.6z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-6">
                            <button x-on:click="attachement=!attachement">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 dark:text-gray-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>
                            </button>

                        </div>
                        <div class="ml-6 ">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 dark:text-gray-200">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                    </svg>

                                </x-slot>

                                <x-dropdown.item label="Maquer non lue" />
                                <x-dropdown.item label="Favoris" />
                                <x-dropdown.item wire:click="effacerConversation()" label="Effacer" />
                                <x-dropdown.item wire:click="BloquerConversation()" label="Bloquer l'utilisateur" />
                            </x-dropdown>

                        </div>
                    </div>
                    @endempty
                </div>



                <div wire:target='chatUserSelected' wire:loading
                    class=" h-[500px] lg:h-[400px] w-full bg-gray-400 animate-pulse">

                </div>

                <div wire:target='chatUserSelected' wire:loading.remove>

                    @livewire('user.conversation.body-message')
                </div>

                <div class="">
                    @livewire('user.conversation.send-message-u')

                </div>



            </div>
        </div>
    </div>

    <x-confirmation-modal wire:model.defer="deleteUserModal">

        <x-slot name="title">
            Effacer conversation

        </x-slot>

        <x-slot name="content">
            Voulez-vous supprimer cette conversation ?

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('deleteUserModal')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="deleteConversation" wire:loading.attr="disabled">
                {{ __('Effacer conversation') }}
            </x-danger-button>
        </x-slot>

    </x-confirmation-modal>


    <div x-cloak x-show="isPanelOpen" @click.away="isPanelOpen = false"
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="translate-x-full opacity-30  ease-in"
        x-transition:enter-end="translate-x-0 opacity-100 ease-out"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="translate-x-0 opacity-100 ease-out"
        x-transition:leave-end="translate-x-full opacity-0 ease-in"
        class="fixed inset-y-0 right-0 z-50 flex flex-col bg-white shadow-lg bg-opacity-20 w-80"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
        <div class="flex items-center justify-between flex-shrink-0 p-2">
            <h6 class="p-2 text-gray-800">INFORMATION</h6>
            <button @click="isPanelOpen = false" class="p-2 rounded-md focus:outline-none focus:ring">
                <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col flex-1 max-h-full p-4 overflow-hidden overflow-y-auto">
            <span></span>

            @empty(!$selectedConversation)

            <div class="flex items-center justify-center ">
                @if (!empty($selectedConversation->freelance?->user->profile_photo_path))
                <img class="object-cover w-20 h-20 border rounded-full border-slate-700"
                    src="{{Storage::disk('local')->url('public/profiles-photos/'.$selectedConversation->freelance?->user->profile_photo_path) }}"
                    alt="">
                @else
                <img class="object-cover w-20 h-20 rounded-full"
                    src="{{$selectedConversation->freelance?->user->profile_photo_url }}" alt="">
                @endif



            </div>
            <div>
                <h1 class="mt-4 text-xl font-bold text-gray-800">{{$selectedConversation->freelance->prenom}}
                    {{$selectedConversation->freelance->nom}}</h1>
                <h2 class="mt-2 text-base font-medium text-gray-700 dark:text-gray-200">Freelance en
                    {{$selectedConversation->freelance?->category->name}}</h2>

                <h2 class="mt-2 text-xl font-medium text-gray-700 dark:text-gray-200">Niveau :
                    {{$selectedConversation->freelance->level}}</h2>
                <div class="mt-4">
                    <p class="text-gray-700 dark:text-gray-200">Email :
                        {{$selectedConversation->freelance->user->email}}
                    </p>

                </div>
                <div>
                    <x-button href="{{route('profile.freelance',[$selectedConversation->freelance->identifiant])}}"
                        primary outline label="profil" />
                </div>
            </div>


            @endempty




            <!-- Settings Panel Content ... -->
        </div>
    </div>








</div>






@push('script')
<script>
    function resetPosition() {


       var isMobile = window.innerWidth < 768;

        if (isMobile) {


        var div = document.getElementById("body");
        var parent = document.getElementById('parent');
        const body = document.getElementById("body");
        const header = document.getElementById("header");

        div.scrollTop = 0;

        window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth'
        });

        // Ramener la scrollbar au haut de la div
        }

        // Ramener la scrollbar au haut de la div

     }


</script>

@endpush