<?php
session_start();
require_once("../MYDB.php");
$pdo = db_connect();
try{
    $sql = "select * from set555.woman_reply order by num asc";
    $stmh1 = $pdo->query($sql);
}catch (PDOException $Exception){
    print "오류: ".$Exception->getMessage();
}
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>VIVID :: WOMAN MALL</title>

        <link rel="stylesheet" href="../css/grid1.css" >
        <link rel="stylesheet" href="../css/common.css?ver=8" >
        <link rel="stylesheet" href="../css/nav_woman.css?ver=1" >

    </head>
    <body>
        <div class="wrap">
                <?php include "../header.php" ?>
                <section class="grid11">
                    <center><h1>WOMAN MALL</h1></center>
                    <div id="contain">
                        <div class="grid9">
                            <div class="row">
                                <div class="grid3">
                                    <a href="http://www.hypnotic.co.kr" target="_blank">
                                        <img src="../images/woman_히프나틱.JPG" alt="히프나틱"/>
                                    </a>
                                </div>
                                <div class="grid8">
                                    <h3><a href="http://www.hypnotic.co.kr"target="_blank">HYPNOTIC</a></h3>
                                    <p>FACT : 글로벌 스타일 의류가 많음 </p>
                                    <p>MD OPINION : CROP,BIKINI 등 다른 쇼핑몰에서 볼수 없는 품목이 있음</p>
                                </div>
                            </div>
                            <div class="row">
                                <?php 
                                if(isset($_SESSION["userid"])){
                                ?>
                                <div class="reply_writer">
                                    <form name="reply_form" method="post" action="insert_ripple(woman).php">
                                        <input type="hidden" name="num" value="<=?$num?>">
                                        <div class="reply_name">
                                            <span>
                                                작성자 :  <?=$_SESSION["name"]?>
                                            </span>
                                        </div>
                                        <div class="reply1">
                                            <textarea placeholder="댓글을 입력하세요"rows="6" cols="50" name="content" required></textarea>
                                        </div>
                                        <div class="reply2">
                                            <input type="submit" value="댓글 등록" />
                                        </div>
                                    </form>
                                </div>
                                <?php
                                }
                                 while($row = $stmh1->fetch(PDO::FETCH_ASSOC))
                                {
                                    $id = $row["id"];
                                    $num = $row["num"];
                                    $date = $row["regist_day"];
                                    $nick = $row["name"];
                                    $content = str_replace("\n", "<br>", $row["content"]);
                                    $content = str_replace(" ", "&nbsp;", $content);
                                ?>
                                <div class="reply_title">
                                    <ul>
                                        <li style="display: none;">
                                            <?= $num?>
                                        </li></br>
                                        <li>
                                            <?= $nick?>
                                        </li>
                                        <li>
                                            <?= $date?>
                                        </li>
                                        <li>
                                            <?php 
                                            if(isset($_SESSION["userid"]))
                                            {

                                                if($_SESSION["userid"]=="set555"||$_SESSION["userid"]==$id)
                                                    print"<a href='delete_ripple(woman2).php?num=$num'>[삭제]</a>";
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="reply_content">
                                    <?= $content ?>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="grid9">
                            &nbsp
                        </div>
                        <div class="grid9">
                        </div>
                    </div>

                </section>
                <?php include '../footer.php'?>
        </div>
    </body>

</html>