<aside x-show="isAside"
    class="z-20 flex-shrink-0 hidden   h-screen overflow-y-auto bg-white custom-scrollbar dark:bg-gray-800 md:block">
    <div class="py-4 text-gray-500 dark:text-gray-400 custom-scrollbar">
        <h1 class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">

            <a href="{{url('/')}}">
                <img src="/images/logo/find_02.png" alt="logo-find" class="h-12 ">
            </a>
        </h1>
        <ul class="mt-6">
            <li class="relative px-6 py-3">

                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="">

                    <span class="ml-4">Utilisateur</span>
                </a>
            </li>
        </ul>


        <div class="px-6 my-6">


            <x-asideUserLink />

        </div>
    </div>
</aside>
<!-- Mobile sidebar -->
<!-- Backdrop -->
<div x-cloak x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">


    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <h1 class="mt-8 ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                <a href="{{url('/')}}">
                    <img src="/images/logo/find_02.png" alt="logo-find" class="h-12 ">
                </a>
            </h1>
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="index.html">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
            </ul>

            <div class="px-6 my-6">
                <x-asideUserLink />
            </div>
        </div>
    </aside>
</div>