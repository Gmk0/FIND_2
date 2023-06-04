<?php

namespace App\Http\Livewire\Tools;

use App\Models\Notification;
use Livewire\Component;

class ViewAllNotification extends Component
{

    public $notifications;


    public function render()
    {
        $this->notifications = Notification::where('user_id', auth()->user()->id)->OrderBy('created_at', 'DESC')->get();
        return view('livewire.tools.view-all-notification');
    }
}