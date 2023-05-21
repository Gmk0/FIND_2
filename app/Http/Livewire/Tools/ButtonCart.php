<?php

namespace App\Http\Livewire\Tools;


use Livewire\Component;
use App\Models\Like;
use App\Models\Service;
use App\Tools\Cart;
use Illuminate\Support\Facades\Session;
use WireUi\Traits\Actions;

class ButtonCart extends Component
{
    use Actions;
    public Service $service;


    public function render()
    {
        return view('livewire.tools.button-cart');
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
        }
    }

    public function add_cart($id)
    {

        $service = Service::find($id);
        $files = $service->files;
        foreach ($files as $key => $file) {
            $images = $file;
            break;
        }

        // dd($images);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($service, $service->id, $images);
        Session::put('cart', $cart);
        $this->emitTo('user.navigation.card-component', ' refreshComponent');

        $this->emitTo('user.navigation.navigation', ' refreshComponent');

        $this->emit('refreshComponent');

        $this->notification()->success(
            $title = "le Service a ete ajouté dans le panier",

        );



        // dd(Session::get('cart'));
    }
}