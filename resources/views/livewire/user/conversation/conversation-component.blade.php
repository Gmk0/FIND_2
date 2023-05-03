{{--
<div class="flex h-screen py-4 sm:pt-20 md:overflow-hidden " x-data="{sidebarOpen:false, isLoading:true}"
    x-init="setTimeout(() => { isLoading = false }, 2000)">
    <div x-show="isLoading">

        <div class="flex flex-col w-full h-screen overflow-y-hidden bg-gray-300 animate-pulse md:flex-row">
            <div
                class="order-first hidden w-full h-screen p-2 px-2 mx-2 overflow-y-auto bg-gray-300 rounded-md animate-pulse md:flex ">
                <div>

                </div>
            </div>

        </div>
    </div>
    <div x-cloak x-show="!isLoading" class="flex-1 w-full ">
        <div class="container flex flex-col w-11/12 h-full p-2 m-2 main-body">


            <div class="flex flex-col flex-1 my-auto lg:my-0 main">


                <div class="flex flex-1 h-full py-2 md:py-0">

                    <div x-bind:class="{'hidden ': !sidebarOpen, 'lg:block': sidebarOpen}"
                        class="sidebar   w-full lg:flex lg:w-1/3 flex-2 lg:h-[550px] h-screen custom-scrollbar overflow-x-hidden overflow-y-auto flex-col pt-2 rounded-md md:pr-6">
                        <div class="px-2 pb-6 search flex-2">
                            <x-select label="Search a User" wire:model.debounce.500ms="freelance"
                                placeholder="Selectionner un freelance" :async-data="route('api.freelance.users')"
                                :template="[
                                            'name'   => 'user-option',
                                            'config' => ['src' => 'profile_photo_url']
                                        ]" option-label="name" option-value="id" option-description="category_name" />
                        </div>
                        <div class="flex-1  overflow-auto px-2 h-[500px] custom-scrollbar">

                            @if (count($conversations) > 0)
                            @foreach ($conversations as $conversation)



                            <div wire:key='{{$conversation->id}}'
                                wire:click="chatUserSelected({{$conversation}},{{$conversation->freelance_id }})"
                                @click="sidebarOpen=false" class="flex p-4 mb-4 transition-transform duration-300 transform {{$freelance_id == $conversation->freelance_id? 'bg-amber-600 text-white scale-105':'bg-white'}} rounded-md shadow-md cursor-pointer entry  focus:border-amber-600
                                    hover:scale-105 dark:text-white">
                                <div class="flex-2">
                                    <div class="relative w-12 h-12">

                                        @if (!empty($conversation->freelance->user->profile_photo_path))
                                        <img class="w-12 h-12 mx-auto rounded-full"
                                            src="{{Storage::disk('local')->url('public/profiles-photos/'.$conversation->freelance->user->profile_photo_path) }}"
                                            alt="">
                                        @else
                                        <img class="w-12 h-12 mx-auto rounded-full"
                                            src="{{$conversation->freelance->user->profile_photo_url }}" alt="">
                                        @endif

                                        @if ($conversation->freelance->user->is_online)
                                        <span
                                            class="absolute bottom-0 right-0 w-2 h-2 bg-green-600 border-2 border-white rounded-full"></span>
                                        @else

                                        @endif

                                    </div>
                                </div>
                                <div class="flex-1 px-2">
                                    <div class="w-32 truncate"><span
                                            class="{{$freelance_id == $conversation->freelance_id? 'text-white':'text-gray-800'}}">{{$conversation->freelance->nom}}</span>
                                    </div>
                                    <div class="w-32 truncate">
                                        <small
                                            class="{{$freelance_id == $conversation->freelance_id? 'text-gray-50':'text-gray-600'}} truncate dark:text-gray-200">

                                            @if ($conversation->messages->last()?->sender_id == auth()->user()->id)
                                            <span>vous:</span>
                                            @endif

                                            {{$conversation->messages->last()?->body}}</small>
                                    </div>
                                </div>
                                <div class="text-right flex-2">
                                    <div><small
                                            class=" {{$freelance_id == $conversation->freelance_id? 'text-gray-50':'text-gray-700'}} dark:text-gray-200">{{
                                            $conversation->messages->last()?->created_at->shortAbsoluteDiffForHumans()
                                            }}</small></div>
                                    <div>
                                        @if(count($conversation->messages->where('is_read',0)->where('sender_id',$conversation->freelance->user->id)))
                                        <small
                                            class="inline-block w-6 h-6 text-xs leading-6 text-center text-white bg-red-500 rounded-full">
                                            {{count($conversation->messages->where('is_read',0)->where('sender_id',$conversation->freelance->user->id))}}
                                        </small>

                                        @endif

                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @else
                            <div>
                                Pas De Conversation
                            </div>

                            @endif

                        </div>
                    </div>


                    <div x-bind:class="{'hidden': sidebarOpen, 'md:flex': !sidebarOpen}"
                        class="chat-area flex-1 bg-white  p-2 rounded-md flex lg:h-[500px] h-[550px]  flex-col">

                        <div x-data="" class="flex gap-3 bg-gray-100 z-5 dark:bg-gray-800">
                            <button wire:ignore @click="sidebarOpen = true" class="block lg:hidden ">
                                <ion-icon class="w-8 h-8 text-gray-800" name="arrow-back-circle-outline"></ion-icon>
                            </button>

                            @empty($selectedConversation)
                            <h2
                                class="py-1 mb-4 text-base text-center text-gray-800 border-b-2 border-gray-200 md:text-xl dark:text-white md:mb-8">

                                <b>Selectionnez une Conversation
                                </b>
                            </h2>
                            @else
                            <h2
                                class="flex justify-between flex-grow py-1 mx-2 mb-2 text-lg text-gray-800 border-b-2 border-gray-200 md:mx-4 md:text-xl dark:text-white lg:mb-4">

                                <div class="flex flex-col">
                                    <b>{{$selectedConversation->freelance?->nom}}</b>
                                    @if($selectedConversation->freelance->user->is_online)
                                    <span class="mt-1 text-sm text-green->600">
                                        online<span>
                                            @else
                                            <span class="mt-1 text-sm text-gray-600">

                                                {{$selectedConversation->freelance?->user->last_activity?->DiffForHumans()}}<span>

                                                    @endif
                                </div>
                                <div class="flex items-end gap-4">

                                    <div>
                                        <x-dropdown>

                                            <x-dropdown.item label="Maquer non lue" />
                                            <x-dropdown.item label="Favoris" />
                                            <x-dropdown.item wire:click="effacerConversation()" label="Effacer" />
                                            <x-dropdown.item wire:click="BloquerConversation()"
                                                label="Bloquer l'utilisateur" />
                                        </x-dropdown>
                                    </div>

                                </div>


                            </h2>
                            @endempty

                        </div>

                        @livewire('user.conversation.body-message')
                        @livewire('user.conversation.send-message-u')
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>--}}

