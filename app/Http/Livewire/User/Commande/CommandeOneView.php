<?php

namespace App\Http\Livewire\User\Commande;

use Livewire\Component;
use App\Models\Order;

class CommandeOneView extends Component
{
    public $order_id;
    public $modal = false;
    public function mount($id)
    {
        $this->order_id = $id;
    }

    public function openModal()
    {
        $this->modal = true;
    }
    public function render()
    {
        return view('livewire.user.commande.commande-one-view', [
            'Order' => Order::findOrFail($this->order_id)
        ])->extends('layouts.userProfile')->section('content');
    }
}
