<? 
	session_start(); 
	$table = "news";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KG케미칼-뉴스룸</title>
	<link rel="shortcut icon" href="../pavicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/css/sub5_content2.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
	<link href="./news.css" rel="stylesheet" type="text/css" media="all">

	<script src="https://kit.fontawesome.com/0e5abf2d10.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
</head>
<?
	@extract($_GET);
	@extract($_POST);
	@extract($_SESSION);

	include "../lib/dbconn.php";
	$scale=6;			// 한 화면에 표시되는 글 수

	if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
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
		<li><a href="../greet/list.php">공지사항</a></li>
            <li><a class="current" href="./sub5_2.html">뉴스룸</a></li>
            <li><a href="../sub5/sub5_3.html">FAQ</a></li>
            <li><a href="../sub5/sub5_4.html">문의하기</a></li>
        </ul>
    </div>
<article id="content">
<div class="titleArea">
        <div class="lineMap">
		<span>home</span>&gt; <span>고객지원</span>&gt; <strong>뉴스룸</strong>
        </div>
		<h2>뉴스룸</h2>
    </div>
	<div class="contentArea">
	<div class="slogun">
	<p>KG케미칼 뉴스룸 입니다.</p>
                <p>방송보도, 신문 및 잡지기사, 행사사진, 광고 등을 보실 수 있습니다.</p>
        </div>
		<div class="search_wrap">
		<form  name="board_form" class="search_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div id="list_search" class="search_cat">
			
				<select name="find" id="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>별명</option>
                    <option value='name'>이름</option>
				</select>
			</div>
			<div class="query">
					<input type="text" name="search" value="" placeholder="검색어를 입력해주세요.">
			</div>
			<div class="btn_wrap btn_double">
					<div>
						<button type="submit" value="검색" class="btn btn_solid"><span> 검색</span></button>
					</div>
					<div>
						<button type="button" value="초기화" class="btn btn_normal" onclick="location.href='list.php'"><span>초기화</span></button>
					</div>
			</div>
		</form>
		</div>
		<!-- 게시물 개수 -->
		<div class="list_info">
			<p>총 <span> <?= $total_record ?></span> 개의 뉴스가 있습니다.</p>
			<select id="scale" name="scale" class="list_size" onchange="location.href='list.php?scale='+this.value">
				<option value=''>보기</option>
				<option value='3'>3</option>
				<option value='6'>6</option>
				<option value='9'>9</option>
				<option value='12'>12</option>
			</select>
		</div>
			

			<div id="list_content" class="list_body">
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
	  $item_content  = $row[content];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	  if($row[file_copied_0]){
	  $item_img = './data/'.$row[file_copied_0];
	  }else{
	  $item_img = './data/default.jpg.jpg';
	  }
?>	

		<div OnClick="location.href='view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?> '" style="cursor:pointer;" class="item_wrap"> 
		<div>
		<div id="list_item1" class="list_item1 hidden" ><?= $number ?></div>
				<div id="list_item2" class="list_item2"><img src="<?= $item_img ?>"></div>
	  			<div class="bottom_item">
	  			<div id="list_item3" class="list_item3"><?= $item_subject ?></div>
				<div id="list_item4"class="list_item4" ><?=$item_content ?></div>
			
				<div class="bottom_sub">
				<div id="list_item5"class="list_item5" ><?= $item_nick ?></div>
				<div id="list_item6"class="list_item6" ><?= $item_date ?></div>
				<div id="list_item7"class="list_item7" ><i class="fas fa-eye"></i><span class="hidden">조회</span><?= $item_hit ?></div>
				</div>
				</div>
				</div>
				</div>
		
			
			
<?
   	   $number--;
   }
?>
</div>
			<div id="page_button" class="page_num">
			 <i class="fas fa-angle-double-left"></i><span class="hidden">이전</span>&nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i</b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-angle-double-right"></i><span class="hidden">다음</span>
				</div>
				<div id="button" class="btn_wrap">
				<a href="list.php?table=<?=$table?>&scale=<?=$page?>&scale=<?=$scale?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
	<a href="write_form.php?table=<?=$table?>">작성하기</a>
<?
	}
?>
			



	</div>
</article>
<?include "../common/sub_footer.html" ?>
</div>

    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="../common/js/fullnav.js"></script>
</body>
</html>



