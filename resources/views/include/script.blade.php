@stack('modals')

@livewire('notifications')



@livewireScripts








<script>
    function playSound(soundPath) {
    var sound = new Howl({
    src: [soundPath],
    autoplay: true,
    loop: false,
   volume: 1.0, // Définir le volume à fond
    rate: 1.0
    });

    sound.play();
    }





</script>



<script src="/build/assets/app.js" defer></script>



<script src="/js/script.js"></script>
<script src="/service-worker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
<script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="/js/intlTelInput.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-tooltip@1.x.x/dist/cdn.min.js" defer></script>


<script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.0.3/dist/index.min.js"></script>


@stack('script')


@auth
@include('include.beams')
@endauth