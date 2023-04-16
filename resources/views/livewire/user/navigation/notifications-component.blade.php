<div class="rounded-md md:relative">
    <!-- start::Main link -->
    <div @click="notificationActive = !notificationActive" class="flex cursor-pointer">
        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        <sub>
            <span
                class="bg-red-600 text-gray-100 px-1.5 py-0.5 rounded-full -ml-1 {{$notificationsCount ? 'animate-pulse':''}} ">
                {{count($notificationsCount)}}
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
            <div class="sticky z-20 flex items-center justify-between px-4 py-2">
                <span class="font-bold">Notifications</span>
                <span class="text-xs px-1.5 py-0.5 bg-red-600 text-gray-100 rounded">
                    {{count($notificationsCount)}} new
                </span>
            </div>
            <hr>
            <!-- end::Submenu header -->
            <!-- start::Submenu link -->

            @livewire("user.navigation.notification-freelance")


            <!-- end::Submenu link -->
        </div>
        <!-- end::Submenu content -->
    </div>

</div>
