<?php
    session_start();

    if($_SESSION["login"]!=true){
        $_SESSION["user"]="訪客";
        header("Refresh:0;url='in.php'");
    }
?>