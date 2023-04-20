<?php

namespace App\Http\Livewire\User\Services;

use App\Models\Category;
use App\Models\Favori;
use App\Models\Freelance;
use App\Models\Like;
use App\Models\Service;
use App\Tools\Cart;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use WireUi\Traits\Actions;

class PresentationService extends Component
{

    use Actions;

    public function render()
    {
        $category = Category::all();

        $servicesBest = Service::limit(20)->get();

        $freelance = Freelance::paginate(20);

        $services = Service::orderBy('basic_price', 'Asc')->paginate(8);






        return view('livewire.user.services.presentation-service', [


            'categories' => $category,
            'servicesBest' => $servicesBest,
            'freelances' => $freelance,
            'services' => $services,

        ]);
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
}
