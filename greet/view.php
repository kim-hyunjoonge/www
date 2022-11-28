<? 
	session_start(); 
	/*
		$num=1  =>게시글번호
		$page / $scale
	*/
	

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]); // 공백문자를 &nbsp로 바꾼다

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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
	
	<link href="./write_form.css" rel="stylesheet" type="text/css" media="all">
	<script src="https://kit.fontawesome.com/0e5abf2d10.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
	<script>
    function del(href) //delete.php?num=1
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
        <img src="../sub5/images/visual1.jpg" alt="">
        <h2>고객지원</h2>
     </div>
     <div class="subNav">
        <ul>
            <li><a class="current" href="./sub5_1.html">공지사항</a></li>
            <li><a href="./sub5_2.html">뉴스룸</a></li>
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
			<div class="clear"></div>

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
			<?= $item_content ?>
		</div>

		<div id="view_button" class="btn_wrap">
				<a href="list.php?page=<?=$page?>&scale=10">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="admin")
	{
?>
				<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
				<a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>
<? 
	if($userid )
	{
?>
				<a href="write_form.php?page=<?=$page?>&scale=<?=$scale?>" class="active">글쓰기</a>
<?
	}
?>
		</div>
</div>
		</div>
</article>
<?include "../common/sub_footer.html" ?>
</div>
<script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="../common/js/fullnav.js"></script>
</body>
</html>



	