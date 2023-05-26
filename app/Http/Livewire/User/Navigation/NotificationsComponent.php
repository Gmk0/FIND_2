<?php

namespace App\Http\Livewire\User\Navigation;

use Livewire\Component;
use App\Models\Notification;
use App\Events\ProjectResponse;
use WireUi\Traits\Actions;

class NotificationsComponent extends Component
{

    public $notifications;

    public function markRead()
    {
        if (!empty($this->notifications)) {
            foreach ($this->notifications as $notification) {
                $notification->markAsRead();
            }
        }

        $this->emit('refreshNotifications');
    }

    public function render()
    {
        $this->notifications = auth()->user()->unreadNotifications()->latest()->take(5)->get();
        return view('livewire.user.navigation.notifications-component',);
    }
}
