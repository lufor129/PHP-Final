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
        .chartblock2{
            width:80%;
            margin:0 auto;
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
        $sql1="SELECT * FROM `animate` ORDER BY animate_click DESC LIMIT 10";
        $a_name=array();
        $a_number=array();
        $result=$link->query($sql1);
        while($row=$result->fetch_assoc()){
            array_push($a_name,$row["animate_name"]);
            array_push($a_number,$row["animate_click"]);
        }

        $b_name=array();
        $b_number=array();
        $sql2="SELECT COUNT(*) as num,feature.* from feature_detail left join feature on feature_detail.feature_id=feature.feature_id GROUP by feature_id";
        $result2=$link->query($sql2);
        while($row=$result2->fetch_assoc()){
            array_push($b_name,$row["feature_name"]);
            array_push($b_number,$row["num"]);
        }

        $c_name=array();
        $c_number=array();
        $sql3="SELECT count(*) as num,user.user_time from user group by user.user_time";
        $result3=$link->query($sql3);
        while($row=$result3->fetch_assoc()){
            array_push($c_name,$row["user_time"]);
            array_push($c_number,$row["num"]);
        }
    ?>
    <div class="wrap">
        <div class="card" >
            <h3 class="card-header">
                <i class="fa fa-line-chart"></i> 數據分析</h3>
            <div class="card-body">
                <h3 class="title">點擊數最高十個</h3>
                <div class="chartblock" >
                    <canvas id="chart1"  width="1" height="1"></canvas>
                </div>
                <div class="chartblock" >
                    <canvas id="chart2" width="1" height="1"></canvas>
                </div>
                <h3 class="title">類別數量分析</h3>
                <div class="chartblock" >
                    <canvas id="chart3"  width="1" height="1"></canvas>
                </div>
                <div class="chartblock" >
                    <canvas id="chart4" width="1" height="1"></canvas>
                </div>
                <h3 class="title">使用者註冊時間分析</h3>
                <div class="chartblock2" >
                    <canvas id="chart5"  width="1" height="1"></canvas>
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
        type:"doughnut",
        data:{
            datasets:[{
                data:<?php echo json_encode($a_number) ?>,
                backgroundColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255,222,173,1)',
                    'rgba(0 ,139 ,139,1)',
                    'rgba(0,0,128,1)',
                    'rgba(0,255,127,1)',
                    'rgba(205 ,149 ,12,1)',
                    'rgba(138, 43, 226,1)'
                ],
                borderColor: 'rgb(255, 255, 255)'
            }],
            labels:<?php echo json_encode($a_name) ?>,
            borderWidth: 1
        }
    });
    var chart2=$("#chart2");
    var chartone=new Chart(chart2,{
        type:'bar',
        data:{
            datasets:[{
                data:<?php echo json_encode($a_number) ?>,
                backgroundColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255,222,173,1)',
                    'rgba(0 ,139 ,139,1)',
                    'rgba(0,0,128,1)',
                    'rgba(0,255,127,1)',
                    'rgba(205 ,149 ,12,1)',
                    'rgba(138, 43, 226,1)'
                ],
                label: "點擊排名分析",
                borderColor: 'rgb(255, 255, 255)'
            }],
            labels:<?php echo json_encode($a_name) ?>,
            borderWidth: 1
        }
    });
    var chart3=$("#chart3");
    var chartone=new Chart(chart3,{
        type:'pie',
        data:{
            datasets:[{
                data:<?php echo json_encode($b_number) ?>,
                backgroundColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255,222,173,1)',
                    'rgba(0 ,139 ,139,1)'
                ],
                borderColor: 'rgb(255, 255, 255)',
                label:'類別數量分析'
            }],
            labels:<?php echo json_encode($b_name) ?>,
            borderWidth: 1
        }
    });
    var chart4=$("#chart4");
    var chartone=new Chart(chart4,{
        type:'radar',
        data:{
            datasets:[{
                data:<?php echo json_encode($b_number) ?>,
                borderColor:'rgba(75, 192, 192, 1)',
                backgroundColor:'rgba(152,245,255,0.2)',
                label:'類別數量分析'
            }],
            labels:<?php echo json_encode($b_name) ?>,
        }
    });
    var chart5=$("#chart5");
    var chartone=new Chart(chart5,{
        type:'line',
        data:{
            datasets:[{
                data:<?php echo json_encode($c_number) ?>,
                backgroundColor: 'rgba(152,245,255,0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                label:'會員註冊數量分析'
            }],
            labels:<?php echo json_encode($c_name) ?>,
            borderWidth: 1,
            
        }
    });
</script>