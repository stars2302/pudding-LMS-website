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

$(".preview").click(function (e) {
  e.preventDefault();
  $(".modalBackground").addClass("active");
});
$(".modalBox i").click(function (e) {
  e.preventDefault();
  $(".modalBackground").removeClass("active");
  $(".object").trigger("pause");
});

$(".viewCart").click(function (e) {
  e.preventDefault();
  if (confirm("장바구니 담기 완료! 장바구니로 이동하시겠습니까?")) {
    location.href = "http://localhost/pudding-LMS-website/user/cart/cart.php";
  }
});

$(".viewSection3").slice(0, 2).show();
$(".moreviewBtn").click(function (e) {
  e.preventDefault();
  $(".viewSection3:hidden").slice(0, 2).show();
  if ($(".viewSection3:hidden").length == 0) {
    $(".moreviewBtn").hide();
  }
});
