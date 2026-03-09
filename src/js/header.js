document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;
    const navToggle = document.querySelector('.js-nav-toggle');
    const headerMenu = document.getElementById('menu-header');
    const scrollTopBtn = document.querySelector('.scroll-top');

    // Mobile menu toggle
    if (navToggle && headerMenu) {
        navToggle.addEventListener('click', () => {
            navToggle.classList.toggle('active');
            headerMenu.classList.toggle('open');
            body.classList.toggle('lock-scroll');
        });

        headerMenu.addEventListener('click', (e) => {
            if (window.innerWidth >= 992) return;

            const link = e.target.closest('.menu-item-has-children > a');
            if (!link) return;

            e.preventDefault();

            const parentItem = link.parentElement;
            const subMenu = parentItem.querySelector('.sub-menu');
            const chevron = link.querySelector('.menu-chevron');

            if (!subMenu) return;

            const isOpen = parentItem.classList.contains('open');

            parentItem.classList.toggle('open', !isOpen);
            subMenu.classList.toggle('open', !isOpen);
            subMenu.style.maxHeight = !isOpen ? `${subMenu.scrollHeight}px` : '0px';

            if (chevron) {
                chevron.classList.toggle('active', !isOpen);
            }
        });
    }

    // Reset mobile menu state on desktop
    const resetMenuState = () => {
        if (window.innerWidth < 992) return;

        document.querySelectorAll('#menu-header .sub-menu').forEach((subMenu) => {
            subMenu.style.maxHeight = '';
            subMenu.classList.remove('open');
        });

        document.querySelectorAll('#menu-header .menu-item-has-children').forEach((item) => {
            item.classList.remove('open');
        });

        document.querySelectorAll('#menu-header .menu-chevron').forEach((chevron) => {
            chevron.classList.remove('active');
        });
    };

    window.addEventListener('resize', resetMenuState);

    // Scroll to top button
    if (scrollTopBtn) {
        const toggleScrollTopBtn = () => {
            const doc = document.documentElement;
            const maxScroll = doc.scrollHeight - window.innerHeight;
            const halfPage = maxScroll / 2;

            scrollTopBtn.classList.toggle('is-visible', window.scrollY >= halfPage);
        };

        toggleScrollTopBtn();

        window.addEventListener('scroll', toggleScrollTopBtn, { passive: true });
        window.addEventListener('resize', toggleScrollTopBtn);

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});