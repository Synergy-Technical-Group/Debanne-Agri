import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

let partnersSwiper = new Swiper('.partners__swiper', {
    modules: [Navigation],
    slidesPerView: 1,
    loop: false,

    navigation: {
        nextEl: '.partners .swiper-button-next',
        prevEl: '.partners .swiper-button-prev',
    },

    breakpoints: {
        768: {
            slidesPerView: 3,
            spaceBetween: 16,
        },
        1440: {
            slidesPerView: 4,
            spaceBetween: 20,
        }
    }
});
