<?php

namespace App\Http\Livewire\User\Projet;

use App\Models\PaimentMethod;
use App\Models\Project;
use App\Models\ProjectResponse;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\Stripe;

class CheckoutProjet extends Component
{

    public ProjectResponse $responses;

    public $product;
    public $telephone;
    public $name;
    public $payType = "MaxiCash";
    public $amount;
    public $currency = "maxiDollar";
    public $projetDetails;

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


    public function mount()
    {

        $this->projetDetails = Project::findOrFail($this->responses->project_id);

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


    public function pay()
    {


        //validation des inputs 

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

        //creation de l'adresse de facturation si elle existe pas

        $addesse = $this->addAddress();




        //Debut de la transaction de base de donnees 

        DB::beginTransaction();

        try {



            //initialisation de key stripe

            Stripe::setApiKey(env('STRIPE_KEY_SECRET'));

            //Everification si  le client existe dans chez stripe

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
                'description' => 'Paiement de la mission',
                'payment_method' => $paymentMethodId,
                'customer' => $customerId,
            ]);

            $paymentIntent->confirm();
            $paymentMethod = PaymentMethod::retrieve($paymentMethodId);
            $lastFour = $paymentMethod->card->last4;
            $brand = $paymentMethod->card->brand;

            $this->identityPayment = ['last4' => $lastFour, 'brand' => $brand];


            // Enregistrer les informations de paiement dans la table "paiements"
            $payment = new Transaction();
            $payment->amount = $this->responses->bid_amount;
            $payment->payment_method = $this->identityPayment;
            $payment->payment_token = $paymentIntent->id;
            $payment->status = 'successfull';
            // $payment->transaction_id = 'mmmmmmmmmmm';

            $payment->save();

            // Parcourir toutes les commandes pour les mettre à jour






            DB::commit();


            // Rediriger l'utilisateur vers une page de confirmation de paiement
            session()->flash('success', 'Paiement effectué avec succès!');

            $user = auth()->user();

            //$user->notify(new ServicePaid($payment));

            $this->dispatchBrowserEvent('success', [
                'message' => "Paiment reuissi"
            ]);




            return redirect()->route('ProjetCheckoutStatus', [$this->responses->id, $payment->transaction_numero],);
        } catch (\Exception $e) {
            // En cas d'erreur, annuler la transaction de base de données
            // DB::rollback();
            $this->dispatchBrowserEvent('error', [
                'message' => $e->getMessage()
            ]);
            // Retourner une réponse d'

            DB::rollback();
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


    function totalPrice()
    {
        $budget = $this->responses->getBudget();


        return $budget;
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
            "SuccessURL" =>  env('SuccessURLP'),
            "FailureURL" =>  env('FailureURLP'),
            "CancelURL" =>  env('CancelURLP'),


            // Ajouter d'autres données de requête nécessaires
        ];

        $this->identityPayment = ['last4' => '$telephone', 'brand' => 'MaxiCash'];

        $payment = new Transaction();
        $payment->amount = $this->totalPrice();
        $payment->payment_method = $this->identityPayment;
        $payment->payment_token = $reference;
        $payment->status = 'pending';
        $payment->save();


        $this->projetDetails->transaction_id = $payment->id;

        $this->projetDetails->upadte();





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
        return  $finalId = 'PR' . $uniqueId . $counter;
    }



    public function render()

    {

        return view('livewire.user.projet.checkout-projet', ['response' => $this->responses, 'project' => Project::findOrFail($this->responses->project_id)]);
    }
}
