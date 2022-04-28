try {
    window.VueSite = require('vue');
    window.$ = window.jQuery = require('jquery');
    window._ = require('lodash');
    // require('bootstrap');
} catch (e) { console.log(e) }


VueSite.component('dainsys-logo', require('./components/DainsysLogo.vue').default);
VueSite.component('back-to-top', require('./components/BackToTop').default);

const appSite = new VueSite({
    el: '#app'
});

// Observe to animate
(function () {
    let elements = document.querySelectorAll('.animatable');
    let options = {
        rootMargin: '0px',
        threshold: .5
    }

    let observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            // animation: from-left 0.5s 1 ease-in-out;
            let animation = entry.target.dataset.animation ?? 'fade-in-up';
            let duration = entry.target.dataset.duration ?? '0.5s';
            let count = entry.target.dataset.count ?? 1;
            let delay = entry.target.dataset.delay ?? '0s';
            let timing = entry.target.dataset.timing ?? 'ease-out';
            // entry.target.style.setProperty('visibility', 'hidden');

            if (entry.isIntersecting) {
                entry.target.style.animation = `${animation} ${duration} forwards ${count} ${timing} ${delay}`;

                observer.unobserve(entry.target);
                // entry.target.classList.remove('animatable');
            }

        });

    }, options);

    elements.forEach(element => {
        observer.observe(element);
    });
})();
