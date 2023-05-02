@extends("layouts.userProfile")


@section('content')

<div class="min-h-screen  ">




    <div class="container mx-auto px-3 lg:px-8">
        <h2 class="text-xl text-indigo-600 mb-8 font-semibold tracking-wide uppercase">Securite</h2>



        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
        <div class="mt-10 sm:mt-0">
            @livewire('profile.update-password-form')
        </div>

        <x-section-border />
        @endif
        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
        <div class="mt-10 sm:mt-0">
            @livewire('profile.two-factor-authentication-form')
        </div>

        <x-section-border />
        @endif



        <div class="mt-10 sm:mt-0">
            @livewire('profile.logout-other-browser-sessions-form')
        </div>


    </div>




</div>

@endsection