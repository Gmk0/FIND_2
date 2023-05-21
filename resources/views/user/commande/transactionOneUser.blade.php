@extends('layouts.userProfile')

@section('content')

<div>
    <div>
        @include('include.breadcumbUser',['transation'=>'transaction','transationID'=>$Transaction->transaction_numero])
    </div>

    <section class="grid p-6 bg-white rounded-lg shadow dark:text-gray-200 lg:grid-cols-2">


        <div>
            <h2 class="mb-4 text-xl font-semibold">Récapitulatif de la transaction</h2>

            <div class="flex items-center mb-4">
                <span class="mr-2 text-gray-600 dark:text-gray-200">Numéro de transaction :</span>
                <span class="text-gray-900 dark:text-gray-100">{{ $Transaction->transaction_numero }}</span>
            </div>

            <div class="flex items-center mb-4">
                <span class="mr-2 text-gray-600 dark:text-gray-200">Montant :</span>
                <span class="text-gray-900 dark:text-gray-100">{{ $Transaction->amount }} €</span>
            </div>

            <div class="flex items-center mb-4">
                <span class="mr-2 text-gray-600 dark:text-gray-200">Méthode de paiement :</span>
                <span class="text-gray-900 dark:text-gray-100">{{ $Transaction->payment_method }}</span>
            </div>

            <div class="flex items-center mb-4">
                <span class="mr-2 text-gray-600 dark:text-gray-200">Statut :</span>
                <span class="text-gray-900 dark:text-green-600">{{ $Transaction->status }}</span>
            </div>

            <div class="mt-6">
                <a href="{{route('facturation', $Transaction->transaction_numero)}}"
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                    Imprimer la facture
                </a>
            </div>
        </div>
        <div class="p-6 bg-white rounded-lg shadow">

            <h2 class="mb-4 text-xl font-semibold">Service de commande</h2>

            @forelse ($Transaction->orders as $order)

            <div class="flex items-center mb-4">
                <span class="mr-2 text-gray-600 dark:text-gray-200">Numéro de commande :</span>
                <span class="text-gray-900 dark:text-gray-200">{{ $order->order_numero }}</span>
            </div>

            <div class="flex items-center mb-4">
                <span class="mr-2 text-gray-600 dark:text-gray-200">Date de commande :</span>
                <span class="text-gray-900 dark:text-gray-200">{{ $order->created_at }}</span>
            </div>

            <div class="flex items-center mb-4">
                <span class="mr-2 text-gray-600 dark:text-gray-200">Détails de la commande :</span>

            </div>
            @empty

            @endforelse




        </div>
    </section>
</div>


@endsection