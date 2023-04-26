<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        <span class="text-gray-800"> {{ __('profiles.titleUpdate') }}</span>
    </x-slot>

    <x-slot name="description">
        <span class="text-gray-800"> {{ __('profiles.UpdateDescription') }}</span>
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                    class="object-cover w-20 h-20 rounded-full">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('profiles.SelectPhoto') }}
            </x-secondary-button>

            @if ($this->user->profile_photo_path)
            <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-secondary-button>
            @endif

            <x-input-error for="photo" class="mt-2" />
        </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('profiles.Name') }}" />
            <x-input id="name" type="text" class="block w-full mt-1" wire:model.defer="state.name"
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />

        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('profiles.Email') }}" />
            <x-input id="email" type="email" class="block w-full mt-1" wire:model.defer="state.email" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !
            $this->user->hasVerifiedEmail())
            <p class="mt-2 text-sm">
                {{ __('Your email address is unverified.') }}

                <button type="button" class="text-sm text-gray-600 underline hover:text-gray-900"
                    wire:click.prevent="sendEmailVerification">
                    {{ __('Click here to re-send the verification email.') }}
                </button>
            </p>

            @if ($this->verificationLinkSent)
            <p v-show="verificationLinkSent" class="mt-2 text-sm font-medium text-green-600">
                {{ __('A new verification link has been sent to your email address.') }}
            </p>
            @endif
            @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone" value="{{ __('profiles.Phone') }}" />
            <x-input id="phone" type="text" class="block w-full mt-1" wire:model.defer="state.phone"
                autocomplete="name" />
            <x-input-error for="phone" class="mt-2" />

        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('profiles.Saved') }}
        </x-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('profiles.Save') }}
        </x-jet-button>
    </x-slot>
</x-form-section>
