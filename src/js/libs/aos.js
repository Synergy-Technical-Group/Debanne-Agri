import AOS from 'aos';

function loadAOS(callback) {
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.id  = 'thm-aos';
    link.href = thmLocalize.themeUrl + '/dist/css/libs/aos.css';
    document.head.appendChild(link);

    AOS.init();
}

window.addEventListener('DOMContentLoaded', () => {
    loadAOS();
});
