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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
        #reviseform{
            margin-top:5%;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if($_SESSION["user"]=="root"){
            require_once "part/admin_nav.php";
            require_once "part/dbconnect.php";
        }else{
            header("Refresh:0;url='index.php'");
        }
    ?>
    <div class="wrap">
        <div class="card" >
            <h3 class="card-header">
                <i class="fa fa-cog"></i> 修改漫畫</h3>
            <div class="card-body">
                <h4>第一步: 先選擇漫畫</h4>
                <div class="form-group col-md-3">
                    <select class="form-control "  id="choose">
                        <option selected disabled>漫畫</option>
                        <?php
                            $sql="SELECT * from comic_description";
                            $result=$link->query($sql);
                            while($row=$result->fetch_assoc()){
                                $comic_id=$row["comicD_id"];
                                $comic_name=$row["comicD_name"];
                                echo "<option value='$comic_id'>$comic_name</option>";
                            }
                        ?>
                    </select>
                </div>
                <form action="part/reviseupload.php" method="post" id="reviseform" enctype="multipart/form-data">
                </form>
            </div>
        </div>
    </div> 
</body>
</html>
<script>
    $("#reviseuploadcomic").addClass("active");
    $('.custom-file-input').on('change', function() { 
        let fileName = $(this).val().split('\\').pop(); 
        $(this).next('.custom-file-label').addClass("selected").html(fileName); 
    });

    $("#choose").change(function(){
        var value=$(this).val();
        var formblock='<h4>第二步: 修改漫畫 </h4>\
                    <div class="form-row">\
                        <div class="col-md-6 mb-3">\
                            <label for="animatename">名稱</label>\
                            <input type="text" class="form-control" name="name" id="animatename" placeholder="name" required>\
                        </div>\
                        <div class="col-md-6 mb-3">\
                            <label for="price">價格</label>\
                            <div class="input-group">\
                                <div class="input-group-prepend">\
                                    <span class="input-group-text">$</span>\
                                </div>\
                                <input type="number" class="form-control" name="price" id="price" placeholder="money" required>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="form-row">\
                        <div class="form_field mb-3 col-md-6">\
                            <label for="picture">圖片</label>\
                            <div class="custom-file ">\
                                <input type="file" class="custom-file-input" id="picture" name="picture" required>\
                                <label class="custom-file-label" for="picture">Choose Profile Photo</label>\
                            </div>\
                        </div>\
                        <div class="form-group col-md-6">\
                            <label for="director">作者</label>\
                            <input type="text" class="form-control" id="director" placeholder="director" name="author" required>\
                        </div>\
                    </div>\
                    <div class="form-row">\
                        <div class="form-group col-md-10">\
                                <label for="description">描述</label>\
                                <textarea class="form-control" id="description" rows="5" name="description" required></textarea>\
                        </div>\
                        <div class="form-group col-md-2">\
                                <label for="feature">特色</label>\
                                <select multiple="multiple" class="form-control "  size="5" id="feature" name="feature[]" required>\
                                  <?php
                                    $sql="SELECT * from feature";
                                    $result=$link->query($sql);
                                    while($row = $result->fetch_assoc()){
                                        $feature_id=$row["feature_id"];
                                        $feature_name=$row["feature_name"];
                                        echo "<option value=\'$feature_id\'>$feature_name</option>";
                                    }
                                  ?>
                                </select>\
                        </div>\
                    </div>\
                    <button class="btn btn-success" type="submit">更新</button>\
'
        $("#reviseform").html(formblock);
        console.log(value);
        $.ajax({
            type:"get",
            url:"part/searchcomic.php",
            dataType:"json",
            data:{id:value},
            success:function(data){
                $("#animatename").val(data.comicD_name);
                $("#price").val(data.comicD_price);
                $("#director").val(data.comicD_author);
                $("#description").text(data.comicD_descript);
            }
        });
        $.ajax({
            type:"get",
            url:"part/searchcomic.php",
            dataType:"json",
            data:{id2:value},
            success:function(data){
                console.log(data);
                for(var key in data){
                    $("#feature").val(data[key].feature_id).attr("selected");
                }
            }
        });
    });

</script>