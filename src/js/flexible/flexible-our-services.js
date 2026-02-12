import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

let servicesSwiper = new Swiper('.services__cards', {
    modules: [Navigation],
    slidesPerView: 1,
    spaceBetween: 9,
    loop: false,

    navigation: {
        nextEl: '.services .swiper-button-next',
        prevEl: '.services .swiper-button-prev',
    },

    breakpoints: {
        768: {
            slidesPerView: 2,
            spaceBetween: 9,
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 9,
        }
    }
});
