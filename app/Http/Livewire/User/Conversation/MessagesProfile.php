<?php

namespace App\Http\Livewire\User\Conversation;

use App\Models\Conversation;
use Livewire\Component;

class MessagesProfile extends Component
{
    public function render()
    {
        return view('livewire.user.conversation.messages-profile', [
            'conversations' => Conversation::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')
                ->take(10)
                ->get(),
        ]);
    }
}
