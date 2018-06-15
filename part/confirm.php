<?php
    session_start();
    require_once "dbconnect.php";
    $response=array();
    $id=$_GET["id"];
    if(isset($_SESSION["user"])&&$_SESSION["login"]==true){
        $user=$_SESSION["user"];
        $sql="SELECT * from user where user_account='$user'";
        $result=$link->query($sql);
        while($row=$result->fetch_assoc()){
            $user_id=$row["user_id"];
        }
        $sql="SELECT * from love where user_id=$user_id AND animate_id=$id";
        $result1=$link->query($sql);
        if($result1->num_rows>0){
            $response[]="已加入最愛";
        }else{
            $response[]="加入最愛";
        }
        $sql="SELECT * from cart where user_id=$user_id AND animate_id=$id AND cart_purchased=0";
        $result2=$link->query($sql);
        if($result2->num_rows>0){
            $response[]="已放入購物車";
        }else{
            $response[]="放入購物車";
        }
    }else{
        $response[]="請先登入";
        $response[]="請先登入";
    }
    echo json_encode($response);

?>