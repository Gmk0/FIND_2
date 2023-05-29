<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'dark': dark }" x-data="data()">

@include('include.head')

<body class="antialiased"
    x-data="{navOpen: false,notificationActive: false, loading: true,linkActive: false, scrolledFromTop: false}" :class="{
            'overflow-hidden': navOpen,
            'overflow-scroll': !navOpen

        }" x-init="$refs.loading.classList.add('hidden')">


    <div x-ref="loading"
        class="fixed inset-0 z-[200] flex items-center justify-center text-white bg-black bg-opacity-50"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
        Chargement.....
    </div>
    <div class="min-h-screen custom-scrollbar">
        @livewire('user.navigation.navigation-two')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main class="">
            {{ $slot }}
        </main>
    </div>




    @include('include.script')
</body>

</html>