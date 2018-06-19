<?php
    session_start();
    require_once "dbconnect.php";

    //數據庫有則刪除，沒則新增

    if(!isset($_SESSION["user"])&&$_SESSION["login"]!=true){
        echo "請先登入";
    }else{
        $user=$_SESSION["user"];
        $sql="SELECT * from user where user_account='$user'";
        $result=$link->query($sql);
        while($row=$result->fetch_assoc()){
            $user_id=$row["user_id"];
        }
        $id=$_GET["id"];
        date_default_timezone_set("Asia/Taipei");
        $time=date("m-d-G-i");
        $sql="SELECT * from cart where user_id=$user_id and animate_id=$id and cart_purchased=1";
        $result=$link->query($sql);
        if($result->num_rows>0){
            echo "已購買";
        }else{
            $sql="SELECT * from cart where user_id=$user_id AND animate_id=$id AND cart_purchased=0";
            $result=$link->query($sql);
            if($result->num_rows>0){
                $sql="DELETE from cart where user_id=$user_id and animate_id=$id AND cart_purchased=0";
                $link->query($sql);
                echo "放入購物車";
            }else{
                $sql="INSERT INTO cart (`user_id` ,`animate_id`,`cart_time`,`cart_purchased`) VALUES ('$user_id','$id','$time',0)";
                $link->query($sql);
                echo "已放入購物車";
            }
        }
    }

?>