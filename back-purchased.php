<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/comicblock.css">
    <link rel="stylesheet" href="css/back.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
        <nav class="navbar navbar-light " style="background-color: #90EE90;">
            <span class="navbar-brand mb-0 h1">My purchased</span>
        </nav>
        <div class="content">
            <?php require_once "js/test.php"  ?>
        </div>
    </div>
</body>
</html>
<script>
    $("#purchased").addClass("active");
</script>