$(document).ready(function () {

  var swiper = new Swiper(".sec1_slide", {
    slidesPerView: 1,
    speed: 1000,
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

  // autoplayStart autoplayStop
  let slide = $(".swiper-slide");

  slide.on("mouseenter", function (e) {
    swiper.autoplay.stop();
  });
  slide.on("mouseleave", function (e) {
    swiper.autoplay.start();
  });

  var swiper = new Swiper(".recom_slide", {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 1000,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 3000,
    },
    navigation: {
      prevEl: ".recom_slide .swiper-button-prev",
      nextEl: ".recom_slide .swiper-button-next",
    },
  });

  var swiper = new Swiper(".new_slide", {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 1000,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 3000,
    },
    navigation: {
      prevEl: ".new_slide .swiper-button-prev",
      nextEl: ".new_slide .swiper-button-next",
    },
  });

  var swiper = new Swiper(".review_slide", {
    slidesPerView: 3,
    spaceBetween: 15,
    direction: "vertical",
    speed: 1000,
    // autoplay: {
    //   delay: 3000,
    // },
  });

  var swiper = new Swiper(".notice_slide", {
    direction: "vertical",
    speed: 1000,
    autoplay: {
      delay: 3000,
    },
  });

  // AOS
  AOS.init();

  $("#course_search").focus(function () {
    $(this).closest("form").addClass("active");
  });

  $("#course_search").blur(function () {
    $(this).closest("form").removeClass("active");
  });
});
