<?php

namespace App\Http\Livewire\User\Navigation;

use Livewire\Component;

use App\Events\ProgressOrderEvent;
use App\Events\ProjectResponse;
use App\Events\MessageSent;

class HeaderUser extends Component
{




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


    public function render()
    {
        return view('livewire.user.navigation.header-user');
    }
}
