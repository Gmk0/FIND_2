<?php

namespace App\Http\Livewire\User\Navigation;


use Livewire\Component;
use App\Models\Category;
class NavigationTwo extends Component
{
    public function render()
    {
        return view('livewire.user.navigation.navigation-two',
        [
             'categories'=>Category::all()
            ]);
    }
}
