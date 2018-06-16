<?php
    $link=mysqli_connect(
        "localhost",
        "root",
        "s2007tyu",
        "php-final"
    );

    if($link){

    }else{
        die("無法連接到伺服器");
    }

    mysqli_query($link,'SET NAMES utf8');
?>