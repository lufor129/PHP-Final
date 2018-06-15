<?php

    require_once "dbconnect.php";
    $key=$_GET["key"];
    $data=array();
    if($key=="all"){
        $sql="SELECT * from animate";
        $result=$link->query($sql);
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
        echo json_encode($data);
    }elseif($key=="click"){
        $sql="SELECT * from animate order by animate.animate_click desc";
        $result=$link->query($sql);
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
        echo json_encode($data);
    }elseif($key=="love"){
        $sql="SELECT count(*) as num,animate.* from love left JOIN animate on animate.animate_id=love.animate_id GROUP by (love.animate_id) ORDER by num DESC";
        $result=$link->query($sql);
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
        echo json_encode($data);
    }elseif($key=="buy"){
        $sql="SELECT count(*) as num,animate.* from cart left JOIN animate on animate.animate_id=cart.animate_id GROUP by (cart.animate_id) ORDER by num DESC";
        $result=$link->query($sql);
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
        echo json_encode($data);
    }else{
        $sql="SELECT * from animate inner join feature_detail on animate.animate_id=feature_detail.animate_id where feature_id=$key";
        $result=$link->query($sql);
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
        echo json_encode($data);
    }

?>