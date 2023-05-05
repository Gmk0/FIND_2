<?php

namespace App\Http\Livewire\User\Conversation;

use Livewire\Component;

use App\Models\Conversation;
use App\Events\MessageSent;
use App\Models\Freelance;
use App\Models\Message;
use Exception;
use Livewire\WithFileUploads;
use Filament\Forms\Components\{FileUpload};
use Filament\Forms;

class SendMessageU extends Component implements Forms\Contracts\HasForms
{

    use WithFileUploads;
    use Forms\Concerns\InteractsWithForms;

    public $selectedConversation;
    public $receiverInstance;
    public $body;
    public $attachment;
    public $createdMessage;

    protected $listeners = ['updateSendMessage', 'dispatchMessageSent', 'resetComponent'];

    public function resetComponent()
    {

        $this->selectedConversation = null;
        $this->receiverInstance = null;

        # code...
    }



    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('attachment')
                ->maxSize(10024),
            // ...
        ];
    }


    function updateSendMessage(Conversation $conversation, Freelance $receiver)
    {

        // dd($conversation);
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
    }


    public function addFiles($image)
    {


        foreach ($image as $file) {
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/messages', $fileName);
            $AllFilename = $fileName;
            break;
        }

        return $AllFilename;
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
        } catch (Exception $e) {
        }
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
