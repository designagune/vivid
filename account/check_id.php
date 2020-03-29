<meta charset="UTF-8">
<style>
    #close
    {
        width:100px;
        height:40px;
        font-size:1.1em;
        font-weight:900;
	cursor:pointer;
	border-radius:3px;
	border-color:transparent;
	transition:all 0.5s;
	background:black;
	border:2px solid black;
	color:white;
    }
        #close:hover
        {
            background:transparent;
				transition:all 0.5s;
				color:black;
        }
</style>
<?php $userid = $_REQUEST["userid"];
    if(!$userid)
    {
        print "<center style='font-size:0.9em; font-weight:1000; margin:5%;'><marquee behavior=alternate width=200 scrolldelay=200>아이디를 입력해주세요</marquee><center>";
    }
    else
    {
        require_once("../MYDB.php");
        $pdo= db_connect();
    
    
    try
    {
        $sql = "select * from set555.member1 where userid = ?";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(1,$userid,PDO::PARAM_STR);
        $stmh->execute();
        $count = $stmh->rowCount();
    }
    catch(PDOException $Exception)
    {
        print " 오류 : ".$Exception->getMessage();
    }
        
        if($count<1)
        {
            print("<center style='font-size:0.9em; font-weight:1000; margin:5%;'><marquee behavior=alternate width=200 scrolldelay=200>사용가능한 아이디입니다.</marquee></center>");
        }
        else
        {
            print"<center style='font-size:0.9em; font-weight:1000; margin:5%;'><marquee behavior=alternate width=200 scrolldelay=600>아이디가 중복됩니다.</br>다른 아이디를 사용해 주세요.</marquee></center>";
        }
    }
    print"</br><center><input type=button value=close onClick='self.close()'id='close'></center>";
    ?>