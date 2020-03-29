<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" id="viewport" content="user-scalable=yes, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">
		<link rel="stylesheet" href="../css/common.css">
		<link rel="stylesheet" href="../css/grid1.css?ver=3">
		<link rel="stylesheet" type="text/css" href="../css/login.css">
		<script src="../js/login.js"></script>
		<title> :: VIVID :: LOGIN</title>
	</head>
	<body>
		<div class="wrap"><!--추후 height수정-->
			<!-- php로 header 부분 include -->
			<?php include "../header.php"?>
			<section class="grid9">
				<form name="login_form" method="post" action="login_result.php">
					<div class="content grid4"><!--style제거-->
							<div id="id" class="grid7">
								<input type="text" class="login_input" placeholder="ID" name="userid" maxlength="13" required autofocus>
							</div>

							<div id="pw" class="grid7">
								<input type="password" class="login_input" placeholder="PASSWORD" name="pw" maxlength="16" required>
								</br><span id="caps-lock-warn">CAPS LOCK 켜짐!</span>
		                        <script src="../js/caps_lock.js"></script>
							</div>

							<div id="login" class="grid7">
								<center>
									<input type="submit" value="로그인" onclick="login_check()"/>
								</center>
							</div>

							<div id="sub" class="grid7">
								<center>
									<span>
										<a href="join.php">회원가입</a>
									</span>								
									<span>
										<a href="#">아이디 찾기</a>
									</span>
									<span>
										<a href="#">비밀번호 찾기</a>
									</span>
								</center>							
							</div>
					</div>
				</form>
			</section>
			<?php include "../footer.php"?>
	</body>
</html>