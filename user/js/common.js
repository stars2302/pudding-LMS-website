let topBtn = $('.top_btn');
let historyBtn = $('.history_btn');

$(window).on("scroll",function (e) {
  e.preventDefault();
  let scrollPosition = $(this).scrollTop();
  //let footerOST = $("footer").offset().top;
 

  if (scrollPosition > 500 ) {
    topBtn.addClass("active");
    historyBtn.addClass("active");
  }else{
    topBtn.removeClass("active");
    historyBtn.removeClass("active");
  }

  topBtn.on("click",function (e) {
    e.preventDefault();
    $("html, body").stop().animate({ scrollTop: 0 }, "easeInCubic");
  });
  
  
  // if(scrollPosition >= footerOST - 500) {
  //   goTop.addClass("light");
  //   logoBtn.addClass("light");
  // }else{
  // goTop.removeClass("light");
  // logoBtn.removeClass("light");
  // }
});