<?php
    session_start();
    require_once "dbconnect.php";

    if($_SESSION["user"]=='root'){
        $account=$_POST["account"];
        $password=$_POST["password"];
        $email=$_POST["email"];
        $money=$_POST["money"];
        $id=$_POST["id"];
        $sql="UPDATE user SET user_account='$account',user_password='$password',user_email='$email',user_money=$money where user_id=$id";
        if($link->query($sql)===TRUE)
            header("Refresh:0;url='../back-revisemember.php'");
    }else{
        $account=$_POST["account"];
        $password=$_POST["password"];
        $email=$_POST["email"];
        $id=$_POST["id"];
        if($_FILES["photo"]["error"]==0){
            $upload="../image/".$_FILES["photo"]["name"];
            $filepath=pathinfo($upload);
            $changename="image/user-$account.".$filepath["extension"];
            copy($_FILES["photo"]["tmp_name"],"../".$changename);
            $sql="UPDATE user SET user_account='$account',user_password='$password',user_email='$email',user_photo='$changename' where user_id=$id";
            if($link->query($sql)===true){
                header("Refresh:0;url='../back-revise.php'");
            }
        }else{
            $sql="UPDATE user SET user_account='$account',user_password='$password',user_email='$email' where user_id=$id";
            if($link->query($sql)===true){
                header("Refresh:0;url='../back-revise.php'");
            }
        }
    }
    

?>