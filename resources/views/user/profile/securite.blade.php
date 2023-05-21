@extends("layouts.userProfile")


@section('content')

<div class="min-h-screen pb-8 mb-4 ">




    <div class="container px-3 mx-auto lg:px-8">
        <h2 class="mb-8 text-xl font-semibold tracking-wide text-indigo-600 uppercase">Securite</h2>



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
