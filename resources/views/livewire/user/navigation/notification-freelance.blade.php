<div class="space">

    @forelse ($notifications as $notification)
    <div x-data="{ linkHover: false }" href="#"
        class="flex items-center justify-between w-64 max-h-64 px-1.5 py-3.5 hover:bg-gray-100 dark:hover:bg-gray-700 bg-opacity-20"
        @mouseover="linkHover = true" @mouseleave="linkHover = false">
        <div class="flex items-center">

            <div class="ml-2 text-sm">

                <p class="p-2 text-xs text-gray-600 truncate whitespace-normal dark:text-gray-200">
                    {{$notification->data['message']}}
                </p>
            </div>
        </div>
        <span class="flex-1 ml-1 text-xs font-bold text-gray-600 dark:text-gray-200">
            <span x-show="!linkHover">{{$notification->created_at->DiffForHumans()}}</span>
        </span>

        <div x-bind:class="{ 'hidden': !linkHover }">

            <x-button.circle wire:click="remove('{{$notification->id}}')" sm icon="trash" />
        </div>



    </div>

    @empty
    <div>Pas de notification</div>

    @endforelse
</div