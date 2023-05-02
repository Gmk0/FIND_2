{{--<div class="flex    py-4 sm:pt-20 h-screen md:overflow-hidden " x-data="{sidebarOpen:false, isLoading:true}"
    x-init="setTimeout(() => { isLoading = false }, 2000)">
    <div x-show="isLoading">

        <div class="flex flex-col  h-screen bg-gray-300 animate-pulse w-full  overflow-y-hidden md:flex-row">
            <div
                class="order-first hidden w-full h-screen p-2 px-2 mx-2 overflow-y-auto bg-gray-300 rounded-md animate-pulse md:flex ">
                <div>

                </div>
            </div>

        </div>
    </div>
    <div x-cloak x-show="!isLoading" class="flex-1 w-full  ">
        <div class="container flex flex-col w-11/12 h-full p-2 m-2 main-body">


            <div class="flex flex-col flex-1 my-auto  lg:my-0  main">


                <div class="flex py-2 md:py-0  flex-1 h-full">

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

<div class="container mx-auto">
    <div class="min-w-full lg:h-screen h-auto border rounded lg:grid lg:grid-cols-3">
        <div class="border-r hidden lg:block border-gray-300 lg:col-span-1">
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
                <h2 class="my-2 mb-2 ml-2 text-lg text-gray-600">Chats</h2>
                <li>
                    <a
                        class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none">
                        <img class="object-cover w-10 h-10 rounded-full"
                            src="https://cdn.pixabay.com/photo/2018/09/12/12/14/man-3672010__340.jpg" alt="username" />
                        <div class="w-full pb-2">
                            <div class="flex justify-between">
                                <span class="block ml-2 font-semibold text-gray-600">Jhon Don</span>
                                <span class="block ml-2 text-sm text-gray-600">25 minutes</span>
                            </div>
                            <span class="block ml-2 text-sm text-gray-600">bye</span>
                        </div>
                    </a>
                    <a
                        class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out bg-gray-100 border-b border-gray-300 cursor-pointer focus:outline-none">
                        <img class="object-cover w-10 h-10 rounded-full"
                            src="https://cdn.pixabay.com/photo/2016/06/15/15/25/loudspeaker-1459128__340.png"
                            alt="username" />
                        <div class="w-full pb-2">
                            <div class="flex justify-between">
                                <span class="block ml-2 font-semibold text-gray-600">Same</span>
                                <span class="block ml-2 text-sm text-gray-600">50 minutes</span>
                            </div>
                            <span class="block ml-2 text-sm text-gray-600">Good night</span>
                        </div>
                    </a>
                    <a
                        class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none">
                        <img class="object-cover w-10 h-10 rounded-full"
                            src="https://cdn.pixabay.com/photo/2018/01/15/07/51/woman-3083383__340.jpg"
                            alt="username" />
                        <div class="w-full pb-2">
                            <div class="flex justify-between">
                                <span class="block ml-2 font-semibold text-gray-600">Emma</span>
                                <span class="block ml-2 text-sm text-gray-600">6 hour</span>
                            </div>
                            <span class="block ml-2 text-sm text-gray-600">Good Morning</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class=" lg:col-span-2 lg:block">
            <div class="w-full">
                <div class="relative flex items-center p-3 border-b border-gray-300">
                    <img class="object-cover w-10 h-10 rounded-full"
                        src="https://cdn.pixabay.com/photo/2018/01/15/07/51/woman-3083383__340.jpg" alt="username" />
                    <span class="block ml-2 font-bold text-gray-600">Emma</span>
                    <span class="absolute w-3 h-3 bg-green-600 rounded-full left-10 top-3">
                    </span>
                </div>
                <div class="relative w-full p-4 overflow-y-auto h-[500px]">
                    <ul class="space-y-2">
                        <li class="flex justify-start">
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span class="block">Hi</span>
                            </div>
                        </li>
                        <li class="flex justify-end">
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                <span class="block">Hiiii</span>
                            </div>
                        </li>
                        <li class="flex justify-end">
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                <span class="block">how are you?</span>
                            </div>
                        </li>
                        <li class="flex justify-start">
                            <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                <span class="block">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="flex items-center justify-between w-full p-3 border-t border-gray-300">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                    </button>

                    <input type="text" placeholder="Message"
                        class="block w-full py-2 pl-4 mx-3 bg-gray-100 rounded-full outline-none focus:text-gray-700"
                        name="message" required />
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                        </svg>
                    </button>
                    <button type="submit">
                        <svg class="w-5 h-5 text-gray-500 origin-center transform rotate-90"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                        </svg>
                    </button>
                </div>
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