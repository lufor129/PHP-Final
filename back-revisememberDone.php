<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/back.css">
    <link rel="stylesheet" href="css/left-nav.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        session_start();
        if($_SESSION["user"]=="root"){
            require_once "part/admin_nav.php";
            require_once "part/dbconnect.php";
            $account=$_GET["user_account"];
            $sql="SELECT * from user where user_account='$account'";
            $result=$link->query($sql);
            while($row=$result->fetch_assoc()){
                $password=$row["user_password"];
                $email=$row["user_email"];
                $money=$row["user_money"];
                $id=$row["user_id"];
            }
        }else{
            header("Refresh:0;url='index.php'");
        }
    ?>
    <div class="wrap">
        <div class="card" style="margin-top:5%;">
            <h3 class="card-header"><i class="fa fa-drivers-license-o"></i> 修改資料</h3>
            <div class="card-body">
                <form action="part/update.php" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">帳號</span>
                    </div>
                    <input type="text" class="form-control" placeholder="請輸入帳號" name="account" value="<?php if(isset($account)) echo $account; ?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">密碼</span>
                    </div>
                    <input type="text" class="form-control" placeholder="請輸入密碼" name="password" value="<?php if(isset($password)) echo $password; ?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">郵件</span>
                    </div>
                    <input type="email" class="form-control" placeholder="請輸入郵件" name="email" value="<?php if(isset($email))echo $email; ?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">餘額</span>
                    </div>
                    <input type="number" class="form-control" placeholder="請輸入餘額" name="money" value="<?php if(isset($money))echo $money; ?>">
                </div>
                <input type="hidden" name="id" value="<?php if(isset($id)) echo $id ?>">
                <button type="submit" class="btn btn-success" style="float:right;margin-top:10px; margin-right:10px;font-size:20px;">修改</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $("#revisemember").addClass("active");
</script>