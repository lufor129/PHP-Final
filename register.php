<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body>
    <a href="index.php"><h1 id="title">肥宅漫畫</h1></a>
    <div class="content">
        <div class="jumbotron jumbotron-fluid">
            <div class="login">
                <form action="register.php" method="post" enctype="multipart/form-data">
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
                        <h4>PHOTO</h4>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="photo" required>
                            <label class="custom-file-label" for="customFile">Choose Profile Photo</label>
                        </div>
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

    if(isset($_POST["account"])&&isset($_POST["password"])&&isset($_FILES["photo"]["error"])){
        $account=$_POST["account"];
        $password=$_POST["password"];

        $sql="SELECT * from user where user_account = '$account'";
        $result=$link->query($sql);
        if($result->num_rows>0){
            echo "<center><font color='red'>";
            echo "帳號已重複<br/>";
            echo "</font>";
        }else{
            $upload="image/".$_FILES["photo"]["name"];
            $filepath=pathinfo($upload);
            $changename="image/user-$account.".$filepath["extension"];
            copy($_FILES["photo"]["tmp_name"],$changename);
            date_default_timezone_set("Asia/Taipei");
            $time=date("m-d");
            $sql2="INSERT INTO user (user_account,user_password,user_photo,user_money,user_time) VALUES ('$account','$password','$changename',0,'$time')";
            if($link->query($sql2)==true){
                $_SESSION["login"]=true;
                $_SESSION["user"]=$account;
                 header("Refresh:0;url='index.php'");
            }else{
                echo "<center><font color='red'>";
                echo "插入錯誤<br/>";
                echo "</font>";
            }
        }
    }
    mysqli_close($link);

?>
</html>
<script>
    $('.custom-file-input').on('change', function() { 
        let fileName = $(this).val().split('\\').pop(); 
        $(this).next('.custom-file-label').addClass("selected").html(fileName); 
    });
</script>