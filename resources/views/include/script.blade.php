@stack('modals')

@livewire('notifications')
@wireUiScripts



@vite(['resources/js/app.js'])
@livewireScripts


@stack('script')



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


<script src="/js/script.js" defer></script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="/js/intlTelInput.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-tooltip@1.x.x/dist/cdn.min.js" defer></script>
