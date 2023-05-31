<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'dark': dark }" x-data="data()">

@include('include.head')






<body x-data="setup()" id="body" class="bg-gray-100 dark:bg-gray-900 custom-scrollbar" x-init="$refs.loading.classList.add('hidden');
    setTimeout(() => { isSidebarOpen = false }, 1000); ">

    <x-notifications position='top-right' />
    <!-- Loading screen -->
    <div x-ref="loading"
        class="fixed inset-0 z-[200] flex items-center justify-center text-white bg-black bg-opacity-50"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
        Chargement.....
    </div>

    @livewire('freelance.dashboard.header-freelance')



    <x-asideF />



    <div x-bind:class="isSidebarOpen? ' lg:ml-64':'lg:ml-20'" class="p-4">


        <main class="mt-14">

            {{ $slot }}

        </main>

        <x-footerProfile />


    </div>













    <script>
        const setup = () => {
                return {
                  loading: true,
                  isSidebarOpen: true,
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


    @if($errors->has('requete'))
    <script>
        setTimeout(function() {
        Swal.fire({
      title: "Erreur de validation",
    text: "La requête envoyée n\'est pas valide",
    icon: "error"
        });
        }, 2000); // Temps
    </script>
    @endif


    <script>
        window.addEventListener('error', event=> {
        Swal.fire({
        // position: 'top-end',
        icon:'error',
        //toast: true,
        title:"operation echoueé",
        text:event.detail.message,
        showConfirmButton: true,

        timer:5000

        })

        });
    </script>


    @livewire('livewire-ui-spotlight')


    @include('include.script')
</body>

</html>