<?php

namespace App\Http\Livewire\Freelance\Profile;

use Livewire\Component;

class Securite extends Component
{
    public function render()
    {
        return view('livewire.freelance.profile.securite')->extends('layouts.freelanceTest')->section('content');
    }
}
