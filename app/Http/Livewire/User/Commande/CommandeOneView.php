<?php

namespace App\Http\Livewire\User\Commande;

use App\Events\FeedbackSend;
use App\Models\feedback;
use Livewire\Component;
use App\Models\Order;
use WireUi\Traits\Actions;
use App\Events\notificationOrder;
use App\Models\Conversation;
use App\Models\Message;

class CommandeOneView extends Component
{
    use Actions;
    public $order_id;
    public $modal = false;
    public $feedback;
    public $satisfaction = 0;
    public $conversation = null;
    public $freelance_id;
    public $openMessage = false;
    public $messages;
    public $body;

    public function  getListeners()
    {

        $auth_id = auth()->user()->id;
        return [
            "echo-private:notify.{$auth_id},notificationOrder" => 'broadcastedMessageNotificationOrder',
            "echo-private:notify.{$auth_id},notificationOrder" => '$refresh', //
            'ServiceOrdered' => '$refresh',


        ];
    }
    public function mount($id)
    {
        $this->order_id = $id;

        $this->freelance_id = Order::find($id)->service->freelance->id;
    }





    public function openModal()
    {
        $this->modal = true;
    }

    public function sendFeedback()
    {
        $this->validate(['feedback.description' => 'required']);
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

    public function broadcastedMessageNotificationOrder()
    {


        $this->notification()->success(
            $title = "Votre commande a ete modifier",

        );
    }


    public function conversation()
    {


        $id = $this->freelance_id;

        $this->conversation = Conversation::where('user_id', auth()->user()->id)
            ->where('freelance_id', $id)->first();

        if ($this->conversation  !== null) {
            $this->messages = Message::where('conversation_id', $this->conversation->id)->get();
        } else {


            $conversation = new Conversation();
            $conversation->freelance_id = $this->freelance_id;
            $conversation->last_time_message = now();
            $conversation->status = 'pending';
            $conversation->save();

            $this->conversation = $conversation;

            $createdMessage = Message::create([
                'sender_id' => auth()->user()->id,
                'receiver_id' => $this->freelance_id,
                'conversation_id' => $this->conversation->id,
                'body' => 'salut',
                'is_read' => '0',
                'type' => "text",

            ]);

            $this->messages = Message::where('conversation_id', $conversation->id)->get();
        }
        $this->openMessage = true;
    }

    public function sendMessage()
    {



        if ($this->freelance_id != null && $this->body != null) {


            // $freelance = Freelance::find($id);

            //            dd($this->conversation->id);





            $createdMessage = Message::create([
                'sender_id' => auth()->user()->id,
                'receiver_id' => $this->freelance_id,
                'conversation_id' => $this->conversation->id,
                'body' => $this->body,
                'file' => null,
                'is_read' => '0',
                'type' => "text",

            ]);

            $this->body = null;


            // Si une conversation est trouvée, afficher la vue de la conversation

            $this->pushMessage($createdMessage->id);
        };
    }

    public function pushMessage($messageId)
    {
        $newMessage = Message::find($messageId);
        $this->messages->push($newMessage);

        $this->dispatchBrowserEvent('rowChatToBottom');
        # code...
    }

    public function render()
    {
        return view('livewire.user.commande.commande-one-view', [
            'Order' => Order::findOrFail($this->order_id)
        ])->extends('layouts.userProfile')->section('content');
    }
}
