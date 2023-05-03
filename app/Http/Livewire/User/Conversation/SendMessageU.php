<?php

namespace App\Http\Livewire\User\Conversation;

use Livewire\Component;

use App\Models\Conversation;
use App\Events\MessageSent;
use App\Models\Freelance;
use App\Models\Message;
use Exception;
use Livewire\WithFileUploads;

class SendMessageU extends Component
{

    use WithFileUploads;

    public $selectedConversation;
    public $receiverInstance;
    public $body;
    public $attachment = null;
    public $createdMessage;
    protected $listeners = ['updateSendMessage', 'dispatchMessageSent', 'resetComponent'];

    public function resetComponent()
    {

        $this->selectedConversation = null;
        $this->receiverInstance = null;

        # code...
    }



    function updateSendMessage(Conversation $conversation, Freelance $receiver)
    {

        // dd($conversation);
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
    }


    public function addFiles($image)
    {
        $fileName = $image->getClientOriginalName();

        $image->storeAs('public/messages', $fileName);
        return $fileName;
    }


    public function sendPhoto()
    {

        $this->validate([
            'attachment' => 'required'
        ]);



        $filename = $this->attachment ? $this->addFiles($this->attachment) : null;





        $this->createdMessage = Message::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $this->receiverInstance->user->id,
            'conversation_id' => $this->selectedConversation->id,
            'body' => null,
            'file' => $filename,
            'is_read' => '0',
            'type' => "text",

        ]);

        $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
        $this->selectedConversation->save();
        $this->emitTo('user.conversation.body-message', 'pushMessage', $this->createdMessage->id);


        //reshresh coversation list
        $this->emitTo('user.conversation.conversation-component', 'refresh');
        $this->reset('body', 'attachment');
        $this->emitSelf('dispatchMessageSent');
    }

    public function sendMessage()
    {


        try {



            $this->validate([
                'body' => 'required'
            ]);






            //dd($this->selectedConversation);


            $this->createdMessage = Message::create([
                'sender_id' => auth()->user()->id,
                'receiver_id' => $this->receiverInstance->user->id,
                'conversation_id' => $this->selectedConversation->id,
                'body' => $this->body,
                'file' => null,
                'is_read' => '0',
                'type' => "text",

            ]);

            $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
            $this->selectedConversation->save();
            $this->emitTo('user.conversation.body-message', 'pushMessage', $this->createdMessage->id);


            //reshresh coversation list
            $this->emitTo('user.conversation.conversation-component', 'refresh');
            $this->reset('body', 'attachment');
            $this->emitSelf('dispatchMessageSent');
        } catch (Exception $e) {

            dd($e->getMessage());
        }
    }

    public function dispatchMessageSent()
    {

        broadcast(new MessageSent(auth()->user(), $this->createdMessage, $this->selectedConversation, $this->receiverInstance->user));
        # code...
    }

    public function render()
    {
        return view('livewire.user.conversation.send-message-u');
    }
}