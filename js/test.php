<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="cont">
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" id="comichead">
                    <img src="" alt="">
                    <button data-dismiss="modal" class="close" type="button">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2></h2>
                    <?php
                        session_start();
                        if($_SESSION["login"]!=true){
                            echo '<button id="favorite" class="btn btn-danger">
                            <i class="fa fa-heart-o"></i>
                            請先登入
                        </button>
                        <button id="joincart" class="btn btn-success">
                            <i class="fa fa-shopping-cart"></i>
                            請先登入
                        </button>';
                        }else{
                            require_once "dbconnection.php";
                            $comic_name=$_GET["comic_name"];
                            $user=$_SESSION["user"];
                    
                            $sql="SELECT * love where love_product = '$comic_name' AND love_user = '$user'";
                            $result=$link->query($sql);
                            if($result->row_nums>0){
                                echo '<button id="favorite" class="btn btn-danger">
                                <i class="fa fa-heart-o"></i>
                                已加入我的最愛
                            </button>';
                            }else{
                                echo '<button id="favorite" class="btn btn-danger">
                                <i class="fa fa-heart-o"></i>
                                加入最愛
                            </button>';
                            }

                            $sql="SELECT * cart where cart_product = '$comic_name' AND cart_user = '$user'";
                            $result=$link->query($sql);
                            if($result->row_nums>0){
                                echo '<button id="joincart" class="btn btn-success">
                                <i class="fa fa-shopping-cart"></i>
                                已放入購物車
                            </button>';
                            }else{
                                echo '<button id="joincart" class="btn btn-success">
                                <i class="fa fa-shopping-cart"></i>
                                放入購物車
                            </button>';
                            }

                            $link->close();

                        }

                    ?>
                </div>
                <div class="footer">
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">詳情</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">目錄</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 id="author">作者: 古見同學</h3>
                            <p id="descript-content">貓咪同學有交流障礙症漫畫，少年sunday短篇五連但第一但。貓咪同學是美少女，站者就是藝術，作者就是絕讚，走三部會被人告白，可是他有交流障礙症。</p>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div style="height:200px"></div>
</body>
<script>
    var p='';
    for(var i=0;i<8;i++){
        p+= ' <div class="comicblock">\
        <div class="pic">\
            <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">\
                <img src="https://cdn.free.com.tw/blog/wp-content/uploads/2014/08/Placekitten480-g.jpg" alt="" id="comicIMG">\
            </a>\
        </div>\
        <div class="message">\
            <h2 class="name">貓咪同學有交流障礙</h2>\
            <h5 class="price">價格: 456</h5>\
            <span class="heart">\
                <img src="http://abgne.tw/wp-content/uploads/2014/01/css3-draw-heart-icon-2.png" alt=""> 1233</span>\
            <span class="heat">\
                <img src="http://pic.qiantucdn.com/58pic/13/84/39/28Q58PICwI4_1024.png!qt324" alt="">4442</span>\
            <div class="clear"></div>\
        </div>\
    </div>';
    }
    $(function () {
        $(".cont").html(p);
        $(".comicblock").click(function () {
            $("div#comichead img").attr("src", $(this).find("#comicIMG").attr("src"));
            $(".modal-body h2").html($(this).find(".name").html());
            var html='';
            for(var i=1;i<101;i++){
                html+='<div class="box"><a href="javascript:void(0)">'+i+'</a></div>';
            }
            $("div#profile").html(html);
        });
        $("#favorite").click(function(){
            var page="part/love.php";
            var comic_name=$(this).parent().find("h2").text();
            
            $.get(
                page,
                {"comic_name":comic_name},
                function(result){
                    $(this).text(result);
                }
            );
        });
        $("#joincart").click(function(){
            var page="part/cart.php";
            var comic_name=$(this).parent().find("h2").text();
            
            $.get(
                page,
                {"comic_name":comic_name},
                function(result){
                    $(this).text(result);
                }
            );
        });

    });


</script>

</html>