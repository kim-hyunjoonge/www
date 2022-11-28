<? 
	session_start(); 

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>고객지원-공지사항</title>
    <link rel="shortcut icon" href="../pavicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="../sub5/css/sub5_content1.css">
	<link href="../sub5/css/greet.css" rel="stylesheet" type="text/css" media="all">
	<script src="https://kit.fontawesome.com/0e5abf2d10.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
</head>
<?
 @extract($_POST);
 @extract($_GET);
 @extract($_SESSION);

	include "../lib/dbconn.php";  //접속

	if (!$scale)
    $scale=10; 			// 한 화면에 표시되는 글 수

    if ($mode=="search")  //검색기능  검색을 통해서 실행되면
	{
		if(!$search)  //검색한 단어 체크
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from greet order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)    
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>
<body>
<div id="wrap">
  <?include "../common/sub_header.html"?> 
  <div class="main">
        <img src="../sub5/images/visual1.jpg" alt="">
        <h2>고객지원</h2>
     </div>
     <div class="subNav">
        <ul>
            <li><a class="current" href="./list.php">공지사항</a></li>
            <li><a href="../news/list.php">뉴스룸</a></li>
            <li><a href="../sub5/sub5_3.html">FAQ</a></li>
            <li><a href="../sub5/sub5_4.html">문의하기</a></li>
        </ul>
     </div>
     <article id="content">
        <div class="titleArea">
            <div class="lineMap">
                <span>home</span>&gt; <span>고객지원</span>&gt; <strong>공지사항</strong>
            </div>
            <h2>공지사항</h2>
        </div>
        <div class="contentArea">
            <div class="slogun">
                <p>“KG 케미칼에서 알려드립니다.”</p>
                <p>우리KG 케미칼의 새로운 뉴스 및 소식을 전해드립니다.</p>
            </div>
   
		<div class="bbs_search">
		<form  name="board_form" method="post" action="list.php?mode=search">  
		<div id="list_search">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>별명</option>
                    <option value='name'>이름</option>
				</select>
				<label class="hidden" for="search"></label>
							<input type="text" name="search" id="search" placeholder="검색어를 입력하세요">
							<button type="submit">검색</button>
		</div>
		</form>
</div>
		
		<div class="list_count bbs_sort">
		<div id="list_search1" class="total">총 <?= $total_record ?> 개의 게시물이 있습니다.  </div>
	
		<select id="scale" class="scale" name="scale" onchange="location.href='list.php?scale='+this.value">
                   <option value=''>보기</option>
					<option value='5'>5</option>
                    <option value='10'>10</option>
                    <option value='15'>15</option>
                    <option value='20'>20</option>
		</select>
		</div>

		<div class="clear"></div>

		<div id="list_top_title" class="bbs_lst">
			<ul>
				<li class="lst_width1"><p>번호</p></li>
				<li class="lst_width2"><p>제목</p></li>
				<li  class="lst_width3"><p>작성자</p></li>
				<li  class="lst_width4"><p>등록일</p></li>
				<li  class="lst_width5"><p>조회수</p></li>
			</ul>		
		</div>

		<div id="list_content" class="bbs_lst">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);  
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  //substr => 0~10자만 뽑아내라

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]); //공백문자를 &nbsp;문자로 바꿔서 찍어낸다

?>
			<div>
				<div class="lst_width1"><?= $number ?></div>
				<div class="lst_width2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>&scale=<?=$scale?>"><?= $item_subject ?></a></div>
				<div class="lst_width3"><?= $item_nick ?></div>
				<div class="lst_width4"><?= $item_date ?></div>
				<div class="lst_width5"><?= $item_hit ?></div>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button" class="page_num">
				<div id="page_num"> <span class="prev">이전</span>&nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp; <span class="next">다음</span>
				</div>
				<div id="button" class="btn_wrap">
					<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?page=<?=$page?>&scale=<?=$scale?>">작성하기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->
		
        </div> <!-- end of list content -->

		<div class="clear"></div>

	</div> <!-- end of col2 -->
</article> <!-- end of content -->
<?include "../common/sub_footer.html" ?>
</div> <!-- end of wrap -->
<script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="../common/js/fullnav.js"></script>
</body>
</html>
