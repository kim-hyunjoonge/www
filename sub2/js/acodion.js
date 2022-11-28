$(document).ready(function(){
    // 첫번째만 활성화
    $('.eventSlidemenu .menu01').addClass('pointer');
    $('.eventSlidemenu .menu01').animate({width:577},1000).clearQueue();


    $('.eventSlidemenu ul li .buttonMenu').mouseenter(function(event){
        var $target=$(event.target);

        if($target.is('.eventSlidemenu .buttonMenu01')){
            $('.eventSlidemenu .eventMenu').removeClass('pointer');

            $('.eventSlidemenu .menu01').animate({width:577},1000).clearQueue();
            $('.eventSlidemenu .menu02').animate({width:200},1000).clearQueue();
            $('.eventSlidemenu .menu03').animate({width:200},1000).clearQueue();
      

            $('.eventSlidemenu .menu01').addClass('pointer');

            }else if($target.is('.buttonMenu02')){
                $('.eventSlidemenu .eventMenu').removeClass('pointer');

                $('.eventSlidemenu .menu01').animate({width:200},1000).clearQueue();
                $('.eventSlidemenu .menu02').animate({width:577},1000).clearQueue();
                $('.eventSlidemenu .menu03').animate({width:200},1000).clearQueue();
    

                $('.eventSlidemenu .menu02').addClass('pointer');

            }else if($target.is('.buttonMenu03')){
                $('.eventSlidemenu .eventMenu').removeClass('pointer');

                $('.eventSlidemenu .menu01').animate({width:200},1000).clearQueue();
                $('.eventSlidemenu .menu02').animate({width:200},1000).clearQueue();
                $('.eventSlidemenu .menu03').animate({width:577},1000).clearQueue();
        

                $('.eventSlidemenu .menu03').addClass('pointer');
            };
        
        });
});