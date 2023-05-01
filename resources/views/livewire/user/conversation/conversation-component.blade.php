<div x-data="{ parentX: 0, parentY: 0 }" class="parent  custom-scrollbar">

    <div class="flex   pt-4 sm:pt-20 h-screen md:overflow-hidden " x-data="{sidebarOpen:false, isLoading:true}"
        x-init="setTimeout(() => { isLoading = false }, 2000)">
        <div x-show="isLoading">

            <div class="flex flex-col flex-1 h-screen bg-gray-300 animate-pulse w-full  overflow-y-hidden md:flex-row">
                <div
                    class="order-first hidden w-full h-screen p-2 px-2 mx-2 overflow-y-auto bg-gray-300 rounded-md animate-pulse md:flex ">
                    <div>

                    </div>
                </div>

            </div>
        </div>
        <div x-cloak x-show="!isLoading" class="flex-1 w-full  ">
            <div class="container flex flex-col w-11/12 h-full p-4 m-auto main-body">


                <div class="flex flex-col flex-1 main">


                    <div class="flex flex-1 h-full">

                        <div x-bind:class="{'hidden ': !sidebarOpen, 'md:block': sidebarOpen}"
                            class="sidebar   w-full lg:flex md:w-1/3 flex-2 md:h-[550px] h-screen custom-scrollbar overflow-x-hidden overflow-y-auto flex-col pt-2 rounded-md md:pr-6">
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


                        <div x-data="{message:''}" x-bind:class="{'hidden': sidebarOpen, 'md:flex': !sidebarOpen}"
                            class="chat-area flex-1 bg-white  p-2 rounded-md flex md:h-[500px] max-h-screen  flex-col">

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
                                    class="flex justify-between flex-grow py-1 mx-2 mb-2 text-lg text-gray-800 border-b-2 border-gray-200 md:mx-4 md:text-xl dark:text-white md:mb-4">

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
    </div>

</div>

@push('script')
<script>
    function resetPosition() {


        var div = document.getElementById("main");

        const body= document.getElementById("body");

        const header= document.getElementById("header");


        div.scrollTop = 0;


        body.scrollTop = 0;



        // Ramener la scrollbar au haut de la div

     }


</script>

@endpush