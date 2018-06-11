<?php
    session_start();
    require_once "dbconnect.php";
    
    if(isset($_POST["name"])&&isset($_POST["money"])){
        $id=$_POST["id"];
        $name=$_POST["name"];
        $price=$_POST["price"];
        $director=$_POST["director"];
        $company=$_POST["company"];
        $episode=$_POST["episode"];
        $feature=$_POST["feature"];
        
    }

?>