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
		<div style = "width:100%;height:48px;">
			<ul id = "navibar">
				<li class = "navi"><a href="index.php">肥宅漫畫</a></li>
				<li class = "navi"><a href="comics.php" >看漫畫</a></li>
				<li class = "navi"><a href="search.php" >搜尋漫畫</a></li>
				<li class = "navi"><a href="favorite.php" >我的收藏</a></li>
				<li class = "navi"><a href="informations.php" >平台說明</a></li>

				<!--<form action = "" method = "get">
					<input type = "text" id = "searchbtn" name = "search" placeholder = "🔎 找漫畫?">
				</form>	
				-->

				<li class="navi" id="input"><form action="part/searchcomic.php" method="get">
					<div class="input-group">
      					<input type="text" class="form-control" placeholder="Search for...">
      					<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">搜索</button>
      					</span>
					</div>		
				</form>
				</li>
				<?php
					if($_SESSION["login"]!=true){
						echo '<li style = "float:right"><a class = "signupbtn"  id="logout" href="login.php">登入</a></li>';
						echo '<li class = "signup" style = "float:right"><a href="register.php" class = "signupbtn" style="" id="logout">註冊</a></li>';
					}elseif($_SESSION["user"]=="root"){
						echo '<li style = "float:right"><a class = "signupbtn" id="logout" href="part/logout.php" >登出</a></li>';
						echo '<li style = "float:right"><a class = "signupbtn" id="welcome" href="admin-profile.php">歡迎光臨 管理者</a></li>';
					}else{
						echo '<li style = "float:right"><a class = "signupbtn" id="logout" href="part/logout.php">登出</a></li>';
						echo '<li style = "float:right"><a class = "signupbtn" id="welcome" href="user-profile.php">歡迎光臨 '.$_SESSION["user"].'</a></li>';
					}
				?>
					<script type="text/javascript">
						$(function(){
							$(".logbtn").click(function(){
								$("#logwindow").slideToggle();
							});
						});
					</script>	
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