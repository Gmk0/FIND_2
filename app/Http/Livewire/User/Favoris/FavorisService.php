<?php

namespace App\Http\Livewire\User\Favoris;

use Livewire\Component;

class FavorisService extends Component
{
    public function render()
    {
        return view('livewire.user.favoris.favoris-service')->extends('layouts.userProfile')->section("content");
    }
}
