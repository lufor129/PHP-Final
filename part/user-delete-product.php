<?php
    session_start();
    $user=$_SESSION["user"];

    require_once "part/dbconnection.php";

    if(isset($_GET["comic"])){
        $comic=$_GET["comic"];
        $sql="DELETE from cart where comic_name='$comic' AND user='$user'";
        $link->query($sql);
        $link->close();
        header("url='../cart.php'");
    }



?>