<?php

namespace App\Http\Livewire\User\Services;

use Livewire\Component;
use App\Tools\Cart;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Session;

class Checkout extends Component
{
    public $product;
    public function mount(){

    
    }

    public function payer(){

       Notification::make()
                ->title('Systeme indisponible')
                ->success()
                ->send();

    }
    public function render()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $this->products= $cart->items;
    
        return view('livewire.user.services.checkout')->extends('layouts.user')->section('content');
    }
}
