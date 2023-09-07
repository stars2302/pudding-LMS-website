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

$( "#selectmenu" ).selectmenu();




//chart js
const ctx = document.getElementById('monthly_chart');

new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['4월', '5월', '6월', '7월', '8월'],
    datasets: [{
      data: [12, 19, 3, 5, 2],
      borderWidth: 1
    }]
  },
  options: {
      maintainAspectRatio :false,
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});


const pie = document.getElementById('category_chart');
new Chart(pie, {
  type: 'pie',
  data: {
    datasets: [{
      label: '# of Votes!',
      data: [12, 19, 3, 5, 2, 3],
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: false,
      }
    }
  }
});
$("#selectmenu").selectmenu();
