<?php

namespace App\Http\Livewire\User\Commande;

use App\Models\Order;
use App\Models\PaimentMethod;
use App\Models\Transaction;
use Livewire\Component;
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

class CommandeCheckout extends Component
{

    public Order $order;
    public $products;
    public $totalPrice;
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

        $priceTotal = Session::has('cart') ? Session::get('cart') : null;









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


            // Enregistrer les informations de paiement dans la table "paiements"
            $payment = new Transaction();
            $payment->amount = $priceTotal?->totalPrice;
            $payment->payment_method = $this->identityPayment;
            $payment->payment_token = $paymentIntent->id;
            $payment->status = 'successfull';
            // $payment->transaction_id = 'mmmmmmmmmmm';

            $payment->save();


            // dd($payment);






            // Mettre à jour le statut de la commande dans la table "commandes"
            $orderToUpdate = Order::findOrFail($this->order->id);
            $orderToUpdate->status = 'completed';
            $orderToUpdate->transaction_id = $payment->id;
            // Lier la commande au paiement effectué
            $orderToUpdate->update();
            $orderToUpdate->notifyUser();


            //event(new ServiceOrdered($order));






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

    public function images()
    {

        $files = $this->order->service->files;
        // dd($files);
        foreach ($files as $key => $file) {
            $images = $file;
            break;
        }
        return $images;
    }
    public function render()
    {

        $this->products = $this->order->service;

        $this->totalPrice = $this->order->total_amount;
        return view('livewire.user.commande.commande-checkout', ['image' => $this->images()]);
    }
}
