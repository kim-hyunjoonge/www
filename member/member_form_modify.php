<?
    session_start();  //세션변수를 들어오게

    @extract($_POST); 
    @extract($_GET);
    @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>개인정보수정</title>
    <link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="./css/member_form.css">
	
	
<script src="./js/jquery-1.12.4.min.js"></script>
<script src="./js/jquery-migrate-1.4.1.min.js"></script>
<script>
	 $(document).ready(function() {
  
		 
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "./check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 
});
	</script>


<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<?
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'"; //세션변수를 사용
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]); //-를 기준으로 쪼갠다
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>
<div id="wrap">
  <article id="content">

  <a class="logo" href="../index.html"><h1 class="hidden">KG케미칼</h1>
        <img src="../common/images/logo.jpg" alt="홈"></a>
<div class="member">
        <form  name="member_form" method="post" action="modify.php"> 
        <table>
        <h2>회원정보 수정</h2>
        <tr>
     		<th scope="col"><label for="id">아이디</label></th>
     		<td class="load">
             <?= $row[id] ?> 
     		</td>
     	</tr>
         <tr>
     		<th scope="col"><label for="pass">비밀번호</label></th>
     		<td>
             <input type="password" name="pass" value="" placeholder="비밀번호를 입력하세요" required>
     		</td>
     	</tr>
         <tr>
     		<th scope="col"><label for="pass_confirm">비밀번호확인</label></th>
     		<td>
             <input type="password" name="pass_confirm" value=""  placeholder="비밀번호를 입력하세요" required>
     		</td>
     	</tr>
         <tr>
     		<th scope="col"><label for="name">이름</label></th>
     		<td>
             <input type="text" name="name" value="<?= $row[name] ?>">
     		</td>
     	</tr>
         <tr>
     		<th scope="col"><label for="nick">닉네임</label></th>
     		<td class="load2">
             <input type="text" id="nick" name="nick" placeholder="닉네임을 입력하세요" value="<?= $row[nick] ?> ">
			     <span id="loadtext2"></span>
     		</td>
     	</tr>
         <tr>
     		<th scope="col">휴대폰</th>
     		<td>
     			<label class="hidden" for="hp1">전화번호앞3자리</label>
                 <select class="hp" name="hp1" id="hp1"> 
              <option value='010'<? if($hp1=='010') echo 'selected';?>>010</option>
              <option value='011'<? if($hp1=='011') echo 'selected';?> >011</option>
              <option value='016'<? if($hp1=='016') echo 'selected';?> >016</option>
              <option value='017'<? if($hp1=='017') echo 'selected';?> >017</option>
              <option value='018'<? if($hp1=='018') echo 'selected';?>>018</option>
              <option value='019'<? if($hp1=='019') echo 'selected';?> >019</option>
          </select>   - 
          <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" class="hp" name="hp2" id="hp2" value="<?= $hp2 ?>" required> - <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" id="hp3" value="<?= $hp3 ?>"   required>
     			
     		</td>
     	</tr>
         <tr>
     		<th scope="col">이메일</th>
     		<td>
     		  <label class="hidden" for="email1">이메일아이디</label>
               <input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @ <input type="text" id="email2" name="email2" 
			           value="<?= $email2 ?>">
     		</td>
     	</tr>
        
    
        </table>
        <div id="button" class="button">
        <a href="#" onclick="check_input()">저장하기</a>&nbsp;&nbsp;
		<a href="../index.html"  onclick="reset_form()">취소하기</a>
		</div>
        </div>

        </form>

    </div>
  </article>
</div>
</body>
</html>
