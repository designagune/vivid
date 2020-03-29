<?php
session_start();
header('Content-Type:text/html; charset=utf-8');
unset($_SESSION["userid"]);
unset($_SESSION["name"]);
?>
<script>
		window.alert("로그아웃 하셨습니다!");
		history.back();	
</script>