<?php
    session_start();

    //數據庫有則刪除，沒則新增

    if($_SESSION["login"]!=true){
        echo "<h1>請先登入</h1>";
    }else{
        require_once "dbconnection.php";
        $comic_name=$_GET["comic_name"];
        $user=$_SESSION["user"];

        $sql="SELECT * cart where cart_product = '$comic_name' AND cart_user = '$user'";
        $result=$link->query($sql);
        if($result->row_nums>0){
            $sql="INSERT INTO cart (cart_product,cart_user) VALUES ('$comic_name','$user')";
            $link->query($sql);
            echo "已加入購物車";
        }else{
            $sql="DELETE FROM cart where cart_product = '$product_name' AND cart_user='$user'";
            $link->query($sql);
            echo "加入購物車";
        }
    }

?>