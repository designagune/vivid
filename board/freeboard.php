<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<title> :: VIVID :: NOTICE / 공지사항</title>

		<link rel="stylesheet" href="../css/reset.css" />
		<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png"/>
		<link rel="stylesheet" href="../css/common.css"/>
		<link rel="stylesheet" href="../css/grid.css"/>
		<link rel="stylesheet" href="../css/freeboard.css"/>
		
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="../js/mob_menu.js"></script>
	</head>
	<?php
		require_once("../MYDB.php");
		$pdo = db_connect();
	 
		if(isset($_REQUEST["mode"]))
	    	$mode=$_REQUEST["mode"];
	  	else 
	    	$mode="";
	    if(isset($_REQUEST["search"]))
    		$search=$_REQUEST["search"];
  		else 
    		$search="";

  		if(isset($_REQUEST["find"]))
    		$find=$_REQUEST["find"];
 		else
    		$find="";
 
  		if($mode=="search")
  		{
    		if(!$search){
  			?>
      			<script>
        		alert('검색할 단어를 입력해 주세요!');
        		history.back();
      			</script>
  			<?php
     		}
   			$sql="select * from set555.notice where $find like '%$search%' order by num desc";
  		} else {
   			$sql="select * from set555.notice order by num desc";
  		}
  		try{  
    	$stmh = $pdo->query($sql); 
    	$count=$stmh->rowCount(); 
  		?>


	<body>
		<div class="visual-content-wrap">
			<?php include '../header.php'?>
			<section>
				<div class="visual-content">
					<div class="row" id="col2">
      					<div class="grid12 head-title">
      						<h1>NOTICE</h1>
      					</div>
      					<div class="grid12 search">
	      					<form name="board_form" method="post" action="freeboard.php?mode=search">
	      						<div id="list_search">
							        <div id="list_search1">▷ 총 <?= $count ?> 개의 게시물이 있습니다.</div>
							        <div id="list_search2">search</div><br/>
							        <div id="list_search3">
	        							<select name="find">
								           <option value='subject'>제목</option>
								           <option value='content'>내용</option>
								           <option value='name'>이름</option>
	        							</select>
	        						</div>
		        					<div id="list_search4">
		        						<input type="text" name="search">
		        					</div>
		        					<div id="list_search5">
		        						<input type="submit" value="검색">
		        					</div>
	      						</div>
	      					</form>
      					</div>
      					<div class="grid12">
      						<div class="visual-list-title row">
      							<div class="grid8">
      								<div class="row">
      									<div class="grid1">
		      								<div class="table-list-number">번호</div>
		      							</div>
		      							<div class="grid11">
		      								<div class="table-list-subtitle">제목</div>
		      							</div>
	      							</div>
      							</div>
      							<div class="grid4">
      								<div class="row">
      									<div class="grid4">
      										<div class="table-list-name">작성자</div>
      									</div>
      									<div class="grid4">
      										<div class="table-list-date">등록일</div>
      									</div>
      									<div class="grid4">
      										<div class="table-list-hit">조회수</div>
      									</div>
	      							</div>
      							</div>
      						</div>
      					</div>
    					<div class="grid12 table-list-content">
							<?php 
							while($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
							    $item_num=$row["num"];
							    $item_id=$row["id"];
							    $item_name=$row["name"];
							    $item_hit=$row["hit"];
							    $item_date=$row["regist_day"];
							    $item_date=substr($item_date, 0, 10);
							    $item_subject=str_replace(" ", "&nbsp;", $row["subject"]);
						  	?>
  							<div class="table-list-item row">
      							<div class="grid8">
      								<div class="row">
      									<div class="grid1">
		      								<div class="list-item-number"><?= $item_num ?></div>
		      							</div>
		      							<div class="grid11">
		      								<div class="list-item-contents">
							    				<a href="notice_view.php?num=<?=$item_num?>"><?= $item_subject ?></a>
							    			</div>
		      							</div>
	      							</div>
      							</div>
      							<div class="grid4">
      								<div class="row">
      									<div class="grid4">
      										<div class="list-item-writer"><?= $item_name ?></div>
      									</div>
      									<div class="grid4">
      										<div class="list-item-date"><?= $item_date ?></div>
      									</div>
      									<div class="grid4">
      										<div class="list-item-hit"><?= $item_hit ?></div>
      									</div>
	      							</div>
      							</div>
      						</div>
 							<?php
    						}
   							} catch (PDOException $Exception) {
							    print "오류: ".$Exception->getMessage();
							}  
							?>
 						</div>
							<div id="write_button">
							    <a href="freeboard.php">전체목록</a>
							  <?php
							   if($_SESSION["userid"]=="set555")
							   {
							  ?>
							  <a href="notice_write_form.php">글쓰기</a>
							  <?php
							   }
							  ?>
							</div>
					</div>
				</div>
			</section>
			<!-- php로 footer 부분 include -->
			<?php include "../footer.php"?>
		</div>

	</body>
</html>
