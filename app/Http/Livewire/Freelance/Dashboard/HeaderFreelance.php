<?php

namespace App\Http\Livewire\Freelance\Dashboard;

use Livewire\Component;
use App\Events\MessageSent;
use App\Events\OrderCreated;

class HeaderFreelance extends Component

{





    public function render()
    {

        return view('livewire.freelance.dashboard.header-freelance');
    }
}
