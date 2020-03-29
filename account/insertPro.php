<?php
header('Content-Type:text/html; charset=utf-8');
$userid=$_REQUEST["userid"];
$name=$_REQUEST["name"];
$pwd1=$_REQUEST["pwd1"];
$sample4_postcode=$_REQUEST["sample4_postcode"];
$sample4_roadAddress=$_REQUEST["sample4_roadAddress"];
$sample4_jibunAddress=$_REQUEST["sample4_jibunAddress"];
$detailAddress=$_REQUEST["detailAddress"];
$email1=$_REQUEST["email1"];
$email2=$_REQUEST["email2"];
$email=$email1."@".$email2;
$tel1=$_REQUEST["tel1"];
$tel2=$_REQUEST["tel2"];
$tel3=$_REQUEST["tel3"];
$tel=$tel1."-".$tel2."-".$tel3;
$phone1=$_REQUEST["phone1"];
$phone2=$_REQUEST["phone2"];
$phone=$phone1."-".$phone2;


require_once("../MYDB.php");
$pdo=db_connect();

try
{
	$pdo->beginTransaction();
	$sql="insert into member1(userid,name,pwd1,sample4_postcode,sample4_roadAddress,sample4_jibunAddress,detailAddress,email,tel,phone,reg_date)
		values(?,?,?,?,?,?,?,?,?,?,now())";
	$stmh=$pdo->prepare($sql);
	$stmh->bindvalue(1,$userid,PDO::PARAM_STR);
	$stmh->bindvalue(2,$name,PDO::PARAM_STR);
	$stmh->bindvalue(3,$pwd1,PDO::PARAM_STR);
	$stmh->bindvalue(4,$sample4_postcode,PDO::PARAM_STR);
	$stmh->bindvalue(5,$sample4_roadAddress,PDO::PARAM_STR);
	$stmh->bindvalue(6,$sample4_jibunAddress,PDO::PARAM_STR);
	$stmh->bindvalue(7,$detailAddress,PDO::PARAM_STR);
	$stmh->bindvalue(8,$email,PDO::PARAM_STR);
	$stmh->bindvalue(9,$tel,PDO::PARAM_STR);
	$stmh->bindvalue(10,$phone,PDO::PARAM_STR);
	
	$stmh->execute();
	$pdo->commit();
?>
	<script>
        window.alert("회원가입이 성공적으로 되었습니다!");
        location.href="../index.php";
    </script>
<?php
        
}	
   catch(PDOException $Exception)
   {
	   $pdo->rollBack();
	   print "오류 : ".$Exception->getMessage();
   }
