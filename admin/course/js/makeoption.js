$('#cate1').on('change',function(){
  makeOption($(this),2,'중분류', $('#cate2'));
}); //cate1 change

$('#cate2').on('change',function(){
  makeOption($(this),3, '소분류', $('#cate3'));
}); //cate2 change

$('#pcode2_1').on('change',function(){
  makeOption($(this),2,'중분류', $('#pcode3'));
}); //Modal3 select change



function makeOption(evt, step, category, target){
  let cate = evt.val();
  let data = { 
    cate : cate, 
    step: step,
    category: category
  }
console.log(data);
  $.ajax({
    async : false,
    type: 'POST',     
    data: data, 
    url: "print_option.php", 
    dataType: 'html', 
    success: function(result){
      target.html(result);
    }
  });//ajax
}
