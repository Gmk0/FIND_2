<?php

namespace App\Http\Livewire\User\Services;

use App\Models\Conversation;
use App\Models\feedback;
use App\Models\Message;
use App\Models\service;
use Livewire\Component;
use App\Tools\cart;
use Illuminate\Support\Facades\Session;

class ServicesViewOne extends Component
{

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
        $this->commentaires = feedback::whereHas('order', function ($query) {
            $query->whereHas('service', function ($q) {
                $q->where('id', $this->service->id);
            });
        })->get();

        //dd($this->commentaires);

        $this->servicesOther = $this->GetOther();
    }


    public function GetOther()
    {
        $subCategorie = $this->service->Sub_categorie;


        //dd($subCategorie);

        if (!empty($subCategorie)) {
            $sousCategorie = $subCategorie;

            $services = Service::where('Sub_categorie', 'like', '%' . $sousCategorie . '%')
                ->limit(5)->get();
        } else {
            $services = Service::where('category_id', $this->service->category_id)
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
                'receiver_id' => $this->freelance_id,
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
        $this->emitTo('user.navigation.card-component', 'refreshComponent');
        $this->dispatchBrowserEvent('success', ['message' => 'le service a ete ajouté']);

        // dd(Session::get('cart'));
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
