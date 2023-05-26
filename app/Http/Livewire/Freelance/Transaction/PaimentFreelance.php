<?php

namespace App\Http\Livewire\Freelance\Transaction;

use Livewire\Component;

class PaimentFreelance extends Component
{
    public function render()
    {

        
        return view('livewire.freelance.transaction.paiment-freelance')->layout('layouts.freelance-profile');
    }
}