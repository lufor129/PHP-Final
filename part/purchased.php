<?php
    session_start();
    require_once "dbconnect.php";
    $user=$_SESSION["user"];
    $id=$_GET["id"];
    $sql="SELECT * from user where user_account='$user'";
    $result=$link->query($sql);
    while($row=$result->fetch_assoc()){
        $user_id=$row["user_id"];
    }
    $sql="SELECT * from cart where user_id=$user_id AND animate_id=$id AND cart_purchased=0";
    $result=$link->query($sql);
    if($result->num_rows>0){
        $sql="UPDATE cart SET cart_purchased=1 where user_id=$user_id AND animate_id=$id";
        $link->query($sql);
        echo "已購買完成";
    }else{
        $sql="UPDATE cart SET cart_purchased=0 where user_id=$user_id AND animate_id=$id";
        $link->query($sql);
        echo "購買";
    }
    

?>