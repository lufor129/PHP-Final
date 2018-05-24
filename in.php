<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="http://how2j.cn/study/js/jquery/2.0.0/jquery.min.js"></script>
    <link href="http://how2j.cn/study/css/bootstrap/3.3.6/bootstrap.min.css" rel="stylesheet">
    <script src="http://how2j.cn/study/js/bootstrap/3.3.6/bootstrap.min.js"></script>
    <style>
        div.item img {
            width: 100%;
            height: 300px;
        }

        div#carousel-example-generic {
            width: 60%;
            height: 100%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="head">


    </div>
    <div class="powerpoint">      
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="http://p3.pstatp.com/large/615b0004e41e9a14693a">
            </div>
            <div class="item">
                <img src="https://etech1.files.wordpress.com/2010/08/p007xyd6_640_360.jpg">
            </div>
            <div class="item">
                <img src="http://thumbnails.cbsig.net/CBS_Production_Entertainment_VMS/2017/05/15/944133699523/SWAT_b2c_1141137_640x360.jpg">
            </div>
    
            <div class="item">
                <img src="http://thumbnails.cbsig.net/CBS_Production_Entertainment_VMS/2017/07/21/1005933635788/SLV150COMICONR1_1175591_640x360.jpg">
            </div>
        </div>
    </div>
    </div>
</body>
</html>