<?php
$num=$_REQUEST["num"];
header('Content-Type:text/html; charset=utf-8');
require_once("../MYDB.php");
$pdo = db_connect();
        
try{
	$pdo->beginTransaction();
	$sql = "delete from set555.man_ripple where num = ?";   
	$stmh = $pdo->prepare($sql);
	$stmh->bindValue(1,$num,PDO::PARAM_STR);
	$stmh->execute();   
	$pdo->commit();
                
    //header("Location:http://localhost/nav_cont/woman_clothes.php");
    } catch (Exception $ex) {
                $pdo->rollBack();
                print "오류: ".$Exception->getMessage();
      }
?>
<script>
		window.alert("댓글이 삭제되었습니다.");
		location.href="man_clothes.php";
</script>