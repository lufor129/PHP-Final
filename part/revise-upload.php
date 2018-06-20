<?php
    session_start();
    require_once "dbconnect.php";
    
    if(isset($_POST["name"])){
        $id=$_POST["id"];
        $name=$_POST["name"];
        $price=$_POST["price"];
        $director=$_POST["director"];
        $description=$_POST["description"];
        $company=$_POST["company"];
        $episode=$_POST["episode"];
        $feature=$_POST["feature"];
        if(($_FILES["picture"]["error"]==0)){
            $upload="../image/".$_FILES["picture"]["name"];
            $filepath=pathinfo($upload);
            $changename="image/animate-$name.".$filepath["extension"];
            copy($_FILES["picture"]["tmp_name"],"../".$changename);
            $sql="UPDATE animate SET animate_name='$name',animate_price=$price,animate_description='$description',animate_photo='$changename',animate_director='$director',animate_company='$company',animate_episode=$episode where animate_id=$id";
            $link->query($sql);
            $sql="DELETE from feature_detail where animate_id=$id";
            $link->query($sql);
            foreach ($feature as $value){
                $sql="INSERT INTO `feature_detail` (`animate_id`,`feature_id`) VALUES ($id,$value)";
                $link->query($sql);
            }
            header("Refresh:0;url='../back-reviseupload.php'");
        }else{
            $sql="UPDATE animate SET animate_name='$name',animate_price=$price,animate_description='$description',animate_director='$director',animate_company='$company',animate_episode=$episode where animate_id=$id";
            $link->query($sql);
            $sql="DELETE from feature_detail where animate_id=$id";
            $link->query($sql);
            foreach ($feature as $value){
                $sql="INSERT INTO `feature_detail` (`animate_id`,`feature_id`) VALUES ($id,$value)";
                $link->query($sql);
            }
            header("Refresh:0;url='../back-reviseupload.php'");
        }
    }


?>