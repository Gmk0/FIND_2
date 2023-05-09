@extends("layouts.userProfile")


@section('content')

<div class="h-full custom-scrollbar">

    <div>
        @include('include.breadcumbUser',['profile'=>'profile'])
    </div>


    <div class="container w-full h-screen px-3 py-8 mx-auto max-w-7xl lg:px-8">
        <h2 class="mb-8 text-xl font-semibold tracking-wide text-indigo-600 uppercase">Profile</h2>
        @if (Auth::user()->freelance()->exists())
        <div class="mb-4">
            <x-action-section>
                <x-slot name="title">
                    {{ __('Tableau Freelancer') }}
                </x-slot>

                <x-slot name="description">
                    {{ __("Accedez a la partie Freelancer.") }}
                </x-slot>

                <x-slot name="content">

                    <div class="col-span-6 sm:col-span-4">
                        <x-button href="{{route('freelance.dashboard')}}" label=" Acceder Au Tableau Freelancer" />
                    </div>

                </x-slot>
            </x-action-section>
        </div>
        @endif
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
        @livewire('profile.update-profile-information-form')

        <x-section-border />
        @endif





    </div>




</div>

@endsection
