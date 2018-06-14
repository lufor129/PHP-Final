<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/comicblock.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <button id="button" class="btn btn-primary">提交</button>
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
                    <h2 id="name"></h2>
                    <button id="favorite" class="btn btn-danger">
                                <i class="fa fa-heart-o"></i>
                                請先登入
                            </button>
                            <button id="joincart" class="btn btn-success">
                                <i class="fa fa-shopping-cart"></i>
                                請先登入
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
</body>
</html>
<script>
    var jso_data;
    $("#button").click(function(){
        var p='';
        $.ajax({
            url:"s.php",
            async: false,
            success:function(data){
                jso_data=JSON.parse(data);
            }
        });
        for(var i=0;i<jso_data.length;i++){
            p+=["<div class=\"comicblock\">",
"        <div class=\"pic\">",
"            <a href=\"javascript:void(0)\" data-toggle=\"modal\" data-target=\"#myModal\">",
"                <img src=\""+"../"+jso_data[i]["animate_photo"]+"\" alt=\"\" id=\"comicIMG\">",
"            </a>",
"        </div>",
"        <div class=\"message\">",
"            <h2 class=\"name\">"+jso_data[i]["animate_name"]+"</h2>",
"            <h5 class=\"price\">價格: "+jso_data[i]["animate_price"]+"</h5>",
"            <span class=\"heart\">",
"                <img src=\"http://abgne.tw/wp-content/uploads/2014/01/css3-draw-heart-icon-2.png\" alt=\"\"> 1233</span>",
"            <span class=\"heat\">",
"                <img src=\"http://pic.qiantucdn.com/58pic/13/84/39/28Q58PICwI4_1024.png!qt324\" alt=\"\">4442</span>",
"            <div class=\"clear\"></div>",
"            <p id='id' hidden>"+jso_data[i]["animate_id"]+"</p>",
"            <p id='director' hidden>"+jso_data[i]["animate_director"]+"</p>",
"            <p id='company' hidden>"+jso_data[i]["animate_company"]+"</p>",
"            <p id='description' hidden>"+jso_data[i]["animate_description"]+"</p>",
"            <p id='episode' hidden>"+jso_data[i]["animate_episode"]+"</p>",
"        </div>",
"    </div>"].join("");
        }
        console.log(jso_data);
        document.querySelector(".cont").innerHTML=p;
    });
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
            <p hidden>123</p>\
        </div>\
    </div>';
    }
    $(function () {
        $(".cont").html(p);
        $("#myModal").on("show.bs.modal",function (event) {
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
        });
        $(".comicblock").click(function () {
            $("div#comichead img").attr("src", $(this).find("#comicIMG").attr("src"));
            console.log("1");
            
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