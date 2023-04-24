<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;

class CookieConsent
{
    public function cookieExists(): bool
    {
        return !is_null($this->getCookie());
    }

    public function consentHasBeenGiven(): bool
    {
        if ($this->getCookie() === $this->getConsentValue()) {
            return true;
        }

        return false;
    }

    public function giveConsent(): void
    {
        Cookie::queue(
            config('cookie-consent.cookie_name'),
            config('cookie-consent.consent_value'),
            config('cookie-consent.consent_cookie_lifetime')
        );
    }

    public function refuseConsent(): void
    {
        Cookie::queue(
            config('cookie-consent.cookie_name'),
            config('cookie-consent.refuse_value'),
            config('cookie-consent.refuse_cookie_lifetime')
        );
    }

    /**
     * @return array|string|null
     */
    private function getCookie()
    {
        return request()->cookie(config('cookie-consent.cookie_name'));
    }

    private function getConsentValue(): string
    {
        return config('cookie-consent.consent_value');
    }
}