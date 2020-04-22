<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_REQUEST["mode"]))  //수정 버튼을 클릭해서 호출했는지 체크
  $mode=$_REQUEST["mode"];
 else
  $mode="";
 
 if(isset($_REQUEST["num"]))  //수정 버튼을 클릭해서 호출했는지 체크
  $num=$_REQUEST["num"];
 else
  $num="";
         
 require_once("../MYDB.php");
 $pdo = db_connect();
 if ($mode=="modify"){
   try{
     $sql = "select * from set555.notice where num = ? ";
     $stmh = $pdo->prepare($sql); 
     $stmh->bindValue(1,$num,PDO::PARAM_STR); 
     $stmh->execute();
     $count = $stmh->rowCount();              
   if($count<1){  
     print "검색결과가 없습니다.<br>";
    }else{
     $row = $stmh->fetch(PDO::FETCH_ASSOC);
     $item_subject = $row["subject"];
     $item_content = $row["content"];
     $item_file_0 = $row["file_name_0"];
     $item_file_1 = $row["file_name_1"];
     $item_file_2 = $row["file_name_2"];
     $copied_file_0 = $row["file_copied_0"];
     $copied_file_1 = $row["file_copied_1"];
     $copied_file_2 = $row["file_copied_2"];
     }
    }catch (PDOException $Exception) {
      print "오류: ".$Exception->getMessage();
    }
 }
?>
<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png"/>
		<link rel="stylesheet" href="../css/common.css"/>
		<link rel="stylesheet" href="../css/notice_write.css"/>
		<link rel="stylesheet" href="../css/grid1.css"/>
		<!--GNB-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="../js/mob_menu.js"></script>
		<title> :: VIVID :: NOTICE / 공지사항</title>
	</head>
	<body>
		<div class="wrap"><!--추후 height수정-->
			<!-- php로 header 부분 include -->
			<?php include '../header.php'?>
			<section>
 				<h2 class="blind">&nbsp;</h2>
				<div id="content">
					<div class="write_title">NOTICE</div>
					<?php
    					if($mode=="modify"){
  					?>
					<form  name="board_form" method="post" action="notice_insert.php?mode=modify&num=<?=$num?>" enctype="multipart/form-data"> 
  					<?php  } else {
 					?>
					<form  name="board_form" method="post" action="notice_insert.php" enctype="multipart/form-data"> 
  					<?php
					}
  					?>
						<div id="write_form">
							<div class="write_row1 row">
			            		<div class="col1 grid2"> 작성자 </div>
			            		<div class="col2 grid8"><?=$_SESSION["name"]?></div>
			          			<div class="col3 grid2">
			          				<input type="checkbox" name="html_ok" value="y"> HTML 쓰기
			          			</div>
		        			</div>
							<div class="write_row2 row">
	            				<div class="col1 grid2"> 제목   </div>
		    					<div class="col2 grid6">
		    						<input type="text" name="subject" <?php if($mode=="modify"){ ?>value="<?=$item_subject?>" <?php }?> required>
	            				</div>
							</div>
							<div class="write_row3 row">
	            				<div class="col1 grid2"> 내용   </div>
		    					<div class="col2 grid6">
		    						<textarea rows="15" cols="79" name="content" required><?php if($mode=="modify") print $item_content?></textarea>
		    					</div>
							</div>
							<div class="write_row4 row">
	            				<div class="col1 grid2"> 이미지파일1   </div>
		    					<div class="col2 grid4">
		    						<input type="file" name="upfile[]">
		    					</div>
		    				<?php 	if ($mode=="modify" && $item_file_0)
		         			{
	 				 		?>
			    				<div class="delete_ok">
		            				<?=$item_file_0?> 파일이 등록되어 있습니다. 
		            				<input type="checkbox" name="del_file[]" value="0"> 삭제
		            			</div>
	  						<?php  	} ?>
							</div>

							<div class="write_row5 row">
								<div class="col1 grid2"> 이미지파일2  </div>
		    					<div class="col2 grid4">
		    						<input type="file" name="upfile[]">
		    					</div>
		    				<?php 	if ($mode=="modify" && $item_file_1)
							{
	  						?>
			    				<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. 
		            				<input type="checkbox" name="del_file[]" value="1"> 삭제
		            			</div>
	  						<?php  	} ?>
							</div>
	  						
		    				<div class="write_row6 row">
		    					<div class="col1 grid2"> 이미지파일3   </div>
			    				<div class="col2 grid4">
			    					<input type="file" name="upfile[]">
			    				</div>
			    			<?php 	if ($mode=="modify" && $item_file_2)
							{
	  						?>
			    				<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. 
		            				<input type="checkbox" name="del_file[]" value="2"> 삭제
		            			</div>
	  						<?php  	} ?>
							</div>
	  						
						</div>
        				<div id="write_button">
        					<input type="submit" value="글쓰기">
        					<a href="freeboard.php">목록</a>
						</div>

					</form>
				</div>
			</section>
			<!-- php로 footer 부분 include -->
			<?php include "../footer.php"?>
		</div>

	</body>
</html>
