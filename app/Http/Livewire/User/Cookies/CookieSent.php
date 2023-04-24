<?php

namespace App\Http\Livewire\User\Cookies;

use Livewire\Component;
use Martinschenk\LivewireCookieConsent\CookieConsentModalService;

class CookieSent extends Component
{

    public bool $askForConsent;

    public bool $showComponent = false;

    public bool $openConsentModal;
    public bool $openCookieModal = false;


    public function mount(\App\Services\CookieConsent $service)
    {
        $this->askForConsent = !$service->cookieExists();



        $this->openConsentModal = true;
    }

    public function toggleCookieModal()
    {
        $this->openCookieModal = !$this->openCookieModal;
        $this->openConsentModal = !$this->openConsentModal;
    }

    public function giveConsent(\App\Services\CookieConsent $service)
    {
        $service->giveConsent();

        $this->openConsentModal = false;
        $this->askForConsent = false;
    }

    public function acceptAll(CookieConsentModalService $service)
    {
        $service->setConsentCookieValueBoth();
        $this->openConsentModal = false;
        $this->askForConsent = false;

        $this->dispatchBrowserEvent('cookieChanged', ['value' => 'true']);
    }
    public function acceptEssentialCookies(CookieConsentModalService $service)
    {
        $this->openConsentModal = false;
        $this->askForConsent = false;

        $service->setConsentCookieValueNone();

        $this->dispatchBrowserEvent('cookieChanged', ['value' => 'false']);
    }

    public function refuseConsent(\App\Services\CookieConsent $service)
    {
        $service->refuseConsent();

        $this->openConsentModal = false;
        $this->askForConsent = false;
    }
    public function render()
    {

        return view('livewire.user.cookies.cookie-sent');
    }
}