/* DIALOG POPUP - 나서영 */
var popup = $(".popup");
var popup_closeBtn = popup.find("#close");
var popup_input = popup.find("#daycheck");

popup.find('.figma').click(function() {
  window.open('https://www.figma.com/file/SBpYD7PNfQY7D8PyVIq3Kk/%EA%B8%B0%ED%9A%8D?type=design&node-id=99%3A489&mode=design&t=TDF13rdFH2Kk27vs-1', '_blank');
});

popup.find('.git').click(function() {
  window.open('https://github.com/hoon95/last_child', '_blank');
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