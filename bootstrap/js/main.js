




  var swiper = new Swiper(".swiper-container", {
    slidesPerView: 4,
    // loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    scrollbar: {
      el: '.swiper-scrollbar',
      draggable: true,
      // hide:true,
      },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 50,
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
        1280: {
            slidesPerView: 4,
            spaceBetween: 50,
        },
    },
  });

  // tab
  $('.nav-tabs a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  });
  $('.topMove').click(function(e){
    e.preventDefault();
    
    $("html,body").stop().animate({"scrollTop":0},1000); 
  });

