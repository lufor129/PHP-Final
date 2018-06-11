<?php
    require_once "dbconnect.php";

    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $sql="SELECT * from animate where animate_id='$id'";
        $result=$link->query($sql);
        $array=$result->fetch_assoc();
        echo json_encode($array);
    }

    if(isset($_GET["id2"])){
        $id=$_GET["id2"];
        $sql="SELECT * from feature_detail where animate_id='$id'";
        $result=$link->query($sql);
        $array=[];
        while($row=$result->fetch_assoc()){
            $array[$row["featureD_id"]]=$row;
        }
        echo json_encode($array);
    }
?>