<?php

namespace App\Http\Livewire\User\Projet;

use App\Models\Project;
use App\Models\ProjectResponse;
use Livewire\Component;
use App\Models\Conversation;
use App\Models\Message;

class ProjetEvolutionUser extends Component
{



    public ProjectResponse $response;
    public $modal = false;
    public $feedback;
    public $satisfaction = 0;
    public $conversation = null;
    public $freelance_id;
    public $openMessage = false;
    public $messages;
    public $body;
    public $modalC;
    public $confirmModal;


    public function AnnulerCommande()
    {
        $this->confirmModal = false;

        $this->notification()->error(
            $title = "Impossible d'annuler la commande pour l'instant",

        );
    }

    public function mount()
    {
        $this->freelance_id
            = $this->response->freelance_id;
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

            $createdMessage->notifyUser();
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

            $createdMessage->notifyUser();

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

        $this->response;
        return view('livewire.user.projet.projet-evolution-user', ['projet' => Project::find($this->response->project_id)])->layout('layouts.user-profile2');
    }
}
