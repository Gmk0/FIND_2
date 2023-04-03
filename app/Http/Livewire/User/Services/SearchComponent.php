<?php

namespace App\Http\Livewire\User\Services;

use Livewire\Component;
use App\Models\Service;

class SearchComponent extends Component
{
    public $search='';

    public $selectedIndex = 0;
    public $results = [];

    public function updatedQuery()
    {
        $this->emit('searchResults', $this->render()->render());
    }

    public function render()
    {
       
   // $results = [];

    /*if(strlen($this->search) >= 2){
        $results = Service::with('category')
            ->where(function ($query) {
                $keywords = explode(' ', $this->search);
                foreach ($keywords as $keyword) {
                    $query->orWhere('title', 'like', '%'.$keyword.'%')
                        ->orWhereHas('category', function ($query) use ($keyword) {
                            $query->where('name', 'like', '%'.$keyword.'%');
                        });
                }
            })
            ->limit(10)
            ->get();

            
    } */
    





        return view('livewire.user.services.search-component');
    }


public function updatedSearch($value)
{
    $this->selectedIndex = 0;
    $this->results = [];

    if(strlen($value) >= 2){
        $this->results = Service::with('category')
            ->where(function ($query) use ($value) {
                $keywords = explode(' ', $value);
                foreach ($keywords as $keyword) {
                    $query->orWhere('title', 'like', '%'.$keyword.'%')
                        ->orWhereHas('category', function ($query) use ($keyword) {
                            $query->where('name', 'like', '%'.$keyword.'%');
                        });
                }
            })
            ->limit(10)
            ->get();
    }
}

public function moveSelectionUp()
{
    if($this->selectedIndex === 0){
        $this->selectedIndex = count($this->results) - 1;
    } else {
        $this->selectedIndex--;
    }
}

public function moveSelectionDown()
{
    if($this->selectedIndex === count($this->results) - 1){
        $this->selectedIndex = 0;
    } else {
        $this->selectedIndex++;
    }
}

public function selectResult()
{
    $selectedResult = $this->results[$this->selectedIndex];
    // Traitez le résultat sélectionné ici
}

}
