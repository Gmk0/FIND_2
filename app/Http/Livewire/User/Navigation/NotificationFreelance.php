<?php

namespace App\Http\Livewire\User\Navigation;

use Livewire\Component;
use App\Models\Notification;
use App\Events\ProjectResponse;
use WireUi\Traits\Actions;
use App\Events\OrderCreated;


class NotificationFreelance extends Component
{

    use Actions;
    public $notifications;
    public function  getListeners()
    {

        $auth_id = auth()->user()->id;
        return [
            "echo-private:notify.{$auth_id},ProjectResponse" => 'broadcastedMessageReceived',
            "echo-private:notify.{$auth_id},OrderCreated" => 'broadcastedMessageReceived',
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

        //dd($id);
        $data = Notification::destroy($id);

        $this->emit('refreshComponent');
    }

    public function render()
    {
        $this->notifications = auth()->user()->unreadNotifications;



        return view('livewire.user.navigation.notification-freelance');
    }
}
