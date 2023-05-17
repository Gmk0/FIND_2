<?php

namespace App\Http\Livewire\Freelance\Dashboard;

use Livewire\Component;
use App\Events\OrderCreated;

class HeaderFreelance extends Component

{

    public function  getListeners()
    {

        $auth_id = auth()->user()->id;
        return [
            "echo-private:notify.{$auth_id},OrderCreated" => 'broadcastedMessageReceived',
            'ServiceOrdered' => '$refresh',
            'refreshComponent' => '$refresh',


        ];
    }

    public function render()
    {
        return view('livewire.freelance.dashboard.header-freelance');
    }
}
