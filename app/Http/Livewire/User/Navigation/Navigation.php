<?php

namespace App\Http\Livewire\User\Navigation;

use Livewire\Component;
use App\Models\Category;
use App\Tools\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;

class Navigation extends Component
{
    public $products;
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        $oldCart = FacadesSession::has('cart') ? FacadesSession::get('cart') : null;
        $cart = new Cart($oldCart);
        $this->products
            = $cart->items;
        return view('livewire.user.navigation.navigation', [
            'categories' => Category::all()
        ]);
    }
}
