<?php
    require_once "dbconnect.php";
    if(isset($_GET["user_account"])){
        $account=$_GET["user_account"];
        $sql="SELECT * from user where user_account='$account'";
        $result=$link->query($sql);
        while($row=$result->fetch_assoc()){
            $user_id=$row["user_id"];
        }
        $sql="DELETE from cart where user_id=$user_id";
        $link->query($sql);
        $sql="DELETE from love where user_id=$user_id";
        $link->query($sql);
        $sql="DELETE from user where user_id=$user_id";
        if($link->query($sql)){
            header("Refresh:0;url='../back-revisemember.php'");
        }else{
            echo "失敗";
        }
    }

?>