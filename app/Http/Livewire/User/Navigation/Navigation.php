<?php

namespace App\Http\Livewire\User\Navigation;

use Livewire\Component;
use App\Models\Category;

class Navigation extends Component
{
    public function render()
    {
        return view('livewire.user.navigation.navigation',[
            'categories'=>Category::all()
            ]);
    }
}
