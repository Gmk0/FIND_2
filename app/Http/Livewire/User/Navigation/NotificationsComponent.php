<?php

namespace App\Http\Livewire\User\Navigation;

use Livewire\Component;
use App\Models\Notification;

class NotificationsComponent extends Component
{
    protected $listeners = [
        'ServiceOrdered' => '$refresh'
    ];
    public function render()
    {
        return view('livewire.user.navigation.notifications-component', [
            'notifications' => Notification::where('user_id', auth()->user()->id)->where('is_read', 0)->orderBy('created_at', 'DESC')->get()
        ]);
    }
}
