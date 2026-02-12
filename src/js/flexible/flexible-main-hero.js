import Swiper from 'swiper';
import { Pagination } from 'swiper/modules';
import { Navigation } from 'swiper/modules';

let swiper = new Swiper('.hero-slider__list', {
    modules: [Pagination],
    slidesPerView: 1,
    loop: false,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        dynamicBullets: true,
    },
});
