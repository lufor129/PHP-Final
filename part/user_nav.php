<?php
    session_start();
    require_once "dbconnect.php";
    $name=$_SESSION["user"];
    $sql="SELECT * from user where user_account='$name'";
    $result=$link->query($sql);
    while($row=$result->fetch_assoc()){
        $photo=$row["user_photo"];
    }

?>
<body>
    <nav class="user-nav">
        <div class="peopleimg img-circle">
            <img src="<?php echo $photo ?>" alt="">
            <p style="color:white">歡迎 <?php  echo $name;?></p>
        </div>
    <div class="list-group">
        <a href="index.php" class="list-group-item"><i class="fa fa-car"></i>  首頁</a>
        <a href="back-revise.php" class="list-group-item" id="revise"><i class="fa fa-drivers-license-o"></i>  修改資料</a>
        <a href="back-favorite.php" class="list-group-item" id="favorite"><i class="fa fa-heart"></i>  我的最愛</a>
        <a href="back-cart.php" class="list-group-item" id="cart"><i class="fa fa-cart-plus"></i>  購物車</a>
        <a href="back-purchased.php" class="list-group-item" id="purchased"><i class="fa fa-gift"></i>  已購買動畫</a>
        <a href="back-money.php" class="list-group-item" id="deposit"><i class="fa fa-bitcoin"></i>  儲值</a>
        <a href="part/logout.php" class="list-group-item"><i class="fa fa fa-sign-out"></i>  登出</a>
    </div>
    </nav>
</body>
</html>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
