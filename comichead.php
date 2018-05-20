<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>肥宅漫畫BAR檔</title>
		<style type="text/css">
			@import url("css/barstyle.css");
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<?php session_start(); ?>
	</head>
	<body>
		<div style = "width:100%;height:40px;">
			<ul id = "navibar">
				<li class = "navi"><a href="index.php" target = "blank">肥宅漫畫</a></li>
				<li class = "navi"><a href="comics.php" target = "blank">看漫畫</a></li>
				<li class = "navi"><a href="search.php" target = "blank">搜尋漫畫</a></li>
				<li class = "navi"><a href="favorite.php" target = "blank">我的收藏</a></li>
				<li class = "navi"><a href="informations.php" target = "blank">平台說明</a></li>

				<form action = "" method = "post">
					<input type = "text" id = "searchbtn" name = "search" placeholder = "🔎 找漫畫?">
				</form>	

				<li style = "float:right"><button class = "logbtn" onClick = "logwindow()">登入</button></li>
					<script type="text/javascript">function logwindow(){ $("#logwindow").slideToggle();}</script>

				<li class = "signup" style = "float:right"><a href="sign.php" target = "blank" class = "signupbtn">註冊</a></li>
			</ul>

			<div id = "logwindow">
				<form action = "" method = "post">
					<input type = "text" class = "inp" placeholder = "您的帳號"><br/>
					<input type = "password" class = "inp" placeholder = "密碼"><br/>
					<a href = "forgotpwd.php" target = "blank" class = "fgtpwd">忘記密碼？</a>
					<input type = "submit" class = "subm" value = "送出">
				</form>
			</div>
		</div>
		<!--<div class = "test">
			看不到這行表示有問題<br/>
			<?php //for ($i=0; $i < 100; $i++) { echo "測試<br/>";}?>
		</div>-->	
	</body>
<html>