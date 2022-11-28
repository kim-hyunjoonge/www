$(document).ready(function() {
    /*슬라이드 Pagination progress*/
    var swiper = new Swiper(".mySwiper", {
      pagination: {
        el: ".swiper-pagination",
        type: "progressbar",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
});