

$(document).ready(function(){


    var player = [
        {
            name:'Alex MERET',
            information1:'GOALKEEPER | # 1',
            information2:'Date of birth',
            information3:'22/03/1997',
            information4:'Nationality Italy',
        },
        {
            name:'Savior SIRICH', 
            information1:'GOALKEEPER | # 30',
            information2:'Date of birth',
            information3:'12/01/1987',
            information4:'Nationality Italy',
        },
        {
            name:'DAVIDE MARFELLA', 
            information1:'GOALKEEPER | # 30',
            information2:'Date of birth',
            information3:'15/09/1999',
            information4:'Nationality Italy',
        },
        {
            name:'HUBERT IDASIAK', 
            information1:'GOALKEEPER | # 16',
            information2:'Date of birth',
            information3:'03/02/2002',
            information4:'Nationality Poland',
        },
      ];
  
  
    

    $('.player .playerbox img').attr('src','./images/player01.png');
    $('.gallery-thumbs .title').html(player[0].name);
    $('.gallery-thumbs .main_t').html(player[0].information2);
    $('.player .gallery-thumbs ul li:eq(0) a').css('filter','grayscale(0)');
      
    $('.player .gallery-thumbs a').click(function(e){
        e.preventDefault();
      
        var ind = $(this).index('.player .gallery-thumbs a');
  
        $('.player .playerbox img').attr('src','./images/player0'+(ind+1)+'.png');
  
        $('.gallery-thumbs .title').html(player[ind].name);
        $('.gallery-thumbs .con_1').html(player[ind].information1);
        $('.gallery-thumbs .con_2').html(player[ind].information2);
        $('.gallery-thumbs .con_3').html(player[ind].information3);
        $('.gallery-thumbs .con_4').html(player[ind].information4);

        $('.player .gallery-thumbs ul li a').css('filter','grayscale(100%)');
        $('.player .gallery-thumbs ul li:eq('+ind+') a').css('filter','grayscale(0)');
    });
  });
  
  