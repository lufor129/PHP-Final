<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../Boostrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="../Boostrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html{
            height: 100%;
        }
        nav.user-nav{
            height:100%;
            width: 20%;
            background:#37474F;
            position:fixed;
        }

        div.list-group a{
            background: #37474F;
            color: white;
            height: 5%;
        }
        div.list-group a:hover{
            background: #3e6bb2;
        }
        div.peopleimg{
            height: 20%;
            background:#263238;
            padding:30px;
        }
        div.peopleimg img{
            width:70px;
            height:70px;
            stroke:white;
        }
        div.peopleimg p{
            color:white;
            font-weight: bold;
            font-size: 25px;
        }
    </style>
</head>
<body>
    <nav class="user-nav">
        <div class="peopleimg img-circle">
            <p style="color:white">歡迎使用者</p>
        </div>
    <div class="list-group">
        <a href="index.php" class="list-group-item"><i class="fa fa-car"></i>  首頁</a>
        <a href="#" class="list-group-item"><i class="fa fa-drivers-license-o"></i>  修改資料</a>
        <a href="#" class="list-group-item"><i class="fa fa-heart"></i>  我的最愛</a>
        <a href="#" class="list-group-item"><i class="fa fa-cart-plus"></i>  購物車</a>
        <a href="#" class="list-group-item" id="deposit"><i class="fa fa-bitcoin"></i>  儲值</a>
        <a href="#" class="list-group-item"><i class="fa fa-gift"></i>  已購買漫畫</a>
        <a href="#" class="list-group-item"><i class="fa fa-envelope"></i>  意見反饋</a>
        <a href="part/logout.php" class="list-group-item"><i class="fa fa fa-sign-out"></i>  登出</a>
    </div>
    </nav>
</body>
</html>
<script src="../Boostrap/js/bootstrap.min.js"></script>
