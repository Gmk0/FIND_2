<div class="z-50 m-8 text-sm leading-normal text-gray-600">

    <div class="mb-6">
        {{-- path to your Logo --}}
        <img src="{{ asset('/vendor/martinschenk/livewire-cookie-consent/LaravelLogo.svg') }}">
    </div>

    <div class="mb-6">
        @lang('livewire-cookie-consent::texts.alert_text')

    </div>

    {{-- gtm-cookie-button is trigger in gtm --}}
    <button
        class="items-center w-full px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md gtm-cookie-button acceptAllCookies hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25"
        wire:click="acceptAllCookies" wire:loading.attr="disabled">
        @lang('livewire-cookie-consent::texts.alert_accept')
    </button>

    {{-- gtm-cookie-button is trigger in gtm --}}
    <button
        class="items-center w-full px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md gtm-cookie-button hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25"
        wire:click="acceptEssentialCookies" wire:loading.attr="disabled">
        @lang('livewire-cookie-consent::texts.alert_essential_only')
    </button>

    <button
        class="inline-flex items-center w-full px-4 py-2 mb-6 text-xs font-semibold tracking-widest text-gray-700 uppercase transition bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer  hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25"
        wire:click="$emit('openModal', 'cookie-consent-edit')" wire:loading.attr="disabled">
        @lang('livewire-cookie-consent::texts.alert_settings')
    </button>



</div>
