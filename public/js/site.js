/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/assets/js/site.js ***!
  \*************************************/
(function () {
  document.querySelector('.more-button').addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector("#services").scrollIntoView({
      behavior: 'smooth'
    });
  });
  var observer = new IntersectionObserver(function (elements) {
    elements.forEach(function (element) {
      var animation = element.target.dataset.animation ? element.target.dataset.animation : "from-top";

      if (element.intersectionRatio > 0) {
        element.target.style.visibility = "visible";
        element.target.classList.add(animation);
      } else {
        element.target.style.visibility = "hidden";
        element.target.classList.remove(animation);
      }
    });
  });
  document.querySelectorAll(".animatable").forEach(function (element) {
    observer.observe(element);
  });
})();
/******/ })()
;