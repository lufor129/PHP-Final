<?php
    require_once "../part/dbconnect.php";
    $sql="SELECT * from animate";
    $result=$link->query($sql);
    $data=array();
    while($row=$result->fetch_assoc()){
        $data[]=$row;
    }
    echo json_encode($data);

?>