<?php

namespace App\Http\Livewire\User\Config;

use App\Models\UserSetting;
use Livewire\Component;
use WireUi\Traits\Actions;

class Parametre extends Component
{
    use Actions;
    public $enablePush = false;
    public $enableEmail = false;
    public $enablePhone = false;
    public $enableInvoie = false;
    public $theme;
    public $userSetting;





    protected $listeners = ['refresh' => '$refresh'];
    public function mount()
    {
        $this->userSetting = UserSetting::where('user_id', auth()->user()->id)->first();




        if ($this->userSetting != null) {

            $this->enablePush = $this->userSetting->push_notifications_enabled;
            $this->enableEmail
                = $this->userSetting->email_notifications_enabled;
            $this->enablePhone
                = $this->userSetting->number_notifications_enabled;
            $this->enableInvoie
                = $this->userSetting->send_invoice_enabled;
        }
    }

    public function toogle()
    {
        if ($this->userSetting != null) {
            $this->userSetting->push_notifications_enabled
                =   $this->enablePush;
            $this->userSetting->email_notifications_enabled =   $this->enableEmail;
            $this->userSetting->number_notifications_enabled =   $this->enablePhone;
            $this->userSetting->send_invoice_enabled =   $this->enableInvoie;
            $this->userSetting->update();

            $this->notification()->success(
                $title = "Vos modifications ont éte bien sauvergader",

            );
            $this->emitSelf('refresh');
        } else {

            $userSetting = new UserSetting();
            $userSetting->user_id = auth()->user()->id;
            $userSetting->push_notifications_enabled = $this->enablePush;
            $userSetting->email_notifications_enabled = $this->enableEmail;
            $userSetting->number_notifications_enabled = $this->enablePhone;
            $userSetting->send_invoice_enabled = $this->enableInvoie;
            $userSetting->save();

            $this->notification()->success(
                $title = "Vos modifications ont éte bien sauvergader",

            );
            $this->emitSelf('refresh');
        }
    }


    public function render()
    {
        return view('livewire.user.config.parametre')->layout('layouts.user-profile2');
    }
}
