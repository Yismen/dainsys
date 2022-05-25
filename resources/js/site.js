try {
    window.VueSite = require('vue');
    window.$ = window.jQuery = require('jquery');
    window._ = require('lodash');
    // window.bootstrap = require('bootstrap');
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
        threshold: .3
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

// Observe to toggle active class
(function () {
    let links = document.querySelectorAll('.nav-links a');
    let sections = document.querySelectorAll('section');

    let observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {

            if (entry.isIntersecting) {

                let entry_id = entry.target.id
                links.forEach(link => {
                    entry_id === link.href.split("#")[1] ?
                        link.classList.add('active') :
                        link.classList.remove('active');
                });
            }

        });

    }, {
        threshold: 0.5
    });

    sections.forEach(section => {
        observer.observe(section);
    });
})();

// Prevent links from updating the url and scroll into their view
(function () {

    let links_scroll = document.querySelectorAll('.nav-links a, a.brand');
    const NAVBAR_HEIGHT = document.querySelector('.navbar-fixed-top').offsetHeight;

    links_scroll.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();

            let element_offset_top = document.querySelector(e.target.attributes.href.value).offsetTop;
            window.scrollTo(0, element_offset_top - NAVBAR_HEIGHT)

        })
    });
})();
