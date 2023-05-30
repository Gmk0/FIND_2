<?php

namespace App\Http\Livewire\User\Navigation;

use Livewire\Component;

use App\Events\ProgressOrderEvent;
use App\Events\ProjectResponse;
use App\Events\MessageSent;

class HeaderUser extends Component
{







    public function render()
    {
        return view('livewire.user.navigation.header-user');
    }
}
