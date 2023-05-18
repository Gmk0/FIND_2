<?php

namespace App\Http\Livewire\Freelance\Conversations;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use App\Events\MessageSent;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Filament\Forms\Components\{FileUpload};
use Filament\Forms;

class SendMessageF extends  Component implements Forms\Contracts\HasForms
{

    use WithFileUploads;
    use Forms\Concerns\InteractsWithForms;
    public $selectedConversation;
    public $receiverInstance;
    public $body;
    public $createdMessage;
    public $attachment;
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


    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('attachment')
                ->maxSize(10024),
            // ...
        ];
    }

    public function sendFile()
    {

        $this->validate([
            'attachment' => 'required'
        ]);

        try {

            $filename = $this->attachment ? $this->addFiles($this->attachment) : null;


            foreach ($this->attachment as $file) {
                if (is_string($file) && file_exists($file) && getimagesize($file)) {
                    // Le fichier est une image

                    $this->createdMessage = Message::create([
                        'sender_id' => auth()->user()->id,
                        'receiver_id' => $this->receiverInstance->user->id,
                        'conversation_id' => $this->selectedConversation->id,
                        'body' => 'images',
                        'file' => $filename,
                        'is_read' => '0',
                        'type' => "image",

                    ]);

                    $this->createdMessage->notifyUser();
                    $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
                    $this->selectedConversation->save();
                    $this->attachment = null;

                    $this->emitTo('user.conversation.body-message', 'pushMessage', $this->createdMessage->id);
                } else {
                    // Le fichier n'est pas une image

                    $this->createdMessage = Message::create([
                        'sender_id' => auth()->user()->id,
                        'receiver_id' => $this->receiverInstance->user->id,
                        'conversation_id' => $this->selectedConversation->id,
                        'body' => 'document',
                        'file' => $filename,
                        'is_read' => '0',
                        'type' => "doc",

                    ]);
                    $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
                    $this->selectedConversation->save();
                    $this->attachment = null;
                    $this->emitTo('user.conversation.body-message', 'pushMessage', $this->createdMessage->id);
                }

                break;
            }
        } catch (\Exception $e) {
        }
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

        $this->emitTo('freelance.conversations.conversation-component', 'refresh');

        //reshresh coversation list
        $this->emitTo('user.conversation.body-message', 'refresh');
        $this->reset('body');

        $this->createdMessage->notifyUser();



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
