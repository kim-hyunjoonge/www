
$(document).ready(function() {

   var smh=$('.main').height();  //비주얼 이미지의 높이를 리턴한다   900px
   var on_off=false;  //false(안오버)  true(오버)
   
       $('#headerArea').mouseenter(function(){
        //   var scroll = $(window).scrollTop();
           $(this).css('background','#fff');
           $('.dropdownmenu li a').css('color','#333'); 
          
           on_off=true;
       });
   
      $('#headerArea').mouseleave(function(){
           var scroll = $(window).scrollTop();  //스크롤의 거리
           
           if(scroll<smh-50){
               $(this).css('background','none').css('border-bottom','none'); 
               $('.dropdownmenu li a').css('color','#fff');
           }else{
               $(this).css('background','#fff'); 
               $('.dropdownmenu li a').css('color','#333');
           }
          on_off=false;    
      });
   
      $(window).on('scroll',function(){//스크롤의 거리가 발생하면
           var scroll = $(window).scrollTop();  //스크롤의 거리를 리턴하는 함수
        //    console.log(scroll);

           if(scroll>smh-400){//스크롤300까지 내리면
               $('#headerArea').css('background','#fff').css('border-bottom','1px solid #ccc');
               $('.dropdownmenu li a').css('color','#333');
           }else{//스크롤 내리기 전 디폴트(마우스올리지않음)
              if(on_off==false){  //마우스가 헤더에 안오버 했을때
                   $('#headerArea').css('background','none').css('border-bottom','none');
                   $('.dropdownmenu li a').css('color','#fff');
              }
           }; 
        });

  
    //2depth 열기/닫기
    $('ul.dropdownmenu').hover(
       function() { 
          $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();}); //모든 서브를 다 열어라
          $('#headerArea').animate({height:400},'normal').clearQueue();
       },function() {
          $('ul.dropdownmenu li.menu ul').fadeOut(); //모든 서브를 다 닫아라
          $('#headerArea').animate({height:220},'normal').clearQueue();
     });
    
     //1depth 효과
     $('ul.dropdownmenu li.menu').hover(
       function() { 
           $('.depth1',this).css('color','#3f2672');
       },function() {
          $('.depth1',this).css('color','#333');
     });
     

     $('ul.dropdownmenu li.menu ul a').hover(
        function() { 
            $(this).css('color','#fff').css('background','#3f2672').css('border-radius','10px');
        },function() {
            $(this).css('color','#333').css('background','none').css('border-radius','10px');
      });

     //tab 처리
     $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
        $('ul.dropdownmenu li.menu ul').fadeIn('normal');
        $('#headerArea').animate({height:400},'fast').clearQueue();
     });

    $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
        $('ul.dropdownmenu li.menu ul').hide('fast');
        $('#headerArea').animate({height:220},'normal').clearQueue();
    });
});




    //패밀리사이트 이동
    $('.family .arrow').toggle(function(e){
        e.preventDefault();
		$('.family .list').show();
        $('.family .arrow i').removeClass().addClass('fas fa-chevron-down');
	},function(e){
        e.preventDefault();
		$('.family .list').hide();
        $('.family .arrow i').removeClass().addClass('fas fa-chevron-up');
	});

	//tab키 처리
    $('.family .arrow').on('focus', function () {        
        $('.family .list').show();	
        $('.family .list i').removeClass().addClass('fas fa-chevron-down');
        });
        $('.family .list li:last').find('a').on('blur', function () {        
        $('.family .list').hide();
        $('.family .arrow i').removeClass().addClass('fas fa-chevron-up');
    });  






   