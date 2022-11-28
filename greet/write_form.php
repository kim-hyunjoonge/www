<? 
	session_start(); 
	
	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
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

<form  name="board_form" method="post" action="insert.php?page=<?=$page?>&scale=<?=$scale?>"> 
		<ul id="write_form" class="bbs_write_top">
			<li id="write_row1">
				<dl>
				<dt class="col1"> 닉네임</dt>
				<dd class="col2"><?=$usernick?></dd>
				</dl>
			</li>
			<li id="write_row2">
				<dl>
				<dt class="col1"><label for="subject">제목 </label> </dt>
				<dd class="col2"><input type="text" id="subject" name="subject"></dd>
				</dl>
			</li>
			<li id="write_row3">
				<dl>
					<dt><label for="content">내용</label></dt>
					<dd>
					<div class="col3 check">
					<input type="checkbox" name="html_ok" id="html_ok" value="y"> 
					<label for="html_ok">HTML 쓰기</label>
					</div>
			    	<div class="col2">
						<textarea rows="15" cols="79" name="content"></textarea>
					</div>
					</dd>
				</dl>
			</li>
		</ul>

		<div id="write_button" class="btn_wrap">
		<button type="submit" class='active'>완료</button>&nbsp;
			<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>
		</div>
		</form>

   
</div>
</article>
<?include "../common/sub_footer.html" ?>
	</div>
	<script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="../common/js/fullnav.js"></script>
</body>
</html>
