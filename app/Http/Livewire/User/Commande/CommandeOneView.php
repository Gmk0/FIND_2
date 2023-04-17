<?php

namespace App\Http\Livewire\User\Commande;

use App\Events\FeedbackSend;
use App\Models\feedback;
use Livewire\Component;
use App\Models\Order;
use WireUi\Traits\Actions;


class CommandeOneView extends Component
{
    use Actions;
    public $order_id;
    public $modal = false;
    public $feedback;
    public $satisfaction = 0;
    public function mount($id)
    {
        $this->order_id = $id;
    }





    public function openModal()
    {
        $this->modal = true;
    }

    public function sendFeedback()
    {
        $this->validate(['feedback.description'=>'required'])
        $data = feedback::where('order_id', $this->order_id)->first();
        $data->satisfaction = $this->satisfaction;
        $data->commentaires = $this->feedback['description'];

        $data->update();


        $this->modal = false;
        $this->reset('satisfaction', 'feedback');

        $this->notification()->success(
            $title = "Feedback envoyer ",
            $description = 'Votre notes a ete envoyer avec success',
        );


        event(new FeedbackSend($data));
        // dd($this->feedback, $this->satisfaction);
    }
    public function render()
    {
        return view('livewire.user.commande.commande-one-view', [
            'Order' => Order::findOrFail($this->order_id)
        ])->extends('layouts.userProfile')->section('content');
    }
}
