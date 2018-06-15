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
        }else{
            header("Refresh:0;url='index.php'");
        }
    ?>

    <div class="wrap">
        <div class="card" >
            <h3 class="card-header">
                <i class="fa fa-cogs"></i> 修改會員資料</h3>
            <div class="card-body">
                <table class="table table-hover table-striped">
                <thead>
                    <tr>
                    <th scope="col">帳號</th>
                    <th scope="col">密碼</th>
                    <th scope="col">郵件</th>
                    <th scope="col">餘額</th>
                    <th scope="col">編輯</th>
                    <th scope="col">刪除</th>
                    </tr>
                </thead>
                <tbody>
                <!--- 用php輸出-->
                        <?php
                            require_once "part/dbconnect.php";
                            $sql="SELECT * from user";
                            $result=$link->query($sql);
                            while($row=$result->fetch_assoc()){
                                echo '<tr>';
                                echo '<th scope="row">'.$row["user_account"].'</th>';
                                echo '<th>'.$row["user_password"]."</th>";
                                echo '<th>'.$row["user_email"]."</th>";
                                echo '<th>'.$row["user_money"]."</th>";
                                echo '<th><a href="back-revisememberDone.php?user_account='.$row["user_account"].'" class="btn btn-primary">修改</a></th>';
                                echo '<th><a href="part/delete-member.php?user_account='.$row["user_account"].'" class="btn btn-danger">刪除</a></th>';
                                echo '</tr>';
                            }
                        ?>
                </tbody>
            </div>
        </div>
    </div>  
</body>
</html>
<script>
    $("#revisemember").addClass("active");
</script>