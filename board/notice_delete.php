<?php   
	session_start();
	$num=$_REQUEST["num"];
    header('Content-Type:text/html; charset=utf-8');  
	require_once("../MYDB.php");
	$pdo = db_connect();

	$upload_dir = '/home/hosting_users/set555/www/images/';   //물리적 저장위치   

	try{
	    $sql = "select * from set555.notice where num = ? ";
	    $stmh = $pdo->prepare($sql); 
	    $stmh->bindValue(1,$num,PDO::PARAM_STR); 
	    $stmh->execute();
	    $count = $stmh->rowCount();              
	 
	    $row = $stmh->fetch(PDO::FETCH_ASSOC);
	    $copied_name[0] = $row[file_copied_0];
	    $copied_name[1] = $row[file_copied_1];
	    $copied_name[2] = $row[file_copied_2];
	    for ($i=0; $i<3; $i++)
     	{ 
        	if ($copied_name[$i])
        	{
	    		$image_name = $upload_dir.$copied_name[$i];
	    		unlink($image_name);
	  		}
    	}
    }catch (PDOException $Exception) {
        print "오류: ".$Exception->getMessage();
    }
 
    try{
	    $pdo->beginTransaction();
	    $sql = "delete from set555.notice where num = ?";  
	    $stmh = $pdo->prepare($sql);
	    $stmh->bindValue(1,$num,PDO::PARAM_STR);      
	    $stmh->execute();   
	    $pdo->commit();
	    //header("Location:http://localhost/board/freeboard.php");
                         
    } catch (Exception $ex) {
        $pdo->rollBack();
        print "오류: ".$Exception->getMessage();
   	}
?>
<script>
		window.alert("게시글이 삭제되었습니다!");
		location.href="freeboard.php";
</script>