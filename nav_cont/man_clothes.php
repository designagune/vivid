<?php
session_start();
$file_dir = "/home/hosting_users/set555/www/images/";
error_reporting(E_ALL ^ E_NOTICE);
$num=$_REQUEST["num"];
require_once("../MYDB.php");

$pdo = db_connect();

 try{ 
     $sql = "select * from set555.man_cont order by num desc";
     $stmh = $pdo->query($sql);               
 }
 catch (PDOException $Exception){
     print "오류: ".$Exception->getMessage();
 }

?>
<!DOCTYPE HTML>
<html lang="ko">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <title>:: VIVID :: MAN MALL</title>
        
        <link rel="stylesheet" href="../css/reset.css" />
        <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
        <link rel="stylesheet" href="../css/grid.css" />
        <link rel="stylesheet" href="../css/common.css" />
        <link rel="stylesheet" href="../css/nav_woman.css" />

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="../js/mob_menu.js"></script>
    </head>
    <body>
        <div class="visual-content-wrap">
                <?php include "../header.php" ?>
                <section class="visual-section">
                    <h1>MAN MALL</h1>
                    <div class="visual-content">
                        <div class="row">
                            <div class="grid12">
                                <div class="row">
                                    <?php
                                    if($_SESSION["userid"]=="set555")
                                    {
                                    ?>
                                        <div class="visual-contents-writer">
                                            <form name="cont_from" method="post" action="man_insert.php"enctype="multipart/form-data">
                                                <div class="contents-image">
                                                    <label>이미지 첨부</label>
                                                    <input type="file" name="upfile">
                                                    <span>이미지크기의 세로길이를 가로길이의 82%로 맞춰주세요. <a href="https://search.naver.com/search.naver?ie=UTF-8&sm=whl_hty&query=%EB%B9%84%EC%9C%A8%EA%B3%84%EC%82%B0%EA%B8%B0" target="_blank">[ 비율계산링크 ]</a></span>
                                                </div>
                                                <div class="contents-subject">
                                                    <label>쇼핑몰 이름</label>
                                                    <input type="text" name="subject"/>
                                                </div>
                                                <div class="contents-href">
                                                    <label>쇼핑몰 링크</label>
                                                    <input type="text" name="href">
                                                </div>
                                                <div class="contents-text">
                                                    <label>쇼핑몰 소개 및 정보</label>
                                                    <textarea rows="6" cols="80" name="content" required></textarea>
                                                </div>
                                                <div class="contents_btn"><button>작성</button></div>
                                            </form>
                                        </div>
                                    <?php
                                    }
                                        while($row = $stmh->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $cont_subj        = $row["subject"];
                                            $cont_href        = $row["href"];
                                            $cont_img_name    = $row["img_name_0"];
                                            $cont_img_copied  = $row["img_copied_0"];
                                            $cont_num         = $row["num"];
                                            $cont_date        = $row["regist_day"];
                                            $cont_cont        = str_replace("\n","<br/>",$row["content"]);
                                            $cont_cont        = str_replace(" ","&nbsp;",$cont_cont);
                                        ?>
                                        <div class="row">
                                            <?php
                                            if($_SESSION["userid"]=="set555")
                                            {?>
                                            <div class="contents-delete"><a href="man_delete.php?num=<?=$cont_num?>">삭제</a></div>
                                            <?php }
                                            ?>
                                            <div class="grid3">
                                                <a href="<?=$cont_href?>" target="_blank">
                                                    <?php 

                                                           print "<img src='../images/$cont_img_copied' alt='img'><br/><br/>";
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="grid8">
                                                <h3><a href="<?=$cont_href?>" target="_blank"><?= $cont_subj ?></a></h3>
                                                <p><?= $cont_cont ?></p>

                                                
                                            </div>
                                            <div class="ripple grid12">
                                                <div class="row">
                                                    <div class="ripple-contents-1">댓글</div>
                                                    <div class="ripple-contents-2">
                                                        <?php 
                                                        try{
                                                            $sql = "select * from set555.man_ripple where parent='$cont_num'";
                                                            $stmh1 = $pdo->query($sql);
                                                        } catch(PDOException $Exception){
                                                            print "오류 : ".$Exception->getMessage(); 
                                                        }
                                                        while($row_ripple = $stmh1->fetch(PDO::FETCH_ASSOC))
                                                        {
                                                            $ripple_num       = $row_ripple["num"];
                                                            $ripple_id        = $row_ripple["id"];
                                                            $ripple_name      = $row_ripple["name"];
                                                            $ripple_content   = str_replace("\n","<br/>",$row_ripple["content"]);
                                                            $ripple_content   = str_replace(" ", "&nbsp;", $ripple_content);
                                                            $ripple_date      = $row_ripple["regist_day"];
                                                        ?>
                                                        <div class="ripple-title">
                                                            <ul>
                                                                <li><?= $ripple_name?>&nbsp;<span>·</span>&nbsp; <?= $ripple_date ?></li>
                                                                <li class="ripple-delete">
                                                                    <?php
                                                                    if(isset($_SESSION["userid"])){
                                                                        if($_SESSION["userid"]=="set555" || $_SESSION["userid"]==$ripple_id)
                                                                            print "<a href=man_delete_ripple.php?num=$ripple_num>[삭제]</a>";
                                                                    }
                                                                    ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="ripple-comment"><?=$ripple_content?></div>
                                                    <?php }
                                                        if(isset($_SESSION["userid"])){
                                                        ?>
                                                        <form name="ripple_form" method="post" action="man_insert_ripple.php">
                                                            <input type="hidden" name="num" value="<?=$cont_num?>">
                                                            <div class="ripple-textarea">
                                                                <textarea row="3" cols="50" name="ripple_content" required></textarea>
                                                            </div>
                                                            <div class="ripple-submit-btn"><input type="submit" value="댓글 작성"></div>
                                                        </form>
                                                        <?php
                                                        }
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php 
                                    }
                                    ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <?php include '../footer.php'?>
        </div>
        <script>

        </script>
    </body>

</html>
