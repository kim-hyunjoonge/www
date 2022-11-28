<? 
	session_start(); 

	@extract($_GET);
	@extract($_POST);
	@extract($_SESSION);

	include "../lib/dbconn.php";



	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}

	//첨부된 이미지 가져오기
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])  // 첨부된 이미지가 있으면
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);  //GetImageSize => 배열로 리턴 [이미지너비, 이미지 높이, 이미지 타입(jpg,png등)]

			$image_width[$i] = $imageinfo[0]; //이미지 너비
			$image_height[$i] = $imageinfo[1]; //이미지 높이
			$image_type[$i]  = $imageinfo[2]; //이미지 타입

			if ($image_width[$i] > 785) //785보다 폭이 더 크면  (이미지 너비를 제한한다.)
				$image_width[$i] = 785; //785로 잡는다.
		}
		else // 첨부된 이미지가 없으면
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KG케미칼-사회공헌활동</title>
	<link rel="shortcut icon" href="../pavicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub4/common/css/sub4common.css">
    <link rel="stylesheet" href="../sub4/css/sub4_content2.css">
	<link href="./concert.css" rel="stylesheet" type="text/css" media="all">

	<script src="https://kit.fontawesome.com/0e5abf2d10.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
	<script>
			function check_input()
	{
		if (!document.ripple_form.ripple_content.value)
		{
			alert("내용을 입력하세요!");    
			document.ripple_form.ripple_content.focus();
			return false;
		}
		document.ripple_form.submit();
    }

    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>

</head>
<body>
	<div id="wrap">
	<?include "../common/sub_header.html"?> 
	<div class="main">
        <img src="../sub4/common/images/commoncontent.png" alt="배경화면">
        <h2>사회공헌 활동</h2>
     </div>
	 <div class="subNav">
        <ul>
            <li><a href="./sub4_1.html">사회공헌철학</a></li>
            <li><a class="current" href="./list.php">사회공헌활동</a></li>
            <li><a href="./sub4_3.html">선현재단</a></li>
        </ul>
    </div>
<article id="content">
<div class="titleArea">
        <div class="lineMap">
            <span>home</span>&gt; <span>사회공헌</span>&gt; <strong>사회공헌활동</strong>
        </div>
        <h2>사회공헌 활동</h2>
    </div>
	<div class="contentArea">
	<div class="slogun">
            <p>나눔의 선순환을 추구하는 사회 공헌 활동</p>
            <p>kg케미칼은 지속적인 사회 공헌 활동을 해오며 사회발전에 기여하고 있습니다.</p>
        </div>
		<div id="col2">

		<ul id="view_title" class="bbs_view_ttl">
			<li id="view_title1"><?= $item_subject ?></li>
			<li>
			<span id="view_title2"><?= $item_nick ?></span>
			<span><?= $item_date ?> </span>
			<span><i class="fas fa-eye"></i> <?= $item_hit ?></span>  
			 </li>
		</ul>

		<div id="view_content" class="bbs_view_cont">
<?
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];  //2022_11_21_10_20_15_0.jpg
			$img_name = "./data/".$img_name; // ./data/2022_11_21_10_20_15_0.jpg
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</div>

		<div id="ripple">
<?
	    $sql = "select * from free_ripple where parent='$item_num'";
	    $ripple_result = mysql_query($sql);

		while ($row_ripple = mysql_fetch_array($ripple_result))
		{
			$ripple_num     = $row_ripple[num]; //댓글 번호
			$ripple_id      = $row_ripple[id];
			$ripple_nick    = $row_ripple[nick];
			$ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = $row_ripple[regist_day];
?>
			<div id="ripple_writer_title" class="comment_wrap">
			<ul  class="ripple_lst">
			<li id="writer_title1">
				<dl>
					<dt><?=$ripple_nick?> <small><?=$ripple_date?></small></dt>
					<dd>
					<? 
					if($userid=="admin" || $userid==$ripple_id)
			          echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[삭제]</a>"; 
			  ?>
						<span>

						<?=$ripple_content?>
						</span>
					</dd>
				</li>
			</dl>
		</ul>
		</div>
<?
		}
?>			
			<form  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>">  
			<ul class="ripple_input">
								<li>
									<textarea rows='5' cols='65' placeholder='로그인 후 이용하세요' name='ripple_content'></textarea>			
								</li>
								<li><a href="#" onclick="check_input()">댓글쓰기</a></li>
			</ul>
			</form>
		</div> <!-- end of ripple -->

		<div id="view_button"  class="btn_wrap">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userid=="admin" || $userlevel==1 )
	{
?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>
<? 
	if($userid)
	{
?>
				
				<a href="write_form.php?table=<?=$table?>">작성하기</a>
<?
	}
?>
		</div>
</div>
</div>
	</div> <!-- end of col2 -->
<?include "../common/sub_footer.html" ?>
</article>
	</div>
	<script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="../common/js/fullnav.js"></script>
</body>
</html>