<div x-data="{sidebarOpen:false, isLoading:true}" class="container mx-auto overflow-y-auto custom-scrollbar">
    <div
        class="h-screen min-w-full  overflow-y-hidden border rounded lg:h-screen custom-scrollbar lg:grid lg:grid-cols-3">
        <div x-bind:class="{'md:block hidden': sidebarOpen, 'md:block ': !sidebarOpen}"
            class="border-r border-gray-500 dark:border-gray-400 lg:col-span-1">
            <div class="mx-3 my-3">
                <div class="relative text-gray-600">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 text-gray-300">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <input type="search" class="block w-full py-2 pl-10 bg-gray-100 rounded outline-none" name="search"
                        placeholder="Search" required />
                </div>
            </div>

            <ul class="overflow-auto h-[32rem]">
                <h2 class="my-2 mb-2 ml-2 text-lg text-gray-600">Freelance</h2>

                <li>
                    @if (count($conversations) > 0)
                    @foreach ($conversations as $conversation)
                    <a wire:key='{{$conversation->id}}' href="#" @click="sidebarOpen=!sidebarOpen"
                        wire:click="chatUserSelected({{$conversation}},{{$conversation->freelance_id }})"
                        class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-500 cursor-pointer dark:hover:bg-gray-800 hover:bg-gray-100 focus:outline-none">

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
                                    <span class=" pl-3 text-sm text-gray-600 dark:text-gray-400">vous:</span>
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

                    @endforeach


                    @endif
                </li>
            </ul>
        </div>
        <div x-bind:class="{'md:block': sidebarOpen, ' hidden md:block ': !sidebarOpen}"
            class=" lg:col-span-2 lg:block">
            <div class=" h-screen w-full">
                <div class="relative flex justify-between border-b border-gray-500 dark:border-gray-500">
                    <div wire:target='chatUserSelected' wire:loading.remove class="flex items-center gap-1 p-3 ">

                        <div>
                            <button wire:ignore @click="sidebarOpen = false" class="block lg:hidden ">
                                <ion-icon class="w-6 h-6 text-gray-600 dark:text-gray-300" name="arrow-undo-outline">
                                </ion-icon>

                            </button>
                        </div>

                        @empty(!$selectedConversation)
                        <div class="flex">

                            @if (!empty($selectedConversation->freelance?->user->profile_photo_path))
                            <img class="object-cover w-10 h-10 rounded-full"
                                src="{{Storage::disk('local')->url('public/profiles-photos/'.$selectedConversation->freelance?->user->profile_photo_path) }}"
                                alt="">
                            @else
                            <img class="object-cover w-10 h-10 rounded-full"
                                src="{{$selectedConversation->freelance?->user->profile_photo_url }}" alt="">
                            @endif
                            <div class="flex flex-col">
                                <span
                                    class="block ml-2 font-bold text-gray-600">{{$selectedConversation->freelance?->user->name}}</span>
                                @if($selectedConversation->freelance->user->is_online)
                                <span class="mt-1 text-sm text-green->600">online<span>
                                        @else
                                        <span
                                            class="mt-1 text-sm text-gray-600">{{$selectedConversation->freelance?->user->last_activity?->DiffForHumans()}}<span>
                                                @endif
                            </div>

                            @if($selectedConversation->freelance->user->is_online)
                            <span class="absolute w-3 h-3 bg-green-600 rounded-full left-10 top-3">
                            </span>
                            @endif

                        </div>



                        @endempty


                    </div>

                    <div wire:target='chatUserSelected' wire:loading
                        class="flex flex-col w-full bg-gray-400 animate-pulse">

                        <div class="bg-gray-500 rounded-full w-14 animate-pulse">

                        </div>

                    </div>

                    <div wire:target='chatUserSelected' wire:loading.remove class="flex px-6 py-3">


                        <x-dropdown>

                            <x-dropdown.item label="Maquer non lue" />
                            <x-dropdown.item label="Favoris" />
                            <x-dropdown.item wire:click="effacerConversation()" label="Effacer" />
                            <x-dropdown.item wire:click="BloquerConversation()" label="Bloquer l'utilisateur" />
                        </x-dropdown>


                    </div>



                </div>

                <div wire:target='chatUserSelected' wire:loading
                    class=" h-[500px] lg:h-[400px] w-full bg-gray-400 animate-pulse">

                </div>

                <div wire:target='chatUserSelected' wire:loading.remove>

                    @livewire('user.conversation.body-message')
                </div>


                @livewire('user.conversation.send-message-u')

            </div>
        </div>
    </div>
</div>



@push('script')
<script>
    function resetPosition() {


        var div = document.getElementById("main");

        var parent = document.getElementById('parent');

        const body= document.getElementById("body");

        const header= document.getElementById("header");


        div.scrollTop = 0;

        window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth'
        });



        // Ramener la scrollbar au haut de la div

     }


</script>

@endpush
