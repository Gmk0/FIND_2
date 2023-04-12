<?php

namespace App\Http\Livewire\Freelance\Commande;

use App\Models\feedback;
use App\Models\Order;
use App\Models\rapport;
use Livewire\Component;
use Filament\Notifications\Notification;

class ViewCommande extends Component
{
    public Order $Order;
    public $description;
    public $orderId;

    public $progress;

    public $status;
    public $jour;
    public $modal = false;







    public function mount()
    {
        $this->orderId = $this->Order->id;
    }



    public function openModal()
    {
        $this->modal = true;
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

    public function modLivre()
    {
        try {
            $this->validate([
                'progress' => 'required',
                'status' => 'required',
                'jour' => 'required',
            ]);

            $id = $this->Order->id;

            $data = feedback::where('order_id', $id)->first();

            $data->etat = $this->status;
            $data->delai_livraison_estimee = $this->jour;
            $data->update();

            $this->Order->progress = $this->progress;
            $this->Order->update();

            $this->render();
        } catch (Exception $e) {
            dd($e->getMessage());
        }


        //$this->emit('feedbackUpdated', $this->progress, $this->status, $this->jour);
    }


    public function render()
    {
        $this->Order = Order::find($this->orderId);
        $this->progress = $this->Order->progress;

        return view('livewire.freelance.commande.view-commande')->extends('layouts.freelanceTest')->section('content');
    }
}
