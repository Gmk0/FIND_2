@extends('layouts.user')

@section('content')


<div class="flex flex-col items-center justify-center min-h-screen py-24">

    <div class="text-center bg-white rounded-md shadow-md ">
        <svg class="w-20 h-20 mx-auto mb-6 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-4.707-8.293a1 1 0 1 1 1.414 1.414l2.793 2.793 5.793-5.793a1 1 0 1 1 1.414 1.414l-6.5 6.5a1 1 0 0 1-1.414 0l-4.5-4.5z" />
        </svg>
        <h3 class="mb-4 text-xl font-semibold text-gray-800">Paiement réussi</h3>
        <div class="p-4 rounded-lg">

            <p class="mb-4 text-green-700">Votre paiement a été traité avec succès. Voici un récapitulatif de votre
                commande
                :
            </p>
            <ul class="mb-4">

                @foreach ($transaction->orders as $order)
                <li class="flex justify-between">
                    <span class="font-medium">Servie:{{$order->service->title}}</span>
                    <span>{{$order->total_amount}}</span>
                </li>
                @endforeach


            </ul>
            <p class="text-green-700">Nous vous remercions de votre achat et espérons vous revoir bientôt !</p>

            <div class="mt-8 space-x-4">
                <a href="{{route('facturation',$transaction->transaction_numero)}}"
                    class="px-4 py-2 font-semibold text-white bg-green-500 rounded-md hover:bg-green-600">Imprimer
                    facture</a>
                <a href="{{route('commandeUser')}}"
                    class="px-4 py-2 font-semibold text-white bg-gray-500 rounded-md hover:bg-gray-600">
                    voir l'evolution</a>
            </div>
        </div>




    </div>


</div>

@endsection
