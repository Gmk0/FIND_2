<?php

namespace App\Http\Livewire\User\Services;

use Livewire\Component;
use App\Tools\Cart;
use App\Models\Order;
use App\Models\Transaction;
use App\Events\ServiceOrdered;
use App\Models\feedback;
use App\Models\FeedbackService;
use App\Models\Like;
use App\Models\PaimentMethod;
use App\Notifications\ServicePaid;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Stripe\Stripe;
use Stripe\Token;
use Stripe\charge;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;


class Checkout extends Component
{
    public $product;
    public $telephone;
    public $name;
    public $payType = "MaxiCash";
    public $amount;
    public $currency = "maxiDollar";
    public $isLiked = false;
    public $errorMessage;
    public $methodePaiment;
    public $priceTotal = null;
    public $identityPayment = null;
    public $address = [
        'rue' => '',
        'commune' => '',
        'quartier' => '',
        'ville' => '',
    ];
    public $card = [
        'cardName' => '',
        'cardNumber' => '4242424242424242',
        'cardExpiryMonth' => '02',
        'cardExpiryYear' => '2024',
        'cardCvc' => '123',
    ];

    protected $listeners = ['refreshComponent' => '$refresh', 'refreshCheckout' => '$refresh'];



    public function mount()
    {

        $this->methodePaiment = PaimentMethod::where('user_id', auth()->id())->first();

        if (isset($this->methodePaiment->addresse) && $this->methodePaiment->addresse != null) {

            $this->address = [
                'rue' => $this->methodePaiment->addresse['rue'],
                'commune' =>
                $this->methodePaiment->addresse['commune'],
                'quartier' =>
                $this->methodePaiment->addresse['quartier'],
                'ville' =>
                $this->methodePaiment->addresse['ville'],

            ];
        }
    }

    function totalPrice()
    {
        $priceTotal = Session::has('cart') ? Session::get('cart') : null;

        return $priceTotal?->totalPrice * 100;
    }

