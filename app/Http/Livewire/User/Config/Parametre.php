<?php

namespace App\Http\Livewire\User\Config;

use Livewire\Component;

class Parametre extends Component
{
    public function render()
    {
        return view('livewire.user.config.parametre')->extends('layouts.userProfile')->section('content');
    }
}