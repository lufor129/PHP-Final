<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="Boostrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="Boostrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            background:#F5F5F5;
            font-family:微軟正黑體;
        }
        div.wrap{
            float:right;
            width:80%;
            padding:5%;
        }
        h3.card-header{
            background:#EEF2F4;
        }
        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }
        button.btn-success{
            width:100px;
        }
    </style>
</head>
<body>
    <?php  require_once "part/user_nav.php" ?>
    <div class="wrap">
        <div class="card">
            <h3 class="card-header"><i class="fa fa-bitcoin"></i> 充值</h3>
            <div class="card-body">
                <h5 class="card-title">DEPOSIT</h5>
                <p class="card-text">好好想想，你不充值，怎麼能變的更強呢?</p><br>
                <form action="user-monry.php" method="get">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text">NTD</span>
                        <input type="text" class="form-control" placeholder="能充一個億是最好的" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <button class="btn btn-success" type="button">充值</button>
                    </div>
                </form>
                <br>
                <hr>
                <br>
                <h3>目前儲值金: 2333</h3>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $("#deposit").addClass("active");
</script>