<?php

namespace App\Http\Livewire\User\Navigation;

use Livewire\Component;
use App\Models\Notification;
use App\Events\ProjectResponse;
use WireUi\Traits\Actions;

class NotificationFreelance extends Component
{

    public function  getListeners()
    {

        $auth_id = auth()->user()->id;
        return [
            "echo-private:notify.{$auth_id},ProjectResponse" => 'broadcastedMessageReceived',
            'ServiceOrdered' => '$refresh',


        ];
    }



    public function broadcastedMessageReceived()
    {


        $this->notification()->success(
            $title = "Notification",
            $description = "Vous avez une nouvelle notifications",
        );

        $this->render();
    }

    public function remove($id)
    {

        $data = Notification::destroy($id);
    }

    public function render()
    {
        return view('livewire.user.navigation.notification-freelance', [
            'notifications' => Notification::where('user_id', auth()->user()->id)->where('is_read', 0)->orderBy('created_at', 'DESC')->get(),
        ]);
    }
}
