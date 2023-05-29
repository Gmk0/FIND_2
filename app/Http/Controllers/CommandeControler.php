<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Livewire;

class CommandeControler extends Controller
{
    //

    public function commandeOne($order_numero)
    {

        $validatedData = Validator::make(['order_numero' => $order_numero], [
            'order_numero' => 'string',
        ]);

        // Vérifier si la validation a échoué
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        // Récupérer l'objet Order correspondant à l'ID
        $data = Order::where('order_numero', $order_numero)->first();


        if (!empty($data) && $data->transaction != null) {
            // Retourner la vue avec les données $data
            return view('freelance.commandeView', ['commande' => $data]);
        } else {
            // Rediriger en arrière si les données sont inexistantes
            return redirect()->back();
        }
    }

    public function commandeUser($order_numero)
    {
        $validatedData = Validator::make(['order_numero' => $order_numero], [
            'order_numero' => 'string',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData);
        }

        $data = Order::where('order_numero', $order_numero)->first();

        if (!empty($data)) {
            // Retourner la vue avec les données $data
            return  view('user.commande.commandeOneUser', ['Order' => $data]);
        } else {
            // Rediriger en arrière si les données sont inexistantes
            return redirect()->back();
        }
    }


    public function commandeRepaye($order_numero)
    {
        $validatedData = Validator::make(['order_numero' => $order_numero], [
            'order_numero' => 'string',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData);
        }

        $data = Order::where('order_numero', $order_numero)->where('status', 'pending')->Orwhere('status', 'rejeted')->first();

        if (!empty($data)) {
            // Retourner la vue avec les données $data
            return  view('user.commande.commandePending', ['order' => $data]);
        } else {
            // Rediriger en arrière si les données sont inexistantes
            return redirect()->back();
        }
    }

    public function TransactionUser($transaction_numero)
    {
        $validatedData = Validator::make(['order_numero' => $transaction_numero], [
            'order_numero' => 'string',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData);
        }

        $data = Transaction::where('transaction_numero', $transaction_numero)->first();

        if (!empty($data)) {
            // Retourner la vue avec les données $data
            return  view('user.commande.TransactionOneUser', ['Transaction' => $data]);
        } else {
            // Rediriger en arrière si les données sont inexistantes
            return redirect()->back();
        }
    }

    public function TransactionOneFreelance($transaction_numero)
    {

        $validatedData = Validator::make(['order_numero' => $transaction_numero], [
            'order_numero' => 'string',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData);
        }


        $data = Transaction::where('transaction_numero', $transaction_numero)->first();

        if (!empty($data)) {
            // Retourner la vue avec les données $data
            return  view('freelance.TransactionView', ['Transaction' => $data]);
        } else {
            // Rediriger en arrière si les données sont inexistantes
            return redirect()->back();
        }
    }
}
