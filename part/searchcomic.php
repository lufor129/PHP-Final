<?php
    require_once "dbconnect.php";

    if(isset($_GET["search"])){
        $comicname=$_GET["search"];
        $sql="SELECT * from commic where name='$commicname'";
        $result=$link->query($sql);
        if($result->row_nums>0){
            
        }else{
            echo "<center><font color='red'>";
            echo "本系統未有此漫畫<br/>";
            echo "</font>";
        }
    }
    



    

?>