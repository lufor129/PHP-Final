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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
        body{
            font-family: 微軟正黑體;
            font-size:20px;
        }
        a.navbar-brand{
            font-size:30px;
        }
        div.container-fluid{
            z-index:6000;
            margin-bottom:71px;
        }
        a.nav-link{
            font-size:22px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="width:100%">
                <a class="navbar-brand" href="#">肥宅漫畫</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <?php
                        session_start();
                        if($_SESSION["login"]!=true){
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="#">歡迎! 訪客</a>';
                            echo '</li>';
                        }elseif($_SESSION["user"]=="root"){
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="back-revise.php">歡迎! 管理者</a>';
                            echo '</li>';
                        }else{
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="back-revise.php">歡迎! '.$_SESSION["user"].'</a>';
                            echo '</li>';
                        }
                    ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        看漫畫
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item disabled" href="#">分類</a>
                        <a class="dropdown-item" href="#">熱血</a>
                        <a class="dropdown-item" href="#">校園</a>
                        <a class="dropdown-item" href="#">奇幻</a>
                        <a class="dropdown-item" href="#">搞笑</a>
                        <a class="dropdown-item" href="#">日常</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item disabled" href="#">排名</a>
                        <a class="dropdown-item" href="#">點擊數</a>
                        <a class="dropdown-item" href="#">收藏數</a>
                        <a class="dropdown-item" href="#">最多人買</a>
                      </div>
                    </li>
                    <?php
                        if($_SESSION["login"]!=true){
                            echo '<li class="nav-item"><a class="nav-link" href="information.php">平台說明</a></li>';
                            echo '<li class="nav-item visitor"><a class="nav-link" href="login.php">登入</a></li>';
                            echo '<li class="nav-item visiter"><a class="nav-link" href="register.php">註冊</a></li>';
                        }elseif($_SESSION["user"]=="root"){
                            echo '<li class="nav-item visiter"><a class="nav-link" href="back-revisemember.php">後台管理</a></li>';
                            echo '<li class="nav-item visitor"><a class="nav-link" href="part/logout.php">登出</a></li>';
                        }else{
                            echo '<li class="nav-item"><a class="nav-link" href="information.php">平台說明</a></li>';
                            echo '<li class="nav-item visitor"><a class="nav-link" href="back-cart.php">購物車</a></li>';
                            echo '<li class="nav-item visitor"><a class="nav-link" href="part/logout.php">登出</a></li>';
                        }
                    
                    ?>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜尋漫畫</button>
                  </form>
                </div>
        </nav>
    </div>
</body>
</html>