const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

//datepicker
$("#datepicker").datepicker({
  dateFormat: "yy-mm-dd",
  monthNames: [
    "1월",
    "2월",
    "3월",
    "4월",
    "5월",
    "6월",
    "7월",
    "8월",
    "9월",
    "10월",
    "11월",
    "12월",
  ],
  dayNamesMin: ["일", "월", "화", "수", "목", "금", "토"],
});

//드롭다운
$(".selected-option").click(function () {
  $(".options-list").toggle();
  // $('.custom-dropdown').css({ 'border-bottom-left-radius': '0px;',
  //   'border-bottom-right-radius': '0px;'})
});

$(".options-list li").click(function () {
  var selectedValue = $(this).data("value");
  $(".selected-option").text($(this).text());
  $(".options-list").hide();
});

$(".delete-button").click(function (event) {
  event.stopPropagation(); // 이벤트 버블링 방지
  $(this).parent().remove();
});

$("#selectmenu").selectmenu();
