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
    <h1 id="title">肥宅漫畫</h1>
    <div class="content">
        <div class="jumbotron jumbotron-fluid">
            <div class="login">
                <form action="login.php" method="get">
                    <h1>LOGIN</h1>
                    <div class="form_field">
                        <h4>account</h4>
                        <input type="text" name="account" class="form-control" id="" required>
                    </div>

                    <div class="form_field">
                        <h4>password</h4>
                        <input type="password" name="password" class="form-control" id="" required>
                    </div>
                    <p></p>
                    <input type="checkbox" name="remember[]" value="on" id="">
                    <span>記住我</span>
                    <span id="enroll">
                        <a href="register.php" class="btn btn-link">沒有帳號? 註冊</a>
                    </span>
                    <input type="submit" value="登入" class="btn btn-block btn-primary" id="submitbotton">
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
    
    if(isset($_GET["account"])&&isset($_GET["password"])){
        $account=$_GET["account"];
        $password=$_GET["password"];
        $remember=$_GET["remember"];
        $sql="SELECT * from user where account='$account' AND password='$password'";
        $result=$link->query($sql);
        if($result->num_rows>0){
            //成功登入
            if($remember[0]=on)
                $_SESSION["login"]=true;
            $_SESSION["user"]=$account;
            header("Refresh:0;url='index.php'");
        }else{
            echo "<center><font color='red'>";
            echo "使用者名稱或密碼錯誤!<br/>";
            echo "</font>";
        }
    }
    mysqli_close($link);
?>
</html>