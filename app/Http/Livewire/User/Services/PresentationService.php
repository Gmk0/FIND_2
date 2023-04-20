<?php

namespace App\Http\Livewire\User\Services;

use App\Models\Category;
use App\Models\Freelance;
use App\Models\Service;
use Livewire\Component;

class PresentationService extends Component
{


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
}
