<?php session_start(); ?>
 <meta charset="utf-8">
 <?php
  if(!($_SESSION["userid"])=="set555") {
 ?>
  <script>
        alert('관리자 아이디로 로그인해 주세요.');
        history.back();
  </script>
 <?php
  }
	if(isset($_REQUEST["mode"]))  //modify_form에서 호출할 경우
    	$mode=$_REQUEST["mode"];
 	else 
    	$mode="";
 
 	if(isset($_REQUEST["num"]))
    	$num=$_REQUEST["num"];
 	else 
    	$num="";
	if(isset($_REQUEST["html_ok"]))  //checkbox는 체크해야 변수명 전달됨.
    	$html_ok=$_REQUEST["html_ok"];
  	else
    	$html_ok="";
   
  	$subject=$_REQUEST["subject"];
  	$content=$_REQUEST["content"];
   
  	$files = $_FILES["upfile"];    //첨부파일	
  	$count = count($files["name"]);

  	$upload_dir = "/home/hosting_users/set555/www/images/";//절대경로 주소시 \xa와 \v가 씹히는 현상때문에 \\를 써줌.
 
  	for ($i=0; $i<$count; $i++)
  	{
    	$upfile_name[$i]     = $files["name"][$i];
    	$upfile_tmp_name[$i] = $files["tmp_name"][$i];
    	$upfile_type[$i]     = $files["type"][$i];
    	$upfile_size[$i]     = $files["size"][$i];
    	$upfile_error[$i]    = $files["error"][$i];
    	$file = explode(".", $upfile_name[$i]);
    	$file_name = $file[0];
    	$file_ext  = $file[1];

	    if (!$upfile_error[$i])
	    {
			$new_file_name = date("Y_m_d_H_i_s");
			$new_file_name = $new_file_name."_".$i;
			$copied_file_name[$i] = $new_file_name.".".$file_ext;      
			$uploaded_file[$i] = $upload_dir.$copied_file_name[$i];

			if( $upfile_size[$i]  > 5000000 ) 
			{
			print("
			 <script>
			   alert('업로드 파일 크기가 지정된 용량(5MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
			   history.back();
			 </script>
			");
			exit;
			}

			if ( ($upfile_type[$i] != "image/gif") && ($upfile_type[$i] != "image/jpeg"))
			{
			print(" <script>
			          alert('JPG와 GIF 이미지 파일만 업로드 가능합니다!');
			          history.back();
			        </script>");
			exit;
			}
			if (!move_uploaded_file($upfile_tmp_name[$i], $uploaded_file[$i]) )
			{
			print("<script>
			        alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
			        history.back();
			      </script>");
			 exit;
			}
	    }
  	}
        
require_once("../MYDB.php");
$pdo = db_connect();
if ($mode=="modify")
{
    $num_checked = count($_REQUEST['del_file']);
    $position = $_REQUEST['del_file'];
 
    for($i=0; $i<$num_checked; $i++)      // delete checked item
    {
		$index = $position[$i];
		$del_ok[$index] = "y";
    }
      
    try
    {
    	$sql = "select * from set555.notice where num=?";  // get target record
        $stmh = $pdo->prepare($sql); 
        $stmh->bindValue(1,$num,PDO::PARAM_STR); 
        $stmh->execute(); 
        $row = $stmh->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $Exception) {
        $pdo->rollBack();
        print "오류: ".$Exception->getMessage();
    }

    for ($i=0; $i<$count; $i++)						
    {
    	$field_org_name = "file_name_".$i;
        $field_real_name = "file_copied_".$i;
	    $org_name_value = $upfile_name[$i];
	    $org_real_value = $copied_file_name[$i];
	    
	    if ($del_ok[$i] == "y")
	    {
			$delete_field = "file_copied_".$i;
			$delete_name = $row[$delete_field];
			$delete_path = $upload_dir.$delete_name;
			unlink($delete_path);
	                
	        try
            {
			   	$pdo->beginTransaction(); 
	            $sql = "update set555.notice set $field_org_name = ?, $field_real_name = ?  where num=?";
	            $stmh = $pdo->prepare($sql); 
	            $stmh->bindValue(1, $org_name_value, PDO::PARAM_STR);
	            $stmh->bindValue(2, $org_real_value, PDO::PARAM_STR);  
	            $stmh->bindValue(3, $num, PDO::PARAM_STR);     
	            $stmh->execute();
	            $pdo->commit(); 
	        } catch (PDOException $Exception){
	        	$pdo->rollBack();
	            print "오류: ".$Exception->getMessage();
	        }             
		}  else  {
			if (!$upfile_error[$i])
			{
		        try{
				    $pdo->beginTransaction(); 
				    $sql = "update set555.notice set $field_org_name = ?, $field_real_name = ?  where num=?";
	                $stmh = $pdo->prepare($sql); 
	                $stmh->bindValue(1, $org_name_value, PDO::PARAM_STR);  
	                $stmh->bindValue(2, $org_real_value, PDO::PARAM_STR);  
	                $stmh->bindValue(3, $num, PDO::PARAM_STR);     
	                $stmh->execute();
	                $pdo->commit(); 
	            } catch (PDOException $Exception) {
	            	$pdo->rollBack();
                         print "오류: ".$Exception->getMessage();
             	}      					
		    }
	    }
	}
    try
    {
        $pdo->beginTransaction();   
        $sql = "update set555.notice set subject=?, content=?, is_html=? where num=?";
        $stmh = $pdo->prepare($sql); 
        $stmh->bindValue(1, $subject, PDO::PARAM_STR);  
        $stmh->bindValue(2, $content, PDO::PARAM_STR);  
        $stmh->bindValue(3, $html_ok, PDO::PARAM_STR);     
        $stmh->bindValue(4, $num, PDO::PARAM_STR);   
        $stmh->execute();
        $pdo->commit(); 
    } catch (PDOException $Exception) {
        $pdo->rollBack();
        print "오류: ".$Exception->getMessage();
    }
} else	{
	if ($html_ok =="y")
	{
		$is_html = "y";
    }else {
		$is_html = "";
        $content = htmlspecialchars($content);
    }
  	try{
	    $pdo->beginTransaction();
	    $sql = "insert into set555.notice(id, name, subject, content, regist_day, hit, is_html, ";
	    $sql .= " file_name_0, file_name_1, file_name_2, file_copied_0,  file_copied_1, file_copied_2) ";
	    $sql .= "values(?, ?, ?, ?, now(), 0, ?, ?, ?, ?, ?, ?, ?)";
	    $stmh = $pdo->prepare($sql); 
	    $stmh->bindValue(1, $_SESSION["userid"], PDO::PARAM_STR);  
	    $stmh->bindValue(2, $_SESSION["name"], PDO::PARAM_STR);     
	    $stmh->bindValue(3, $subject, PDO::PARAM_STR);  
	    $stmh->bindValue(4, $content, PDO::PARAM_STR);  
	    $stmh->bindValue(5, $is_html, PDO::PARAM_STR);    
	    $stmh->bindValue(6, $upfile_name[0], PDO::PARAM_STR);
	    $stmh->bindValue(7, $upfile_name[1], PDO::PARAM_STR);  
	    $stmh->bindValue(8, $upfile_name[2], PDO::PARAM_STR);   
	    $stmh->bindValue(9, $copied_file_name[0], PDO::PARAM_STR);  
	    $stmh->bindValue(10, $copied_file_name[1], PDO::PARAM_STR);  
	    $stmh->bindValue(11, $copied_file_name[2], PDO::PARAM_STR);        
	    $stmh->execute();
	    $pdo->commit(); 
	    } catch (PDOException $Exception) {
	        $pdo->rollBack();
	      	print "오류: ".$Exception->getMessage();
	    }   
	}
   	//header("Location:http://localhost/board/freeboard.php");
 ?>
<script>
		window.alert("성공적으로 작성되었습니다!");
		location.href="freeboard.php";
</script>
