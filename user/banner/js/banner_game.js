let keyidx = 0;
    let col = 1;
    let answear = 'iloveu'.toLowerCase(); //정답!!
    let gameCount = 6; //게임 횟수
    let wordDOM ='';

    //정답 길이에 따라 바둑판 만들기
    for(let i = 1; i <= answear.length*gameCount; i++){
      wordDOM += `<div class="word word${i}"><span></span></div>`;
    }
    $('.game_board').append(wordDOM).css({gridTemplateColumns: `repeat(${answear.length},100px)`});




    let pushtext = [];
    let pushIDX = [];
    $('body').keydown(function(e){

      let key = e.key; //입력한 문자열

      if(col <= gameCount){
        if (key.match(/^[a-zA-Z]$/)) {
          // console.log('영어');
          $('.word').eq(keyidx).find('span').text(key);
          keyidx++;


          //1row 구분
          if (keyidx % answear.length == 0) {
            pushtext = [];//사용자가 입력한 1row 단어
            pushIDX = [];//사용자가 입력한 1row의 keyidx 배열

            $('.word').each(function(){
              let idx = $(this).index();

              //1row에 해당하는것들을 각 배열에 push
              if($(this).index() < col*answear.length && $(this).index() >= (col-1)*answear.length){
                pushtext.push($('.word').eq(idx).text());
                pushIDX.push(idx);
              }
            });
            
  
            
            //입력한 값 모두 소문자
            $.each(pushtext,function(idx,val){
              var $this = $(this);
              pushtext[idx] = val.toLowerCase();
  
              
              if(pushtext[idx] == answear.charAt(idx)){
                $('.word').eq(pushIDX[idx]).addClass('o');
              } else if(answear.includes(pushtext[idx])){
                $('.word').eq(pushIDX[idx]).addClass('v');
                // console.log('문자만');
              } else{
                $('.word').eq(pushIDX[idx]).addClass('x');
                // console.log('틀렸워');
              }
            });
  
            setTimeout(() => {
            if(pushtext.join('') == answear){
                alert('정답입니다!');
                location.href = '/pudding-LMS-website/user/banner/game_winner.php';
              }
            }, 100);
  
            col++;
          }
        }//if (key.match(/^[a-zA-Z]$/))
        








        //backspace
        if(key =='Backspace'){

          if(keyidx > 0){
            if (keyidx % answear.length !== 0) {
              $('.word').eq(keyidx-1).find('span').text('');
              keyidx--;
            }
          }
        }
        if(keyidx == answear.length*gameCount){
          setTimeout(() => {
            alert('GAME OVER');
            location.href = '/pudding-LMS-website/user/banner/game_over.php';
          }, 800);
        }//if(key =='Backspace')



      } //if(col <= gameCount)

    });//$('body').keydown