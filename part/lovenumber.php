<?php
    session_start();
    require_once "dbconnect.php";
    $id=$_GET["id"];
    $sql="SELECT count(*) as love_number from love where animate_id= $id";
    $result=$link->query($sql);
    while($row=$result->fetch_assoc()){
        $response=$row["love_number"];
    }
    echo $response;

?>