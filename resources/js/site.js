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
            let className = entry.target.dataset.animation;

            entry.target.style.setProperty('visibility', 'hidden');

            if (entry.isIntersecting) {
                entry.target.style.setProperty('visibility', 'visible');
                // entry.target.classList.remove('hidden');
                entry.target.classList.add(className);

                observer.unobserve(entry.target);
            }

        });

    }, options);

    elements.forEach(element => {
        observer.observe(element);
    });
})();
