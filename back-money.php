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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
        session_start();
        require_once "part/dbconnect.php";
        if($_SESSION["login"]!=true){
            header("Refresh:0;url='index.php'");
        }elseif($_SESSION["user"]=="root"){
            require_once "part/admin_nav.php";
        }else{
            require_once "part/user_nav.php";
        }
        $account=$_SESSION["user"];
        $sql="SELECT * from user where user_account='$account'";
        $result=$link->query($sql);
        if($row=$result->fetch_assoc()){
            $money=$row["user_money"];
        }
    ?>
    <div class="wrap">
        <div class="card" style="margin-top:5%;">
            <h3 class="card-header"><i class="fa fa-bitcoin"></i> 充值</h3>
            <div class="card-body">
                <h5 class="card-title">DEPOSIT</h5>
                <p class="card-text">好好想想，你不充值，怎麼能變的更強呢?</p><br>
                <form action="part/updatemoney.php" method="post">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text">NTD</span>
                        <input type="number" name="money" class="form-control" placeholder="能充一個億是最好的" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <button class="btn btn-success" type="submit">充值</button>
                    </div>
                </form>
                <br>
                <hr>
                <br>
                <h3>目前儲值金: <?php echo $money ?> </h3>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $("#deposit").addClass("active");
</script>
