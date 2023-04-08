<?php

namespace App\Http\Livewire\User\Conversation;

use Livewire\Component;
use App\Models\Freelance;
use App\Models\Conversation;

class ConversationComponent extends Component
{
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
