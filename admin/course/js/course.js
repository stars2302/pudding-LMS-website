$(function () {
  $("#product_detail").summernote({
    height: 400,
  });

  let price = $("#price");

  $("#price_menu").change(function () {
    let option1 = $(this).val();
    // console.log(option1)

    if (option1 == "무료") {
      price.prop("disabled", true);
      price.val(null);
    } else {
      price.prop("disabled", false);
    }
  });

  let month = $("#due");

  $("#due_status").change(function () {
    let option2 = $(this).val();
    console.log(option2);

    if (option2 == "무제한") {
      month.prop("disabled", true);
      month.val(null);
    } else {
      month.prop("disabled", false);
    }
  });

  $(".add_listBtn a").click(function (e) {
    e.preventDefault();
    // let youtube = $(".youtube:last").clone();
    let youtube =
      '<div class="youtube2 c_mb mt-3"><div class="row justify-content-between">' +
      '<div class="col-2 youtube_thumb"><input type="file" class="form-control" name="youtube_thumb[]"/>' +
      "</div>" +
      '<div class="col-3 youtube_name">' +
      '<input type="text" class="form-control" name="youtube_name[]" placeholder="강의명을 입력하세요."/>' +
      "</div>" +
      '<div class="col-6 youtube_url">' +
      '<input type="url" class="form-control" name="youtube_url[]" placeholder="강의URL을 넣어주세요."/>' +
      "</div>" +
      '<div class="col-1 trash_icon">' +
      '<i class="ti ti-trash bin_icon"></i>' +
      "</div>" +
      "</div>" +
      "</div>";
    //youtube.find("input").val("");
    //youtube.find("img").attr("src", "");
    $(".you_upload").append(youtube);
  });

  $(".you_upload").on("click", ".trash_icon", function () {
    if ($(".youtube").length > 1) {
      $(this).closest(".youtube").remove();
    }
  });

  $("#course_form").submit(function () {
    let markupStr = $("#product_detail").summernote("code");
    let content = encodeURIComponent(markupStr);
    $("#content").val(content);

    if ($("#product_detail").summernote("isEmpty")) {
      alert("상세설명을 입력하세요");
      return false;
    }
  });
});
