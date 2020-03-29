<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" id="viewport" content="user-scalable=yes, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">
		<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
		<link rel="stylesheet" href="../css/common.css">
		<link rel="stylesheet" href="../css/grid1.css?ver=3">
		<link rel="stylesheet" type="text/css" href="../css/login.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="../js/login.js"></script>
		<!--GNB-->
		<script src="../js/mob_menu.js"></script>
		<title> :: VIVID :: LOGIN</title>
		
  		<!-- google btn -->
  		<meta name="google-signin-client_id" content="883555849817-vouhj5t96qrvshob3bb5cgj48ib5gfcg.apps.googleusercontent.com">
		<script src="https://apis.google.com/js/platform.js" async defer></script>
	</head>
	<body>
		<div class="wrap"><!--추후 height수정-->
			<!-- php로 header 부분 include -->
			<?php include "../header.php"?>
			<section>
				<div id="content">
					<div class="login">
						<form name="login_form" method="post" action="login_result.php" >
							<div id="id">
								<input type="text" class="login_input" placeholder="ID" name="userid" maxlength="16" required autofocus>
							</div>

							<div id="pw">
								<input type="password" class="login_input" placeholder="PASSWORD" name="pw" maxlength="16" required>
								</br><span id="caps-lock-warn">CAPS LOCK 켜짐!</span>
			                        <script src="../js/caps_lock.js"></script>
							</div>

							<div id="login_btn">
								<input type="submit" value="로그인" onclick="login_check()"/>
								<fieldset>
									<legend>SNS LOGIN</legend>
									<div class="g-signin2" data-onsuccess="onSignIn"></div>
									<strong>
										※주의사항 :</br> 본 사이트 " vivid " 는 https (ssl) 을 지원하지 않는 상태입니다. 로그인시 Google 계정을 사용할 경우 이용 후 반드시 로그아웃 할 것을 당부드립니다. 
									</strong>
								</fieldset>
								
							</div>
						</form>
					</div>
				</div>
			</section>
			<form method="get" action="google_login.php" id="data_throwing">
				<input type="text" id="session_id" name="val1">
				<input type="text" id="session_nick" name="val2">
			<button id="gg_btn"></button>
			</form>
			<?php include "../footer.php"?>
			
			<script>
			  function onSignIn(googleUser) {
			   var profile = googleUser.getBasicProfile();
			   document.getElementById("session_id").value = profile.getEmail();
			   document.getElementById("session_nick").value = profile.getName();
			   document.getElementById("gg_btn").click();
			  }
			</script>
	</body>
</html>