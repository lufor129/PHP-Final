<?php
    session_start();

    //數據庫有則刪除，沒則新增

    if($_SESSION["login"]!=true){
        echo "<h1>請先登入</h1>";
    }else{
        require_once "dbconnection.php";
        $comic_name=$_GET["comic_name"];
        $user=$_SESSION["user"];

        $sql="SELECT * love where love_product = '$comic_name' AND love_user = '$user'";
        $result=$link->query($sql);
        if($result->row_nums>0){
            $sql="INSERT INTO love (love_product,love_user) VALUES ('$comic_name','$user')";
            $link->query($sql);
            echo "已加入我的最愛";
        }else{
            $sql="DELETE FROM love where love_product = '$product_name' AND love_user='$user'";
            $link->query($sql);
            echo "加入最愛";
        }
    }

?>