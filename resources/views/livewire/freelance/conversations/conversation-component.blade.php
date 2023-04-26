<div>
    <div class="flex h-screen" x-data="{sidebarOpen:false}">

        <div class="flex-1 w-full h-full mx-auto ">
            <div class="container flex flex-col w-full h-full p-4 lg:w-11/12 main-body">


                <div class="flex flex-col flex-1 main">


                    <div class="flex flex-1 h-full mx-2">
                        <div x-bind:class="{'hidden': !sidebarOpen, 'md:block': sidebarOpen}"
                            class="sidebar   w-full lg:flex md:w-1/3 flex-2 h-[550px] custom-scrollbar flex-col pt-2 rounded-md md:pr-6">
                            <div class="px-2 pb-6 search flex-2">
                                <x-input placeholder="Recherche"></x-input>
                            </div>
                            <div class="flex-1 px-2 overflow-auto custom-scrollbar">

                                @if (count($conversations) > 0)

                                @foreach ($conversations as $conversation)

                                <div wire:key='{{$conversation->id}}' @click="sidebarOpen=false"
                                    wire:click="$emit('chatUserSelected', {{$conversation}},{{$conversation->user_id }})"
                                    class="flex p-4 mb-4 transition-transform duration-300 transform bg-white rounded-md shadow-md cursor-pointer {{$user_id == $conversation->user_id? 'bg-amber-200 text-white scale-105':'bg-white'}} entry hover:scale-105 dark:text-white">
                                    <div class="flex-2">
                                        <div class="relative w-12 h-12">




                                            @if (!empty($conversation->user->profile_photo_path))
                                            <img class="w-12 h-12 mx-auto rounded-full"
                                                src="{{Storage::disk('local')->url('profiles-photos/'.$conversation->user->profile_photo_path) }}"
                                                alt="">
                                            @else
                                            <img class="w-12 h-12 mx-auto rounded-full"
                                                src="{{$conversation->user->profile_photo_url }}" alt="">
                                            @endif

                                            <span
                                                class="absolute bottom-0 right-0 w-4 h-4 bg-green-400 border-2 border-white rounded-full"></span>
                                        </div>
                                    </div>
                                    <div class="flex-1 px-2">
                                        <div class="w-32 truncate"><span
                                                class="text-gray-800">{{$conversation->user->name}}</span></div>
                                        <div><small class="text-gray-600 truncate dark:text-white">{{
                                                $conversation->messages->last()?->body
                                                }}</small></div>
                                    </div>
                                    <div class="text-right flex-2">
                                        <div><small class="text-gray-500">{{
                                                $conversation->messages->last()?->created_at->shortAbsoluteDiffForHumans()
                                                }}</small>
                                        </div>
                                        <div>
                                            @if(count($conversation->messages->where('is_read',0)->where('sender_id',$conversation->user->id)))
                                            <small
                                                class="inline-block w-6 h-6 text-xs leading-6 text-center text-white bg-red-500 rounded-full">
                                                {{count($conversation->messages->where('is_read',0)->where('sender_id',$conversation->user->id))}}
                                            </small>

                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                @else
                                Pas de conversation

                                @endif


                            </div>
                            {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
                        </div>




                        <div x-data="{message:''}" x-bind:class="{'hidden': sidebarOpen, 'md:flex': !sidebarOpen}"
                            class="chat-area flex-1 bg-white  p-2 rounded-md flex md:h-[500px] mr-3 h-fit   flex-col">

                            <div x-data="" class="flex gap-3 bg-gray-100 z-5 dark:bg-gray-800">
                                <button wire:ignore @click="sidebarOpen = true" class="block md:hidden ">
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
                                    class="flex justify-between flex-grow py-1 mx-4 mb-2 text-lg text-gray-800 border-b-2 border-gray-200 md:text-xl dark:text-white md:mb-4">

                                    <div class="flex flex-col">
                                        <b>{{$selectedConversation->name}}</b>
                                        @if($selectedConversation->user->is_online)
                                        <span class="mt-1 text-sm text-green->600">
                                            online<span>
                                                @else
                                                <span class="mt-1 text-sm text-gray-600">

                                                    {{$selectedConversation->user->last_activity?->DiffForHumans()}}<span>

                                                        @endif
                                    </div>
                                    <div class="flex items-end gap-4">

                                        <div>
                                            <x-dropdown>
                                                <x-dropdown.item label="Envoyer un fichier " />
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


                            @livewire('freelance.conversations.send-message-f')
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>
