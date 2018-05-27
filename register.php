<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="Boostrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="Boostrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <a href="index.php"><h1 id="title">肥宅漫畫</h1></a>
    <div class="content">
        <div class="jumbotron jumbotron-fluid">
            <div class="login">
                <form action="index.php" method="get">
                    <h1>REGISTER</h1>
                    <div class="form_field">
                        <h4>account</h4>
                        <input type="text" name="account" class="form-control" id="" required>
                    </div>

                    <div class="form_field">
                        <h4>password</h4>
                        <input type="password" name="password" class="form-control" id="" required>
                    </div>

                    <div class="form_field">
                        <h4>confirm-password</h4>
                        <input type="password" name="confirm-password" class="form-control" id="" required>
                    </div>
                    <p></p>
                    <span id="enroll">
                        <a href="login.php" class="btn btn-link">已有帳號? 登入</a>
                    </span>
                    <input type="submit" value="註冊" class="btn btn-block btn-primary" id="submitbotton">
                </form>
            </div>
            <div class="container">
                <h1 class="display-4">肥宅漫畫</h1>
                <p class="lead">只有肥宅最懂肥宅，找漫畫?選肥宅。肥宅漫畫想看什麼這裡全都有</p>
            </div>
        </div>
    </div>
</body>
<?php
    session_start();
    require_once "part/dbconnect.php";

    if(isset($_GET["account"])&&isset($_GET["password"])&&isset($_GET["confirm-password"])){
        $account=$_GET["account"];
        $password=$_GET["password"];
        $confirm=$_GET["confirm-password"];

        if($password!=$confirm){
            echo "<center><font color='red'>";
            echo "密碼與確認密碼需要相同!<br/>";
            echo "</font>";
        }

        $sql="SELECT *from user where account = '$account'";
        $result=$link->query($sql);
        if($result->row_nums>0){
            echo "<center><font color='red'>";
            echo "帳號已重複<br/>";
            echo "</font>";
        }else{
            $sql2="INSERT INTO user (account,password) VALUES ('$account','$password')";
            $link->query($sql2);
            echo "註冊成功，2秒後轉跳首頁";
            $_SESSION["login"]=true;
            $_SESSION["user"]=$account;
            header("Refresh:2;url='index.php'");
        }
    }
    mysqli_close($link);

?>
</html>