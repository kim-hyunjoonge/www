//네비게이션, GNB(top)
$(document).ready(function() {

    
    /*네비게이션*/
    var op = false;  //네비가 열려있으면(true) , 닫혀있으면(false)
      
    $(".menuOpen").click(function(e) { //메뉴버튼 클릭시
        e.preventDefault();
        
        var documentHeight =  $(document).height();
        $("#gnb").css('height',documentHeight); // 전체 body의 높이를 네비에 높이로 반환
 
       if(op==false){ //네비가 닫혀있는 상태에서 클릭했냐??
         $("#gnb").animate({left:0,opacity:1}, 'fast');
         $('#headerArea').addClass('mn_open');

         op=true;
         $('.modalBox').fadeIn('slow');
       }else{ //네비가 열려있는 상태에서 클릭했냐??
         $("#gnb").animate({left:'-100%',opacity:0}, 'fast');
         $('#headerArea').removeClass('mn_open');
         op=false;
         $('.modalBox').fadeOut('fast');
        //  $('#headerArea').addClass('sc');

       }
    });
    
    
     //2depth 메뉴 교대로 열기 처리 
     var onoff=[false,false,false,false,false,false]; //각각의 메뉴가 닫혀있으면(false) / 열려있으면(true)
     var arrcount=onoff.length;  //메뉴의개수 6
     
     //console.log(arrcount);
     
     $('#gnb .depth1 h3 a').click(function(){  //1depth 메뉴를 각각 클릭하면
         var ind=$(this).parents('.depth1').index();  // 0~5
         
         //console.log(ind);
         
        if(onoff[ind]==false){
         //$('#gnb .depth1 ul').hide();
         $(this).parents('.depth1').find('ul').slideDown('slow');//클릭한 해당 메뉴의 2depth를 열여라
         $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast'); //나머지 메뉴의 서브를 다 닫아라
         for(var i=0; i<arrcount; i++) {
            onoff[i]=false; //모든 메뉴의 상태를 false로...
         }
          onoff[ind]=true;  //자신의 상태만 true..
            
          $('.depth1 i').attr('class','fas fa-plus');   
          $(this).find('i').attr('class','fas fa-minus');   
             
        }else{  //클릭한 해당메뉴가 열려있느냐??
          $(this).parents('.depth1').find('ul').slideUp('fast'); // 자신의 서브메뉴만 닫아라
          onoff[ind]=false;   
            
          $(this).find('i').attr('class','fas fa-plus');     
        }
     });  
     
    

     //family site
     $('.family .arrow').toggle(function(e){   //클릭 시 > list 노출 > 미노출
        e.preventDefault();
        $('.family ul').stop().slideDown(200);
        $(this).addClass('on');
	},function(e){  
        e.preventDefault();

        $(this).removeClass('on');
        $('.family ul').stop().slideUp(200);
	});
        //family site tab키 처리     
        // $('.footer_family .arrow').on('focus', function () {    
        // $('.footer_family .family_list').slideDown('fast');	
        // $('.footer_family i').removeClass('.fas fa-chevron-up');
        // $('.footer_family i').addClass('.fas fa-chevron-down');
                
        // });
        // $('.footer_family .family_list li:last a').on('blur', function () {        
        // $('.footer_family .family_list').slideUp('fast');
        // $('.footer_family i').removeClass('.fas fa-chevron-up');
        // $('.footer_family i').addClass('.fas fa-chevron-down');
        // });  

    //상단 이동
    $('.topMove').hide();
    $(window).on('scroll',function(){   //스크롤 값의 변화가 생기면
         var scroll = $(window).scrollTop();    //스크롤의 거리
         if(scroll>300){    //500이상의 거리가 발생되면
             $('.topMove').fadeIn('slow');  //top노출
         }else{
             $('.topMove').fadeOut('fast'); //top미노출
         }
    });
    $('.topMove').click(function(e){    //아이콘 클릭 시 상단으로 스르륵 이동
        e.preventDefault();
        $("html,body").stop().animate({"scrollTop":0},1000); 
    });
});
     //스크롤 시 header 효과
     $(window).on('scroll',function(){     //스크롤 거리 발생
        var scroll = $(window).scrollTop();     //스크롤 거리 리턴 함수
        var smh=$('.main').height();      //비주얼 이미지의 높이 리턴 960px
        
        if(scroll>smh-50){       //스크롤 거리 560
            $('#headerArea').addClass('sc');
            }else{       //스크롤 거리 0 
                $('#headerArea').removeClass('sc');
            }
        
    });


 
 