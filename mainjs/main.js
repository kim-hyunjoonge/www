$(document).ready(function(){

    var busiCount = 4;
    var busiCnt = 1;

    // BUSINESS 좌/우 이동
    $('.business .businessBox ul li:eq(0)').show();
    $('.business .businessImage img:eq(0)').show();

    $('.business .businessBtn a').click(function(e){
        e.preventDefault();

        if($(this).is('.btnPrev')){ // 오른쪽 버튼 클릭
            if(busiCnt == 1){ busiCnt = busiCount+1; }
            busiCnt--; //카운트 감소  // 1 2 1 2
        }else if($(this).is('.btnNext')){  //왼쪽 버튼 클릭
            if(busiCnt == busiCount){ busiCnt = 0; }
            busiCnt++; //카운트 1씩증가
        }

        $('.business .businessBox ul li').hide();
        $('.business .businessBox ul li:eq('+ (busiCnt-1) +')').fadeIn();

        $('.business .businessImage img').hide();
        $('.business .businessImage img:eq('+ (busiCnt-1) +')').fadeIn();

    });

/*스크롤 이벤트*/

var h1= $('#content .thinkGreat').offset().top -400 ;
var h2= $('#content .business').offset().top -400 ;
var h3= $('#content .socialContibution').offset().top -400 ;
var h4= $('#content .mediaCenter').offset().top -400 ;
var h5= $('#content .news').offset().top -400 ;
var h6= $('#content .recruitMent').offset().top -400 ;

var cnt1 = false

$(window).on('scroll',function(){ //스크롤의 좌표가 변하면.. 스크롤 이벤트
    var scroll = $(window).scrollTop(); //스크롤top의 좌표를 담는다

    $('.text').text(scroll);  //스크롤 좌표의 값을 찍는다.
 
    if(scroll>=300 && scroll<h1){  //스크롤의 거리의 범위를 처리
        $('#content .thinkGreat').addClass('boxMove');  //첫번째 내용 콘텐츠 애니메이션
       
                  
    }else if(scroll>=h2 && scroll<h3){            
        $('#content .business').addClass('boxMove');

        
    }else if(scroll>=h3 && scroll<h4){            
        $('#content .socialContibution').addClass('boxMove');
       

    }else if(scroll>=h4 && scroll<h5){            
        $('#content .mediaCenter').addClass('boxMove');
    
    
    }else if(scroll>=h5 && scroll<h6){            
        $('#content .news').addClass('boxMove');
   
    }else if(scroll>=h6){            
        $('#content .recruitMent').addClass('boxMove');
    }
});

  });


  //mediaSlide

//   var position=0;  //최초위치
//   // var movesize=150; //이미지 하나의 너비
//  var movesize = $('.mediaBox ul li').width();
// //    console.log(movesize);
//   var timeonoff;
 
//   $('.mediaBox ul').after($('.mediaBox ul').clone());

//   function moveG() {
//       position-=movesize;  // 150씩 감소
//       $('.mediaBox').stop().animate({left:position}, 'fast',
//           function(){							
//           if(position==-750){
//               $('.mediaBox').css('left',0);
//               position=0;
//           }
//       });
//   }


  
//       //슬라이드 겔러리를 한번 복제

// $('.button').click(function(e){
//    e.preventDefault();

//    //clearInterval(timeonoff);
   
//    if($(this).is('.btnPrev')){  //이전버튼 클릭
      
       
//         position-=movesize;  // 150씩 감소
//             $('.mediaBox').stop().animate({left:position}, 'fast',
//               function(){							
//                   if(position<=-550){
//                       $('.mediaBox').css('left',0);
//                       position=0;
//                   }
//               }).clearQueue();
//    }else if($(this).is('.btnNext')){  //다음버튼 클릭
//          if(position>=0){
//               $('.mediaBox').css('left',-600);
//               position=-600;
//           }

//           position+=movesize; // 150씩 증가
//           $('.mediaBox').stop().animate({left:position}, 'fast',
//               function(){							
//                   if(position>=0){
//                       $('.mediaBox').css('left',-600);
//                       position=-600;
//                   }
//               }).clearQueue();
//     }
//  });

 // 미디어센터
 var position=0;  //최초위치
    // var movesize=150; //이미지 하나의 너비
   var movesize = 400;
//    console.log(movesize);
    // var timeonoff;
   
    $('.mediaBox ul').after($('.mediaBox ul').clone());
  
    // function moveG() {
    //     position-=movesize;  // 150씩 감소
    //     $('.mediaBox').stop().animate({left:position}, 'fast',
    //         function(){							
    //         if(position==-1950){
    //             $('.mediaBox').css('left',0);
    //             position=0;
    //         }
    //     });
    // }

    // timeonoff= setInterval(moveG, 3000);

    
        //슬라이드 겔러리를 한번 복제
 
  $('.button').click(function(e){
     e.preventDefault();

     //clearInterval(timeonoff);
     
     if($(this).is('.btnPrev')){  //이전버튼 클릭
        if(position==-1200){
            $('.mediaBox').css('left',0);
            position=0;
        }
          position-=movesize;  // 150씩 감소
              $('.mediaBox').stop().animate({left:position}, 'fast',
                function(){							
                    if(position==-1200){
                        $('.mediaBox').css('left',0);
                        position=0;
                    }
                }).clearQueue();
     }else if($(this).is('.btnNext')){  //다음버튼 클릭
           if(position==0){
                $('.mediaBox').css('left',-1200);
                position=-1200;
            }
            position+=movesize; // 150씩 증가
            $('.mediaBox').stop().animate({left:position}, 'fast',
                function(){							
                    if(position==0){
                        $('.mediaBox').css('left',-1200);
                        position=-1200;
                    }
                }).clearQueue();
      }
   });