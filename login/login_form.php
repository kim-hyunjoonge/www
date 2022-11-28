<? session_start(); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="./css/login.css">
    <script src="https://kit.fontawesome.com/f8a0f5a24e.js" crossorigin="anonymous"></script>
</head>

<body>

<header>
    <h1>
        <a href="../index.html">KG케미칼 로고</a>
    </h1>
</header>
<article id="content">
    <h2>KG 케미칼 로그인</h2>
    <p>아이디와 비밀번호를 입력해주세요</p>
<form  name="member_form" method="post" action="login.php"> 


    <div id="id_pw_input">
        <ul>
            <li><input type="text" name="id" class="login_input" placeholder="아이디를 입력하세요"  required></li>
            <li><input type="password" name="pass" class="login_input" placeholder="비밀번호를 입력하세요"  required></li>
        </ul>						
	</div>
    <div id="login_button">
		<button type="submit">로그인</button>
	</div>
    <div id="join_button">
        <p>아이디가 없으시면 회원가입을 해주세요</p>
        <a href="../member/join.html">회원가입</a>
    </div>

    <ul class="findLink">
        <li>아이디 혹은 비밀번호를 잊으셨나요?</li>
        <li>
            <span><a href="id_find.php">아이디 찾기</a></span>
            <span><a href="pw_find.php">비밀번호 찾기</a></span>
        </li>
	</ul>

</form>
</article>
</body>
</html>