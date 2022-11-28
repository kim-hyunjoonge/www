<? 
	session_start(); 
	//새글 쓰기
	// $table = 'concert'  , $num=1 , $mode=="modify"

	@extract($_GET);
	@extract($_POST);
	@extract($_SESSION);

	include "../lib/dbconn.php";

	if ($mode=="modify")  //수정글쓰기
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
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
	<link href="./news.css" rel="stylesheet" type="text/css" media="all">

	<script src="https://kit.fontawesome.com/0e5abf2d10.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
	<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
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
<div>

<?
	if($mode=="modify")
	{

?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
	else
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<ul id="write_form" class="bbs_write_top">
		
			<li id="write_row1">
				<dl>
			<dt class="col1"> 닉네임 </dt>
			<dd class="col2"><?=$usernick?></dd>
</dl>
<?
	if( $userid && ($mode != "modify") )
	{
?>
			
<?
	}
?>						
			</li>
			<li id="write_row2">
			<dl>
				<dt class="col1"> <label for="subject">제목 </label>   </dt>
			    <dd class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></dd>
			</dl>
			</li>
			<li id="write_row3">
			<dl>	
			<dt> <label for="content">내용</label>   </dt>
			<dd>
				<div class="col2 check">
					<input type="checkbox" name="html_ok" class="check_box"  value="y">
					<label for="html_ok">HTML 쓰기</label>
				</div>
				<div class="col2">
					<textarea rows="15" cols="79" name="content" id="content"><?=$item_content?></textarea>
				</div>
			</dd>
			</dl>					 
			</li>
			<li id="write_row4">
				<div class="col1"> 이미지파일1   </div>
			    <div class="col2"><input type="file" name="upfile[]"></div>
			</li>

<? 	if ($mode=="modify" && $item_file_0)
	{
?>
			<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" class="check_box" name="del_file[]" value="0"> 삭제</div>
<?
	}
?>
			<li id="write_row5"><div class="col1"> 이미지파일2  </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</li>
<? 	if ($mode=="modify" && $item_file_1)
	{
?>
			<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" class="check_box" name="del_file[]" value="1"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<li id="write_row6"><div class="col1"> 이미지파일3   </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</li>
<? 	if ($mode=="modify" && $item_file_2)
	{
?>
			<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" class="check_box" name="del_file[]" value="2"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>

		</ul>

		<div id="write_button" class="btn_wrap">
		<button type="submit" class='active'>완료</button>&nbsp;
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
		</div>

		</form>

	</div> <!-- end of col2 -->
</article>
<?include "../common/sub_footer.html" ?>
	</div>
	<script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="../common/js/fullnav.js"></script>
</body>
</html>
