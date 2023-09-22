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

  /* DIALOG POPUP  */
var popup = $(".popup");
var popup_closeBtn = popup.find("#close");
var popup_input = popup.find("#daycheck");

popup.find('.figma').click(function() {
  window.open('https://www.figma.com/file/a1PVKp4FPIF5xlhCMeSyKu/%ED%94%84%EB%B0%94%EC%98%A4%F0%9F%90%BC?type=design&node-id=5%3A3&mode=design&t=KIOWU1f445XnXfBK-1', '_blank');
});

popup.find('.git').click(function() {
  window.open('https://github.com/hazel305/pudding-LMS-website', '_blank');
});

//쿠키 있는지 확인해서 popup 보일지 결정
function cookieCheck(name) {
  var cookieArr = document.cookie.split(';');
  var visited = false;

  for (var i = 0; i < cookieArr.length; i++) {
    if (cookieArr[i].indexOf(name) > -1) {
      visited = true;
      break;
    }
  }

  if (!visited) {
    popup.attr('open', '');
  }
}

cookieCheck('PUDDING2');

popup_closeBtn.click(function() {
  popup.removeAttr('open');

  if (popup_input.prop('checked')) {
    setCookie('PUDDING2', 'popup', 1);
  } else {
    setCookie('PUDDING2', 'popup', -1);
  }
});

//쿠키 만들기
function setCookie(name, value, day) {
  var date = new Date();
  date.setDate(date.getDate() + day);

  document.cookie = name + '=' + value + ';expires=' + date.toUTCString();
}
});
