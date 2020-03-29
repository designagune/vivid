<?php
	$num=$_REQUEST["num"];

	require_once("../MYDB.php");
	$pdo = db_connect();

		try{
			$pdo->beginTransaction();
			$sql = "delete from set555.woman_reply where num = ?";
			$stmh = $pdo->prepare($sql);
			$stmh->bindValue(1,$num,PDO::PARAM_STR);
			$stmh->execute();
			$pdo->commit();
			header("Location:woman_clothes.php");
		} catch (Exception $ex){
			$pdo->rollBack();
			print "오류 :" .$Exception->getMessage();
		}
?>
