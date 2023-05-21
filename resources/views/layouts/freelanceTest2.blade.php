<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'dark': dark }" x-data="data()">

@include('include.head')


<body class="antialiased text-gray-900 bg-white">
    <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()"
        x-init="$refs.loading.classList.add('hidden')">

        <x-notifications z-index="z-50" position='top-right' />
        <!-- Loading screen -->
        <div x-ref="loading"
            class="fixed inset-0 z-[200] flex items-center justify-center text-white bg-black bg-opacity-50"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
            Chargement.....
        </div>
        <!-- Sidebar backdrop -->
        <div x-show.in.out.opacity="isSidebarOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"></div>
        <!-- Sidebar -->
        <x-asideF />

        <div class="flex flex-col flex-1 h-full overflow-hidden bg-gray-100 dark:bg-gray-900">

            @livewire('freelance.dashboard.header-freelance')

            <!-- Main content -->
            <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll custom-scrollbar">
                <!-- Main content header -->



                @yield('content')

            </main>


            @if(request()->routeIs('freelance.messages'))



            @else

            <footer class="bottom-0 text-center text-white bg-gray-300 dark:bg-gray-800" style="">


                <!--Copyright section-->
                <div class="p-1 text-sm text-center text-gray-800">
                    © 2023 Copyright:
                    <a class="text-white" href="{{url('/')}}">FIND</a>
                </div>
            </footer>

            @endif
            <!-- Main footer -->

        </div>
        <!-- Setting panel button -->
        <div>
            <button @click="isSettingsPanelOpen = true"
                class="fixed right-0 hidden px-4 py-2 text-sm font-medium text-white uppercase transform rotate-90 translate-x-8 bg-gray-600 top-1/2 rounded-b-md">
                Settings
            </button>
        </div>

        <!-- Settings panel -->
        <div x-show="isSettingsPanelOpen" @click.away="isSettingsPanelOpen = false"
            x-transition:enter="transition transform duration-300"
            x-transition:enter-start="translate-x-full opacity-30  ease-in"
            x-transition:enter-end="translate-x-0 opacity-100 ease-out"
            x-transition:leave="transition transform duration-300"
            x-transition:leave-start="translate-x-0 opacity-100 ease-out"
            x-transition:leave-end="translate-x-full opacity-0 ease-in"
            class="fixed inset-y-0 right-0 flex flex-col bg-white shadow-lg bg-opacity-20 w-80"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
            <div class="flex items-center justify-between flex-shrink-0 p-2">
                <h6 class="p-2 text-gray-800">Notification</h6>
                <button @click="isSettingsPanelOpen = false" class="p-2 rounded-md focus:outline-none focus:ring">
                    <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 max-h-full p-4 overflow-hidden overflow-y-auto">
                <span></span>

                @livewire("user.navigation.notification-freelance")
                <!-- Settings Panel Content ... -->
            </div>
        </div>
    </div>
    <script src="assets/js/vendor/Chart.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        const setup = () => {
        return {
          loading: true,
          isSidebarOpen: false,
          toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
          },
          isSettingsPanelOpen: false,
          isSearchBoxOpen: false,
        }
      };

      function scrollToReveal() {
    return {
            sticky: false,
            lastPos: window.scrollY + 0,
            scroll() {
            this.sticky = window.scrollY > this.$refs.navbar.offsetHeight && this.lastPos > window.scrollY;
            this.lastPos = window.scrollY;
            }
    }
    }
    </script>






    @livewire('livewire-ui-spotlight')


    @include('include.script')
</body>

</html>