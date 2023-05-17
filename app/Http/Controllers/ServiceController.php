<?php

namespace App\Http\Controllers;

use App\Events\ServiceOrdered;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\FeedbackService;
use App\Models\Service;
use App\Models\Freelance;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{



    public function services()
    {

        $category = Category::all();

        $servicesBest = Service::limit(20)->where('is_publish', true)->get();

        $freelance = Freelance::paginate(20);

        $services = Service::where('is_publish', true)->orderBy('basic_price', 'Asc')->paginate(8);



        return view('user.services', [
            'categories' => $category,
            'servicesBest' => $servicesBest,
            'freelances' => $freelance,
            'services' => $services,
        ]);
    }

    public function categories()
    {
        $category = Category::all();


        return view('user.category', [
            'categories' => $category
        ]);
    }

    public function categoryByName(Request $request)
    {

        $category = $request->route('category');


        return view('user.servicesByCategory', [
            'category' => $category
        ]);
    }

    public function checkout()
    {
        // Récupérer les données de la requête de confirmation de paiement
        $status = request('status');
        $reference = request('reference');
        $method = request('Method');
        // Ajouter d'autres paramètres de la requête que vous souhaitez traiter

        // Vérifier le statut de paiement
        if ($status === 'failed') {
            // Le paiement a échoué, vous pouvez effectuer les actions nécessaires ici
            // par exemple, afficher un message d'erreur, enregistrer le statut du paiement dans la base de données, etc.

            // Rediriger vers une page d'échec
            return redirect()->route('checkout')->withErrors(['message' => 'Une erreur s\'est produite.']);
        } else if ($status === "success") {


            $cart = Session::has('cart') ? Session::get('cart') : null;

            //dd($cart->items);

            $datas = $this->saveService();
            //dd($datas);
            DB::beginTransaction();

            try {
                // Créer une transaction Stripe pour le montant total payé
                //$stripeTransaction = Stripe::createTransaction($paymentData['total_amount']);

                // Enregistrer les informations de paiement dans la table "paiements"
                $payment = new Transaction();
                $payment->amount = $cart->totalPrice;
                $payment->payment_method = $method;
                $payment->payment_token = $reference;
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
                // return view('status.success', ['order' => $payment->transaction_numero]);
                return redirect()->route('status_payement')->with('order', $payment);
                //return response()->json(['success' => 'Paiement traité avec succès']);
            } catch (\Exception $e) {
                // En cas d'erreur, annuler la transaction de base de données
                DB::rollback();
                // Retourner une réponse d'erreur

                // return view('facture.facture', ['order' => $payment->transaction_numero]);

                return response()->json(['error' => $e->getMessage()], 500);
            }



            // Le statut de paiement est inconnu ou ne nécessite aucune action particulière
            // Vous pouvez ajouter d'autres conditions de traitement en fonction de vos besoins

            // Rediriger vers une page par défaut
            return redirect()->route('checkout')->withErrors(['message' => 'Une erreur s\'est produite.']);
        } else {
            return redirect()->route('checkout')->withErrors(['message' => 'Une erreur s\'est produite.']);
        }
    }


    function saveService()
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
                $feedback = FeedbackService::create(['order_id' => $order->id]);
            }

            DB::commit();

            return $datas;
        } catch (\Exception $e) {
            // En cas d'erreur, annuler la transaction de base de données
            DB::rollback();
            // Retourner une réponse d'erreur

            //$this->dispatchBrowserEvent('success', ['message' => $e->getMessage()]);

            // return response()->json(['error' => $e->getMessage()], 500);
        };
    }
}
