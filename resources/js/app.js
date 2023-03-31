import './bootstrap';

import AOS from 'aos';
// You can also use <link> for styles
// ..



import collapse from '@alpinejs/collapse'

import Splide from '@splidejs/splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';

import Alpine from 'alpinejs';
import jQuery from 'jquery';
/*import Swiper, { Navigation, Pagination } from 'swiper';

// init Swiper:
const swiper = new Swiper('.swiper', {
    // configure Swiper to use modules
    modules: [Navigation, Pagination],

});
Swiper.use([Navigation, Pagination]); */

import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm';
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm';

import focus from '@alpinejs/focus'

Alpine.plugin(focus)

Alpine.plugin(FormsAlpinePlugin);
Alpine.plugin(NotificationsAlpinePlugin);


window.$ = jQuery;


window.Alpine = Alpine;
Alpine.plugin(collapse)

Alpine.start();

AOS.init();