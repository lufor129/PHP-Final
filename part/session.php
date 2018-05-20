<?php
    session_start();

    if($_SESSION["login"]!=true){
        header("Refresh:0;url='login.html'");
    }

?>