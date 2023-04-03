<?php

namespace App\Http\Livewire\User\Commande;

use Livewire\Component;

class CommandeUser extends Component
{
    public function render()
    {
        return view('livewire.user.commande.commande-user')->extends('layouts.userProfile')->section('content');
    }
}
