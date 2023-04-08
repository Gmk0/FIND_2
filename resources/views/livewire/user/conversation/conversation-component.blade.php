<div class="flex max-h-screen overflow-hidden" x-data="{sidebarOpen:false, isLoading:true}"
    x-init="setTimeout(() => { isLoading = false }, 3000)">

    <div x-show="isLoading">

        <div class="flex flex-row h-screen p-8 overflow-y-hidden">
            <div
                class="order-first hidden w-64 h-screen p-2 px-2 mx-2 overflow-y-auto bg-gray-300 rounded-md animate-pulse custom-scrollbar md:flex ">
                <div>

                </div>
            </div>
            <div
                class="flex-1 h-screen p-4 md:w-[24rem] overflow-y-auto text-xs bg-gray-200 border-r border-indigo-300 rounded-md animate-pulse custom-scrollbar">


            </div>
        </div>
    </div>
    <div x-cloak x-show="!isLoading" class="flex-1 w-full h-full ">
        <div class="container flex flex-col w-11/12 h-full p-4 m-auto main-body">


            <div class="flex flex-col flex-1 main">


                <div class="flex flex-1 h-full">

                    <div x-bind:class="{'hidden': !sidebarOpen, 'md:block': sidebarOpen}"
                        class="sidebar   w-full lg:flex md:w-1/3 flex-2 h-[550px] custom-scrollbar overflow-x-hidden flex-col pt-2 rounded-md md:pr-6">
                        <div class="px-2 pb-6 search flex-2">
                            <x-input type="text" wire:model='query' placeholder="Search" />
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
                                    <div class="w-32 truncate"><small
                                            class="{{$freelance_id == $conversation->freelance_id? 'text-gray-50':'text-gray-600'}} truncate dark:text-gray-200">{{
                                            $conversation->messages->last()?->body
                                            }}</small></div>
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
                        class="chat-area flex-1 bg-white  p-2 rounded-md flex h-[550px]  flex-col">

                        <div x-data="" class="flex gap-3 bg-gray-100 z-5 dark:bg-gray-800">
                            <button wire:ignore @click="sidebarOpen = true" class="block md:hidden ">
                                <ion-icon class="w-8 h-8 text-gray-800" name="arrow-back-circle-outline"></ion-icon>
                            </button>

                            @empty($selectedConversation)
                            <h2
                                class="py-1 mb-4 text-lg text-center text-gray-800 border-b-2 border-gray-200 md:text-xl dark:text-white md:mb-8">

                                <b>Selectionnez une Conversation
                                </b>
                            </h2>
                            @else
                            <h2
                                class="flex flex-col py-1 mx-4 mb-2 text-lg text-gray-800 border-b-2 border-gray-200 md:text-xl dark:text-white md:mb-4">

                                <b>{{$selectedConversation->freelance->nom}}</b>
                                @if($selectedConversation->freelance->user->is_online)
                                <span class="mt-1 text-sm text-green->600">
                                    online<span>
                                        @else
                                        <span class="mt-1 text-sm text-gray-600">
                                            {{$selectedConversation->freelance->user->last_activity?->DiffForHumans()}}<span>

                                                @endif

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
</div>