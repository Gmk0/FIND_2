<?php

namespace App\Http\Livewire\User\Freelance;

use App\Models\Conversation;
use Livewire\Component;
use App\Models\Freelance;

class ProfileFreelance extends Component
{
    public Freelance  $freelance;
    public $description = '';



    public function conversations()
    {
        $conversation = Conversation::where('freelance_id', $this->freelance->id)
            ->whereHas('user', function ($query) {
                $query->where('id', auth()->id());
            })
            ->first();


        // Si une conversation est trouvée, afficher la vue de la conversation
        if ($conversation) {
            return redirect()->route('MessageUser');
        }


        $conversation = new Conversation();
        $conversation->freelance_id = $this->freelance->id;
        $conversation->last_time_message = now();
        $conversation->status = 'pending';
        $conversation->save();

        $this->emitTo('user.conversation.body-message', 'loadConversation', $conversation, $freelance->id);


        return redirect()->route('MessageUser');
    }
    public function render()
    {

        $this->description = $this->freelance->description;

        return view('livewire.user.freelance.profile-freelance');
    }
}
