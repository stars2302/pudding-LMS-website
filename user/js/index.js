$(document).ready(function () {

  var swiper = new Swiper(".sec1_slide", {
    slidesPerView: 1,
    centeredSlides: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 3000,
    },
  });

  //autoplayStart autoplayStop
  // let slide = $(".swiper-slide img");

  // slide.on("mouseenter", function (e) {
  //   swiper.autoplay.stop();
  // });
  // slide.on("mouseleave", function (e) {
  //   swiper.autoplay.start();
  // });


  var swiper = new Swiper(".recom_slide", {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 3000,
    },
  });

  var swiper = new Swiper(".new_slide", {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 3000,
    },
  });



  var swiper = new Swiper(".notice_slide", {
    direction: "vertical",
    autoplay: {
      delay: 3000,
    },
  });

  // AOS
  AOS.init();








});