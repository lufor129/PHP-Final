<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="Boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="Boostrap/js/bootstrap.min.js"></script>
    <style>
        body{
            font-family: 微軟正黑體;
            background:#F5F5F5;
        }
        div.wrap{
            float:right;
            width:80%;
            padding:5%;
        }
        h3.card-header{
            background:#EEF2F4;
        }
    </style>
</head>
<body>
    <?php 
        session_start();
        if($_SESSION["login"]==true){
            header("Refresh:0;url='index.php'");
        }elseif($_SESSION["user"]=="root"){
            require_once "part/admin_nav.php";
        }else{
            require_once "part/user_nav.php";
        }
    ?>
    <div class="wrap">


    </div>
</body>
</html>
<script>
    $("#revise").addClass("active");
</script>