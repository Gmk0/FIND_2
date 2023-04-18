@extends('layouts.user')

@section('content')


<div class="flex flex-col items-center justify-center h-screen">

    <x-validation-errors />


    @if(session('order'))


    <div class="bg-white rounded-md p-8 shadow-md text-center">
        <svg class="h-20 w-20 text-green-500 mx-auto mb-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-4.707-8.293a1 1 0 1 1 1.414 1.414l2.793 2.793 5.793-5.793a1 1 0 1 1 1.414 1.414l-6.5 6.5a1 1 0 0 1-1.414 0l-4.5-4.5z" />
        </svg>
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Paiement confirmé</h3>
        <p class="text-gray-500">Votre paiement a été confirmé avec succès.</p>
        <div class="mt-8 space-x-4">
            <a href="{{route('facturation',session('order'))}}"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md">Imprimer
                facture</a>
            <a href="#" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-md">Retour à
                l'accueil</a>
        </div>
    </div>
    @endif

</div>

@endsection
