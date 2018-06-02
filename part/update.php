<?php
    require_once "dbconnect.php";

    $account=$_POST["account"];
    $password=$_POST["password"];
    $email=$_POST["email"];
    $picture=$_FILES["pic"];
    
    $sql="UPDATE user SET user_account=$account,user_password=$password,user_email=$email,"

?>