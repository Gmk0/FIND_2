<?php

namespace App\Http\Livewire\User\Services;

use Livewire\Component;
use App\Tools\Cart;
use App\Models\Order;
use App\Models\transaction;
use App\Events\ServiceOrdered;
use App\Models\feedback;
use App\Models\Like;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Checkout extends Component
{
    public $product;
    public $telephone;
    public $name;
    public $payType = "MaxiCash";
    public $amount;
    public $currency = "maxiDollar";
    public $isLiked = false;

    public function mount()
    {
    }

    public function remove($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
            return redirect()->route('services');
        }
    }

    public function addFavorites($serviceId)
    {
        $favorite = Like::where('user_id', auth()->id())
            ->where('service_id', $serviceId)
            ->first();

        if ($favorite) {
            $favorite->delete();
        } else {
            Like::create([
                'user_id' => auth()->id(),
                'service_id' => $serviceId,
            ]);
        }
    }

    public function payers()
    {



        $cart = Session::has('cart') ? Session::get('cart') : null;

        //dd($cart->items);

        $datas = $this->saveService();
        //dd($datas);
        DB::beginTransaction();

        try {
            // Créer une transaction Stripe pour le montant total payé
            //$stripeTransaction = Stripe::createTransaction($paymentData['total_amount']);

            // Enregistrer les informations de paiement dans la table "paiements"
            $payment = new transaction();
            $payment->amount = $cart->totalPrice;
            $payment->payment_method = "cart";
            $payment->payment_token = "dddddddd";
            $payment->status = 'successfull';
            // $payment->transaction_id = 'mmmmmmmmmmm';

            $payment->save();

            // Parcourir toutes les commandes pour les mettre à jour
            foreach ($datas as $order) {

                // Mettre à jour le statut de la commande dans la table "commandes"
                $orderToUpdate = Order::findOrFail($order->id);
                $orderToUpdate->status = 'completed';
                $orderToUpdate->transaction_id = $payment->id; // Lier la commande au paiement effectué
                $orderToUpdate->save();

                event(new ServiceOrdered($order));
            }

            // Valider et terminer la transaction de base de données
            DB::commit();

            // Retourner une réponse de succès
            Session::forget('cart');
            $this->dispatchBrowserEvent('success', ['message' => 'le service a ete ajouté']);

            //return response()->json(['success' => 'Paiement traité avec succès']);
        } catch (\Exception $e) {
            // En cas d'erreur, annuler la transaction de base de données
            DB::rollback();
            // Retourner une réponse d'erreur

            $this->dispatchBrowserEvent('success', ['message' => $e->getMessage()]);

            // return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function render()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $this->products = $cart->items;

        return view('livewire.user.services.checkout')->extends('layouts.user')->section('content');
    }


    public function saveService()
    {

        $cart = Session::has('cart') ? Session::get('cart') : null;


        DB::beginTransaction();
        try {

            foreach ($cart->items as $key => $value) {
                $data = [
                    'service_id' => $key,
                    'user_id' => auth()->user()->id,
                    'total_amount' => $value['basic_price'] * $value['quantity'],
                    'quantity' => $value['quantity'],
                    'type' => 'service',

                ];
                $datas[] = Order::create($data);
            }

            foreach ($datas as $order) {
                $feedback = feedback::create(['order_id' => $order->id]);
            }

            DB::commit();

            return $datas;
        } catch (\Exception $e) {
            // En cas d'erreur, annuler la transaction de base de données
            DB::rollback();
            // Retourner une réponse d'erreur

            $this->dispatchBrowserEvent('success', ['message' => $e->getMessage()]);

            // return response()->json(['error' => $e->getMessage()], 500);
        };
    }


    public function checkoutmaxi()
    {
        $this->validate([
            'telephone' => 'required',
            'name' => 'required'
        ]);

        $cart = Session::has('cart') ? Session::get('cart') : null;


        // Récupérer les valeurs des propriétés du composant
        $payType = $this->payType;
        $amount = $cart->totalPrice * 100;
        $currency = $this->currency;
        $telephone = $this->telephone;
        $reference = $this->references();

        // Construire les données de la requête
        $requestData = [
            'PayType' => $payType,
            'MerchantID' => env('MerchantID', "4930750f63334559967e9f7335b3862d"),
            'MerchantPassword' => env('MerchantPassword', "99d90bd5d1184f5096dabf62f6b59a07"),
            'Amount' => $amount,
            'Currency' => $currency,
            'Telephone' => $telephone,
            'Language' => 'fr',
            "Reference" => $reference,
            "SuccessURL" =>  env('SuccessURL'),
            "FailureURL" =>  env('FailureURL'),
            "CancelURL" =>  env('CancelURL'),

            // Ajouter d'autres données de requête nécessaires
        ];



        // Envoyer la requête HTTP avec les données du formulaire
        // Construire les données de la requête


        // Construire l'URL de redirection avec les données du formulaire
        $url = 'https://api-testbed.maxicashapp.com/PayEntry?data=' . json_encode($requestData);

        // Effectuer la redirection
        dd($url);
        return redirect($url);
    }


    function references()
    {
        // Générer une chaîne aléatoire unique de 16 caractères
        $randomString = uniqid();

        // Extraire les 8 premiers caractères de la chaîne aléatoire pour obtenir l'ID unique de 8 caractères
        $uniqueId = substr($randomString, 0, 8);

        // Compteur pour incrémenter la fin de l'ID unique
        $counter = DB::table('transactions')->count() + 1;

        // Concaténer le compteur à la fin de l'ID unique
        return  $finalId = 'PM' . $uniqueId . $counter;
    }


    /*  public function effectuerPaiementGroupé(Request $request)
    {
        // Récupérer les données de paiement pour toutes les commandes depuis la requête
        $donneesCommandes = $request->input('commandes');

        // Calculer le montant total des commandes
        $montantTotal = 0;
        foreach ($donneesCommandes as $donneesCommande) {
            $montantTotal += $donneesCommande['montant'];
        }

        // Débuter une transaction de base de données
        DB::beginTransaction();

        try {
            // Configurer la clé secrète de l'API Stripe
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            // Créer une charge de paiement avec Stripe pour le montant total
            $charge = Charge::create([
                'amount' => $montantTotal,
                'currency' => 'eur', // Remplacez par la devise souhaitée
                'description' => 'Paiement de commandes groupées', // Remplacez par une description appropriée
                'source' => $donneesCommandes[0]['token'], // Utiliser le token de paiement de la première commande
            ]);

            // Traiter le paiement des commandes groupées avec succès

            // Enregistrer les informations de paiement dans la table "paiements"
            foreach ($donneesCommandes as $donneesCommande) {
                $paiement = new Paiement();
                $paiement->commande_id = $donneesCommande['commande_id']; // ID de la commande
                $paiement->montant = $donneesCommande['montant']; // Montant du paiement
                $paiement->transaction_id = $charge->id; // ID de la transaction Stripe
                $paiement->save();

                // Mettre à jour le statut de la commande dans la table "commandes"
                $commande = Commande::find($donneesCommande['commande_id']);
                $commande->statut = 'payé'; // Mettre à jour le statut de la commande
                $commande->save();
            }

            // Commiter la transaction de base de données
            DB::commit();

            // Vous pouvez également effectuer d'autres actions ici, comme créer des enregistrements dans votre base de données pour enregistrer les paiements effectués, envoyer des notifications par e-mail, etc.

            // Retourner une réponse de succès
            return response()->json(['message' => 'Paiement des commandes groupées effectué avec succès!']);
        } catch (\Stripe\Exception\CardException $e) {
            // Gérer les erreurs de carte de crédit
            // Annuler la transaction de base de données
            DB::rollback();
            // Retourner une réponse d'erreur
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (\Exception $e) {
            // Gérer les autres erreurs
            // Annuler la
            DB::rollback();
            // Retourner une réponse d'erreur
            return response()->json(['error' => $e->getMessage()], 500);
        }
    } */

    /*
    // Dans votre méthode de contrôleur pour le traitement du paiement
    public function processPayment(Request $request)
    {
        // Récupérer les données de paiement depuis la requête
        $paymentData = $request->input('payment_data');

        // Valider les données de paiement et effectuer les vérifications nécessaires

        // Débuter une transaction de base de données
        DB::beginTransaction();

        try {
            // Créer une transaction Stripe pour le montant total payé
            $stripeTransaction = Stripe::createTransaction($paymentData['total_amount']);

            // Enregistrer les informations de paiement dans la table "paiements"
            $payment = new Paiement();
            $payment->montant = $paymentData['total_amount'];
            $payment->transaction_id = $stripeTransaction->id;
            $payment->save();

            // Parcourir toutes les commandes pour les mettre à jour
            foreach ($paymentData['orders'] as $order) {
                // Mettre à jour le statut de la commande dans la table "commandes"
                $orderToUpdate = Commande::findOrFail($order['id']);
                $orderToUpdate->statut = 'payée';
                $orderToUpdate->paiement_id = $payment->id; // Lier la commande au paiement effectué
                $orderToUpdate->save();
            }

            // Valider et terminer la transaction de base de données
            DB::commit();

            // Retourner une réponse de succès
            return response()->json(['success' => 'Paiement traité avec succès']);
        } catch (\Exception $e) {
            // En cas d'erreur, annuler la transaction de base de données
            DB::rollback();
            // Retourner une réponse d'erreur
            return response()->json(['error' => $e->getMessage()], 500);
        }
     }
      */
}