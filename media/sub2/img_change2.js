

$(document).ready(function(){


    var player = [
        {
            name:'MINJAE Kim',
            information1:'DEFENDER | # 3',
            information2:'Date of birth',
            information3:'15/11/1996',
            information4:'Nationality Korea Republic',
        },
        {
            name:'Amir RRAJMANI', 
            information1:'DEFENDER | # 13',
            information2:'Date of birth',
            information3:'24/02/1994',
            information4:'Nationality Kosovo',
        },
        {
            name:'MARIO RUI', 
            information1:'DEFENDER | # 6',
            information2:'Date of birth',
            information3:'27/05/1991',
            information4:'Nationality Portugal',
        },
        {
            name:'OLIVERA', 
            information1:'DEFENDER | # 17',
            information2:'Date of birth',
            information3:'31/10/1997',
            information4:'Nationality Uruguay',
        },
        {
            name:'ZANOLI', 
            information1:'DEFENDER | # 59',
            information2:'Date of birth',
            information3:'03/10/2000',
            information4:'Nationality Italy',
        },
        {
            name:'BY LORENZO', 
            information1:'DEFENDER | # 22',
            information2:'Date of birth',
            information3:'04/08/1993',
            information4:'Nationality Italy',
        },
        {
            name:'OSTIGARD', 
            information1:'DEFENDER | # 55',
            information2:'Date of birth',
            information3:'28/11/1999',
            information4:'Nationality Norway',
        },
      ];
  
  
    

    $('.player .playerbox2 img').attr('src','./images/Dplayer01.png');
    $('.gallery-thumbs2 .title').html(player[0].name);
    $('.gallery-thumbs2 .main_t').html(player[0].information2);
    $('.player .gallery-thumbs2 ul li:eq(0) a').css('filter','grayscale(0)');
      
    $('.player .gallery-thumbs2 a').click(function(e){
        e.preventDefault();
      
        var ind = $(this).index('.player .gallery-thumbs2 a');
  
        $('.player .playerbox2 img').attr('src','./images/Dplayer0'+(ind+1)+'.png');
  
        $('.gallery-thumbs2 .title').html(player[ind].name);
        $('.gallery-thumbs2 .con_1').html(player[ind].information1);
        $('.gallery-thumbs2 .con_2').html(player[ind].information2);
        $('.gallery-thumbs2 .con_3').html(player[ind].information3);
        $('.gallery-thumbs2 .con_4').html(player[ind].information4);

        $('.player .gallery-thumbs2 ul li a').css('filter','grayscale(100%)');
        $('.player .gallery-thumbs2 ul li:eq('+ind+') a').css('filter','grayscale(0)');
    });
  });
  
  