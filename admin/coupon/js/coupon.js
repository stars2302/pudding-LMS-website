$('.thumb_btn').click(function(){
  $('.thumbnail .hidden').trigger('click');
});

/*
$('.coupon_sale_check, .coupon_limit_date').find('input').change(function(){
  let $this = $(this);
  console.log($this);
  if($(this).prop('checked')){
    $('input').prop('disabled',false);
    $this.parent().siblings('.form-check').find('.input').prop('disabled',true);
  }
});
$('.coupon_sale_check, .coupon_limit_date').find('input').trigger('change');
*/

$('.coupon_sale_check').change(function(){
  let $this = $(this);
  // inputDisable($this);
  if($this.find('input[type="radio"]').filter(':checked')){
    $this.parent().find('.input').prop('disabled',true);
    $this.find('input[type="radio"]:checked').siblings('.input').prop('disabled',false);
    console.log($this.parent().find('.input'));
    console.log($this.find('input[type="radio"]:checked').siblings('.input'));
  }
});
$('.coupon_sale_check').trigger('change');

$('.coupon_limit_date').change(function(){
  $this = $(this);
  if(!$(this).find('input[name="coupon_limit_date"]').prop('checked')){
    $this.find('.form-select').prop('disabled',false);
  } else{
    $this.find('.form-select').prop('disabled',true);
  }
});
