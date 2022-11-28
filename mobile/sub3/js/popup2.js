

$(document).ready(function(){
  //객체배열(json)
  var memo = [
        {title:'감수제/유지제', price:'문의', sub1:'콘크리트 감수율과 작업성 향상, 콘크리트 유동성과 강도 향상, 재료분리 및 블리딩 감소', sub2:'고성능 con, 자기충전 con, 고강도/조기강도형 con'},
        {title:'감수제/유동화제', price:'문의', sub1:'콘크리트 작업성,강도,내구성,동결용해저항성 향상 콘크리트의 공기량에 대한 영향이 거의 없고 일반적으로 1~2%발생', sub2:'레미콘,2차 제품콘크리트 고강도 콘크리트, 수중, 석고보드 제조 등'},
        {title:'AE감수제/고성능AE감수제', price:'문의', sub1:'현장에서 원하는 시멘트, 골재, 강도에 따라 PC계 제품의 감수제, 유지제 및 기타 보강제등을 적절히 구성', sub2:'레미콘(초고층빌딩, 댐, 교랑 등 건축/토목 타설현장),2차 제품(PHC PILE, 흉관, 전주 등) 콘크리트 제조사 外'},
        {title:'DYWELL', price:'문의', sub1:' 이온계 분산제로서 음이온, 비이온 계면활성제와 잘 결합할 수 있습니다.분산력, 열안정성이 탁월합니다. (사용조건 : pH 2 ~ 12, 130℃이하)', sub2:'농약용 계면활성제, 분산제 : 분산제와 수화제(WP-Wetting powder)을 위한 습윤제로 쓰임'}  
      ];
      var ind  = 0;
      var txt ='';
     

    function popchange(){
      $('.product .popup img').attr('src','../sub3/images/content2/content'+(ind+1)+'.png');
      txt ='';
      txt+= '<dl>';
      txt+= '<dt>제품명 : '+memo[ind].title+'</dt>';
      txt+= '<dd>제품가격: '+memo[ind].price+'</dd>';
      txt+= '<dd>제품의 특징 및 효과 : '+memo[ind].sub1+'</dd>';
      txt+= '<dd>적용 : '+memo[ind].sub2+'</dd>';
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
