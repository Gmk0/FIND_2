<?php

namespace App\Http\Livewire\Freelance\Commande;

use App\Models\Order;
use App\Models\rapport;
use Livewire\Component;
use Filament\Notifications\Notification;

class ViewCommande extends Component
{
    public $Order;
    public $description;
    public $orderId;

    public $progress;

    public $etat;

    public function mount($id)
    {

        $this->orderId = $id;

        //dd()
    }

    public function changePercent()
    {
        $this->validate([
            'progress' => 'required'
        ]);

        // dd($this->progress);
        $this->Order->progress = $this->progress;
        $this->Order->update();

        Notification::make()
            ->title('Rapport envoyer')
            ->success()
            ->send();
    }

    public function SendRapport()
    {
        $this->validate([
            'description' => 'required',
        ]);

        $data = [
            'description' => $this->description,
            'order_id' => $this->Order->id,
            'is_finish' => 0
        ];

        //dd($data);
        $data = rapport::create($data);



        Notification::make()
            ->title('Rapport envoyer')
            ->success()
            ->send();
        $this->reset('description');
    }
    public function render()
    {
        $this->Order = Order::find($this->orderId);
        $this->progress
            = $this->Order->progress;
        return view('livewire.freelance.commande.view-commande')->extends('layouts.freelanceTest')->section('content');
    }
}
