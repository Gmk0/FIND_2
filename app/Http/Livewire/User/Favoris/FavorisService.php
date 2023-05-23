<?php

namespace App\Http\Livewire\User\Favoris;

use App\Models\Like;
use App\Models\Service;
use App\Tools\Cart;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class FavorisService extends Component
{

    public function getFavorites()
    {
        $user = auth()->user();

        if ($user) {
            return $user->favorites()->get();
        }

        return collect();
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
        $this->emitTo('user.navigation.card-component', 'refreshComponent');
        $this->dispatchBrowserEvent('success', ['message' => 'le service a ete ajouté']);

        $this->notification()->success(
            $title = "le Service a ete ajouté dans le panier",

        );



        // dd(Session::get('cart'));
    }


    public function render()
    {
        return view('livewire.user.favoris.favoris-service', [
            'favoris' => $this->getFavorites(),
        ])->layout('layouts.user-profile2');
    }
}
