@extends('layouts.user')

@section('content')


<div class="flex flex-col items-center justify-center h-screen">

    <x-validation-errors />


    @if(session('order'))


    <div class="p-8 text-center bg-white rounded-md shadow-md">
        <svg class="w-20 h-20 mx-auto mb-6 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-4.707-8.293a1 1 0 1 1 1.414 1.414l2.793 2.793 5.793-5.793a1 1 0 1 1 1.414 1.414l-6.5 6.5a1 1 0 0 1-1.414 0l-4.5-4.5z" />
        </svg>
        <h3 class="mb-4 text-xl font-semibold text-gray-800">Paiement confirmé</h3>
        <p class="text-gray-500">Votre paiement a été confirmé avec succès.</p>
        <div class="mt-8 space-x-4">
            <a href="{{route('facturation',session('order'))}}"
                class="px-4 py-2 font-semibold text-white bg-green-500 rounded-md hover:bg-green-600">Imprimer
                facture</a>
            <a href="{{route('commandeUser')}}"
                class="px-4 py-2 font-semibold text-white bg-gray-500 rounded-md hover:bg-gray-600">
                voir l'evolution</a>
        </div>
    </div>
    @endif

</div>

@endsection