    public function updateQty($id, $qty)
    {



        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($oldCart);


        $cart->updateQty($id, $qty);

        Session::put('cart', $cart);
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




    public function render()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $this->products = $cart->items;
        $this->priceTotal = $this->totalPrice() / 100;

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
                $feedback = FeedbackService::create(['order_id' => $order->id]);
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




        // Récupérer les valeurs des propriétés du composant
        $payType = $this->payType;
        $amount = $this->totalPrice();
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
        $url = 'https://api-testbed.maxicashapp.com/PayEntry?data=' . urlencode(json_encode($requestData));

        // Effectuer la redirecti
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



    public function createToken()
    {
        $card = [
            'number' => $this->card['cardNumber'],
            'exp_month' => $this->card['cardExpiryMonth'],
            'exp_year' => $this->card['cardExpiryYear'],
            'cvc' => $this->card['cardCvc'],
            'name' => $this->card['cardName'],
        ];

        $token = Token::create([
            'card' => $card,
        ]);

        return $token->id;
    }





    public function pay()
    {
        $this->validate([
            'card.cardName' => 'required',
            'card.cardNumber' => 'required',
            'card.cardExpiryMonth' => 'required',
            'card.cardExpiryYear' => 'required',
            'card.cardCvc' => 'required',
            'address.rue' => 'required',
            'address.ville' => 'required',
            'address.commune' => 'required',
        ]);


        $addesse = $this->addAddress();





        DB::beginTransaction();

        try {


            Stripe::setApiKey(env('STRIPE_KEY_SECRET'));


            $existingCustomers = Customer::all(['email' => auth()->user()->email]);

            if ($existingCustomers->count() === 0) {
                $customer = Customer::create([
                    'email' => auth()->user()->email,
                    'name' => auth()->user()->name,
                    'phone' => auth()->user()->phone,
                    // Autres détails du client
                ]);
                $customerId = $customer->id;
            } else {
                $customerId = $existingCustomers->data[0]->id;
            }

            $existingPaymentMethods = PaymentMethod::all([
                'customer' => $customerId,
                'type' => 'card',
            ]);

            $desiredPaymentMethod = $this->card['cardNumber']; // ou toute autre valeur pour identifier la méthode de paiement souhaitée

            $paymentMethodExists = false;
            $paymentMethodId = '';

            foreach ($existingPaymentMethods->data as $paymentMethod) {
                if ($paymentMethod->card->last4 === $desiredPaymentMethod) {
                    $paymentMethodExists = true;
                    $paymentMethodId = $paymentMethod->id;
                    break;
                }
            }

            if ($paymentMethodExists) {

                // La méthode de paiement existe déjà
            } else {
                // La méthode de paiement n'existe pas encore
                // Vous pouvez créer une nouvelle méthode de paiement et l'attacher au client
                $paymentMethod = PaymentMethod::create([
                    'type' => 'card',
                    'card' => [
                        'number' => $this->card['cardNumber'],
                        'exp_month' => $this->card['cardExpiryMonth'],
                        'exp_year' => $this->card['cardExpiryYear'],
                        'cvc' => $this->card['cardCvc'],
                    ],
                ]);
                $paymentMethod->attach(['customer' => $customerId]);
                $paymentMethodId = $paymentMethod->id;
            }

            $paymentIntent = PaymentIntent::create([
                'amount' => $this->totalPrice(),
                'currency' => 'usd',
                'description' => 'Paiement de service',
                'payment_method' => $paymentMethodId,
                'customer' => $customerId,
            ]);

            $paymentIntent->confirm();
            $paymentMethod = PaymentMethod::retrieve($paymentMethodId);
            $lastFour = $paymentMethod->card->last4;
            $brand = $paymentMethod->card->brand;

            $this->identityPayment = ['last4' => $lastFour, 'brand' => $brand];
            $datas = $this->saveService();

            // Enregistrer les informations de paiement dans la table "paiements"
            $payment = new transaction();
            $payment->amount = $this->totalPrice();
            $payment->payment_method = $this->identityPayment;
            $payment->payment_token = $paymentIntent->id;
            $payment->status = 'successfull';
            // $payment->transaction_id = 'mmmmmmmmmmm';

            $payment->save();

            // Parcourir toutes les commandes pour les mettre à jour
            foreach ($datas as $order) {

                // Mettre à jour le statut de la commande dans la table "commandes"
                $orderToUpdate = Order::findOrFail($order->id);
                $orderToUpdate->status = 'completed';
                $orderToUpdate->transaction_id = $payment->id;
                // Lier la commande au paiement effectué
                $orderToUpdate->save();
                $orderToUpdate->notifyUser();


                //event(new ServiceOrdered($order));
            }





            DB::commit();


            // Rediriger l'utilisateur vers une page de confirmation de paiement
            session()->flash('success', 'Paiement effectué avec succès!');

            $user = auth()->user();

            //$user->notify(new ServicePaid($payment));

            Session::forget('cart');

            return redirect()->route('status_payement', $payment->transaction_numero);
        } catch (\Exception $e) {
            // En cas d'erreur, annuler la transaction de base de données
            DB::rollback();
            $this->dispatchBrowserEvent('error', [
                'message' => $e->getMessage()
            ]);
            // Retourner une réponse d'erreur

        } catch (\Stripe\Exception\CardException $e) {
            // Gérer l'erreur liée à la carte de crédit
            DB::rollback();


            $this->dispatchBrowserEvent('error', [
                'message' => $e->getMessage()
            ]);
        } catch (\Stripe\Exception\RateLimitException $e) {
            // Gérer l'erreur liée à la limite de taux
            DB::rollback();
            $this->dispatchBrowserEvent('error', [
                'message' => $e->getMessage()
            ]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Gérer l'erreur liée à une requête invalide
            DB::rollback();
            $this->dispatchBrowserEvent('error', [
                'message' => $e->getMessage()
            ]);
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Gérer l'erreur liée à une authentification invalide
            DB::rollback();
            $this->dispatchBrowserEvent('error', [
                'message' => $e->getMessage()
            ]);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Gérer l'erreur liée à une connexion API
            DB::rollback();
            $this->dispatchBrowserEvent('error', [
                'message' => $e->getMessage()
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Gérer toutes les autres erreurs API
            DB::rollback();
            $this->dispatchBrowserEvent('error', [
                'message' => $e->getMessage()
            ]);
        }
    }

    public function addAddress()
    {

        if (isset($this->methodePaiment->addresse) && $this->methodePaiment->addresse != null) {
        } else {

            $NewData = new PaimentMethod();

            $NewData->addresse = $this->address;
            $NewData->save();
        }
    }
}
