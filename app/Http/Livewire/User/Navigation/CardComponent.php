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




    public function updateQty($id, $qty)
    {



        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($oldCart);
        $cart->updateQty($id, $qty);
        Session::put('cart', $cart);

        $this->emit('refreshCheckout');
    }


    public function remove($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
            $this->emit('refreshComponent');
        } else {
            Session::forget('cart');

            $this->emit('refreshComponent');
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
