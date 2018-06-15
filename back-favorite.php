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
    <link rel="stylesheet" href="css/left-nav.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
        session_start();
        if($_SESSION["login"]!=true){
            header("Refresh:0;url='index.php'");
        }elseif($_SESSION["user"]=="root"){
            require_once "part/admin_nav.php";
        }else{
            require_once "part/user_nav.php";
        }
    ?>
    <div class="wrap">
        <div class="card">
            <h3 class="card-header"><i class="fa fa-heart"></i> My Favorite</h3>
            <div class="card-body" style="padding:6%;padding-top:3%"></div>
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
                    <h2 id="name"></h2>
                    <h3 id="animate_id" hidden></h3>
                    <button id="favorite" class="btn btn-danger">
                    </button>
                    <button id="joincart" class="btn btn-success">
                    </button>
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
                            <h3 id="author"></h3>
                            <h3 id="company"></h3><br>
                            <p id="description"></p>
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
    </div>
        </div>
    </div>
</body>
</html>
<script>
    $("#favorite").addClass("active");
    var jso_data;
    var p='';
        $.ajax({
            url:"part/back-search.php",
            data:{zonetype:"love"},
            async: false,
            success:function(data){
                jso_data=JSON.parse(data);
            }
        });
        for(var i=0;i<jso_data.length;i++){
            var love_number;
            var num=jso_data[i]["animate_id"];
            $.ajax({
                url:"part/lovenumber.php",
                async: false,
                type:"get",
                data:{id:num},
                success:function(data){
                    love_number=data;
                }
            });
            p+=["<div class=\"comicblock\">",
"        <div class=\"pic\">",
"            <a href=\"javascript:void(0)\" data-toggle=\"modal\" data-target=\"#myModal\">",
"                <img src=\""+jso_data[i]["animate_photo"]+"\" alt=\"\" id=\"comicIMG\">",
"            </a>",
"        </div>",
"        <div class=\"message\">",
"            <h2 class=\"name\">"+jso_data[i]["animate_name"]+"</h2>",
"            <h5 class=\"price\">價格: "+jso_data[i]["animate_price"]+"</h5>",
"            <span class=\"heart\">",
"                <img src=\"http://abgne.tw/wp-content/uploads/2014/01/css3-draw-heart-icon-2.png\" alt=\"\">"+love_number+"</span>",
"            <span class=\"heat\">",
"                <img src=\"http://pic.qiantucdn.com/58pic/13/84/39/28Q58PICwI4_1024.png!qt324\" alt=\"\">"+jso_data[i]["animate_click"]+"</span>",
"            <div class=\"clear\"></div>",
"            <p id='id' hidden>"+jso_data[i]["animate_id"]+"</p>",
"            <p id='director' hidden>"+jso_data[i]["animate_director"]+"</p>",
"            <p id='company' hidden>"+jso_data[i]["animate_company"]+"</p>",
"            <p id='description' hidden>"+jso_data[i]["animate_description"]+"</p>",
"            <p id='episode' hidden>"+jso_data[i]["animate_episode"]+"</p>",
"            <p id='click' hidden>"+jso_data[i]["animate_click"]+"</p>",
"        </div>",
"    </div>"].join("");
        }
        console.log(jso_data);
        document.querySelector(".card-body").innerHTML=p;
        $(function () {
        $("#myModal").on("show.bs.modal",function (event) {
            console.log($(this));
            $(this).find("div#comichead img").attr("src",$(event.relatedTarget).find("#comicIMG").attr("src"));
            //ㄎㄅ這一行我寫了快2小時
            $(".modal-body h2#name").html($(this).find(".name").html());
            $(".modal-body h2").html($(event.relatedTarget).parents(".comicblock").find("h2.name").html());
            var author=$(event.relatedTarget).parents(".comicblock").find("p#director").text();
            $(this).find("#author").text("作者:  "+author);
            var episode=$(event.relatedTarget).parents(".comicblock").find("p#episode").text();
            var company=$(event.relatedTarget).parents(".comicblock").find("p#company").text();
            var description=$(event.relatedTarget).parents(".comicblock").find("p#description").text();
            $(this).find("#company").text("製作公司:  "+company);
            $(this).find("#description").text(description);
            var html='';
            for(var i=1;i<=Number(episode);i++){
                html+='<div class="box"><a href="javascript:void(0)">'+i+'</a></div>';
            }
            $("div#profile").html(html);
            var id=$(event.relatedTarget).parents(".comicblock").find("p#id").text();
            $(this).find("h3#animate_id").text(id);
            $.ajax({
                url:"part/click.php",
                type:"get",
                data:{id:id},
                success:function(data){
                    $(event.relatedTarget).parents(".comicblock").find("span.heat").html("<img src=\"http://pic.qiantucdn.com/58pic/13/84/39/28Q58PICwI4_1024.png!qt324\" alt=\"\">"+data);
                }
            });
            var confirm;
            $.ajax({
                url:"part/confirm.php",
                type:"get",
                data:{id:id},
                async: false,
                success:function(data){
                    confirm=JSON.parse(data);
                }
            });
            $(this).find("button#favorite").html("<i class='fa fa-heart-o'></i>"+confirm[0]);
            $(this).find("button#joincart").html("<i class='fa fa-shopping-cart'></i>"+confirm[1]);
        });
        $("button#favorite").click(function(){
            var animate_id=$(this).siblings("h3#animate_id").text();
            var love;
            var love_number;
            $.ajax({
                type:"get",
                url:"part/love.php",
                async: false,
                data:{id:animate_id},
                success:function(data){
                    love=data;                        
                }
            });
            var x;
            $(this).html("<i class='fa fa-heart-o'></i>"+love);
        });
        $("button#joincart").click(function(){
            var animate_id=$(this).siblings("h3#animate_id").text();
            var cart;
            $.ajax({
                type:"get",
                url:"part/cart.php",
                async: false,
                data:{id:animate_id},
                success:function(data){
                    cart=data;                        
                }
            });
            $(this).html("<i class='fa fa-shopping-cart'></i>"+cart);
        });
    });
</script>