<?php

namespace App\Http\Livewire\User\Commande;

use Livewire\Component;
use App\Models\Order;

class CommandeUser extends Component
{
    public $status = null;
    public function render()
    {
        return view('livewire.user.commande.commande-user', [
            'Orders' => Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')
                ->when($this->status, function ($q) {
                    $q->where('status', $this->status);
                })
                ->get(),
        ])->extends('layouts.userProfile')->section('content');
    }
}
