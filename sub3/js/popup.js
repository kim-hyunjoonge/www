

$(document).ready(function(){
  //객체배열(json)
  var memo = [
        {title:'미생몰 논비료', price:'25000원', sub1:'특허 미생물 함유로 농약사용량 30~40% 경감에 도움을 줍니다.병 예방 미생물 10병+출 예방 미생물이 2~3병 함유되어 있습니다.', sub2:'벼 도열병, 앞집무늬마름병, 키다리병, 모잘룩병, 뜸묘 예방, 벼물바구미 유충'},
        {title:'미생물 밭비료', price:'25,000원', sub1:'토양내 염류집적 경감으로 염류피해지 사용시 효과가 탁월하고 특허미생물함유로 병해충이 경감됩니다.', sub2:'고구마 흰비단병, 고자리파리, 총채벌레 , 감자역병, 탄저병, 쌈머패치명 시들음병, 벼키다리병'},
        {title:'미생물 완효성', price:'30,000원', sub1:'미생물 함유로 병해경감, 뿌리 생육 증진, 토양개량 및 염류 피해 경감에 도음을 주며 수확량을 증가시킵니다.', sub2:'벼도열병, 앞집무늬마름병, 모잘룩병, 뜸묘 예방, 토양선충, 시들음병, 뿌리썩음병, 고자리파리'},
        {title:'미생물 고추비료', price:'20,000원', sub1:'고추 재배시 필요한 필수 3요소 및 고토 봉소 석회가 풍부히 함유된 밑거름 비료 특허 미생물이 함유되어 병해충 피해 경감에 도움을 줍니다. 황산가리 함유로 고추의 당도, 생깔, 향기 등의 품질향상에 도움을 주어 고품질 작물을 수확할 수 있습니다.'},
        {title:'미생물 고형비료', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
        {title:'엔케이도 BS', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
        {title:'엔케이도', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
        {title:'엔케이도 골드', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
        {title:'원예추비특호', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
        {title:'미생물 고추비료', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
        {title:'콩비료', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
        {title:'유형감자비료', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
        {title:'씨알루트킹[2L]', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
        {title:'물타 k[10kg]', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
        {title:'흙산미네랄', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
        {title:'유토솔루브', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
        {title:'라이브충다이', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
        {title:'서리실드[1L]', price:'30,000원', sub1:'제품설명4', sub2:'제품설명2'},
      ];
      var ind  = 0;
      var txt ='';
     

    function popchange(){
      $('.product .popup img').attr('src','../sub3/images/content1/product'+(ind+1)+'.jpg');
      txt ='';
      txt+= '<dl>';
      txt+= '<dt>제품명 : '+memo[ind].title+'</dt>';
      txt+= '<dd>제품가격: '+memo[ind].price+'</dd>';
      txt+= '<dd>제품의 특징 및 효과 : '+memo[ind].sub1+'</dd>';
      txt+= '<dd>경감병해충 : '+memo[ind].sub2+'</dd>';
      txt+= '</dl>';
      
      $('.product .popup .txt').html(txt);
    };
 

  $('.product .popMenu a').click(function(e){
      e.preventDefault();
      
     ind = $(this).index('.product .popMenu a');  // 0 1 2 3


      $('.product .modalBox').fadeIn('fast');
      $('.product .popup').fadeIn('slow');

    popchange();

  });

  $('.close_btn,.product .modalBox').click(function(e){
      e.preventDefault();
      $('.product .modalBox').hide();
      $('.product .popup').hide();
     
 
   
});
});
