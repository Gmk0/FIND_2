<?php

namespace App\Http\Livewire\User\Navigation;

use Livewire\Component;
use App\Tools\cart;
use Illuminate\Support\Facades\Session;

class CardComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public  $products;
    public $code;





    public function remove($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
    }
    public function render()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $this->products
            = $cart->items;
        return view('livewire.user.navigation.card-component');
    }
}
