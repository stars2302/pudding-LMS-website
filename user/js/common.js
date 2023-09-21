$(document).ready(function () {
//nice select 적용
let selectMenu = $('.selectmenu');
if(selectMenu.length > 0){
  $('.selectmenu').niceSelect();
} 

// top, history btn
let topBtn = $('.top_btn');
let historyBtn = $('.history_btn');

$(window).on("scroll", function(e) {
  e.preventDefault();
  let scrollPosition = $(this).scrollTop();

  if (scrollPosition > 500) {
    topBtn.addClass("active");
    historyBtn.addClass("active");
  } else {
    topBtn.removeClass("active");
    historyBtn.removeClass("active");
  }
  topBtn.on("click", function(e) {
    e.preventDefault();
    $("html, body").stop().animate({
      scrollTop: 0
    }, "easeInCubic");
  });
});


let recentList = $('.recent_list');
historyBtn.on("click", function(e) {
  e.preventDefault();
  recentList.css('opacity', 1);  
});


});