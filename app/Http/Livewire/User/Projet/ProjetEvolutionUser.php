<?php

namespace App\Http\Livewire\User\Projet;

use App\Models\ProjectResponse;
use Livewire\Component;

class ProjetEvolutionUser extends Component
{

    public ProjectResponse $response;
    public function render()
    {

        $this->response;
        return view('livewire.user.projet.projet-evolution-user')->layout('layouts.user-profile2');
    }
}
