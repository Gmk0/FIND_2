<?php

namespace App\Http\Livewire\User\Services;

use App\Models\service;
use Livewire\Component;
use App\Tools\cart;
use Illuminate\Support\Facades\Session;

class ServicesViewOne extends Component
{

    public $service;
    public $images;
    public $products;
    public $servicesOther=null;
    public function mount($id){

        $this->service=Service::find($id);
        $this->images= $this->images();

       
        $this->servicesOther=$this->GetOther();
      

    }


    public function GetOther(){
        $subCategorie=$this->service->Sub_categorie;
        $sousCategorie= reset($subCategorie ); 

       
    $services=Service::where('Sub_categorie', 'like', '%'. $sousCategorie .'%')
    ->limit(5)->get();

    return $services;
    }

        public function images(){

        $files = $this->service->files;
        foreach($files as $key=>$file){
            $images=$file;
            break;
        }
        return $images;
    }


     public function add_cart()
    {
        
        $items=$this->service;

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($items, $items->id,$this->images);
        Session::put('cart', $cart);
      $this->emitTo('user.navigation.card-component','refreshComponent');
        $this->dispatchBrowserEvent('success', ['message' => 'le service a ete ajouté']);

       // dd(Session::get('cart'));
    } 


    public function render()
    {
         $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $this->products= $cart->items;
        return view('livewire.user.services.services-view-one')
        ->extends('layouts.user')->section('content');
    }
}
