<div>

    <button data-tooltip-target="tooltip-notification" type="button" data-dropdown-toggle="notification-dropdown"
        class="p-2 text-gray-500 rounded-lg hover:text-gray-900 flex hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
        <span class="sr-only">View notifications</span>
        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        <sub>
            <span class="bg-red-600 text-gray-100 px-1.5 py-0.5 rounded-full -ml-1 animate-pulse">
                {{count(Auth::user()->unReadNotifications)}}
            </span>
        </sub>
    </button>

    <div class="z-20 z-50 hidden max-w-sm my-4 overflow-hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg dark:divide-gray-600 dark:bg-gray-700"
        id="notification-dropdown">
        <div
            class="flex justify-between gap-2 px-4 py-2 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <span>Notifications</span>

            @empty(!$notifications)

            <x-button label="Tout lue" wire:click="markRead()" sm icon="trash" />
            @endempty



        </div>
        <div>

            @forelse ($notifications as $notification)

            <a x-data="{ linkHover: false }" href="#"
                class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                <div class="flex-shrink-0">
                    <img class="rounded-full w-11 h-11" src="{{$notification->data['icon']}}" alt="Jese image">

                </div>
                <div class="w-full pl-3">
                    <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">
                        {!! $notification->data['message'] !!}</div>
                    <div class="text-xs font-medium text-primary-700 dark:text-primary-400">
                        {{$notification->created_at->DiffForHumans()}}</div>
                </div>

                <div x-bind:class="{ 'hidden': !linkHover }">

                    <x-button.circle wire:click="remove('{{$notification->id}}')" sm />
                </div>
            </a>
            @empty
            <a href="#" class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                <div class="flex-shrink-0">


                </div>
                <div class="w-full pl-3">
                    <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">New
                        0 notifications
                    </div>

                </div>
            </a>

            @endforelse


        </div>
        <a href="#"
            class="block py-2 text-base font-normal text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:hover:underline">
            <div class="inline-flex items-center ">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    <path fill-rule="evenodd"
                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                        clip-rule="evenodd"></path>
                </svg>
                View all
            </div>
        </a>
    </div>

</div>