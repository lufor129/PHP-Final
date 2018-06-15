<?php
    require_once "dbconnect.php";
    $key=$_GET["key"];
    $sql="SELECT * from animate where animate_name like '%$key%'";
    $result=$link->query($sql);
    $data=array();
    while($row=$result->fetch_assoc()){
        $data[]=$row;
    }
    echo json_encode($data);
    

?>