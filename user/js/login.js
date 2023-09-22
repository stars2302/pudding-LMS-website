$(document).ready(function () {

  //프로모션 슬라이드
  var swiper = new Swiper(".mySwiper", {
    speed: 3000,
    pagination: {
      el: ".swiper-pagination",
    },
    autoplay: {
      delay: 3000,
    },
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    }
  });



// 텍스트 입력란에 텍스트가 존재하는지 검사하는 함수
let readInputText = (input) => {
	let result = false;

	console.log("input value: " + input.value);
	if ((input.value === null) || (input.value === "")) {
		result = false;
	} else {
		result = true;
	}
	
	return result;
}














});
