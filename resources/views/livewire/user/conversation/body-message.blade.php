{{--<div class="flex-1 mt-4 overflow-auto messages custom-scrollbar">
    @if($selectedConversation)
    @forelse ($messages as $message)
    <div class="message mb-4   flex flex-2 {{auth()->id() == $message->sender_id ? 'text-right items-end':''}}">

        <div class="flex-2 {{auth()->id() == $message->sender_id ? 'hidden':'flex-2'}}">

            @if(auth()->id() == $message->sender_id)
            <div class="relative w-12 h-12">
                <img class="w-12 h-12 mx-auto rounded-full" src="" alt="chat-user" />
                <span class="absolute bottom-0 right-0 w-4 h-4 bg-gray-400 border-2 border-white rounded-full"></span>
            </div>
            @else
            @if (!empty($message->senderUser->profile_photo_path))
            <div class="relative w-12 h-12">
                <img class="w-8 h-8 mx-auto rounded-full"
                    src="{{Storage::disk('local')->url('profiles-photos/'.$message->receiverUser->profile_photo_path) }}"
                    alt="chat-user" />
                <span class="absolute bottom-0 right-0 w-4 h-4 bg-gray-400 border-2 border-white rounded-full"></span>
            </div>

            @else
            <img class="w-8 h-8 rounded-full" src="{{ $message->senderUser->profile_photo_url }}" alt="">
            @endif


            @endif
        </div>
        <div class="flex-1 px-2">
            @if ($message->service_id != null)
            <div
                class="mb-2 rounded-xl {{auth()->id() == $message->sender_id ? 'bg-green-500 rounded-br-none text-gray-100 ':'bg-green-500 rounded-bl-none text-gray-700'}}  inline-block px-4 py-3 ">




                <a
                    href="{{route('ServicesViewOne',['id'=>$message->service->id,'category'=>$message->service->category->name])}}">{{$message->service->title}}
                    /${{$message->service->basic_price}}</a>





            </div>
            @endif

            <div class="" x-data="{linkHover:false}">


                <div
                    class=" rounded-xl {{auth()->id() == $message->sender_id ? 'bg-blue-600 rounded-br-none text-gray-100 ':'bg-gray-300 rounded-bl-none text-gray-700'}}  inline-block px-4 py-3 ">


                    @if(!empty($message->file))
                    <a @mouseover="linkHover = true" @mouseleave="linkHover = false"
                        href="{{ url('/storage/messages/' . $message->file) }}" download>
                        <img src="/storage/messages/{{$message->file }}" alt="Image" class="h-24 max-w-24">
                    </a>

                    @else

                    <span class="cursor-pointer">{{$message->body}}</span>


                    @endif

                    <span class="text-white {{auth()->id() == $message->sender_id ? 'flex':'hidden'}}"
                        x-show="linkHover">
                        <x-dropdown class="text-white">
                            <x-dropdown.item wire:click="deleteMessage({{$message->id}})" label="effacer" />
                        </x-dropdown>
                    </span>
                </div>

            </div>




            <div class="flex {{auth()->id() == $message->sender_id ? 'justify-end':'hidden'}}  mt-0.5">
                <span class="text-sm text-gray-400">{{ $message->created_at->format('m: i a') }}</span>
                <div class="flex items-center justify-center ml-1 text-green-600" title="Seen">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                    @if($message->is_read==1)
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 -ml-1.5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                    @endif
                </div>
            </div>



        </div>
    </div>
    @empty
    <div class="mx-6 my-auto">
        <h1 class="flex items-center justify-center my-16 text-xl text-gray-800">Ecrivez lui un message</h1>

    </div>
    @endforelse

    @else
    <div class="flex items-center px-6 py-8 my-auto ">
        <h1 wire:loading.remove wire:target='selectedConversation' class="text-xl text-gray-800">Pas de Conversation
            Selectionnées</h1>

    </div>


    @endif

</div>--}}

