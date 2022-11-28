$('.topMove').hide();
    
$(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
    var scroll = $(window).scrollTop(); //스크롤의 거리
    var scrollFoot = $('#footerArea').offset().top - $(window).height() + 30; // 푸터에서의 값 계산
    
    //$('.text').text(scroll);
    if(scroll > 300){ // 300이상의 거리가 발생되면
        $('.topMove').fadeIn('slow');  // top 보이기

        if(scroll < scrollFoot){ // footer보다 작으면 bottom:20, fixed
            $('.topMove').css('bottom',20).css('position','fixed');
        } else { // footer보다 크면 bottom:200, absolute
            $('.topMove').css('bottom',100).css('position','fixed');
        };

    }else{
        $('.topMove').fadeOut('fast'); // top 감추기
    }
});

$('.topMove a').click(function(e){
    e.preventDefault();
    $("html,body").stop().animate({"scrollTop":0},500);//상단으로 스르륵 이동합니다.
});
