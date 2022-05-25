/**
 * Scroll to a selector que ancle is clicked.
 * 
 * @param {string} links_selector Selector to target ankers
 * @param {string} offset_selector selector to determine the high offset.
 */
const ScrollOnClick = function (links_selector, offset_selector) {

    let links_scroll = document.querySelectorAll(links_selector);
    const NAVBAR_HEIGHT = document.querySelector(offset_selector).offsetHeight;

    links_scroll.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();

            let element_offset_top = document.querySelector(e.target.attributes.href.value).offsetTop;
            window.scrollTo(0, element_offset_top - NAVBAR_HEIGHT)

        })
    });
}

export default ScrollOnClick;