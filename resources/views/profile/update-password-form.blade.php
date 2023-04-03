<x-form-section submit="updatePassword">
    <x-slot name="title">
        <span class="text-gray-800"> {{ __('profiles.UpdatePassword') }}</span>
    </x-slot>

    <x-slot name="description">
        <span class="text-gray-800">{{ __('profiles.updatePasswordDescription') }}</span>

    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('profiles.CurrentPassword') }}" />
            <x-jet-input id="current_password" type="password" class="block w-full mt-1"
                wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('profiles.NewPassword') }}" />
            <x-jet-input id="password" type="password" class="block w-full mt-1" wire:model.defer="state.password"
                autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('profiles.ConfirmPassword') }}" />
            <x-jet-input id="password_confirmation" type="password" class="block w-full mt-1"
                wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions" class="dark:bg-gray-800">
        <x-action-message class="mr-3 " on="saved">
            {{ __('profiles.Saved') }}
        </x-action-message>

        <x-jet-button>
            {{ __('profiles.Save') }}
        </x-jet-button>
    </x-slot>
</x-form-section>