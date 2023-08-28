$('.thumb_btn').click(function(){
  $('.thumbnail .hidden').trigger('click');
});

$('.coupon_sale_check, .coupon_limit_date').find('input').change(function(){
  let $this = $(this);
  console.log($this);
  if($(this).prop('checked')){
    $('input').prop('disabled',false);
    $this.parent().siblings('.form-check').find('.input').prop('disabled',true);
  }
});
$('.coupon_sale_check, .coupon_limit_date').find('input').trigger('change');