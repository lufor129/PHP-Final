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
        div.carousel-item img {
            width: 1200px;
            height: 680px;
        }

        div#carousel-example-generic {
            width: 80%;
            height: 100%;
            margin: 0 auto;
        }
        div.powerpoint{
            background: #194B47;
        }
        div.content{
            width:82%;
            margin:0 auto;
            margin-top:20px;
            margin-bottom:20px;
            box-shadow:2px 2px 2px 2px gray;
        }
    </style>
</head>
<body>
    <div class="head">
        <?php require_once "part/nav-header.php"?>
    </div>
    <div class="powerpoint">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                <li data-target="#carousel-example-generic" data-slide-to="6"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <!--寫一個get來傳遞想看漫畫-->
                    <a href="#">
                        <img src="https://www.gamewikia.com/uploads/2018/05/14/cover.640.360.af24cb8d24a089cda64d45a32dae9553.jpeg">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="http://8comic.se/wp-content/uploads/2015/09/%E9%80%B2%E6%93%8A%E7%9A%84%E5%B7%A8%E4%BA%BA-640x360.jpg">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="https://bnetproduct-a.akamaihd.net//2d/c911f6fbe51f8dd3085d612fb43089c0-overwatch-origins-640x360-zhtw.jpg">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="http://8comic.se/wp-content/uploads/2015/09/%E9%AD%94%E7%AC%9B-640x360.jpg">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="">
                        <img src="https://ss2.baidu.com/6ONYsjip0QIZ8tyhnq/it/u=3905512796,2920888282&fm=173&s=A033C634091272DCD49F0C4D030030FA&w=640&h=360&img.JPEG">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="">
                        <img src="https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=4294592116,563774963&fm=173&s=1720F906D06154A45479E1DF03000021&w=640&h=360&img.JPEG">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="">
                        <img src="https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=2983662931,863107453&fm=173&s=AF3A618598533A4F78B706830300B08F&w=640&h=360&img.JPEG">
                    </a>
                </div>
            </div>
        </div>
            <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>
    <hr>
    <div class="content">
        
    </div>
        <script>
            $(function(){
                $(".content").load("js/test.html");
            });
        </script>
    </div>
</body>

</html>