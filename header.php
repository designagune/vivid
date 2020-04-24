<meta content="883555849817-vouhj5t96qrvshob3bb5cgj48ib5gfcg.apps.googleusercontent.com" />
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
	function signOut() {
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.signOut().then(function () {});
		auth2.disconnect();
	}
</script>
<div class="g-signin2 hd" data-onsuccess="onSignIn" data-theme="dark"></div>
<nav>
	<div id="visualNavigationWarp" class="row">
		<div id="vivid-logo" class="menu grid3">
			<a href="../index.php">
				<img src="../images/logo.jpg" alt="logo" />
			</a>
		</div>
		<div id="nav_woman" class="menu grid2">
			<a href="../nav_cont/woman_clothes.php">WOMAN</a>
		</div>
		<div id="nav_man" class="menu grid2">
			<a href="../nav_cont/man_clothes.php">MAN</a>
		</div>
		<div id="nav_unisex" class="menu grid2">
			<a href="../nav_cont/unisex_clothes.php">UNISEX</a>
		</div>
		<div id="nav_board" class="menu grid2">
			<a href="../board/freeboard.php">NOTICE</a>
		</div>
		<div class="login">
			<?php
                if(!isset($_SESSION["userid"]))
                {
                ?>
			<a href="../account/login.php">LOGIN</a>
			<a href="../account/join.php">JOIN</a>
			<?php
                }
                else
                {
                ?>
			<a href="../account/logout.php" onclick="signOut();">LOGOUT</a>
			<span>
				<?=$_SESSION["name"]?> 님 로그인중!
			</span>
			<?php
                }
                ?>
			<span></span>
		</div>
	</div>
	<div class="mobile-menu">
		<div class="icon">
		</div>
	</div>
	<div class="mobile-menu-list">
		<ul>
			<li>
				<a href="../nav_cont/woman_clothes.php">WOMAN</a>
			</li>
			<li>
				<a href="../nav_cont/man_clothes.php">MAN</a>
			</li>
			<li>
				<a href="../nav_cont/unisex_clothes.php">UNISEX</a>
			</li>
			<li>
				<a href="../board/freeboard.php">NOTICE</a>
			</li>
		</ul>
		<div class="login">
			<?php
                if(!isset($_SESSION["userid"]))
                {
                ?>
			<a href="../account/login.php">LOGIN</a>
			<a href="../account/join.php">JOIN</a>
			<?php
                }
                else
                {
                ?>
			<a href="../account/logout.php" onclick="signOut();">LOGOUT</a>
			<span>
				<?=$_SESSION["name"]?> 님 로그인중!
			</span>
			<?php
                }
                ?>
			<span></span>
		</div>
	</div>
</nav>