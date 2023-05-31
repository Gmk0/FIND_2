<?php

namespace App\Http\Livewire\User\Projet;

use App\Events\FeedbackSend;
use App\Models\Project;
use App\Models\ProjectResponse;
use Livewire\Component;
use App\Models\Conversation;
use App\Models\Message;
use App\Events\ProgressOrderEvent;
use App\Models\FeedbackService;

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


    public function  getListeners()
    {

        $auth_id = auth()->user()->id;
        return [

            "echo-private:notify.{$auth_id},ProgressOrderEvent" => '$refresh', //



        ];
    }


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

    public function openModal()
    {
        $this->modal = true;
    }

    public function sendFeedback()
    {


        $data = FeedbackService::where('project_id', $this->response->project->id)->first();
        $data->satisfaction = $this->satisfaction ? $this->satisfaction : 2;
        $data->commentaires = $this->feedback['description'];

        $user = $this->response->freelance->user;
        $data->update();
        $data->notifyFreelanceProjet($user);


        $this->modal = false;
        $this->reset('satisfaction', 'feedback');

        $this->notification()->success(
            $title = "Feedback envoyer ",
            $description = 'Votre notes a ete envoyer avec success',
        );

        $id = $this->response->freelance->user->id;


        event(new FeedbackSend($data, $user->id));
        // dd($this->feedback, $this->satisfaction);
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
