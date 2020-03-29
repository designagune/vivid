<?php session_start();
	header('Content-Type:text/html; charset=utf-8');
	if(!isset($_SESSION["userid"])){
?>
	<script type="text/javascript">
		alert("로그인 후 이용해 주세요.");
		history.back();
	</script>
<?php
	}
$num=$_REQUEST["num"];
$content=$_REQUEST["content"];

require_once("../MYDB.php");
$pdo = db_connect();
try{
	$pdo->beginTransaction();
	$sql = "insert into set555.woman_reply(parent,id, name, content, regist_day)";
	//수정해야될 부분일수도 있음
	$sql.="value(?,?,?,?,now())";
	$stmh = $pdo->prepare($sql);
	$stmh->bindValue(1, $num, PDO::PARAM_STR);
	$stmh->bindValue(2, $_SESSION["userid"], PDO::PARAM_STR);
	$stmh->bindValue(3, $_SESSION["name"], PDO::PARAM_STR);
	$stmh->bindValue(4, $content, PDO::PARAM_STR);
	$stmh->execute();
	$pdo->commit();

	} catch (DOException $Exception){
		$pdo->rollBack();
		print "오류 : ".$Exception->getMessage();
	}
?>
<script>
		window.alert("댓글이 성공적으로 작성되었습니다!");
		location.href="woman_clothes.php";
</script>