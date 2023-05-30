<?php

namespace App\Http\Livewire\User\Navigation;

use Livewire\Component;
use App\Models\Notification;
use App\Events\ProjectResponse;
use WireUi\Traits\Actions;
use App\Events\ProgressOrderEvent;

use App\Events\MessageSent;


class NotificationsComponent extends Component
{

    public $notifications;

    public function  getListeners()
    {

        $auth_id = auth()->user()->id;
        return [
            "echo-private:notify.{$auth_id},ProgressOrderEvent" => '$refresh',
            "echo-private:notify.{$auth_id},ProjectResponse" => '$refresh',
            'ServiceOrdered' => '$refresh',
            "echo-private:chat.{$auth_id},MessageSent" => '$refresh',
            'refreshComponent' => '$refresh',
            'refreshNotifications' => '$refresh',


        ];
    }

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
