<div>
    {{-- <div x-data="{ show: false }" x-show="! localStorage.getItem('cookie-consent')"
        class="fixed bottom-0 right-0 z-50 p-6">
        <div class="p-6 bg-white rounded-md shadow-md">
            <p class="mb-4 text-lg">Ce site utilise des cookies pour améliorer votre expérience. Acceptez notre
                politique de cookies pour continuer.</p>
            <button class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700"
                x-on:click="localStorage.setItem('cookie-consent', true); show = false;">Accepter</button>
        </div>
    </div>--}}

    {{--<div x-data="{show:false}" x-show="! localStorage.getItem('cookie-consent')">

        <div class="fixed bottom-0 right-0 z-50 px-4 pb-16 lg:px-10">
            <div class="relative bg-gray-500 p-14 rounded-xl">

                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4 mb-4 md:w-auto lg:mb-0">
                        <h3 class="mb-2 text-2xl font-bold text-white font-heading">Cookie Policy</h3>
                        <p class="max-w-xs leading-loose text-gray-200">
                            Ce site utilise des cookies pour améliorer votre expérience. Acceptez notre
                            politique de cookies pour continuer
                        </p>
                    </div>
                    <div class="flex w-full px-4 py-2 md:w-1/3">
                        <a class="inline-flex items-center px-8 py-4 ml-auto mr-2 text-lg font-bold text-white hover:text-gray-100"
                            href="#">
                            <span>More</span>
                            <svg class="w-6 h-4 ml-3" width="27" height="15" viewbox="0 0 27 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M26.0851 7.66792L19.398 14.355L18.5621 13.5192L24.242 7.83927L0.590432 7.84345L0.590431 6.66485L24.242 6.66067L18.98 1.39873L19.8159 0.562843L26.0851 6.83202C26.3159 7.06286 26.3159 7.43708 26.0851 7.66792Z"
                                    fill="white"></path>
                            </svg>
                        </a>
                        <a class="inline-block px-8 py-4 text-lg font-bold text-white bg-transparent border border-gray-300 rounded-full hover:border-gray-200"
                            x-on:click="localStorage.setItem('cookie-consent', true); show = false;" href="#">Accept</a>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}




    @if (Cookie::get(config('livewire-cookie-consent.cookie_name')) !== null)
    {{-- <p>cookie is set</p>--}}

    @else


    {{-- <p>cookie is not set</p>--}}
    {{--
    <livewire:cookie-consent-modal />--}}
    {{--modal sale si no se encuentra el cookie --}}



    @if ($showComponent)
    @if($askForConsent)
    @include('livewire.user.cookies.cookie-modal-consent')

    @endif

    @endif
    @endif






</div>
@push('script')

<script>
    window.addEventListener('load',
            function (event) {
                setTimeout(() => {
                   Livewire.emit("showComponentD")
                }, 2000);

            })
</script>


<script>
    Livewire.on('showComponentD', () => {
            @this.set('showComponent', true);

        });
</script>

<script>
    window.addEventListener('cookieChanged', event => {
    //alert('in addEventListener cookieChanged -> value: ' + event.detail.value);
    if (window.dataLayer) {
    //alert('vor dataLayer.push -> value: ' + event.detail.value);
    window.dataLayer.push({event: event.detail.value});
    }
    })
</script>

@endpush
