<?php

namespace App\Http\Livewire\User\Services;

use Livewire\Component;
use App\Models\Category;
use App\Models\Service;
use App\Models\SubCategory;
use Livewire\WithPagination;
use App\Tools\Cart;
use Illuminate\Support\Facades\Session;

class ServiceByCategory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $categories;
    public $categoryName = "";


    public $sous_category = null;
    public $delivery_time = null;
    public $freelance_niveau = null;
    public $price_range = null;
    public $orderBy = "basic_price";

    protected $queryString = [
        'sous_category' => ['expect' => ''],
        'delivery_time' => ['expect' => ''],
        'freelance_niveau' => ['expect' => ''],
        'price_range' => ['expect' => ''],
    ];






    public function mount($category)
    {

        $categoryName = str_replace('+', ' ', $category);
        $this->categoryName = $categoryName;

        $categorChoose = Category::where('name', $categoryName)->first();



        if ($categorChoose !== null) {
            $this->categories = $categorChoose->id;
        } else {
            session()->flash('error', 'La catégorie demandée est introuvable.');
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

        // dd(Session::get('cart'));
    }



    public function getDeliveryTimeRange()
    {
        if ($this->delivery_time == '1-5 jours') {
            return [1, 5];
        } elseif ($this->delivery_time == '5-10 jours') {
            return [5, 10];
        } else {
            return [10, 99999]; // pour les livraisons de plus de 50 jours
        }
    }

    public function getPriceRange()
    {
        if ($this->price_range == '10-50') {
            return [10, 50];
        } elseif ($this->price_range == '50-100') {
            return [50, 100];
        } elseif ($this->price_range == '100+') {
            return [100, 99999]; // pour les livraisons de plus de 50 jours
        }
    }



    public function render()
    {

        return view(
            'livewire.user.services.service-by-category',
            [
                'services' => Service::whereHas('category', function ($query) {
                    $query->where('name', $this->categoryName);
                })
                    ->when($this->sous_category, function ($query) {
                        $query->where('Sub_categorie', 'like', '%"' . $this->sous_category . '"%');
                    })
                    ->when($this->delivery_time, function ($query) {
                        $range = $this->getDeliveryTimeRange();

                        $query->whereBetween('basic_delivery_time', $range);
                    })->when($this->freelance_niveau, function ($query) {
                        $query->whereHas('freelance', function ($query) {
                            $query->where('level', $this->freelance_niveau);
                        });
                    })->when($this->price_range, function ($query) {
                        $range = $this->getPriceRange();

                        $query->whereBetween('basic_price', $range);
                    })->orderBy($this->orderBy, 'DESC')

                    ->paginate(12),

                'subCategorie' => SubCategory::whereHas('category', function ($query) {
                    $query->where('name', $this->categoryName);
                })->get(),
            ]
        )->extends('layouts.user')->section('content');
    }
}
