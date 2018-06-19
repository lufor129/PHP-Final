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
                <i class="fa fa-cog"></i> 修改動畫</h3>
            <div class="card-body">
                <h4>第一步: 先選擇動畫</h4>
                <div class="form-group col-md-3">
                    <select class="form-control "  id="choose">
                        <option selected disabled>動畫</option>
                        <?php
                            $sql="SELECT * from animate";
                            $result=$link->query($sql);
                            while($row=$result->fetch_assoc()){
                                $animate_id=$row["animate_id"];
                                $animate_name=$row["animate_name"];
                                echo "<option value='$animate_id'>$animate_name</option>";
                            }
                        ?>
                    </select>
                </div>
                <form action="part/revise-upload.php" method="post" id="reviseform" enctype="multipart/form-data">
                </form>
            </div>
        </div>
    </div> 
</body>
</html>
<script>
    $("#reviseuploadcomic").addClass("active");
    $('#picture').on('change', function() { 
        let fileName = $(this).val().split('\\').pop(); 
        $(this).next('.custom-file-label').addClass("selected").html(fileName); 
    });

    $("#choose").change(function(){
        var value=$(this).val();
        var formblock='<h4>第二步: 修改動畫 </h4>\
                            <div class="form-row">\
                            <div class="col-md-6 mb-3">\
                                <label for="animatename">名稱</label>\
                                <input type="text" class="form-control" id="animatename" name="name" placeholder="name" required>\
                            </div>\
                            <div class="col-md-6 mb-3">\
                                <label for="price">價格</label>\
                                <div class="input-group">\
                                    <div class="input-group-prepend">\
                                        <span class="input-group-text">$</span>\
                                    </div>\
                                    <input type="number" class="form-control" id="price" name="price" placeholder="money" required>\
                                </div>\
                            </div>\
                        </div>\
                                <div class="form_field mb-3">\
                                    <label for="picture">圖片</label>\
                                    <div class="custom-file">\
                                        <input type="file" class="custom-file-input" id="picture"  name="picture" >\
                                        <label class="custom-file-label" for="picture">Choose Profile Photo</label>\
                                    </div>\
                                </div>\
                        <div class="form-row">\
                            <div class="form-group col-md-5">\
                                <label for="director">導演</label>\
                                <input type="text" class="form-control" id="director" name="director" placeholder="director" required>\
                            </div>\
                            <div class="form-group col-md-5">\
                                <label for="company">製作公司</label>\
                                <input type="text" class="form-control" id="company" name="company" placeholder="company" required>\
                            </div>\
                            <div class="form-group col-md-2">\
                                <label for="episode">總話數</label>\
                                <div class="input-group">\
                                    <input type="number" class="form-control" id="episode" name="episode" placeholder="episode"  required>\
                                    <div class="input-group-prepend">\
                                        <span class="input-group-text">話</span>\
                                    </div>\
                                </div>\
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
                            <input type="hidden" name="id" id="id">\
                        </div>\
                        <button class="btn btn-primary" type="submit">上傳</button>\
                        ';
        $("#reviseform").html(formblock);
        $.ajax({
            type:"get",
            url:"part/searchanimate.php",
            dataType:"json",
            data:{id:value},
            success:function(data){
                $("#id").val(data.animate_id);
                $("#animatename").val(data.animate_name);
                $("#price").val(data.animate_price);
                $("#director").val(data.animate_director);
                $("#company").val(data.animate_company);
                $("#description").text(data.animate_description);
                $("#episode").val(data.animate_episode);
            }
        });
        $.ajax({
            type:"get",
            url:"part/searchanimate.php",
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