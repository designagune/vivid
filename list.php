<!DOCTYPE html>
<?php
require_once ("MYDB.php");
$pdo= db_connect();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>회원관리</title>
    </head>
    <body>
        <?php
            try
            {
            $sql="select * from member1";
            $stmh=$pdo->query($sql);

            $count=$stmh->rowCount();
            print "검색 결과는 $count 건 입니다.</br>";

            }	
                catch(PDOException $Exception)
                {
                        print "오류 : ".$Exception->getMessage();
                }
            
            if($count<1)
            {
                print "가입자가 없습니다.</br>";
            }
            else
            {
            ?>
            
            <table border="1" width="1700">
                <tr align="center">
                    <th>이름</th>
                    <th>아이디</th>
                    <th>비밀번호</th>
                    <th>우편번호</th>
                    <th>도로명주소</th>
                    <th>지번주소</th>
                    <th>상세주소</th>
                    <th>이메일</th>
                    <th>전화번호</th>
                    <th>휴대폰번호</th>
                    <th>가입일시</th>
                    <th>수정</th>
                    <th>삭제</th>
                </tr>
                <?php
                    while($row=$stmh->fetch(PDO::FETCH_ASSOC))
                    {
                ?>
                        <tr align="center">
                            <td><?=$row['name']?></td>
                            <td><?=$row['userid']?></td>
                            <td><?=$row['pwd1']?></td>
                            <td><?=$row['sample4_postcode']?></td>
                            <td><?=$row['sample4_roadAddress']?></td>
                            <td><?=$row['sample4_jibunAddress']?></td>
                            <td><?=$row['detailAddress']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['tel']?></td>
                            <td><?=$row['phone']?></td>
                            <td><?=$row['reg_date']?></td>
                            <td><a href="updateForm.php?userid=<?=$row['userid']?>">수정</a></td>
                            <td><a href="delete.php?userid=<?=$row['userid']?>">삭제</a></td>
                            
                        </tr>
            <?php    }
            
            } ?>
            </table>
        
        
    </body>
</html>
