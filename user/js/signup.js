$(document).ready(function () {

  //프로모션 슬라이드
//   var swiper = new Swiper(".mySwiper", {
//     speed: 1000,
//     pagination: {
//       el: ".swiper-pagination",
//     },
//     autoplay: {
//       delay: 3000,
//     },
//     loop: true,
//     pagination: {
//       el: ".swiper-pagination",
//       clickable: true,
//     },
//   });



// // 텍스트 입력란에 텍스트가 존재하는지 검사하는 함수
// let readInputText = (input) => {
// 	let result = false;

// 	console.log("input value: " + input.value);
// 	if ((input.value === null) || (input.value === "")) {
// 		result = false;
// 	} else {
// 		result = true;
// 	}
	
// 	return result;
// }

//   // email 정규식을 검사하는 함수
// let checkEmailRule = function(emailText){
// 	//이메일 정규식
// 	var emailRule = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;

// 	if (emailRule.test(emailText.value)) {
// 		console.log("correct input email");
// 	} else {
// 		console.log("this is not email form");
// 	}

// 	return emailRule.test(emailText.value); // 정규식 비교 결과를 리턴 (true / false)
// }


// // 비밀번호 정규식을 검사하는 함수
// let checkPasswordRule = (password) => {
// 	// 길이 8~20, 소문자 하나, 특수문자 하나이상
// 	var passwordRule = /^(?=.*[a-zA-Z])((?=.*\d)|(?=.*\W)).{8,20}$/;

// 	if (passwordRule.test(password.value)) {
// 		console.log("comply with password rule");
// 	} else {
// 		console.log("comply with password rule");
// 	}

// 	return passwordRule.test(password.value); // 정규식 비교 결과를 리턴 (true / false)
// }

	// 모든 동의 체크박스 처리
// 	const allCheck = document.querySelector("input[name=all-agree]");
// 	let checkbox = document.getElementsByName('agree');
	
// 	allCheck.addEventListener('change', function() {
// 		if (this.checked) {
// 			console.log("Checkbox is checked..");
// 			for (let chkIdx = 0; chkIdx < checkbox.length; chkIdx++) {
// 				console.log(checkbox[chkIdx] + "...true");
// 				checkbox[chkIdx].checked = true;
// 			}
// 		} else {
// 			console.log("Checkbox is not checked..");
// 			for (let chkIdx = 0; chkIdx < checkbox.length; chkIdx++) {
// 				console.log(checkbox[chkIdx] + "...false");
// 				checkbox[chkIdx].checked = false;
// 			}
// 		}
// 	});




});
