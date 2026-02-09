import Swiper from 'swiper';
import {Navigation} from 'swiper/modules';

let swiper = new Swiper('.hero-slider__list', {
    modules: [Navigation],
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});