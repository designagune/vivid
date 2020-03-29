<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" id="viewport" content="user-scalable=yes, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">
		<link rel="stylesheet" href="../css/common.css">
		<link rel="stylesheet" href="../css/grid1.css?ver=3">
		<link rel="stylesheet" type="text/css" href="../css/join.css">
		<title>:: VIVID :: JOIN</title>
		<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
		<script src="../js/join.js"></script>
		<script src="../js/join_check.js"></script>
		<script>
			function isSame() //비밀번호와 비밀번호확인칸 동일 식별메소드
            {
                var pw = document.member_form.pwd1.value;
                var confirmPW = document.member_form.pwd2.value;
                
                    if(pw.length<6||pw.length>16)
                    {
                        alert("비밀번호는 6글자 이상, 16글자 이하만 이용 가능합니다.");
                        document.getElementById('pw').value=document.getElementById('pwCheck').value='';
                        document.getElementById('same').innerHTML='';
                        document.getElementById('pw').focus();
                    }
                    if(document.getElementById('pw').value!='' && document.getElementById('pwCheck').value!='')
                    {
                        if(document.getElementById('pw').value==document.getElementById('pwCheck').value)
                        {
                            document.getElementById('same').innerHTML="비밀번호가 일치합니다.";
                            document.getElementById('same').style.color='blue';
                        }
                        else
                        {
                            document.getElementById('same').innerHTML="비밀번호가 일치하지 않습니다.";
                            document.getElementById('same').style.color='red';
                        }
                    }
            }

            function checked_input()
            {
                if(document.member_form.pwd1.value!=document.member_form.pwd2.value)
					{
                    alert("비밀번호가 일치하지 않습니다. 다시확인 바랍니다.");
                    document.getElementById('pw').focus();
                    return;
					}
                if(!document.member_form.userid.value)
                {
                    alert("아이디를 입력해주세요.");
                    return;
                }
                if(!document.member_form.name.value)
                {
                    alert("이름을 입력해주세요.");
                    return;
                }
                if(!document.member_form.phone1.value||!document.member_form.phone2.value)
                {
                    alert("휴대폰 번호를 입력해주세요.");
                    document.member_form.phone1.focus();
                    return;
                }
                if(i==0)
                {
                    alert("아이디 중복확인을 해주세요.");
                    document.member_form.userid.focus();
                    return;
                    
                }
                document.member_form.submit();
            }
		</script>
	</head>
	<body>
		<div class="wrap">
			<?php include "../header.php"?>
			<section class="row">
				<center>회원가입</center>
				<form name="member_form" method="post" action="insertPro.php">
					<center>
						<table border="1"class="join_table" >
							<tbody>
								<tr>
									<th>이름<img src="../images/join_point.png"/></th>
									<td>
										<input type="text" class="txt" name="name" required onfocus/>
									</td>
								</tr>
								<tr>
									<th>아이디 <img src="../images/join_point.png"/></th>
									<td>
										<input type="text" class="txt" name="userid" required>&nbsp
										<input type="button" value="아이디 중복확인" onclick="check_id()" id="id_check"/>
									</td>
								</tr>
								<tr>
									<th>비밀번호 <img src="../images/join_point.png"/></th>
									<td>
										<input class="txt"type="password"id="pw"name="pwd1" onchange="isSame()" placeholder="6~16글자"required />
									</td>
								</tr>
								<tr>
									<th>비밀번호 확인 <img src="../images/join_point.png"/></th>
									<td>
										<input class="txt"type="password"id="pwCheck"name="pwd2" onchange="isSame()" required />&nbsp;&nbsp;<span id='same'></span>
									</td>
								</tr>
								<tr id="post">
									<th>주소 <img src="../images/join_point.png"/></th>
									<td>
										<input class="txt"type="text" name="sample4_postcode" id="sample4_postcode" placeholder="우편번호"required readonly>
										<input type="button" onclick="sample4_execDaumPostcode()" value="우편번호 찾기" id="post_btn"><br>
										<input class="txt"type="text" name="sample4_roadAddress" id="sample4_roadAddress" placeholder="도로명주소" size="40" readonly>
										<input class="txt"type="text" name="sample4_jibunAddress" id="sample4_jibunAddress" placeholder="지번주소" size="40"readonly>
										</br><input class="txt"type="text" name="detailAddress" placeholder="상세주소 (직접입력)"size="40">
									</td>
								</tr>
								<tr>
									<th>이메일 <img src="../images/join_point.png"/></th>
									<td>
										<input class="txt"type="text" name="email1" size="10" required /> @
							  			<select name="email2">
											<option value="select">Select</option>
											<option value="naver">naver.com</option>
											<option value="daum">hanmail.net</option>
											<option value="nate">nate.com</option>
											<option value="yahoo">yahoo.com</option>
											<option value="google">gmail.com</option>
							  			</select>
						  			</td>
								</tr>
								<tr>
									<th>생년월일</th>
									<td>
										<?php
											echo '<select name="years" required>';
											$k=2019;
											while($k>=1920)
											{
												echo'<option value='.$k.'>'.$k.'</option>';
												$k--;
											}
											echo'</select>';
											echo'<select name="month">';
											$n=1;
											while($n<=12)
											{
												echo'<option value'.$n.'>'.$n.'</option>';
												$n++;
											}
											echo'</select>';
											echo'<select name="days">';
											$i=1;
											while($i<=31)
											{
												echo'<option value'.$i.'>'.$i.'</option>';
												$i++;
											}
											echo'</select>';
										?>
									</td>
								</tr>
								<tr>
									<th>성별</th>
									<td>
										<input type="radio" name="gender" value="남자" /> 남자 &nbsp
						  				<input type="radio" name="gender" value="여자" /> 여자
									</td>
								</tr>
								<tr>
									<th>연락처</th>
									<td>
										<select name="tel1">
											<option id="select"value="select">Select</option>
											<option value="02">02</option>
											<option value="031">031</option>
											<option value="032">032</option>
											<option value="033">033</option>
											<option value="041">041</option>
											<option value="042">042</option>
											<option value="043">043</option>
											<option value="044">044</option>
											<option value="051">051</option>
											<option value="052">052</option>
											<option value="053">053</option>
											<option value="054">054</option>
											<option value="055">055</option>
											<option value="061">061</option>
											<option value="062">062</option>
											<option value="063">063</option>
											<option value="064">064</option>
										</select>
										- <input class="txt" type="text"maxlength="4"size="5"name="tel2"> - <input class="txt" type="text"maxlength="5"size="5"name="tel3">
									</td>
								</tr>
								<tr>
									<th>휴대폰 <img src="../images/join_point.png"/></th>
									<td>
										010 - <input class="txt" type="text"maxlength="4"size="5"name="phone1"required> - <input class="txt" type="text"maxlength="5"size="5"name="phone2"required>
									</td>
								</tr>
								<tr>
									<td colspan="2">
									<center>
											<input type="submit" value="회원가입" onclick="checked_input()" id="center_complite"/>
											<input type="reset" value="재작성" id="reset" onlick="reset_form()">
									</center>
								</tr>
							</tbody>
						</table>
					</center>
				</form>

			</section>
			<?php include '../footer.php'?>
		</div>
	</body>
</html>