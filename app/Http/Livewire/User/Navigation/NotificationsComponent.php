<?php

namespace App\Http\Livewire\User\Navigation;

use Livewire\Component;
use App\Models\Notification;
use App\Events\ProjectResponse;
use WireUi\Traits\Actions;

class NotificationsComponent extends Component
{


    public function render()
    {
        return view('livewire.user.navigation.notifications-component', [
            'notificationsCount' => Notification::where('user_id', auth()->user()->id)->where('is_read', 0)->orderBy('created_at', 'DESC')->get()
        ]);
    }
}
