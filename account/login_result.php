<?php
session_start();

header('Content-Type:text/html; charset=utf-8');
$userid = $_REQUEST['userid'];
$pw = $_REQUEST['pw'];
//$chbox=$_REQUEST["chbox"];
require_once("../MYDB.php");
$pdo = db_connect();

try
{
    $sql = "select * from set555.member1 where userid=?";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(1,$userid,PDO::PARAM_STR);
    $stmh->execute();
    
    $count = $stmh->rowCount();
} catch (PDOException $Exception) {
    print " 오류 : ".$Exception->getMessage();
}
$row=$stmh->fetch(PDO::FETCH_ASSOC);

if($count<1)
{
    
?>
<script>
    alert("아이디가 틀립니다!");
    history.back();
</script>
<?php
}
else if($pw!=$row["pwd1"])
{
?>
<script>
    alert("비밀번호가 틀립니다!");
    history.back();
</script>
<?php
}
else//아이디 비번 일치시
{
    $_SESSION["userid"]=$row["userid"];
    $_SESSION["name"]=$row["name"];
    ?>
    <script>
        window.alert("로그인이 성공적으로 되었습니다!");
        location.href="../index.php";
    </script>
    <?php
    exit;
}
?>
