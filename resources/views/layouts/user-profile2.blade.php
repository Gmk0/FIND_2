<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'dark': dark }" x-data="data()">

@include('include.head')






<body x-data="setup()" x-init="$refs.loading.classList.add('hidden');" @resize.window="watchScreen()" id="body"
    class="bg-white dark:bg-gray-900 custom-scrollbar">

    <x-notifications z-index="z-60" position='bottom-right' />

    <div x-ref="loading" class="fixed inset-0 z-[200] flex s-center justify-center text-white bg-black bg-opacity-50"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
        Chargement.....





    </div>
    @if ($errors->any())




    <div id="toast-warning"
        class="flex fixed top-5 right-0 items-center w-full max-w-xs p-4 z-50 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
        role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Warning icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach.

            </ul>
        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            data-dismiss-target="#toast-warning" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    @endif



    @livewire('user.navigation.header-user')




    <main class="px-4 pt-20 bg-gray-50 dark:bg-gray-900">
        {{ $slot }}
    </main>

    <footer class="px-4 py-6 md:flex md:s-center md:justify-between 2xl:px-0 md:py-10">
        <p class="mb-4 text-sm text-center text-gray-500 md:mb-0">
            &copy; 2022 <a href="" class="hover:underline" target="_blank">FIND</a>. All rights reserved.
        </p>
        <ul class="flex flex-wrap s-center justify-center">
            <li><a href="{{url('/terms-of-service')}}"
                    class="mr-4 text-sm font-normal text-gray-500 hover:underline md:mr-6 dark:text-gray-400">Terms</a>
            </li>
            <li><a href="{{url('/policy')}}"
                    class="mr-4 text-sm font-normal text-gray-500 hover:underline md:mr-6 dark:text-gray-400">Policy</a>
            </li>
            <li><a href="#"
                    class="mr-4 text-sm font-normal text-gray-500 hover:underline md:mr-6 dark:text-gray-400">Cookie
                    Policy</a></li>
            <li><a href="{{url('/contact')}}"
                    class="text-sm font-normal text-gray-500 hover:underline dark:text-gray-400">Contact</a>
            </li>
        </ul>
    </footer>


    <script>
        const setup = () => {
                return {
                  isSidebarOpen: false,
                  currentSidebarTab: null,
                  isNotificatication: false,
                  isSubHeaderOpen: false,
                  watchScreen() {
                    if (window.innerWidth <= 1024) {
                      this.isSidebarOpen = false
                    }
                  },
                }
              }
    </script>



    @include('include.script')
</body>

</html>