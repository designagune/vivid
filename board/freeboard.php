<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" id="viewport" content="user-scalable=yes, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">
		<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
		<link rel="stylesheet" href="../css/common.css">
		<link rel="stylesheet" href="../css/freeboard.css">
		<link rel="stylesheet" href="../css/grid1.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<!--GNB-->
		<script src="../js/mob_menu.js"></script>
		<title> :: VIVID :: NOTICE / 공지사항</title>
		<style>
			
		</style>
	</head>
	<?php
		require_once("../MYDB.php");
		$pdo = db_connect();
	 
		if(isset($_REQUEST["mode"]))
	    	$mode=$_REQUEST["mode"];
	  	else 
	    	$mode="";
	    if(isset($_REQUEST["search"]))   // search 쿼리스트링 값 할당 체크
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
		<div class="wrap"><!--추후 height수정-->
			<!-- php로 header 부분 include -->
			<?php include '../header.php'?>
			<section>
				<div id="content">
					<div class="row" id="col2">
      					<div class="grid12" id="title">
      						<center>
      							<h1>NOTICE</h1>
      						</center>
      					</div>
      					<!--검색기능-->
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
	        						</div> <!-- end of list_search3 -->
		        					<div id="list_search4">
		        						<input type="text" name="search">
		        					</div>
		        					<div id="list_search5">
		        						<input type="submit" value="검색">
		        					</div>
	      						</div> <!-- end of list_search -->
	      					</form>
      					</div>
      					<div class="grid12">
      						<div class="list_name row">
      							<div class="grid8">
      								<div class="row">
      									<div class="grid1">
		      								<div class="list_num">번호</div>
		      							</div>
		      							<div class="grid11">
		      								<div class="list_sub">제목</div>
		      							</div>
	      							</div>
      							</div>
      							<div class="grid4">
      								<div class="row">
      									<div class="grid4">
      										<div id="list_name">작성자</div>
      									</div>
      									<div class="grid4">
      										<div class="list_date">등록일</div>
      									</div>
      									<div class="grid4">
      										<div class="list_hit">조회수</div>
      									</div>
	      							</div>
      							</div>
      						</div>
      					</div>
    					<div class="grid12 list_content">
							<?php  // 글 목록 출력
						 
							while($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
							    $item_num=$row["num"];
							    $item_id=$row["id"];
							    $item_name=$row["name"];
							    $item_hit=$row["hit"];
							    $item_date=$row["regist_day"];
							    $item_date=substr($item_date, 0, 10);
							    $item_subject=str_replace(" ", "&nbsp;", $row["subject"]);
						  	?>
  							<div class="list_item row">
      							<div class="grid8">
      								<div class="row">
      									<div class="grid1">
		      								<div class="list_item1"><?= $item_num ?></div>
		      							</div>
		      							<div class="grid11">
		      								<div class="list_item2">
							    				<a href="notice_view.php?num=<?=$item_num?>"><?= $item_subject ?></a>
							    			</div>
		      							</div>
	      							</div>
      							</div>
      							<div class="grid4">
      								<div class="row">
      									<div class="grid4">
      										<div class="list_item3"><?= $item_name ?></div>
      									</div>
      									<div class="grid4">
      										<div class="list_item4"><?= $item_date ?></div>
      									</div>
      									<div class="grid4">
      										<div class="list_item5"><?= $item_hit ?></div>
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
			</section>
			<!-- php로 footer 부분 include -->
			<?php include "../footer.php"?>
		</div>

	</body>
</html>
