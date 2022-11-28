$(document).ready(function(){


    /*서비스 슬라이드*/
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: true,
        },
        pagination: {
          el: ".swiper-pagination",
        },
      });
    });

    /*BUSINESS 이벤트*/
    
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

    // 미디어센터 스크롤바 이벤트
let barSize = 20;
let barTotal = 20;
let movesize3 = 330;
let position3 = 0;
let newCnt = 0;
let startX, endX;
const mediaSec = document.querySelector('.mediaMain');
const mediaMove = document.querySelector('.mediaMain ul');
const scrollBarBlue = document.querySelector('.scrollBar span');

function touchMediaStart(e){
  if(e.pageX==undefined){  //모바일이면...
    startX = e.touches[0].pageX ;
  }else{  //데스크탑이면..
    e.preventDefault();
    startX =  e.pageX;
  }
};
function touchMediaEnd(e){

  if(e.pageX==undefined){
    endX = e.changedTouches[0].pageX;
 }else{
  e.preventDefault();
  endX = e.pageX;
 }

 if(startX > endX){
   newCnt++;

    if(newCnt >= 5){
      newCnt = newCnt - 1;
      mediaMove.style.left = '-980px'
    } else {
      position3 += -movesize3;
      mediaMove.style.left = position3+'px';

      barTotal += barSize;
      scrollBarBlue.style.width = `${barTotal}%`
      scrollBarBlue.style.transition = 'width .3s'
    }
  } else {
    newCnt--;

    if(newCnt < 0){
      newCnt = 0;
      mediaMove.style.left = 0;
    } else {
      position3 -= -movesize3;
      mediaMove.style.left = position3+'px';

      barTotal -= barSize;
      scrollBarBlue.style.width = `${barTotal}%`
      scrollBarBlue.style.transition = 'width .3s'
    }
  }
};
mediaSec.addEventListener('touchstart', touchMediaStart);
mediaSec.addEventListener('touchend', touchMediaEnd);
mediaSec.addEventListener('mousedown', touchMediaStart);
mediaSec.addEventListener('mouseup', touchMediaEnd);



//FAQ
var faqArticle = $('.faq ul li'); // 전체 li

$('.faq ul li p a').click(function(e){
    e.preventDefault();

    var answer = $(this).parent().parent('li'); // 해당 li

    if(answer.is('.on')){ // li에 on이 있으면
        
        answer.removeClass('on'); // on없애고
        answer.children().next().stop().slideUp('fast'); // 본인 닫아라

    } else { // li에 on이 없으면

        faqArticle.removeClass('on'); // 다른 li에 on 없애고
        answer.addClass('on'); // 내 li에만 on을 넣어라
        
        faqArticle.children().next().stop().slideUp('fast');
        answer.children().next().stop().slideDown('fast');
    }
});
