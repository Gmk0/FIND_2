<?php

namespace App\Http\Livewire\Freelance\Conversations;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use App\Events\MessageSent;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SendMessageF extends Component
{

    public $selectedConversation;
    public $receiverInstance;
    public $body;
    public $createdMessage;
    protected $listeners = ['updateSendMessage', 'dispatchMessageSent', 'resetComponent'];

    public function resetComponent()
    {

        $this->selectedConversation = null;
        $this->receiverInstance = null;

        # code...
    }




    function updateSendMessage(Conversation $conversation, User $sender_id)
    {

        $this->selectedConversation = $conversation;
        $this->receiverInstance = $sender_id;
    }




    public function sendMessage()
    {
        if ($this->body == null) {
            return null;
        }
        $this->validate(['body' => 'required']);



        $this->createdMessage = Message::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $this->receiverInstance->id,
            'conversation_id' => $this->selectedConversation->id,
            'body' => $this->body,
            'is_read' => '0',
            'type' => "text",

        ]);

        $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
        $this->selectedConversation->save();
        $this->emitTo('user.conversation.body-message', 'pushMessage', $this->createdMessage->id);


        //reshresh coversation list 
        $this->emitTo('user.conversation.body-message', 'refresh');
        $this->reset('body');


        $this->emitSelf('dispatchMessageSent');
    }

    public function dispatchMessageSent()
    {



        broadcast(new MessageSent(auth()->user(), $this->createdMessage, $this->selectedConversation, $this->receiverInstance));
        # code...
    }

    public function render()
    {
        return view('livewire.freelance.conversations.send-message-f');
    }
}
