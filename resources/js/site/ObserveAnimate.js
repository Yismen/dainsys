/**
 * 
 * @param {string} selector Selector to target all animatable elements
 * @param {double} threshold Number between 0 and 1 representing the percentage of the observable that needs to be in view to trigger the observation.
 */
const ObserveAnimate = function (selector, threshold = 0.3) {

    let elements = document.querySelectorAll(selector);
    let options = {
        rootMargin: '0px',
        threshold
    }

    let observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            // animation: from-left 0.5s 1 ease-in-out;
            let datasets = entry.target.dataset;

            let animation = datasets.animation ?? 'fade-in-up';
            let duration = datasets.duration ?? '0.5s';
            let count = datasets.count ?? 1;
            let delay = datasets.delay ?? '0s';
            let timing = datasets.timing ?? 'ease-out';
            let observeOnce = datasets.observeOnce;

            if (entry.isIntersecting) {
                entry.target.style.animation = `${animation} ${duration} forwards ${count} ${timing} ${delay}`;

                if (observeOnce === undefined || observeOnce === null) {
                    observer.unobserve(entry.target);
                }
            }

        });

    }, options);

    elements.forEach(element => {
        element.style.opacity = 0;

        observer.observe(element);
    });
}

export default ObserveAnimate;