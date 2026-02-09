document.addEventListener('DOMContentLoaded', function () {
    const lazyImages = document.querySelectorAll('img:not(.skip-lazy)');

    const loadImage = (img) => {
        if (!img || !img.dataset.src) return;

        img.src = img.dataset.src;
        if (img.dataset.srcset) img.srcset = img.dataset.srcset;
        if (img.dataset.sizes) img.sizes = img.dataset.sizes;

        img.classList.add('lazy-loaded');
        img.classList.remove('thm-lazy-loading');
        img.removeAttribute('data-src');
    };

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;

            const img = entry.target;
            if (!img.dataset.src) {
                obs.unobserve(img);
                return;
            }

            loadImage(img);
            obs.unobserve(img);
        });
    });

    lazyImages.forEach(img => observer.observe(img));

    //Skip Fancy if url has hash
    let fancyBoxItems = document.querySelectorAll('[data-fancybox]');

    if ( fancyBoxItems.length ) {
        const hashUrl = window.location.hash;

        fancyBoxItems.forEach(link => {
            let fancyAttribute = link.getAttribute('data-fancybox');

            if (hashUrl && hashUrl.toLowerCase().includes(fancyAttribute)) {
                let img = link.querySelector('img:not(.skip-lazy)');

                loadImage(img);
            }
        })

        fancyBoxItems.forEach(link => {
            link.addEventListener('click', function () {
                let img = link.querySelector('img:not(.skip-lazy)');
                loadImage(img);
            });
        });
    }
});
