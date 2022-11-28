

$(document).ready(function(){


    var player = [
        {
            name:'OSIMHEN',
            information1:'FOWARD | # 9',
            information2:'Date of birth',
            information3:'29/12/1998',
            information4:'Nationality Nigeria',
        },
        {
            name:'LOZANO',
            information1:'FOWARD | # 11',
            information2:'Date of birth',
            information3:'30/07/1995',
            information4:'Nationality Mexico',
        },
        {
            name:'KHVICHA', 
            information1:'FOWARD | # 77',
            information2:'Date of birth',
            information3:'12/02/2001',
            information4:'Nationality Georgia',
        },
        {
            name:'ZERBIN', 
            information1:'FOWARD | # 23',
            information2:'Date of birth',
            information3:'03/03/1999',
            information4:'Nationality Italy',
        },
        {
            name:'POLITANO', 
            information1:'FOWARD | # 21',
            information2:'Date of birth',
            information3:'03/08/1993',
            information4:'Nationality Italy',
        },
        {
            name:'RASPADORI', 
            information1:'FOWARD | # 81',
            information2:'Date of birth',
            information3:'18/02/2000',
            information4:'Nationality Italy',
        },
        {
            name:'SIMEONE', 
            information1:'FOWARD | # 18',
            information2:'Date of birth',
            information3:'05/07/1995',
            information4:'Nationality Argentina',
        },
      ];
  
  
    

    $('.player .playerbox4 img').attr('src','./images/Fplayer01.png');
    $('.gallery-thumbs4 .title').html(player[0].name);
    $('.gallery-thumbs4 .main_t').html(player[0].information2);
    $('.player .gallery-thumbs4 ul li:eq(0) a').css('filter','grayscale(0)');
      
    $('.player .gallery-thumbs4 a').click(function(e){
        e.preventDefault();
      
        var ind = $(this).index('.player .gallery-thumbs4 a');
  
        $('.player .playerbox4 img').attr('src','./images/Fplayer0'+(ind+1)+'.png');
  
        $('.gallery-thumbs4 .title').html(player[ind].name);
        $('.gallery-thumbs4 .con_1').html(player[ind].information1);
        $('.gallery-thumbs4 .con_2').html(player[ind].information2);

        $('.player .gallery-thumbs4 ul li a').css('filter','grayscale(100%)');
        $('.player .gallery-thumbs4 ul li:eq('+ind+') a').css('filter','grayscale(0)');
    });
  });
  
  