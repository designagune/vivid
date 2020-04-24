<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content=":: VIVID ::" />
	<meta property="og:url" content="http://astragun.com/" />
	<meta property="og:description" content="쇼핑몰 광고사이트 VIVID" />
	<meta property="og:image" content="/images/vivid_카톡플러스title.jpg" />

	<title> :: VIVID ::</title>

	<link rel="stylesheet" href="./css/reset.css" />
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
	<link rel="stylesheet" href="./css/swiper.min.css">
	<link rel="stylesheet" href="css/common.css" />
	<link rel="stylesheet" href="css/grid.css" />
	<link rel="stylesheet" href="css/index.css" />

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="./js/swiper.min.js"></script>
	<script src="./js/swiperSetting.js"></script>
	<script src="./js/mob_menu.js"></script>
	<script src="./js/rank.js"></script>

</head>

<body>
	<div class="visual-content-wrap">
		<?php include 'header.php'?>

		<div class="visual-content">
			<section class="visual-main-1">
				<h2 class="blind">&nbsp;</h2>
				<div class="insize row main-banner">
				</div>
			</section>

			<section class="visual-main-2">
				<div class="insize row shop-rank">
					<div class="grid12">
						<div class="row">
							<div class="grid7">
								<div class="visual-content-title">
									<p>SHOPPING MALL</p>
									<h1>WOMAN</h1>
								</div>
								<div class="visual-content-image">
									<div class="swiper-container gallery-top">
										<div class="swiper-wrapper">
											<a href="http://www.hypnotic.co.kr" target="_blank"
												class="swiper-slide hp"></a>
											<a href="http://www.66girls.co.kr" target="_blank"
												class="swiper-slide six"></a>
											<a href="https://www.attrangs.co.kr/" target="_blank"
												class="swiper-slide at"></a>
											<a href="http://www.secretlabel.co.kr/" target="_blank"
												class="swiper-slide sc"></a>
											<a href="https://www.merongshop.com/" target="_blank"
												class="swiper-slide mr"></a>
											<a href="https://shehj.com/" target="_blank" class="swiper-slide hj"></a>
											<a href="https://www.blla.co.kr/" target="_blank"
												class="swiper-slide bl"></a>
											<a href="http://www.dabagirl.co.kr/" target="_blank"
												class="swiper-slide db"></a>
											<a href="http://www.bullang.com" target="_blank"
												class="swiper-slide bu"></a>
											<a href="https://icecream12.com/" target="_blank"
												class="swiper-slide ic"></a>
										</div>
										<!-- Add Arrows -->
										<div class="swiper-button-next swiper-button-white"></div>
										<div class="swiper-button-prev swiper-button-white"></div>
									</div>
									<div class="swiper-container gallery-thumbs">
										<div class="swiper-wrapper">
											<div class="swiper-slide hp"></div>
											<div class="swiper-slide six"></div>
											<div class="swiper-slide at"></div>
											<div class="swiper-slide sc"></div>
											<div class="swiper-slide mr"></div>
											<div class="swiper-slide hj"></div>
											<div class="swiper-slide bl"></div>
											<div class="swiper-slide db"></div>
											<div class="swiper-slide bu"></div>
											<div class="swiper-slide ic"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="grid1">&nbsp;</div>
							<div class="grid4">
								<div class="visual-content-title">
									<p>RANK</p>
									<h1>쇼핑몰 인기순위</h1>
								</div>
								<div class="visual-content-image">
									<div class="genderlist">
										<div class="gender-woman active">woman</div>
										<div class="gender-man">man</div>
										<div class="gender-unisex">unisex</div>
										<ul>
											<li>
												<ul class="inlist">
													<li><span>1</span><a href="#">히프나틱</a></li>
													<li><span>2</span><a href="#">66걸즈</a></li>
													<li><span>3</span><a href="#">아뜨랑스</a></li>
													<li><span>4</span><a href="#">시크릿라벨</a></li>
													<li><span>5</span><a href="#">메롱샵</a></li>
													<li><span>6</span><a href="#">그녀희제</a></li>
													<li><span>7</span><a href="#">블라</a></li>
													<li><span>8</span><a href="#">다바걸</a></li>
													<li><span>9</span><a href="#">불량소녀</a></li>
													<li><span>10</span><a href="#">아이스크림12</a></li>
												</ul>
											</li>
											<li>
												<ul class="inlist">
													<li><span>1</span><a href="#">토모나리</a></li>
													<li><span>2</span><a href="#">아보키</a></li>
													<li><span>3</span><a href="#">조군샵</a></li>
													<li><span>4</span><a href="#">게리오</a></li>
													<li><span>5</span><a href="#">바이슬림</a></li>
													<li><span>6</span><a href="#">미스터스트릿</a></li>
													<li><span>7</span><a href="#">붐스타일</a></li>
													<li><span>8</span><a href="#">스타일맨</a></li>
													<li><span>9</span><a href="#">오까네</a></li>
													<li><span>10</span><a href="#">플라이데이</a></li>
												</ul>
											</li>
											<li>
												<ul class="inlist">
													<li><span>1</span><a href="#">로맨틱홀릭</a></li>
													<li><span>2</span><a href="#">쉬비치</a></li>
													<li><span>3</span><a href="#">크루비</a></li>
													<li><span>4</span><a href="#">THE XXXY</a></li>
													<li><span>5</span><a href="#">놈코어</a></li>
													<li><span>6</span><a href="#">선남선녀</a></li>
													<li><span>7</span><a href="#">아멜라비치</a></li>
													<li><span>8</span><a href="#">노멀대디 & 노멀마미</a></li>
													<li><span>9</span><a href="#">이브레이</a></li>
													<li><span>10</span><a href="#">바니앤버니</a></li>
												</ul>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br /><br />
				<div class="insize row visual-subtitle-1">
					<div class="grid12">
						<div class="row">
							<div class="grid4">
								<div class="visual-content-title">
									<p>REVIEW EVENT</p>
									<h1>10% SALE</h1>
								</div>
								<div class="visual-content-image">
									<img src="images/cont_img1.jpg" alt="여성몰링크이미지" />
									<h2>OPEN 10% SALE</h2><br /><br />
									<p>VIVID Mall AD OPEN 기념 10% SALE<br /></p>
								</div>
							</div>
							<div class="grid1">&nbsp;</div>
							<!--인기 쇼핑몰 박스-->
							<div class="grid7">
								<div class="visual-content-title">
									<p>ADVERTISEMENT</p>
									<h1>트렌드 패션</h1>
								</div>
								<div class="visual-content-image">
									<img src="images/blackhan.jpg" alt="blackhan" />
									<div class="blacktext">
										<h2>원 컬러 스타일링</h2>
										<p>배우 한예슬의 올 블랙 패션은 화려한 컬러 앞에서 굴복하기는커녕 오히려 더욱 큰 아우라를 내뿜는다.
											<br />
											차분하고 시크한 올 블랙을 컬러를 선택했지만 실루엣과 소재는 평범하지 않은 것. 허리 라인을 강조한 시스루 재킷과 무늬가 새겨진 블랙
											스타킹을 매치해 자칫 심심할 수 있는 올 블랙 룩에 포인트를 줬다.
										</p>
										<a href="http://www.thesingle.co.kr/SinglesMobile/mobileweb/news_content/detail_news_content.do?nc_no=708770&fmc_no=599684&fsmc_no=599709&fsmc_nm=star"
											target="_blank">+더보기</a>
									</div>
									<script>
										$(".blacktext").mouseover(function () {
											$(this).css("opacity", "0.9");
										}).mouseout(function () {
											$(this).css("opacity", "0.7");
										})
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br /><br />
				<!--두번째 줄-->
				<div class="insize row visual-subtitle-2">
					<div class="grid12">
						<div class="grid7">
							<div class="visual-content-title">
								<p>TRAND</p>
								<h1>패션 매거진</h1>
							</div>
							<div class="visual-content-image">
								<a href="http://www.i-magazine.tv" target="_blank">
									<img src="images/cont_img3.jpg" alt="해외패션매거진" />
								</a>
							</div>
						</div>
						<div class="grid1">&nbsp;</div>
						<div class="grid4">
							<div class="visual-content-title">
								<p>INQUITY</p>
								<h1>입점문의 / 광고문의</h1>
							</div>
							<div class="visual-content-image">
								<a href="https://accounts.kakao.com/login?continue=http%3A%2F%2Fpf.kakao.com%2F_xexjPYj%2Fchat"
									target="_blank">
									<img src="images/cont_img4.jpg" alt="INQUITY" />
								</a>
								<h2>입점 / 광고 문의</h2><br /><br />
								<p>
									VIVID 에 입점하시려면 왼쪽 배너를<br />
									클릭해주세요.<br />
									If you want to enter VIVID,<br /> click on the left banner.

								</p>
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