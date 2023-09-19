$(".viewWrap_2").hide();
$(".viewB_1").click(function () {
  $(".viewWrap_2").hide();
  $(".viewWrap_1").show();
  $(".viewB_1").addClass("active");
  $(".viewB_2").removeClass("active");
});
$(".viewB_2").click(function () {
  $(".viewWrap_1").hide();
  $(".viewWrap_2").show();
  $(".viewB_2").addClass("active");
  $(".viewB_1").removeClass("active");
});

let rating = $(".rating");

rating.each(function () {
  let score = $(this).attr("data-rate");
  $(this).find(`.fa-star:lt(${score})`).css({ color: "#ffca2c" });
});
