<?php
    session_start();
    require_once "dbconnect.php";

    $zonetype=$_GET["zonetype"];
    $user=$_SESSION["user"];
    $sql="SELECT * from user where user_account='$user'";
    $result=$link->query($sql);
    while($row=$result->fetch_assoc()){
        $user_id=$row["user_id"];
    }

    if($zonetype=="love"){
        $sql="SELECT * from animate inner join love on love.animate_id=animate.animate_id where user_id=$user_id";
        $result=$link->query($sql);
        $data=[];
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
        echo json_encode($data);
    }elseif($zonetype=="cart"){
        $sql="SELECT * from animate inner join cart on cart.animate_id=animate.animate_id where user_id=$user_id AND cart_purchased=0";
        $result=$link->query($sql);
        $data=[];
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
        echo json_encode($data);
    }elseif($zonetype=="purchased"){
        $sql="SELECT * from animate inner join cart on cart.animate_id=animate.animate_id where user_id=$user_id AND cart_purchased=1";
        $result=$link->query($sql);
        $data=[];
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
        echo json_encode($data);
    }else{
        header("Refresh:0;url='../index.php'");
    }


?>