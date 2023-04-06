<?php

namespace App\Http\Livewire\User\Services;

use Livewire\Component;
use App\Tools\Cart;
use App\Models\Order;
use App\Models\transaction;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Checkout extends Component
{
    public $product;
    public function mount()
    {
    }

    public function payer()
    {

        $cart = Session::has('cart') ? Session::get('cart') : null;

        //dd($cart->items);
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
            }

            // Valider et terminer la transaction de base de données
            DB::commit();

            // Retourner une réponse de succès
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