<div>
    <div
        class=" w-full p-4 overflow-y-auto lg:h-[400px] h-[500px] 2xl:h-[450px] bg-[#DAD3CC] dark:bg-gray-700  messages custom-scrollbar">

        @if($selectedConversation)

        <ul class="space-y-2">

            @forelse ($messages as $message)

            <div x-data="{chat:false}" @mouse.enter="chat=true" @mouse.leave="chat=false"
                class="chat  {{auth()->id() == $message->sender_id ? 'chat-end':'chat-start'}}  ">
                <div class="chat-image avatar">

                    @if(auth()->id() == $message->sender_id)


                    @if (!empty($message->senderUser->profile_photo_path))
                    <div class="w-10 rounded-full">
                        <img class=""
                            src="{{Storage::disk('local')->url('profiles-photos/'.$message->senderUser->profile_photo_path) }}"
                            alt="chat-user" />

                    </div>

                    @else
                    <div class="w-10 rounded-full">
                        <img class="" src="{{ $message->senderUser->profile_photo_url }}" alt="">
                    </div>

                    @endif

                    @elseif(auth()->id() != $message->sender_id)
                    @if (!empty($message->senderUser->profile_photo_path))
                    <div class="w-10 rounded-full">
                        <img class=""
                            src="{{Storage::disk('local')->url('profiles-photos/'.$message->senderUser->profile_photo_path) }}"
                            alt="chat-user" />

                    </div>

                    @else
                    <div class="w-10 rounded-full">
                        <img class="" src="{{ $message->senderUser->profile_photo_url }}" alt="">
                    </div>

                    @endif

                    @endif
                </div>
                <div x-show="chat" class="chat-header">

                    <time class="text-xs opacity-50 dark:text-gray-300">{{ $message->created_at->format('m: i a')
                        }}</time>
                </div>

                @if ($message->service_id != null)
                <div
                    class="mb-2 rounded-xl {{auth()->id() == $message->sender_id ? 'bg-green-500 rounded-br-none text-gray-100 ':'bg-green-500 rounded-bl-none text-gray-700'}}  inline-block px-4 py-3 ">




                    <a
                        href="{{route('ServicesViewOne',['id'=>$message->service->id,'category'=>$message->service->category->name])}}">{{$message->service->title}}
                        /${{$message->service->basic_price}}</a>





                </div>
                @endif


                @if(!empty($message->file))
                <a @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    href="{{ url('/storage/messages/' . $message->file) }}" download>
                    <img src="/storage/messages/{{$message->file }}" alt="Image" class="h-24 max-w-24">
                </a>

                @endif

                <div
                    class="text-gray-800 chat-bubble {{auth()->id() == $message->sender_id ? 'bg-[#E2F7CB] dark:bg-[#075E54]':'bg-[#FCF4CB] dark:bg-gray-900'}}">
                    {{$message->body}}</div>



                @if($message->is_read==1)
                <div class="opacity-50 chat-footer">
                    vu
                </div>
                @else
                <div class="opacity-50 deliver chat-footer">
                    sent
                </div>
                <div class="hidden opacity-50 vu chat-footer">
                    vu
                </div>

                @endif



            </div>


            @empty
            <div class="mx-6 my-auto">
                <h1 class="flex items-center justify-center my-16 text-xl text-gray-800">Ecrivez lui un message</h1>

            </div>
            @endforelse


        </ul>



        @else
        <div class="flex items-center px-6 py-8 my-auto ">
            <h1 wire:loading.remove wire:target='selectedConversation' class="text-xl text-gray-800">Pas de Conversation
                Selectionnées</h1>

        </div>


        @endif
    </div>

</div>




@push('script')


<script>
    window.addEventListener('rowChatToBottom', event => {

            $('.messages').scrollTop($('.messages')[0].scrollHeight);

           // $('#main').scrollTop($('#main')[0].scrollHeight);



        });
</script>

<script>
    var messages = document.querySelector(".messages");

        messages.addEventListener("scroll", function() {

        var top = messages.scrollTop;

        if (top == 0) {

        window.livewire.emit("loadmore");
        }
        });
</script>

<script>
    window.addEventListener('updatedHeight', event => {

                let old = event.detail.height;
                let newHeight = $('.messages')[0].scrollHeight;

                let height = $('.messages').scrollTop(newHeight - old);


                window.livewire.emit('updateHeight', {
                    height: height,
                });


            });
</script>

<script>
    window.addEventListener('markMessageAsRead', event => {


        var elements = document.querySelectorAll('.deliver');

        elements.forEach(function(element) {
        // Ajouter du texte à l'élément
        element.textContent = 'ouiii';

        // Modifier les classes CSS de l'élément

        });

    });

</script>
@endpush