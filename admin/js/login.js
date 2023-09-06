/* DIALOG POPUP - 나서영 */
var popup = $(".popup");
var popup_closeBtn = popup.find("#close");
var popup_input = popup.find("#daycheck");

popup.find('.figma').click(function() {
  window.open('https://www.figma.com/file/a1PVKp4FPIF5xlhCMeSyKu/%ED%94%84%EB%B0%94%EC%98%A4%F0%9F%90%BC?type=design&node-id=5%3A3&mode=design&t=KIOWU1f445XnXfBK-1', '_blank');
});

popup.find('.git').click(function() {
  window.open('https://github.com/hazel305/pudding-LMS-website', '_blank');
});

//쿠키 있는지 확인해서 popup 보일지 결정
function cookieCheck(name) {
  var cookieArr = document.cookie.split(';');
  var visited = false;

  for (var i = 0; i < cookieArr.length; i++) {
    if (cookieArr[i].indexOf(name) > -1) {
      visited = true;
      break;
    }
  }

  if (!visited) {
    popup.attr('open', '');
  }
}

cookieCheck('PUDDING');

popup_closeBtn.click(function() {
  popup.removeAttr('open');

  if (popup_input.prop('checked')) {
    setCookie('PUDDING', 'popup', 1);
  } else {
    setCookie('PUDDING', 'popup', -1);
  }
});

//쿠키 만들기
function setCookie(name, value, day) {
  var date = new Date();
  date.setDate(date.getDate() + day);

  document.cookie = name + '=' + value + ';expires=' + date.toUTCString();
}
/* // DIALOG POPUP - 나서영 */