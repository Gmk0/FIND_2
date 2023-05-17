<?php

namespace App\Http\Livewire\User\Services;

use App\Models\Conversation;
use App\Models\feedback;
use App\Models\FeedbackService;
use App\Models\Like;
use App\Models\Message;
use App\Models\Service;
use App\Models\User;
use App\Notifications\ServicePaid;
use App\Notifications\testNotify;
use Livewire\Component;
use App\Tools\Cart;
use Illuminate\Support\Facades\Session;
use Pusher\PushNotifications\PushNotifications;
use WireUi\Actions\Notification;
use WireUi\Traits\Actions;


class ServicesViewOne extends Component
{

    use Actions;
    public $service;
    public $images;
    public $products;
    public $servicesOther = null;
    public $commentaires = null;
    public function mount($id)
    {

        $this->service = Service::find($id);
        // dd($this->service->averageFeedback());
        $this->images = $this->images();
        // dd($this->images);
        $this->commentaires = FeedbackService::whereHas('Order', function ($query) {
            $query->whereHas('service', function ($q) {
                $q->where('id', $this->service->id);
            });
        })->where('is_publish', 1)->get();



        $this->servicesOther = $this->GetOther();
    }


    public function GetOther()
    {
        $subCategorie = $this->service->Sub_categorie;


        //dd($subCategorie);

        if (!empty($subCategorie)) {
            $sousCategorie = $subCategorie;

            $services = Service::where('Sub_categorie', 'like', '%' . $sousCategorie . '%')
                ->whereNotIn('id', [$this->service->id])
                ->limit(5)->get();
        } else {
            $services = Service::where('category_id', $this->service->category_id)
                ->whereNotIn('id', [$this->service->id])
                ->limit(5)->get();
        }
        //dd($sousCategorie);




        return $services;
    }

    public function images()
    {

        $files = $this->service->files;
        // dd($files);
        foreach ($files as $key => $file) {
            $images = $file;
            break;
        }
        return $images;
    }

    public function toogleFavorite($serviceId)
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

            $this->notification()->success(
                $title = "le Service a ete ajouté au favoris",

            );
        }
    }



    public function contacter()
    {
        $freelanceId = $this->service->freelance->id;

        $conversation = Conversation::where('freelance_id', $freelanceId)
            ->whereHas('user', function ($query) {
                $query->where('id', auth()->id());
            })
            ->first();




        // Si une conversation est trouvée, afficher la vue de la conversation
        if ($conversation) {


            $createdMessage = Message::create([
                'sender_id' => auth()->user()->id,
                'receiver_id' => $freelanceId,
                'conversation_id' => $conversation->id,
                'service_id' => $this->service->id,
                'body' => "salut je suis interrser par ce service",
                'is_read' => '0',
                'type' => "text",

            ]);
            return redirect()->route('MessageUser');
        }


        $conversation = new Conversation();
        $conversation->freelance_id = $freelanceId;
        $conversation->last_time_message = now();
        $conversation->status = 'pending';
        $conversation->save();


        $createdMessage = Message::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $freelanceId,
            'conversation_id' => $conversation->id,
            'service_id' => $this->service->id,
            'body' => "salut je suis interrser par ce service",
            'is_read' => '0',
            'type' => "text",

        ]);


        return redirect()->route('MessageUser');
    }
    public function add_cart()
    {

        $items = $this->service;

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($items, $items->id, $this->images);
        Session::put('cart', $cart);
        $this->emit('refreshComponent');

        $this->notification()->success(
            $title = "le Service a ete ajouté dans le panier",

        );
        $this->notify2();






        // dd(Session::get('cart'));
    }


    public function notify2()
    {

        try {

            $user = User::find(3);

            $user->notify(new testNotify());
        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }

    public function notifications()
    {

        try {

            $beamsClient = new PushNotifications(array(
                "instanceId" => config('services.pusher.beams_instance_id'),
                "secretKey" => config('services.pusher.beams_secret_key'),
            ));


            $userId = $this->service->freelance->user->id;
            $userSendingNotification = auth()->user(); // L'utilisateur qui envoie la notification
            $userReceivingNotification = User::find($userId);

            // L'utilisateur qui reçoit la notification

            $interests = "App.Models.User.3";

            // Créer une liste d'intérêts basée sur l'ID de l'utilisateur

            $data = array(
                "web" => array(
                    "notification" => array(
                        "title" => "Test",
                        "body" => "Vous avez une nouvelle notification",
                        "deep_link" => "https://example.com/notification",
                        "icon" => "https://example.com/icon.png",
                        "data" => array(
                            "foo" => "bar",
                            "baz" => "qux",
                        ),
                    ),
                ),
            );
            // Les données de la notification

            $beamsClient->publishToInterests(array($interests), $data);
        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }

    public function render()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $this->products = $cart->items;
        return view('livewire.user.services.services-view-one')
            ->extends('layouts.user')->section('content');
    }
}
