<!-- <!DOCTYPE html> -->
<%@ page language="java" contentType="text/html; charset=utf-8"
	pageEncoding="utf-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>



<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>모리 :: 일본 취업 정보</title>

<style>
@import
	url('https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@800&family=Noto+Serif+KR:wght@900&display=swap')
	;

@import
	url('https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@700;800&display=swap')
	;

body {
	margin: 0;
}

.navbar {
	margin-bottom: 50px;
	background-color: white;
	font-family: 'Nanum Gothic', sans-serif;
	letter-spacing: 0.5px;
}

.navbar-top {
	background-color: rgb(251, 251, 251);
	margin-top: 0;
	display: flex;
}

.container {
	width: 950px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 0;
	align-items: center;
	height: 30px;
	font-size: 11px;
	color: #9DA4AB;
	letter-spacing: -1px;
}

a {
	color: inherit;
	text-decoration: none;
}

.acc_section {
	text-align: right;
	width: 950px;
	padding-right: 10px;
	padding-top: 7px;
	float: right;
}

.acc_section a {
	margin-right: 3px;
	margin-left: 3px;
}

.navbar-middle {
	background-color: white;
	border-top: 1px solid rgb(214, 214, 214);
	border-bottom: 1px solid rgb(214, 214, 214);
	margin-left: auto;
	margin-right: auto;
	height: 90px;
}

.container-middle {
	display: flex;
	width: 950px;
	height: 90px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 0;
	align-items: center;
	font-size: 11px;
}

.logo img {
	margin-top: 6px;
	width: 200px;
}

.search {
	margin-top: 18px;
	display: flex;
	margin-left: 120px;
	margin-bottom: 1px;
}

.input-search {
	outline: none;
	border: none;
	border-left: 4px solid black;
	border-right: none;
	width: 284px;
	height: 17px;
	padding: 7px;
}

.s-btn {
	cursor: pointer;
	outline: none;
	margin-left: 0;
	border: 4px solid black;
	border-radius: none;
	background-color: black;
	color: aliceblue;
	width: 60px;
	height: 32px;
	font-family: 'Nanum Gothic', sans-serif;
}

.btn {
	width: 80px;
	height: 36px;
	color: white;
	background-color: #3371d1;
	border: 1px solid #3371d1;
	border-radius: 4px;
	outline: none;
	box-shadow: 0px 2px 0 #dad8d8;
}

.magnifier {
	background: url('Img/ens_more.png');
	padding-right: 10px;
	margin-right: 3px;
}

.right-logo {
	margin-left: 160px;
}

.right-logo img {
	display: block;
	height: 26px;
	margin-left: 15px;
	margin-top: 3px;
	margin-bottom: none;
}

.my_page {
	font-weight: 800;
}

.popular-search {
	margin-left: 132px;
}

.navbar-bottom {
	background-color: white;
	margin-left: auto;
	margin-right: auto;
	border-bottom: 1px solid rgb(214, 214, 214);
	display: flex;
}

.container-bottom {
	display: flex;
	height: 45px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 0;
	align-items: center;
	font-size: 15px;
	font-weight: bold;
}

.navbar-bottom ul {
	width: 950px;
	padding: 0;
	display: flex;
	list-style: none;
	float: left;
}

.navbar-bottom li {
	margin-left: 12px;
	padding: 0px 30px 0px 0px;
}

.navbar-bottom li a {
	color: black;
	font-weight: 800;
	font-size: 13px;
}

.navbar-bottom .right {
	margin-left: 570px;
	padding-right: 0;
}

.navbar-bottom .right a {
	padding: 0px 0px 0px 30px;
}

.word {
	margin-left: 10px;
	display: table-cell;
	justify-content: center;
	text-align: center;
	width: 220px;
	height: 150px;
	border-style: dashed;
	border-radius: 30px;
	border-width: 1px;
	padding: 12px;
	word-break: break-all;
	text-align: center;
	display: inline-block;
	border: 1px solid #eaeaea;
	vertical-align: middle;
}

.wordinput {
	line-height: 300%;
	font-size: 13px;
	color: #6881a1;
	height: 50%;
	z-index: 2;
	font-weight: bold ;
}

.bottom {
	display: flex;
	justify-content: center;
	height: 50px;
	z-index: 1;
	height: 20%;
}

.word-btn {
	bottom: 20px;
	width: 91px;
	height: 32px;
	background-color: #acb0be;
	-webkit-border-radius: 16px;
	border-radius: 16px;
	font-size: 13px;
	line-height: 32px;
	color: #fff;
	font-weight: bold;
}

.body {
	background-color: rgb(251, 251, 251);
	height: 800px;
}

.hr {
	border-top: 10px solid #9C9C9C;
	padding-top: 30px;
	border-bottom: 1px solid #F6F6F6;
}

.middle {
	display: flex;
	align-items: center;
	justify-content: space-between;
	text-align: center;
	margin-top: -20px;
	margin-left: auto;
	margin-right: auto;
	text-align: center;
	height: 40%;
}

.explaininput {
	text-align: center;
	font-size: 19px;
	line-height: 25px;
	color: #212121;
	font-weight: 600;
}

