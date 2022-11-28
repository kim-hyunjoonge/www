
   /*----sticky menu----*/
$(document).ready(function(){
    
   //메뉴 클릭 시 해당 위치로 이동
   $('.tabMenu a').click(function(e){
       e.preventDefault();

       var value=0;

       if($(this).hasClass('link1')){  //첫번째 메뉴 버튼을 클릭하면
           value= $('.con1').offset().top-200;  // 해당 요소의 상단(top)까지의 거리 
           }else if($(this).hasClass('link2')){
               value= $('.con2').offset().top-200; 
               }else if($(this).hasClass('link3')){
                   value= $('.con3').offset().top-200; 
                   }else if($(this).hasClass('link4')){
                     value= $('.con4').offset().top-200; 
                     }    

   $("html,body").stop().animate({"scrollTop":value},1000);});

   //첫번째 서브메뉴 활성화
   $('.tabMenu li:eq(0)').find('a').addClass('afline');
   $('.tabMenu li:eq(0)').find('a').css('color','#4d1f7a').css('font-weight','500').css('opacity','1');
   $('con1').addClass('boxMove');

   //스크롤 좌표 변경 시 스크롤 이벤트
   var smh= $('.visual').height()+350; //sticky menu 고정할 값
   var h1= $('.con1').offset().top-1000 ;
   var h2= $('.con2').offset().top-1000 ;
   var h3= $('.con3').offset().top-1000 ;
   var h4= $('.con4').offset().top-1000 ;
   $(window).on('scroll',function(){ 

       var scroll = $(window).scrollTop(); //스크롤top의 좌표를 담는다

       //$('.text').text(scroll); //스크롤 좌표의 값을 찍는다.

       //sticky menu 처리
       if(scroll>smh){ 
           $('.navBox').addClass('navOn'); //스크롤의 거리가 350px 이상이면 서브메뉴 고정
           $('.tabMenu li:eq(0)').find('a').removeClass('afline');
           $('header').hide();
           }else{
               $('.navBox').removeClass('navOn'); //스크롤의 거리가 350px 보다 작으면 서브메뉴 원래 상태로
               $('header').show();
               $('.tabMenu li:eq(0)').find('a').addClass('afline');

           }

       $('.tabMenu li').find('a').removeClass('spy'); //모든 서브메뉴 비활성화
   
       if(scroll>=h1 && scroll<h2){
           $('.tabMenu li:eq(0)').find('a').addClass('spy');
           $('.tabMenu li:eq(0)').find('a').css('color','#4d1f7a').css('font-weight','500').css('opacity','1');
           //첫번째 서브메뉴 활성화
           
           $('.con1').addClass('boxMove');
           //첫번째 내용 콘텐츠 애니메이션
        }else if(scroll>=h2 && scroll<h3){
           $('.tabMenu li:eq(1)').find('a').addClass('spy');
           $('.tabMenu li:eq(0)').find('a').css('color','#fff').css('font-weight','400').css('opacity','.6');
           //두번째 서브메뉴 활성화
           
           $('.con2').addClass('boxMove');
        }else if(scroll>=h3  && scroll<h4){
           $('.tabMenu li:eq(2)').find('a').addClass('spy');
           $('.tabMenu li:eq(0)').find('a').css('color','#fff').css('font-weight','400').css('opacity','.6');
           //세번째 서브메뉴 활성화
           
           $('.con3').addClass('boxMove');
       }else if(scroll>=h4){
         $('.tabMenu li:eq(3)').find('a').addClass('spy');
         $('.tabMenu li:eq(0)').find('a').css('color','#fff').css('font-weight','400').css('opacity','.6');
         //네번째 서브메뉴 활성화
         
         $('.con4').addClass('boxMove');
     };

   });
});
