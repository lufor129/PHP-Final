<?php
require_once "dbconnect.php";
if(isset($_POST["name"])&&isset($_POST["price"])&&(!empty($_FILES["picture"]))){
    $name=$_POST["name"];
    $price=$_POST["price"];
    $author=$_POST["author"];
    $description=$_POST["description"];
    $feature=$_POST["feature"];
    $sql="SELECT * from comic_description where comicD_name='$name'";
    $result=$link->query($sql);
    if($result->num_rows>0){
        echo "<center><font color='red'>";
        echo "漫畫已存在<br/>";
        echo "</font>";
    }else{
        $upload="image/".$_FILES["picture"]["name"];
        $filepath=pathinfo($upload);
        $changename="image/comic-$name.".$filepath["extension"];
        copy($_FILES["picture"]["tmp_name"],"../".$changename);
        date_default_timezone_set("Asia/Taipei");
        $time=date("m-d-G-i");
        $sql="INSERT INTO `comic_description` (`comicD_name`, `comicD_price`, `comicD_author`, `comicD_photo`, `comicD_descript`, `comicD_lovenumber`, `comicD_cartnumber`, `comicD_time`) VALUES ('$name', $price, '$author', '$changename', '$description', '0', '0', '$time')";
        if($link->query($sql)==true){
            echo "插入成功";
            $sql="SELECT * from comic_description where comicD_name='$name'";
            $result=$link->query($sql);
            while($row=$result->fetch_assoc()){
                $id=$row["comicD_id"];
            }
            echo $id;
            foreach ($feature as $value){
                echo $value;
                $sql="INSERT INTO `feature_detail` (`comicD_id`,`feature_id`) VALUES ($id,$value)";
                $link->query($sql);
            }
        }else{
            echo "插入失敗";
        }
    }
}

?>