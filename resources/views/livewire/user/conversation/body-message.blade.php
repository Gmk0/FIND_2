<div class="flex-1 overflow-auto messages custom-scrollbar">
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
            <div
                class="{{auth()->id() == $message->sender_id ? 'bg-blue-600 text-gray-100':'bg-gray-300 text-gray-700'}} inline-flex rounded-md p-3 md:px-6 ">
                <span>{{$message->body}}</span>

            </div>
            <div class="flex justify-end mt-0.5">
                <span class="text-gray-400 text-sm">{{ $message->created_at->format('m: i a') }}</span>
                <div class="flex items-center justify-center text-green-600 ml-1" title="Seen">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                    @if($message->is_read==1)
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3    w-3 -ml-1.5" fill="none" viewBox="0 0 24 24"
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
        <h1 class="text-gray-800 text-xl">Ecrivez lui un message</h1>

    </div>
    @endforelse

    @else
    <div class="flex items-center py-8 px-6 my-auto ">
        <h1 class="text-gray-800 text-xl">Pas de Conversation Selectionnées</h1>

    </div>


    @endif

</div>

@push('script')


<script>
    window.addEventListener('rowChatToBottom', event => {

            $('.messages').scrollTop($('.messages')[0].scrollHeight);

        });
</script>

<script>
    $(".messages").on('scroll', function() {

var top = $('.messages').scrollTop();

if (top == 0) {

window.livewire.emit('loadmore');
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
    window.addEventListener('markMessageAsRead',event=>{
    var value= document.querySelectorAll('.status_tick');
    
    value.array.forEach(element, index => {
    
    
    element.classList.remove('bi bi-check2');
    element.classList.add('bi bi-check2-all','text-primary');
    });
    
    });
    
</script>
@endpush