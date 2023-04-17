<?php

namespace App\Http\Livewire\User\Conversation;

use Livewire\Component;
use App\Models\Freelance;
use App\Models\Conversation;

use Wireui\Traits\Actions;

class ConversationComponent extends Component
{
    use Actions;
    public $conversations;

    public $selectedConversation = null;
    public $receiver;
    public $freelance_id;
    public $receiverInstance;
    public $messages;
    public $messages_count;
    public $paginateVar = 10;
    public $height;
    public $auth_id;
    public $query = '';

    protected $listeners = ['loadConversation', 'refresh' => '$refresh'];




    public function mount()
    {
        $this->auth_id = auth()->id();
    }

    public function chatUserSelected(Conversation $conversation, $receiverId)
    {


        // dd($conversation);
        $this->selectedConversation = $conversation;
        $this->freelance_id = $conversation->freelance_id;


        $this->emitTo('user.conversation.body-message', 'loadConversation', $this->selectedConversation, $receiverId);
        $this->emitTo('user.conversation.send-message-u', 'updateSendMessage', $this->selectedConversation, $receiverId);
        $this->emitSelf('loadConversation', $this->selectedConversation);
    }


    public function effacerConversation()
    {


        $this->notification()->confirm([
            'title'       => 'etes  vous Sur?',
            'description' => 'etes vous sure de supprimer la conversation?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, effacer ',
                'method' => 'deleteConversation',

            ],
            'reject' => [
                'label'  => 'No, cancel',
                'method' => 'cancel',
            ],
        ]);
    }

    public function deleteConversation()
    {
        //dd($this->selectedConversation);

        $data = $this->selectedConversation->delete();

        $this->notifications()->success(
            [
                $title = "succees",
            ]
        );

        $this->emitTo('user.conversation.body-message', 'refresh');
        $this->emitTo('user.conversation.send-message-u', 'refresh');
        $this->emitSelf('refresh');
    }


    public function loadConversation(Conversation $conversation)
    {
        $this->selectedConversation = $conversation;
    }


    public function render()

    {
        $this->selectedConversation;
        $this->conversations = Conversation::where('user_id', $this->auth_id)
            ->when($this->query, function ($q) {
                $q->whereHas('freelance', function ($query) {
                    $query->where('nom', 'LIKE', "%" . $this->query . "%")
                        ->orWhere('prenom', 'LIKE', "%" . $this->query . "%");
                });
            })
            ->orderBy('last_time_message', 'DESC')->get();
        return view('livewire.user.conversation.conversation-component')->extends('layouts.userProfile')->section('content');
    }
}
