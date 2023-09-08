$("#product_detail").summernote({
  height: 400,
});

let price = $("#price");

$("#price_menu").change(function () {
  let option1 = $(this).val();


  if (option1 == "무료") {
    price.prop("disabled", true);
    price.val(null);
  } else {
    price.prop("disabled", false);
  }
});

let month = $("#due");
month.find('option').eq(1).hide();

$("#due_status").change(function () {
  let option2 = $(this).val();
  console.log(option2);

  if (option2 == "무제한") {
    month.prop("disabled", true);
    month.val("무제한");
  } else {
    month.prop("disabled", false);
    month.find('option').eq(1).hide();
  }
});

$(".add_listBtn a").click(function (e) {
  e.preventDefault();

  let youtube =
    '<div class="youtube c_mb mt-3"><div class="row justify-content-between">' +
    '<div class="col-2 youtube_thumb"><input type="file" class="form-control" name="youtube_thumb[]">' +
    "</div>" +
    '<div class="col-3 youtube_name">' +
    '<input type="text" class="form-control" name="youtube_name[]" placeholder="강의명을 입력하세요.">' +
    "</div>" +
    '<div class="col-6 youtube_url">' +
    '<input type="url" class="form-control" name="youtube_url[]" placeholder="강의URL을 넣어주세요.">' +
    "</div>" +
    '<div class="col-1 trash_icon" id="trash">' +
    '<i class="ti ti-trash bin_icon"></i>' +
    "</div>" +
    "</div>" +
    "</div>";

  $(".you_upload").append(youtube);
});

$(".trash_icon").change(function () {
  if (confirm("정말로 삭제하시겠습니까?")) {
    if ($(this).filter(":checked")) {
      $(this).closest(".youtube").hide();
    }
  } else {
    $(this).find(".trash_icon input").prop("checked", false);
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

