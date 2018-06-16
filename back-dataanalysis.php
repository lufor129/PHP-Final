<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/back.css">
    <link rel="stylesheet" href="css/left-nav.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <style>
        .chartblock{
            width:50%;
            float:left;
        }
        h3.title{
            text-align:center;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        require_once "part/dbconnect.php";
        if($_SESSION["user"]=="root"){
            require_once "part/admin_nav.php";
        }else{
            header("Refresh:0;url='index.php'");
        }
        $sql1="SELECT * from animate";
        $a_name=array();
        $a_number=array();
        $result=$link->query($sql1);
        while($row=$result->fetch_assoc()){
            array_push($a_name,$row["animate_name"]);
            array_push($a_number,$row["animate_click"]);
        }
    ?>
    <div class="wrap">
        <div class="card" >
            <h3 class="card-header">
                <i class="fa fa-line-chart"></i> 數據分析</h3>
            <div class="card-body">
                <h3 class="title">點擊數分析</h3>
                <div class="chartblock" >
                    <canvas id="chart1"  width="1" height="1"></canvas>
                </div>
                <div class="chartblock" >
                    <canvas id="chart2" width="1" height="1"></canvas>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $("#dataanalysis").addClass("active");
    var chart1=$("#chart1");
    var chartone=new Chart(chart1,{
        type:"pie",
        data:{
            datasets:[{
                data:<?php echo json_encode($a_number) ?>,
                backgroundColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderColor: 'rgb(255, 255, 255)'
            }],
            labels:<?php echo json_encode($a_name) ?>,
            borderWidth: 1
        }
    });
    var chart2=$("#chart2");
    var chartone=new Chart(chart2,{
        type:'horizontalBar',
        data:{
            datasets:[{
                data:<?php echo json_encode($a_number) ?>,
                backgroundColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                label: "點擊排名分析",
                borderColor: 'rgb(255, 255, 255)'
            }],
            labels:<?php echo json_encode($a_name) ?>,
            borderWidth: 1
        }
    });
</script>