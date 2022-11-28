

$(document).ready(function(){


    var player = [
        {
            name:'ANGUISSA',
            information1:'MIDFIELDER | # 99',
            information2:'Date of birth',
            information3:'16/11/1995',
            information4:'Nationality Cameroon',
        },
        {
            name:'demme', 
            information1:'MIDFIELDER | # 4',
            information2:'Date of birth',
            information3:'25/11/1994',
            information4:'Nationality Slovakia',
        },
        {
            name:'LOBOTKA', 
            information1:'MIDFIELDER | # 68',
            information2:'Date of birth',
            information3:'25/11/1994',
            information4:'Nationality Slovakia',
        },
        {
            name:'NDOMBELE', 
            information1:'MIDFIELDER | # 91',
            information2:'Date of birth',
            information3:'28/12/1996',
            information4:'Nationality FRANCE',
        },
        {
            name:'ZIELINSKI', 
            information1:'MIDFIELDER | # 20',
            information2:'Date of birth',
            information3:'20/05/1994',
            information4:'Nationality Poland',
        },
        {
            name:'GAETANO', 
            information1:'MIDFIELDER | # 70',
            information2:'Date of birth',
            information3:'05/05/2000',
            information4:'Nationality Italy',
        },
      ];
  
  
    

    $('.player .playerbox3 img').attr('src','./images/Mplayer01.png');
    $('.gallery-thumbs3 .title').html(player[0].name);
    $('.gallery-thumbs3 .main_t').html(player[0].information2);
    $('.player .gallery-thumbs3 ul li:eq(0) a').css('filter','grayscale(0)');
      
    $('.player .gallery-thumbs3 a').click(function(e){
        e.preventDefault();
      
        var ind = $(this).index('.player .gallery-thumbs3 a');
  
        $('.player .playerbox3 img').attr('src','./images/Mplayer0'+(ind+1)+'.png');
  
        $('.gallery-thumbs3 .title').html(player[ind].name);
        $('.gallery-thumbs3 .con_1').html(player[ind].information1);
        $('.gallery-thumbs3 .con_2').html(player[ind].information2);

        $('.player .gallery-thumbs3 ul li a').css('filter','grayscale(100%)');
        $('.player .gallery-thumbs3 ul li:eq('+ind+') a').css('filter','grayscale(0)');
    });
  });
  
  