<x-action-section>
    <x-slot name="title">
        <span class="text-gray-800"> {{ __('Browser Sessions') }}</span>
    </x-slot>

    <x-slot name="description">
        <span class="text-gray-800"> {{ __("Gérez et déconnectez vos sessions actives sur d'autres navigateurs et
            appareils.") }}</span>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-200">
            {{ __('Si nécessaire, vous pouvez vous déconnecter de toutes vos autres sessions de navigation sur tous vos
            appareils.
            Certaines de vos sessions récentes sont répertoriées ci-dessous ; cependant, cette liste peut ne pas être
            exhaustive. Si
            vous pensez que votre compte a été compromis, vous devez également mettre à jour votre mot de passe..') }}
        </div>

        @if (count($this->sessions) > 0)
        <div class="mt-5 space-y-6">
            <!-- Other Browser Sessions -->
            @foreach ($this->sessions as $session)
            <div class="flex items-center">
                <div>
                    @if ($session->agent->isDesktop())
                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                        stroke="currentColor" class="w-8 h-8 text-gray-500">
                        <path
                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500">
                        <path d="M0 0h24v24H0z" stroke="none"></path>
                        <rect x="7" y="4" width="10" height="16" rx="1"></rect>
                        <path d="M11 5h2M12 17v.01"></path>
                    </svg>
                    @endif
                </div>

                <div class="ml-3">
                    <div class="text-sm text-gray-600">
                        {{ $session->agent->platform() ? $session->agent->platform() : __('Unknown') }} - {{
                        $session->agent->browser() ? $session->agent->browser() : __('Unknown') }}
                    </div>

                    <div>
                        <div class="text-xs text-gray-500">
                            {{ $session->ip_address }},

                            @if ($session->is_current_device)
                            <span class="font-semibold text-green-500">{{ __('This device') }}</span>
                            @else
                            {{ __('Last active') }} {{ $session->last_active }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="flex items-center mt-5">
            <x-jet-button wire:click="confirmLogout" wire:loading.attr="disabled">
                {{ __('Se déconnecter des autres sessions du navigateur ') }}
            </x-jet-button>

            <x-action-message class="ml-3" on="loggedOut">
                {{ __('Done.') }}
            </x-action-message>
        </div>

        <!-- Log Out Other Devices Confirmation Modal -->
        <x-dialog-modal wire:model="confirmingLogout">
            <x-slot name="title">
                {{ __('Se déconnecter des autres sessions du navigateur') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Veuillez entrer votre mot de passe pour confirmer que vous souhaitez vous déconnecter de vos
                autres sessions de
                navigation
                sur tous vos appareils.') }}

                <div class="mt-4" x-data="{}"
                    x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="block w-3/4 mt-1" placeholder="{{ __('Password') }}"
                        x-ref="password" wire:model.defer="password" wire:keydown.enter="logoutOtherBrowserSessions" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    {{ __('Annuler') }}
                </x-secondary-button>

                <x-jet-button class="ml-3" wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled">
                    {{ __('Se déconnecter des autres sessions du navigateur') }}
                </x-jet-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>