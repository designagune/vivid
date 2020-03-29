<nav>
	<div id="nav_in" class="row">
		<div id="logo" class="menu grid6">
			<a href="../index.php">
				<img src="../images/logo.jpg" alt="logo"/>
			</a>						
		</div>
		<div id="nav_woman" class="menu grid2">
			<a href="../nav_cont/woman_clothes.php">
				<img src="../images/nav_woman.jpg"/ alt="woman">
			</a>
		</div>
		<div id="nav_man" class="menu grid2">
			<a href=#>
				<img src="../images/nav_man.jpg"/ alt="man">
			</a>
		</div>
		<div id="nav_unisex" class="menu grid2">
			<a href=#>
				<img src="../images/nav_unisex.jpg"/ alt="unisex">
			</a>						
		</div>
		<div id="login">
			<?php
                if(!isset($_SESSION["userid"]))
                {
                ?>
				<a href="../account/login.php">LOGIN</a>
				<?php
                }
                else
                {
                ?>
                    <a href="../logout.php">LOGOUT</a>
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