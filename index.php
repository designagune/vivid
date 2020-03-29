<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" id="viewport" content="user-scalable=yes, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width">
		<link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/grid1.css">
		<link rel="stylesheet" href="css/index.css">
		<title> :: VIVID ::</title>
	</head>
	<body>
		<div class="wrap"><!--추후 height수정-->
			<!-- php로 header 부분 include -->
			<?php include 'header.php'?>
			<div class="content">
				<!--Title Image -->
				<section id="sec1">
					<div id="cont1" class="insize row">
						<img src="images/title.jpg"alt="title">
					</div>
				</section>

				<!--contents-->
				<section id="sec2">
					<!--첫번째 줄-->
					<div id="cont2" class="insize row">
						<div class="grid12">
							<div class="row">
								<!--이벤트 박스-->
								<div class="grid4">
									<div class="cont_text">
										<p>REVIEW EVENT</p>
										<h1>10% SALE</h1>
									</div>
									<div class="cont_image">
										<img src="images/cont_img1.jpg" alt="여성몰링크이미지"/>
									</div>
								</div>
								<!--공백-->
								<div class="grid1">&nbsp</div>
								<!--인기 쇼핑몰 박스-->
								<div class="grid7">
									<div class="cont_text">
										<p>ADVERTISEMENT</p>
										<h1>추천 쇼핑몰</h1>
									</div>
									<div class="cont_image">
										<a href="#">
											<img src="http://placehold.it/760x400" alt="main_ad"/>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--두번째 줄-->
					<div id="cont3" class="insize row">
						<div class="grid12">
							<div class="grid7">
								<div class="cont_text">
									<p>TRAND</p>
									<h1>Fashion Magazine</h1>
								</div>
								<div class="cont_image">
									<a href="http://www.i-magazine.tv" target="_blank">
										<img src="images/cont_img3.jpg"alt="해외패션매거진"/>
									</a>
								</div>
							</div>
							<div class="grid1">&nbsp</div>
							<div class="grid4">
								<div class="cont_text">
									<p>INQUITY</p>
									<h1>입점문의 / 광고문의</h1>
								</div>
								<div class="cont_image">
									<a href="#">
										<img src="http://placehold.it/400x285" alt="INQUITY"/>
									</a>
								</div>
							</div>
						</div>
					</div>
				</section>

			</div>
			<!-- php로 footer 부분 include -->
			<?php include "footer.php"?>
		</div>

	</body>
</html>
