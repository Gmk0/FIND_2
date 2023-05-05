<div>
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
                <span class="absolute bottom-0 right-0 w-2 h-2 bg-green-600 border-2 border-white rounded-full"></span>
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

            @endforeach


            @endif
        </li>
    </ul>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>