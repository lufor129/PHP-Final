<?php
    session_start();
    $account=$_SESSION["user"];
    require_once "dbconnect.php";
    if(isset($_POST["money"])){
        $money=(int)$_POST["money"];
        $sql="SELECT * from user where user_account='$account'";
        $result=$link->query($sql);
        while($row=$result->fetch_assoc()){
            $money+=(int)$row["user_money"];
        }
        $sql="UPDATE user SET user_money=$money where user_account='$account'";
        if($link->query($sql)){
            header("Refresh:0;url='../back-money.php'");
        }
    }

?>