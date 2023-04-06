<?php

namespace App\Http\Livewire\User\Transaction;

use Livewire\Component;
use App\Models\Transaction;

class TransactionUser extends Component
{

    public $transaction;


    public function getTransac()
    {


        $order = Transaction::whereHas('orders', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();
    }

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.user.transaction.transaction-user', [
            'transactions' => Transaction::whereHas('orders', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->get(),
        ])->extends('layouts.userProfile')->section('content');
    }
}
