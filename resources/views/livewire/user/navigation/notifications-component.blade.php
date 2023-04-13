<div class="rounded-md md:relative">
    <!-- start::Main link -->
    <div @click="notificationActive = !notificationActive" class="flex cursor-pointer">
        <ion-icon name="notifications-outline" class="w-5 h-5 text-gray-800"></ion-icon>
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