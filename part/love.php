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
        $sql="SELECT * from love where user_id=$user_id AND animate_id=$id";
        $result=$link->query($sql);
        if($result->num_rows>0){
            $sql="DELETE from love where user_id=$user_id and animate_id=$id";
            $link->query($sql);
            echo "加入最愛";
        }else{
            $sql="INSERT INTO love (`user_id` ,`animate_id`,`love_time`) VALUES ('$user_id','$id','$time')";
            $link->query($sql);
            echo "已加入最愛";
        }
    }

?>