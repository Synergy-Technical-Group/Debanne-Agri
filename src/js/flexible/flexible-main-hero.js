import Swiper from 'swiper';
import { Pagination, Autoplay } from 'swiper/modules';

let swiper = new Swiper('.hero-slider__list', {
    modules: [Pagination, Autoplay],
    slidesPerView: 1,
    loop: true,
    speed: 1200,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },

    pagination: {
        el: '.hero-slider__list .swiper-pagination',
        clickable: true,
        bulletClass: 'swiper-bullet',
        bulletActiveClass: 'is-active',
    },
});
