<?php

namespace App\Http\Livewire\User\Navigation;
use App\Models\Category;

use Livewire\Component;

class MobileNavigation extends Component
{
    public function render()
    {
        return view('livewire.user.navigation.mobile-navigation',
        [
             'categories'=>Category::all()
            ]);
    }
}
