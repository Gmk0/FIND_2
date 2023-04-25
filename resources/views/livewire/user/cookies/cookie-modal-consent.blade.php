<section x-data="{ open: @entangle('openConsentModal') }" x-show="open"
    class="fixed z-40 max-w-md p-4 mx-auto bg-white border border-gray-200 dark:bg-gray-800 left-12 bottom-16 dark:border-gray-700 rounded-2xl">
    <h2 class="font-semibold text-gray-800 dark:text-white">🍪 We use cookies!</h2>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-300">@lang('livewire-cookie-consent::texts.alert_text') <a
            href="#"
            class="font-medium text-gray-700 underline transition-colors duration-300 dark:hover:text-blue-400 dark:text-white hover:text-blue-500">Let
            me choose</a>. </p>



    <div class="grid grid-cols-2 gap-4 mt-4 shrink-0">
        <button wire:click="acceptAll()"
            class=" text-xs bg-gray-900 font-medium rounded-lg hover:bg-gray-700 text-white px-4 py-2.5 duration-300 transition-colors focus:outline-none">
            Accept tous les cookies
        </button>

        <button wire:click="refuseConsent()"
            class=" text-xs border text-gray-800 hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 font-medium rounded-lg px-4 py-2.5 duration-300 transition-colors focus:outline-none">
            Rejecter
        </button>

        <button
            class=" text-xs border text-gray-800 hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 font-medium rounded-lg px-4 py-2.5 duration-300 transition-colors focus:outline-none">
            Preferences
        </button>

        <button wire:click="refuseConsent()"
            class=" text-xs border text-gray-800 hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 font-medium rounded-lg px-4 py-2.5 duration-300 transition-colors focus:outline-none">
            fermer
        </button>
    </div>
</section>