<?php
    require_once "dbconnect.php";
    if(isset($_GET["user_account"])){
        $account=$_GET["user_account"];
        $sql="DELETE from user where user_account='$account'";
        if($link->query($sql)){
            header("Refresh:0;url='../back-revisemember.php'");
        }
    }

?>