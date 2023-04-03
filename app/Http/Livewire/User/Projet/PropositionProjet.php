<?php

namespace App\Http\Livewire\User\Projet;

use Livewire\Component;

use App\Models\ProjectResponse;

class PropositionProjet extends Component
{
    public $proposition;
    public $proposition_id;
    public function mount($id){
        $this->proposition_id=$id;
    } 
    public function render()
    {
        return view('livewire.user.projet.proposition-projet')->extends('layouts.userProfile')->section('content');
    }
}
