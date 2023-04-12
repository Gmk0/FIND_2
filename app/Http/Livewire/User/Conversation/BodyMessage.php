<?php

namespace App\Http\Livewire\User\Conversation;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\Freelance;
use App\Models\Message;
use App\Events\MessageRead;
use App\Events\MessageSent;

class BodyMessage extends Component
{
    public $selectedConversation;
    public $receiver;
    public $receiverInstance;
    public $messages;
    public $messages_count;
    public $paginateVar = 10;
    public $height;




    public function  getListeners()
    {

        $auth_id = auth()->user()->id;
        return [
            "echo-private:chat.{$auth_id},MessageSent" => 'broadcastedMessageReceived',
            "echo-private:chat.{$auth_id},MessageRead" => 'broadcastedMessageRead',
            'refresh' => '$refresh',
            'loadConversation', 'pushMessage', 'loadmore', 'updateHeight', 'broadcastMessageRead', 'resetComponent'
        ];
    }


    public function deleteMessage($id)
    {
        //dd($id);

        $newMessage = Message::find($id)->delete();
        //$this->messages->destroy($newMessage);
        $this->dispatchBrowserEvent('rowChatToBottom');
        $this->emitSelf('refresh');
        $this->emitTo('user.conversation.conversation-component', 'refresh');
    }





    function loadmore()
    {

        // dd('top reached ');
        $this->paginateVar = $this->paginateVar + 10;
        $this->messages_count = Message::where('conversation_id', $this->selectedConversation->id)->count();

        $this->messages = Message::where('conversation_id',  $this->selectedConversation->id)
            ->skip($this->messages_count -  $this->paginateVar)
            ->take($this->paginateVar)->get();

        $height = $this->height;
        $this->dispatchBrowserEvent('updatedHeight', ($height));
        # code...
    }


    /*---------------------------------------------------------------------*/
    /*------------------Update height of messageBody-----------------------*/
    /*---------------------------------------------------------------------*/
    function updateHeight($height)
    {

        //dd($height);
        $this->height = $height;

        # code...
    }

    public function loadConversation(Conversation $conversation, $receiver)
    {
        // dd($conversation,$receiver);

        $this->selectedConversation =  $conversation;
        $this->receiverInstance =  $receiver;
        $this->messages_count = Message::where('conversation_id', $this->selectedConversation->id)->count();

        $this->messages = Message::where('conversation_id',  $this->selectedConversation->id)
            ->skip($this->messages_count -  $this->paginateVar)
            ->take($this->paginateVar)->get();



        $this->dispatchBrowserEvent('chatSelected');
        $this->dispatchBrowserEvent('rowChatToBottom');

        Message::where('conversation_id', $this->selectedConversation->id)
            ->where('receiver_id', auth()->user()->id)->update(['is_read' => 1]);
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
        return view('livewire.user.conversation.body-message');
    }

    public function broadcastedMessageRead($event)
    {
        //dd($event);

        if ($this->selectedConversation) {



            if ((int) $this->selectedConversation->id === (int) $event['conversation_id']) {

                $this->dispatchBrowserEvent('markMessageAsRead');
            }
        }

        # code...
    }
    /*---------------------------------------------------------------------------------------*/
    /*-----------------------------Broadcasted Event fucntion-------------------------------------------*/
    /*----------------------------------------------------------------------------*/

    function broadcastedMessageReceived($event)
    {
        ///here 


        $this->emitTo('user.conversation.conversation-component', 'refresh');
        # code...

        $broadcastedMessage = Message::find($event['message']);


        #check if any selected conversation is set 
        if ($this->selectedConversation) {
            #check if Auth/current selected conversation is same as broadcasted selecetedConversationgfg
            if ((int) $this->selectedConversation->id  === (int)$event['conversation_id']) {
                # if true  mark message as read
                $broadcastedMessage->is_read = 1;
                $broadcastedMessage->save();


                $this->pushMessage($broadcastedMessage->id);


                $this->emitSelf('broadcastMessageRead');
            }
        }
    }

    public function broadcastMessageRead()
    {
        broadcast(new MessageRead($this->selectedConversation->id, $this->receiverInstance));
        # code...
    }
}
