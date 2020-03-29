<?php session_start();?>
<meta charset="utf-8">
<?php
	if(!$_SESSION["userid"]=="set555")
	{
?>
<script>
	alert("관리자 아이디로 로그인해 주세요.");
	history.back();
</script>
<?php
}
$subject=$_REQUEST["subject"];
$content=$_REQUEST["content"];
$href   =$_REQUEST["href"];


$files = $_FILES["upfile"];
//$count = count($files["name"]);
$upload_dir = "/home/hosting_users/set555/www/images/";//절대경로 주소시 \xa와 \v가 씹히는 현상때문에 \\를 써줌.
//for ($i=0; $i<$count; $i++)
//{
	$upfile_name 	  = $files["name"];
	$upfile_tmp_name  = $files["tmp_name"];
	$upfile_type	  = $files["type"];
	$upfile_size      = $files["size"];
	$upfile_error     = $files["error"];
	$file = explode(".",$upfile_name);
	$file_name = $file[0];
	$file_ext  = $file[1];

	if (!$upfile_error)
	{
		$new_file_name 	  = date("Y_m_d_H_i_s");
		$new_file_name    = $new_file_name."_".$i;
		$copied_file_name = $new_file_name.".".$file_ext;
		$uploaded_file    = $upload_dir.$copied_file_name;

		if ($upfile_size > 5000000)
		{
			print("
				<script>
				alert('업로드 파일 크기가 지정된 용량(5MB)을 초과합니다.');
				history.back();
				</script>
				");
			exit;
		}
		if (($upfile_type != "image/gif") && ($upfile_type != "image/jpeg"))
		{
			
			print("
				<script>
				alert('JPG와 GIF 이미지 파일만 업로드 가능합니다.$file_name');
				history.back();
				</script>
				");
			exit;
		}
		if (!move_uploaded_file($upfile_tmp_name,$uploaded_file))
		{
			print("
				<script>
				alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
				//console.log('$file[$i]');
				//history.back();
				</script>
				");
			exit;
		}
	}
//}

require_once("../MYDB.php");
$pdo = db_connect();

try
{
	$pdo -> beginTransaction();
	$sql = "insert into set555.man_cont(subject,content,href,regist_day,";
	$sql.= "img_name_0,img_copied_0)";
	$sql.= "value(?,?,?,now(),?,?)";
	$stmh = $pdo->prepare($sql);
	$stmh -> bindValue(1, $subject, PDO::PARAM_STR);
	$stmh -> bindValue(2, $content, PDO::PARAM_STR);
	$stmh -> bindValue(3, $href, PDO::PARAM_STR);
	$stmh -> bindValue(4, $upfile_name, PDO::PARAM_STR);
	$stmh -> bindValue(5, $copied_file_name, PDO::PARAM_STR);
	$stmh -> execute();
	$pdo  -> commit();

	//header("Location:http://astragun.com/nav_cont/man_clothes.php");
}catch(PDOException $Exception)
{
	$pdo->rollBack();
	print "오류 :".$Exception->getMessage();
}

?>
<script>
		window.alert("성공적으로 작성되었습니다!");
		location.href="man_clothes.php";
</script>