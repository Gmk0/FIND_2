<x-action-section>
    <x-slot name="title">
        <span class="text-gray-800"> {{ __('profiles.titleTwoFactor') }}</span>
    </x-slot>

    <x-slot name="description">
        <span class="text-gray-800"> {{ __('profiles.descriptionTwoFactor') }}</span>
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-800">
            @if ($this->enabled)
            @if ($showingConfirmation)
            {{ __('profiles.configTwoFactorFinish') }}
            @else
            {{ __('profiles.configTwoFactorEnabled') }}
            @endif
            @else
            {{ __('profiles.configTwoFactorDisabled') }}
            @endif
        </h3>

        <div class="max-w-xl mt-3 text-sm text-gray-600">
            <p>
                <span class="text-gray-800"> {{ __('profiles.twoFactorDescription') }}</span>
            </p>
        </div>

        @if ($this->enabled)
        @if ($showingQrCode)
        <div class="max-w-xl mt-4 text-sm text-gray-800">
            <p class="font-semibold">
                @if ($showingConfirmation)
                {{ __('To finish enabling two factor authentication, scan the following QR code using your phone\'s
                authenticator application or enter the setup key and provide the generated OTP code.') }}
                @else
                {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s
                authenticator application or enter the setup key.') }}
                @endif
            </p>
        </div>

        <div class="mt-4">
            {!! $this->user->twoFactorQrCodeSvg() !!}
        </div>

        <div class="max-w-xl mt-4 text-sm text-gray-800">
            <p class="font-semibold">
                {{ __('Setup Key') }}: {{ decrypt($this->user->two_factor_secret) }}
            </p>
        </div>

        @if ($showingConfirmation)
        <div class="mt-4">
            <x-label for="code" value="{{ __('Code') }}" />

            <x-jet-input id="code" type="text" name="code" class="block w-1/2 mt-1" inputmode="numeric" autofocus
                autocomplete="one-time-code" wire:model.defer="code"
                wire:keydown.enter="confirmTwoFactorAuthentication" />

            <x-input-error for="code" class="mt-2" />
        </div>
        @endif
        @endif

        @if ($showingRecoveryCodes)
        <div class="max-w-xl mt-4 text-sm text-gray-800">
            <p class="font-semibold">
                {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to
                your account if your two factor authentication device is lost.') }}
            </p>
        </div>

        <div class="grid max-w-xl gap-1 px-4 py-4 mt-4 font-mono text-sm bg-gray-100 rounded-lg">
            @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
            <div>{{ $code }}</div>
            @endforeach
        </div>
        @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
            <x-confirms-password wire:then="enableTwoFactorAuthentication">
                <x-button type="button" wire:loading.attr="disabled">
                    {{ __('Activer') }}
                </x-button>
            </x-confirms-password>
            @else
            @if ($showingRecoveryCodes)
            <x-confirms-password wire:then="regenerateRecoveryCodes">
                <x-secondary-button class="mr-3">
                    {{ __('Regenerate Recovery Codes') }}
                </x-secondary-button>
            </x-confirms-password>
            @elseif ($showingConfirmation)
            <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                <x-button type="button" class="mr-3" wire:loading.attr="disabled">
                    {{ __('Confirm') }}
                </x-button>
            </x-confirms-password>
            @else
            <x-confirms-password wire:then="showRecoveryCodes">
                <x-secondary-button class="mr-3">
                    {{ __('Show Recovery Codes') }}
                </x-secondary-button>
            </x-confirms-password>
            @endif

            @if ($showingConfirmation)
            <x-confirms-password wire:then="disableTwoFactorAuthentication">
                <x-secondary-button wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>
            </x-confirms-password>
            @else
            <x-confirms-password wire:then="disableTwoFactorAuthentication">
                <x-danger-button wire:loading.attr="disabled">
                    {{ __('Disable') }}
                </x-danger-button>
            </x-confirms-password>
            @endif

            @endif
        </div>
    </x-slot>
</x-action-section>