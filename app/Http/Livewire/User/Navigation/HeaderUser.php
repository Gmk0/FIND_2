<?php

namespace App\Http\Livewire\User\Navigation;

use Livewire\Component;

class HeaderUser extends Component
{

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.user.navigation.header-user');
    }
}
