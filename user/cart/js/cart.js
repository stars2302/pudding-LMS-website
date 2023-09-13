let cart_item = $('.cart_item_container .cart_item');
let cart_item_checked = cart_item.find('input:checked');
let all_check = $('.all_check');
let select_del = $('.select_del');



cartInfo(cart_item_checked);
//모든 아이템이 체크가 되면 전체선택에 checked
function didCheck(){
  if(cart_item.length === $('.cart_item input:checked').length){
    all_check.find('input').prop('checked',true);
  } else{
    all_check.find('input').prop('checked',false);
  }
}
didCheck();
$('.cart_item_container').change(function(){
  didCheck();
  cartInfo($(this).find('input:checked'));
  console.log(cart_item_checked);
  console.log($(this).find('input:checked').length);
});


//전체선택 체크(전체선택) / 해제(전체해제)
all_check.change(function(){
  //전체선택
  if($(this).find('input:checked')){
    cart_item.find('input').prop('checked',true);
  }
  //전체해제
  if(!$(this).find('input').prop('checked')){
    cart_item.find('input').prop('checked',false);
  }
});


//선택삭제 클릭 시 선택된 아이템 삭제
select_del.click(function(){
  canUdel(cart_item_checked.parent());
});


//각 item 속 del_btn 클릭 시 해당 아이템 삭제
$('.del_btn').click(function(){
  canUdel($(this).parent());
});

function canUdel(target){
  if(confirm('정말로 삭제하시겠습니까?')){
    target.remove();
    cartInfo();
  } else{
    alert('취소되었습니다');
  }
}


//결제정보
function cartInfo(checked_item){
  //상품개수
  $('.cart_count').text(checked_item.length);
  
  //상품금액
  let total_price = 0;
  checked_item.each(function(){
    let target_pr = $(this).parent().find('.price span').text().replace(',','');
    total_price+=Number(target_pr);
  });
  $('.cart_total_price').text(total_price);


  //쿠폰선택
  let discount = 0;
  $('.coupon_select').change(function(){
    let target = $(this).find('option:selected'); 
    let limit = Number(target.attr('data-limit'));
    console.log(limit)
    console.log(typeof(limit))
    //쿠폰의 최소사용금액
    if(Number(total_price) > limit){
      let type = target.attr('data-type');
      //쿠폰타입
      if(type == '정액'){
        $('.cart_discount').text(target.attr('data-discount')+'원');
        discount = Number(target.attr('data-discount'));
      }
      if(type == '정률'){
        let perc = target.attr('data-discount');
        $('.cart_discount').text(`${perc/100*total_price}원(${perc}%)`);
        discount = perc/100*total_price;
      }
    } else{
      alert('쿠폰 최소사용금액을 확인해주세요.');
      $('.current').text($(this).find('.default').text());
    }

    //총 결제금액
    $('.cart_pay_price').text(total_price-discount);
  });

}

