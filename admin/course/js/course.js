$("#product_detail").summernote({
  height: 400,
});

// $(".form-select").selectmenu();

var uploadFiles = [];
var $drop = $("#drop");
$drop
  .on("dragenter", function (e) {
    //드래그 요소가 들어왔을떄
    $(this).addClass("drag-enter");
  })
  .on("dragleave", function (e) {
    //드래그 요소가 나갔을때
    $(this).removeClass("drag-enter");
  })
  .on("dragover", function (e) {
    e.stopPropagation();
    e.preventDefault();
  })
  .on("drop", function (e) {
    //드래그한 항목을 떨어뜨렸을때
    e.preventDefault();
    console.log(e);

    $(this).removeClass("drag-enter");
    var files = e.originalEvent.dataTransfer.files; //드래그&드랍 항목
    console.log(files);
    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      attachFile(file);
    }
  });
