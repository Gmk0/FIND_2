<?php

namespace App\Http\Livewire\User\Paiement;

use Livewire\Component;

class PaiementUser extends Component
{
    public function render()
    {
        return view('livewire.user.paiement.paiement-user')->extends('layouts.userProfile')->section('content');
    }
}
