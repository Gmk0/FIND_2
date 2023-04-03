<div>
    <div class="md:relative rounded-md">
        <!-- start::Main link -->
        <div @click="notificationActive = !notificationActive" class="flex cursor-pointer">
            <ion-icon name="notifications-outline" class="w-5 h-5 text-white"></ion-icon>
            <sub>
                <span class="bg-red-600 text-gray-100 px-1.5 py-0.5 rounded-full -ml-1 animate-pulse">
                    0
                </span>
            </sub>
        </div>
        <!-- end::Main link -->

        <!-- start::Submenu -->
        <div x-show="notificationActive" @click.away="notificationActive = false" x-cloak
            class="absolute right-4  md:w-96 w-[18rem] top-11 mt-8 border border-gray-300 rounded-lg z-10">
            <!-- start::Submenu content -->
            <div class="overflow-y-scroll bg-white rounded-g max-h-96 custom-scrollbar">
                <!-- start::Submenu header -->
                <div class="flex items-center sticky z-20 justify-between px-4 py-2">
                    <span class="font-bold">Notifications</span>
                    <span class="text-xs px-1.5 py-0.5 bg-red-600 text-gray-100 rounded">
                        4 new
                    </span>
                </div>
                <hr>
                <!-- end::Submenu header -->
                <!-- start::Submenu link -->
                <a x-data="{ linkHover: false }" href="#"
                    class="flex items-center justify-between px-3 py-4 hover:bg-gray-100 bg-opacity-20"
                    @mouseover="linkHover = true" @mouseleave="linkHover = false">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 bg-primary bg-opacity-20 text-primary px-1.5 py-0.5 rounded-full"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <div class="ml-3 text-sm">
                            <p class="font-bold text-gray-600 capitalize" :class=" linkHover ? 'text-primary' : ''">
                                Order
                                Completed</p>
                            <p class="text-xs">Your order is completed</p>
                        </div>
                    </div>
                    <span class="text-xs font-bold">
                        5 min ago
                    </span>
                </a>
                <!-- end::Submenu link -->
                <!-- start::Submenu link -->
                <a x-data="{ linkHover: false }" href="#"
                    class="flex items-center justify-between px-3 py-4 hover:bg-gray-100 bg-opacity-20"
                    @mouseover="linkHover = true" @mouseleave="linkHover = false">
                    <div class="flex items-center">
                        <img src="./assets/img/profile.jpg" class="w-8 rounded-full">
                        <div class="ml-3 text-sm">
                            <p class="font-bold text-gray-600 capitalize" :class=" linkHover ? 'text-primary' : ''">
                                Maria sent
                                you a message</p>
                            <p class="text-xs">Hey there, how are you do...</p>
                        </div>
                    </div>
                    <span class="text-xs font-bold">
                        30 min ago
                    </span>
                </a>
                <!-- end::Submenu link -->
                <!-- start::Submenu link -->
                <a x-data="{ linkHover: false }" href="#"
                    class="flex items-center justify-between px-3 py-4 hover:bg-gray-100 bg-opacity-20"
                    @mouseover="linkHover = true" @mouseleave="linkHover = false">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 bg-primary bg-opacity-20 text-primary px-1.5 py-0.5 rounded-full"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <div class="ml-3 text-sm">
                            <p class="font-bold text-gray-600 capitalize" :class=" linkHover ? 'text-primary' : ''">
                                Order
                                Completed</p>
                            <p class="text-xs">Your order is completed</p>
                        </div>
                    </div>
                    <span class="text-xs font-bold">
                        54 min ago
                    </span>
                </a>
                <!-- end::Submenu link -->
                <!-- start::Submenu link -->
                <a x-data="{ linkHover: false }" href="#"
                    class="flex items-center justify-between px-3 py-4 hover:bg-gray-100 bg-opacity-20"
                    @mouseover="linkHover = true" @mouseleave="linkHover = false">
                    <div class="flex items-center">
                        <img src="./assets/img/profile.jpg" class="w-8 rounded-full">
                        <div class="ml-3 text-sm">
                            <p class="font-bold text-gray-600 capitalize" :class=" linkHover ? 'text-primary' : ''">
                                Maria sent
                                you a message</p>
                            <p class="text-xs">Hey there, how are you do...</p>
                        </div>
                    </div>
                    <span class="text-xs font-bold">
                        1 hour ago
                    </span>
                </a>
                <!-- end::Submenu link -->
                <!-- start::Submenu link -->
                <a x-data="{ linkHover: false }" href="#"
                    class="flex items-center justify-between px-3 py-4 hover:bg-gray-100 bg-opacity-20"
                    @mouseover="linkHover = true" @mouseleave="linkHover = false">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 bg-primary bg-opacity-20 text-primary px-1.5 py-0.5 rounded-full"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <div class="ml-3 text-sm">
                            <p class="font-bold text-gray-600 capitalize" :class=" linkHover ? 'text-primary' : ''">
                                Order
                                Completed</p>
                            <p class="text-xs">Your order is completed</p>
                        </div>
                    </div>
                    <span class="text-xs font-bold">
                        15 hours ago
                    </span>
                </a>
                <!-- end::Submenu link -->
                <!-- start::Submenu link -->
                <a x-data="{ linkHover: false }" href="#"
                    class="flex items-center justify-between px-3 py-4 hover:bg-gray-100 bg-opacity-20"
                    @mouseover="linkHover = true" @mouseleave="linkHover = false">
                    <div class="flex items-center">
                        <img src="./assets/img/profile.jpg" class="w-8 rounded-full">
                        <div class="ml-3 text-sm">
                            <p class="font-bold text-gray-600 capitalize" :class=" linkHover ? 'text-primary' : ''">
                                Maria sent
                                you a message</p>
                            <p class="text-xs">Hey there, how are you do...</p>
                        </div>
                    </div>
                    <span class="text-xs font-bold">
                        12 day ago
                    </span>
                </a>
                <!-- end::Submenu link -->
                <!-- start::Submenu link -->
                <a x-data="{ linkHover: false }" href="#"
                    class="flex items-center justify-between px-3 py-4 hover:bg-gray-100 bg-opacity-20"
                    @mouseover="linkHover = true" @mouseleave="linkHover = false">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 bg-primary bg-opacity-20 text-primary px-1.5 py-0.5 rounded-full"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <div class="ml-3 text-sm">
                            <p class="font-bold text-gray-600 capitalize" :class=" linkHover ? 'text-primary' : ''">
                                Order
                                Completed</p>
                            <p class="text-xs">Your order is completed</p>
                        </div>
                    </div>
                    <span class="text-xs font-bold">
                        3 months ago
                    </span>
                </a>
                <!-- end::Submenu link -->
                <!-- start::Submenu link -->
                <a x-data="{ linkHover: false }" href="#"
                    class="flex items-center justify-between px-3 py-4 hover:bg-gray-100 bg-opacity-20"
                    @mouseover="linkHover = true" @mouseleave="linkHover = false">
                    <div class="flex items-center">
                        <img src="./assets/img/profile.jpg" class="w-8 rounded-full">
                        <div class="ml-3 text-sm">
                            <p class="font-bold text-gray-600 capitalize" :class=" linkHover ? 'text-primary' : ''">
                                Maria sent
                                you a message</p>
                            <p class="text-xs">Hey there, how are you do...</p>
                        </div>
                    </div>
                    <span class="text-xs font-bold">
                        10 months ago
                    </span>
                </a>
                <!-- end::Submenu link -->
            </div>
            <!-- end::Submenu content -->
        </div>

    </div>
</div>