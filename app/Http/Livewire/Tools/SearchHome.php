<?php

namespace App\Http\Livewire\Tools;

use App\Models\Service;
use Livewire\Component;

class SearchHome extends Component
{
    public $search = '';

    public $selectedIndex = 0;
    public $results = [];


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
    public function render()
    {
        return view('livewire.tools.search-home');
    }
}
