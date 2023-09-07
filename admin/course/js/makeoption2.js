$("#cate1").on("click", "li", function () {
  console.log($(this));
  makeOption2($(this), 2, $("#cate2"));

  //카테고리 재선택시, 중/소 분류 초기화
  $(".big_cate button").text($(this).find("span").text());
  $("#cate1").on("click", "li", function () {
    $(".md_cate button").text("중분류");
    $(".sm_cate button").text("소분류");
  });
}); //cate1 change


$("#cate2").on("click", "li", function () {
  makeOption2($(this), 3, $("#cate3"));
  $(".md_cate button").text($(this).find("span").text());
}); //cate2 change


$("#cate3").on("click", "li", function () {
  $(".sm_cate button").text($(this).find("span").text());
}); //cate3 change

function makeOption2(evt, step, target) {
  let cate = evt.attr("data-cate");
  let data = {
    cate: cate, //부모 분류의 cid
    step: step,
  };
  console.log(data);

  $.ajax({
    async: false, //sucess의 결과 나오면 이후 작업 수행
    type: "POST", //변수명cate1의 값을 전달할 방식 post
    data: data, //data객체의 값을 data property 할당
    url: "print_option2.php",
    dataType: "html", //success성공후 printOption.php가 반환하는 데이터의 형식  <option></option>
    error: function (error) {
      console.log(error);
    },
    success: function (result) {

      target.html(result);
    },
  }); //ajax
}

