<?php

namespace App\Http\Livewire\User\Navigation;

use App\Models\Service;
use Livewire\Component;

class SearchMobile extends Component
{
    public $search = '';

    public $selectedIndex = 0;
    public $results = [];

    public function updatedQuery()
    {
        $this->emit('searchResults', $this->render()->render());
    }
    public function render()
    {
        return view('livewire.user.navigation.search-mobile');
    }

    public function updatedSearch($value)
    {
        $this->selectedIndex = 0;
        $this->results = [];

        if (strlen($value) >= 2) {
            $this->results = Service::with('category')
                ->where(function ($query) use ($value) {
                    $keywords = explode(' ', $value);
                    foreach ($keywords as $keyword) {
                        $query->orWhere('title', 'like', '%' . $keyword . '%')
                            ->orWhereHas('category', function ($query) use ($keyword) {
                                $query->where('name', 'like', '%' . $keyword . '%');
                            });
                    }
                })
                ->limit(10)
                ->get();
        }
    }

    public function selectResult()
    {
        $selectedResult = $this->results[$this->selectedIndex];
        // Traitez le résultat sélectionné ici
    }
}