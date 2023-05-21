<?php

namespace App\Http\Livewire\Freelance\Conversations;

use App\Models\Conversation;
use App\Models\Message;
use Livewire\Component;
use App\Events\MessageSent;

class ConversationComponent extends Component
{

    public $conversations;

    public $selectedConversation;
    public $receiver;
    public $receiverInstance;
    public $freelancerId;
    public $user_id;
    public $query;

    public function  getListeners()
    {

        $auth_id = auth()->user()->id;
        return [

            //"echo-private:chat.{$auth_id},MessageSent" => '$refresh',

            'chatUserSelected',
            'refresh' => '$refresh'


        ];
    }


    public function mount()
    {

        $this->freelancerId = auth()->user()->freelance->id;
    }

    public function chatUserSelected(Conversation $conversation, $receiverId)
    {

        $this->selectedConversation = $conversation;
        $this->user_id = $conversation->user_id;




        $this->emitTo('user.conversation.body-message', 'loadConversation', $this->selectedConversation, $receiverId);
        // $this->emitTo('freelancer.conversations.body', 'loadConversation', $this->selectedConversation);
        $this->emitTo('freelance.conversations.send-message-f', 'updateSendMessage', $this->selectedConversation, $receiverId);

        Message::where('conversation_id', $this->selectedConversation->id)
            ->where('receiver_id', auth()->user()->id)->update(['is_read' => 1]);
    }
    public function render()
    {
        $this->conversations = Conversation::where('freelance_id', $this->freelancerId)->orderBy('last_time_message', 'DESC')->get();

        $this->conversations = Conversation::where('freelance_id', $this->freelancerId)
            ->when($this->query, function ($q) {
                $q->whereHas('user', function ($query) {
                    $query->where('name', 'LIKE', "%" . $this->query . "%");
                });
            })
            ->orderBy('last_time_message', 'DESC')->get();
        return view('livewire.freelance.conversations.conversation-component')->extends('layouts.freelanceTest2')->section('content');
    }
}