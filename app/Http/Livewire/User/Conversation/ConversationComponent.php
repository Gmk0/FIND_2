<?php

namespace App\Http\Livewire\User\Conversation;

use Livewire\Component;
use App\Models\Freelance;
use App\Models\Conversation;
use App\Models\Message;
use WireUi\Traits\Actions;

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
    public $freelance;

    protected $listeners = ['loadConversation', 'refresh' => '$refresh'];





    public function mount()
    {
        $this->auth_id = auth()->id();
    }

    public function updatedFreelance()
    {

        if ($this->freelance != null) {

            $data = Conversation::where('freelance_id', $this->freelance)->where('user_id', auth()->user()->id)->first();


            if (empty($data)) {


                $conversation = new Conversation();
                $conversation->freelance_id = $this->freelance;
                $conversation->last_time_message = now();
                $conversation->status = 'pending';
                $conversation->save();

                $createdMessage = Message::create([
                    'sender_id' => auth()->user()->id,
                    'receiver_id' => $this->freelance,
                    'conversation_id' => $conversation->id,
                    'body' => "Hi",
                    'is_read' => '0',
                    'type' => "text",

                ]);
            } else {
                $this->chatUserSelected($data, $this->freelance);
            }
        }
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

    public function cancel()
    {


        $this->notification()->success(

            $title = "vous avez annuler",

        );
    }

    public function BloquerConversation()
    {


        $this->notification()->confirm([
            'title'       => 'etes  vous Sur?',
            'description' => 'etes vous sure de bloquer cette utilisateur ?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Bloquer ',
                'method' => 'bolquerUser',

            ],
            'reject' => [
                'label'  => 'No, cancel',
                'method' => 'cancel',
            ],
        ]);
    }

    public function bolquerUser()
    {
        $data = $this->selectedConversation->update(['status' => 'finished']);

        $this->notification()->success(

            $title = "Vous avez bloquer l'utilisateur",

        );

        $this->emitSelf('refresh');

        $this->emitTo('user.conversation.body-message', 'refresh');
        $this->emitTo('user.conversation.send-message-u', 'refresh');
    }

    public function deleteConversation()
    {
        //dd($this->selectedConversation);

        $data = $this->selectedConversation->delete();

        $this->selectedConversation = null;

        $this->notification()->success(

            $title = "succees",

        );

        $this->emitTo('user.conversation.body-message', 'refresh');
        $this->emitTo('user.conversation.send-message-u', 'refresh');
        $this->emitSelf('refresh');

        return redirect()->route('MessageUser');
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