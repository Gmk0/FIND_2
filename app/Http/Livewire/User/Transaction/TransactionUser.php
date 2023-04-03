<?php

namespace App\Http\Livewire\User\Transaction;

use Livewire\Component;

class TransactionUser extends Component
{
    public function render()
    {
        return view('livewire.user.transaction.transaction-user')->extends('layouts.userProfile')->section('content');
    }
}
