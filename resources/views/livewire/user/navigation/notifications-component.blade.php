<div>
    <div class="md:relative rounded-md">
        <!-- start::Main link -->
        <div @click="notificationActive = !notificationActive" class="flex cursor-pointer">
            <ion-icon name="notifications-outline" class="w-5 h-5 text-gray-800"></ion-icon>
            <sub>
                <span
                    class="bg-red-600 text-gray-100 px-1.5 py-0.5 rounded-full -ml-1 {{$notifications ? 'animate-pulse':''}} ">
                    {{count($notifications)}}
                </span>
            </sub>
        </div>
        <!-- end::Main link -->

        <!-- start::Submenu -->
        <div x-show="notificationActive" @click.away="notificationActive = false" x-cloak
            class="absolute right-0  md:w-96 w-[18rem] top-11 md:mt-8 border border-gray-300 rounded-lg z-10">
            <!-- start::Submenu content -->
            <div class="overflow-y-scroll bg-white rounded-g max-h-96 custom-scrollbar">
                <!-- start::Submenu header -->
                <div class="flex items-center sticky z-20 justify-between px-4 py-2">
                    <span class="font-bold">Notifications</span>
                    <span class="text-xs px-1.5 py-0.5 bg-red-600 text-gray-100 rounded">
                        {{count($notifications)}} new
                    </span>
                </div>
                <hr>
                <!-- end::Submenu header -->
                <!-- start::Submenu link -->

                @forelse ($notifications as $notification)

                <a x-data="{ linkHover: false }" href="#"
                    class="flex items-center justify-between px-3 py-4 hover:bg-gray-100 dark:hover:bg-gray-700 bg-opacity-20"
                    @mouseover="linkHover = true" @mouseleave="linkHover = false">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 bg-blue-600 bg-opacity-20 text-blue-600 px-1.5 py-0.5 rounded-full"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <div class="ml-3 text-sm">
                            <p class="font-bold text-gray-600 capitalize" :class=" linkHover ? 'text-primary' : ''">
                                Order
                                Completed</p>
                            <p class="text-xs text-gray-600 dark:text-gray-200">{{$notification->content}}</p>
                        </div>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-200 font-bold">
                        {{$notification->created_at->DiffForHumans()}}
                    </span>
                </a>
                @empty
                <div>0notification</div>

                @endforelse



                <!-- end::Submenu link -->
            </div>
            <!-- end::Submenu content -->
        </div>

    </div>
</div>