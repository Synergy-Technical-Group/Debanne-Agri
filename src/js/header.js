document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.querySelector('.js-nav-toggle');
    const menu = document.getElementById('menu-header');
    const body = document.body;

    // Відкриття/закриття бургер-меню
    if (navToggle && menu) {
        navToggle.addEventListener('click', function() {
            navToggle.classList.toggle('active');
            menu.classList.toggle('open');
            body.classList.toggle('lock-scroll');
        });
    }

    // Сабменю на мобільних
    const menuItems = document.querySelectorAll('#menu-header .menu-item-has-children > a');

    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            if (window.innerWidth < 992) {
                e.preventDefault(); // блокуємо перехід по лінці

                const parentItem = item.parentElement;
                const subMenu = parentItem.querySelector('.sub-menu');
                const chevron = item.querySelector('.menu-chevron');

                parentItem.classList.toggle('open');
                subMenu.classList.toggle('open');

                // плавне відкриття
                if (subMenu.classList.contains('open')) {
                    subMenu.style.maxHeight = subMenu.scrollHeight + 'px';
                    if (chevron) chevron.classList.add('active'); // поворот стрілки
                } else {
                    subMenu.style.maxHeight = 0;
                    if (chevron) chevron.classList.remove('active'); // повертаємо стрілку
                }
            }
        });
    });

    // ресайз — прибираємо мобільні стилі при десктопі
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 992) {
            document.querySelectorAll('.sub-menu').forEach(menu => {
                menu.style.maxHeight = '';
                menu.classList.remove('open');
            });
            document.querySelectorAll('.menu-item-has-children').forEach(li => li.classList.remove('open'));
            document.querySelectorAll('.menu-chevron').forEach(c => c.classList.remove('active'));
        }
    });
});
