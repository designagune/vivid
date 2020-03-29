<?php
	session_start(); 
   	error_reporting(E_ALL ^ E_NOTICE);
	$file_dir = '/home/hosting_users/set555/www/images/'; 
  
	$num=$_REQUEST["num"];
   
	require_once("../MYDB.php");
	$pdo = db_connect();
 
	try
	{
	    $sql = "select * from set555.notice where num=?";
	    $stmh = $pdo->prepare($sql);  
	    $stmh->bindValue(1, $num, PDO::PARAM_STR);      
	    $stmh->execute();            
	      
	    $row = $stmh->fetch(PDO::FETCH_ASSOC);
	 
	    $item_num     = $row["num"];
	    $item_id      = $row["id"];
	    $item_name    = $row["name"];
	    $item_nick    = $row["nick"];
	    $item_hit     = $row["hit"];
	 
	    $image_name[0]   = $row["file_name_0"];
	    $image_name[1]   = $row["file_name_1"];
	    $image_name[2]   = $row["file_name_2"];
	 
	    $image_copied[0] = $row["file_copied_0"];
	    $image_copied[1] = $row["file_copied_1"];
	    $image_copied[2] = $row["file_copied_2"];
	 
	    $item_date    = $row["regist_day"];
	    $item_date    = substr($item_date,0,10);
	    $item_subject = str_replace(" ", "&nbsp;", $row["subject"]);
	    $item_content = $row["content"];
    	$is_html      = $row["is_html"];
	      
	    if ($is_html!="y")
	    {
			$item_content = str_replace(" ", "&nbsp;", $item_content);
			$item_content = str_replace("\n", "<br>", $item_content);
     	}	
 
     	$new_hit = $item_hit + 1;
     	try
     	{
	    	$pdo->beginTransaction(); 
	        $sql = "update set555.notice set hit=? where num=?";   // 조회수 증가
	        $stmh = $pdo->prepare($sql);  
	        $stmh->bindValue(1, $new_hit, PDO::PARAM_STR);      
	        $stmh->bindValue(2, $num, PDO::PARAM_STR);           
	        $stmh->execute();
	        $pdo->commit(); 
	    } catch (PDOException $Exception) {
	        $pdo->rollBack();
	       	print "오류: ".$Exception->getMessage();
	    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" id="viewport" content="user-scalable=yes, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">
		<link rel="stylesheet" href="../css/common.css">
		<link rel="stylesheet" href="../css/notice_view.css">
		<link rel="stylesheet" href="../css/grid1.css">
		<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<!--GNB-->
		<script src="../js/mob_menu.js"></script>
		<title> :: VIVID :: NOTICE / 공지사항</title>
		<script>
			function del(href)
			{
				if(confirm("정말 삭제하시겠습니까?"))
				{
					document.location.href = href;
				}
			}
		</script>
	</head>
	<body>
		<div class="wrap"><!--추후 height수정-->
			<!-- php로 header 부분 include -->
			<?php include '../header.php'?>
			<section>
				<div id="content">
					<div class="row">
	        			<div id="view_title" class="grid12">
	        				<div class="row">
				  				<div id="view_title1"class="grid12"><h1><?= $item_subject ?><h1></div>
			          			<div id="view_title2"class="grid4">작성자 : <?= $item_name ?> | 조회 : <?= $item_hit ?> | 작성일 : <?= $item_date ?> </div>	
		          			</div>
						</div>
	        			<div id="view_content" class="grid12">
		 					<?php
							for ($i=0; $i<3; $i++)
							{
							    if ($image_copied[$i]) 
						        {
								    $imageinfo = getimagesize($file_dir.$image_copied[$i]);
							        $image_width[$i] = $imageinfo[0];
								    $image_height[$i] = $imageinfo[1];
								    $image_type[$i]  = $imageinfo[2];
								    $img_name = $image_copied[$i];
								    $img_name = "../images/".$img_name;
								    if ($image_width[$i] > 785)
			          				$image_width[$i] = 785;
		               
		             				 // image 타입 1은 gif 2는 jpg 3은 png
		             				if($image_type[$i]==1 || $image_type[$i]==2 || $image_type[$i]==3)
		             				{
			        					print "<img src='$img_name' width='$image_width[$i]'><br><br>";
		                    		}
		            			}
		        			}
		  					?>
		 					<?= $item_content ?>
	         			</div>
	        			<div id="view_button" class="grid12">
	        				<div class="view_btn_in">
				  				<a href="freeboard.php">목록</a>&nbsp;
			  					<?php
			    				if(isset($_SESSION["userid"]))
			    				{
									if($_SESSION["userid"]=="set555")
			        				{
			        					?>
										<a href="notice_write_form.php?mode=modify&num=<?=$num?>">수정</a>&nbsp;
										<a href="javascript:del('notice_delete.php?num=<?=$num?>')">삭제</a>&nbsp;
										<a href="notice_write_form.php">글쓰기</a>
			 						<?php  	} ?>
									
			 					<?php
								}

	  	} catch (PDOException $Exception) {
	    	print "오류: ".$Exception->getMessage();
	  	}
	 	?>
	 						</div>
						</div>
					</div>
				</section>
				<!-- php로 footer 부분 include -->
				<?php include "../footer.php"?>
			</div>
		</div>

	</body>
</html>