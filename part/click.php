<?php
    require_once "dbconnect.php";
    $id=$_GET["id"];
    $sql="UPDATE animate set animate_click=animate_click+1 where animate_id=$id";
    $link->query($sql);
    $sql="SELECT animate_click from animate where animate_id=$id";
    $result=$link->query($sql);
    $row=$result->fetch_assoc();
    echo $row["animate_click"];
?>