.btn-left {
	background-image:
		url(https://s.pstatic.net/static/www/img/uit/2020/sp_dark_shop_981341.png);
	-webkit-background-size: 107px 36px;
	background-size: 107px 36px;
	background-repeat: no-repeat;
	display: inline-block;
	width: 20px;
	height: 20px;
	background-position: 0 -53px;
	background-repeat: no-repeat;
	vertical-align: top;
}

.btn-right {
	background-image:
		url(https://s.pstatic.net/static/www/img/uit/2020/sp_shop_bffdc9.png);
	-webkit-background-size: 107px 78px;
	background-size: 107px 78px;
	background-repeat: no-repeat;
	display: inline-block;
	width: 20px;
	height: 20px;
	background-position: -152px 0;
	background-repeat: no-repeat;
	vertical-align: top;
}

.btn-left:hover, .btn-right:hover {
	border: 1px solid black;
}

.btn-left, .btn-right {
	cursor: pointer;
	border-radius: 4px;
}

.main-wrap {
	width: 850px;
	margin: 0 auto;
}
</style>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
	function search_send(formEI) {
		if (formEI.search.value == '') {
			alert('검색어를 입력해 주세요.');
			formEI.search.focus();
			return false;
		}
	}

	function search() {

		if (search_frm.search.value == '') {
			alert('검색어를 입력해 주세요.');
			search_frm.search.focus();
			return;
		}

		search_frm.submit();
	}
	$(document)
			.on(
					'click',
					'#rightbtn',
					function() {

						$
								.post(
										"../Test?cmd=test_nextbtn",
										{
											contentType : "application/x-www-form-urlencoded; charset=UTF-8",
											"num" : $("#num").val(),
											"lv" : $("#lv").val(),
											"size" : $("#size").val(),
											"side" : "1"
										},

										function(data) { // callback function, executed on GET success
											var word = data
											$("#wordinput").html(
													word.substring(0, word
															.indexOf("||")));
											$("#explaininput")
													.html(
															word
																	.substring(
																			word
																					.indexOf("||") + 2,
																			word
																					.indexOf("|||")));
											$('#num')
													.val(
															word
																	.substring(
																			word
																					.indexOf("|||") + 3,
																			word.length));
										});
					});
	$(document)
			.on(
					'click',
					'#leftbtn',
					function() {

						$
								.post(
										"../Test?cmd=test_nextbtn",
										{
											contentType : "application/x-www-form-urlencoded; charset=UTF-8",
											"num" : $("#num").val(),
											"lv" : $("#lv").val(),
											"size" : $("#size").val(),
											"side" : "-1"

										},

										function(data) { // callback function, executed on GET success
											var word = data
											$("#wordinput").html(
													word.substring(0, word
															.indexOf("||")));
											$("#explaininput")
													.html(
															word
																	.substring(
																			word
																					.indexOf("||") + 2,
																			word
																					.indexOf("|||")));
											$('#num')
													.val(
															word
																	.substring(
																			word
																					.indexOf("|||") + 3,
																			word.length));
										});
					});
</script>

</head>
<body>

	<div class="navbar">

		<div class="navbar-top">
			<!-- 최상단 메뉴 -->
			<div class="container">
				<div class="acc_section">
					<a href="User?cmd=user_login">로그인</a> <span>|</span> <a
						href="User?cmd=user_select">회원가입</a>
				</div>
				<!-- 최상단 메뉴 끝 -->
			</div>
		</div>
		<div class="navbar-middle">
			<!-- 상단 시작 -->
			<div class="container-middle">
				<!-- 로고 영역 -->
				<div class="logo">
					<a href=""><img src="Include/Img/302.png"></a>
				</div>
				<!-- 검색 영역 -->
				<form class="search_frm" name="search_frm" action="Index?cmd=search"
					onsubmit="return search_send(this)">
					<div class="search">
						<input type="text" name="search" class="input-search" value=""
							placeholder="검색어를 입력해 주세요"> <a href="javascript:search()"><input
							type="button" class="s-btn" value="검색"></a>
					</div>
					<small class="popular-search"> <span class="magnifier">&nbsp;</span>

						<!-- 자주 검색한 단어 --> <a href="">IT기업</a> | <a href="">무역</a> | <a
						href="">사무</a> | <a href="">요식업</a> | <a href="">한인 회사</a> | <a
						href="">호텔리어</a> | <a href="">유학</a> <!-- 자주 검색한 단어 끝 부분-->

					</small>
				</form>
				<div class="right-logo">
					<a href=""><img src="Include/Img/ico_my.png" id="my_page"></a>
					<div class="my_page">
						<a href="">마이페이지</a>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar-bottom">
			<div class="container-bottom">
				<ul>
					<li><a href="">일본어 진단</a></li>
					<li><a href="">기업 정보</a></li>
					<li class="right"><a href="">커뮤니티</a><a href="">공지사항</a></li>
				</ul>
			</div>
		</div>
	</div>
	<form class="word_frm" name="word_frm" action=""
		onsubmit="return search_send(this)">
		<input type="hidden" name="num" id="num" value=${num } /> <input
			type="hidden" name="size" id="size" value=${size } /> <input
			type="hidden" name="lv" id="lv" value=${lv } />
		<div class="main-wrap">
			<div class="word">
				<span class="wordinput" id=wordinput>${word}</span>
				<hr>
				<br>
				<div class="middle">
					<input class="btn-left" type="button" value="<" id="leftbtn">
					<div class="explaininput" id=explaininput>${explain}</div>

					<input class="btn-right" type="button" value=">" id="rightbtn">
				</div>
				<div class="bottom">
					<a href="Test?cmd=word-list&num=${num}&lv=${lv}" class="word-btn" type="button"
						value="" id="word-btn">더 보기</a>
				</div>
			</div>
		</div>

	</form>
<jsp:include page="footer.jsp"/>






</body>
</html>