let keyidx = 0;//현재 입력순번
    let col = 1;//현재 게임진행횟수
    let answear = 'algorithm'.toLowerCase(); //정답!!
    let gameCount = 6; //게임 횟수
    let wordDOM ='';//게임판

    //정답 길이에 따라 게임판 만들기
    function addgame(){
      wordDOM='';
      for(let i = 1; i <= answear.length; i++){
        wordDOM += `<div class="word word${i}"><span></span></div>`;
      }
      $('.game_board').append(wordDOM);
    }
    addgame();
    $('.game_board').css({gridTemplateColumns: `repeat(${answear.length},100px)`});
    $('.game_count').text(gameCount);




    let pushtext = [];//사용자가 입력한 1row 단어
    let pushIDX = [];//사용자가 입력한 1row의 keyidx 배열

    
    $('body').keydown(function(e){

      let key = e.key; //입력한 문자열

      //현재 횟수가 총 횟수보다 작으면
      if(col <= gameCount){
        //입력한 키가 영단어면
        if (key.match(/^[a-zA-Z]$/)) {
          
          $('.word').eq(keyidx).find('span').text(key);
          keyidx++;


          //1row 입력 시
          if (keyidx % answear.length == 0) {
            if(col < gameCount){
              //1row 게임판 생성
              addgame();
            }


            //pushtext, pushIDX 배열에 push
            pushtext = [];//사용자가 입력한 1row 단어
            pushIDX = [];//사용자가 입력한 1row의 keyidx 배열
            $('.word').each(function(){
              let idx = $(this).index();

              
              if($(this).index() < col*answear.length && $(this).index() >= (col-1)*answear.length){
                pushtext.push($('.word').eq(idx).text());
                pushIDX.push(idx);
              }
            });
            
  
            
            
            $.each(pushtext,function(idx,val){
              var $this = $(this);
              //입력한 값 모두 소문자
              pushtext[idx] = val.toLowerCase();
  
              //각 글자 정답 확인
              if(pushtext[idx] == answear.charAt(idx)){
                // console.log('문자, 위치 맞음');
                $('.word').eq(pushIDX[idx]).addClass('o');
              } else if(answear.includes(pushtext[idx])){
                // console.log('문자만');
                $('.word').eq(pushIDX[idx]).addClass('v');
              } else{
                // console.log('틀렸워');
                $('.word').eq(pushIDX[idx]).addClass('x');
              }
            });


            //최종 단어 정답 확인
            function yesOrNo (){
              //입력한 값이 담긴 배열을 .join해서 정답과 맞는지 확인
              if(pushtext.join('') == answear){
                return true;
              } else{
                return false;
              }
            }
            
            setTimeout(() => {
            if(yesOrNo()){
                alert('정답입니다!');
                location.href = '/pudding-LMS-website/user/banner/game_winner.php';
              }
            }, 100);

            //주어진 횟수를 넘었을 경우
            if(keyidx == answear.length*gameCount){
              //정답이 아닌 경우
              if(!yesOrNo()){
                setTimeout(() => {
                  alert('GAME OVER');
                  location.href = '/pudding-LMS-website/user/banner/game_over.php';
                }, 500);
              }
            }

            //횟수 안넘어갔으면 col변수 1증가
            if(col < gameCount){
              col++;
            }
            $('.game_title .game_col').text(col);
          }
        }//if (key.match(/^[a-zA-Z]$/))
        






        console.log(keyidx);

        //backspace
        if(key =='Backspace'){

          if(keyidx > 0){
            if (keyidx % answear.length !== 0) {
              $('.word').eq(keyidx-1).find('span').text('');
              keyidx--;
            }
          }
        }//if(key =='Backspace')

        

        
        
      } //if(col <= gameCount)

    });//$('body').keydown
