<?php

namespace App\Http\Livewire\User\Transaction;

use Livewire\Component;

class DashbordUser extends Component
{
    public function render()
    {
        return view('livewire.user.transaction.dashbord-user')->extends('layouts.userProfile')->section('content');
    }
}
