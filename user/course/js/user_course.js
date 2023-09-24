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

function setRatingStar() {
  let rating = $(".rating");

  rating.each(function () {
    let score = $(this).attr("data-rate");
    $(this).find(`.fa-star:lt(${score})`).css({ color: "#ffca2c" });
  });
}
setRatingStar();

$(".preview").click(function (e) {
  e.preventDefault();
  $(".modalBackground").addClass("active");
});
$(".modalBox i").click(function (e) {
  e.preventDefault();
  $(".modalBackground").removeClass("active");
});

//장바구니
$(".viewCart").on("click", function () {
  let data = {
    cid: cid,
  };
  $.ajax({
    type: "GET",
    data: data,
    url: "add_cart.php",
    dataType: "json",
    success: function (return_data) {
      if (return_data.result === "success") {
        console.log("retun_data", return_data);
        trElement.remove();
        alert("장바구니 담기 성공");
        location.reload();
      } else {
        alert("장바구니 담기 실패");
      }
    },
    error: function (error) {
      console.log("Error:", error);
      alert("장바구니 담기 중에 오류가 발생했습니다.");
    },
  });
});

let r_idx = 1,
  r_page = 2;

$(".moreviewBtn").on("click", function () {
  let data = {
    cid: $("#cid").val(),
    r_idx: r_idx, // 리뷰 가져온 횟수
    r_page: r_page, // 리뷰 가져올 댓글 수
  };
  $.ajax({
    type: "GET",
    data: data,
    url: "review_ok.php",
    dataType: "html",
    success: function (return_data) {
      r_idx++;
      // 전체리뷰갯수(5) < 가져온 리뷰갯수(가져온횟수*가져온댓글수)
      if ($("#cnt").val() < r_idx * r_page) {
        $(".moreviewBtn").hide();
      }
      $("#review-wrap").append(return_data);
      setRatingStar();
    },
    error: function (error) {
      console.log(error.responseText);
    },
  });
});
