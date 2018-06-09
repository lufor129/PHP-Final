<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/left-nav.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
        <nav class="user-nav">
            <div class="peopleimg img-circle">
                <img src="https://cdn0.iconfinder.com/data/icons/iconshock-windows7-icons/256/user_accounts.png" alt="">
                <p>歡迎光臨 管理者</p>
            </div>
            <div class="list-group">
                <a href="index.php" class="list-group-item"><i class="fa fa-car"></i>  首頁</a>
                <a href="back-favorite.php" class="list-group-item" id="favorite"><i class="fa fa-heart"></i>  我的最愛</a>
                <a href="back-cart.php" class="list-group-item" id="cart"><i class="fa fa-cart-plus"></i>  購物車</a>
                <a href="back-money.php" class="list-group-item" id="deposit"><i class="fa fa-bitcoin"></i>  儲值</a>
                <a href="back-purchased.php" class="list-group-item" id="purchased"><i class="fa fa-gift"></i>  已購買漫畫</a>
                <a href="back-upload.php" class="list-group-item" id="uploadcomic"><i class="fa fa-upload"></i>  上傳漫畫</a>
                <a href="back-reviseupload.php" class="list-group-item" id="reviseuploadcomic"><i class="fa fa-cog"></i>  修改漫畫</a>
                <a href="back-revisemember.php" class="list-group-item" id="revisemember"><i class="fa fa-cogs"></i>  修改會員資料</a>
                <a href="back-dataanalysis.php" class="list-group-item" id="dataanalysis"><i class="fa fa-line-chart"></i>  數據分析</a>
                <a href="part/logout.php" class="list-group-item"><i class="fa fa fa-sign-out"></i>  登出</a>
            </div>
        </nav>
</body>
</html>
<script src="../Boostrap/js/bootstrap.min.js"></script>
<!-- 使用user/admin_nav 請加上 flaot:right width:80% -->