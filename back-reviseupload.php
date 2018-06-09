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
</head>
<body>
    <?php
        session_start();
        if($_SESSION["user"]=="root"){
            require_once "part/admin_nav.php";
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
                        <option>熱血</option>
                        <option>校園</option>
                        <option>奇幻</option>
                        <option>搞笑</option>
                        <option>日常</option>
                        <option>愛情</option>
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
        var page="part/search.php";
        var value=$(this).val();
        var formblock=['<h4>第二步: 修改漫畫</h4>',
            '<div class="form-row">',
'                        <div class="col-md-6 mb-3">',
'                            <label for="animatename">名稱</label>',
'                            <input type="text" class="form-control" id="animatename" placeholder="name" required>',
'                        </div>',
'                        <div class="col-md-6 mb-3">',
'                            <label for="price">價格</label>',
'                            <div class="input-group">',
'                                <div class="input-group-prepend">',
'                                    <span class="input-group-text">$</span>',
'                                </div>',
'                                <input type="number" class="form-control" id="price" placeholder="money" required>',
'                            </div>',
'                        </div>',
'                    </div>',
'                            <div class="form_field mb-3">',
'                                <label for="picture">圖片</label>',
'                                <div class="custom-file">',
'                                    <input type="file" class="custom-file-input" id="picture" required>',
'                                    <label class="custom-file-label" id="piclabel" for="picture">Choose Profile Photo</label>',
'                                </div>',
'                            </div>',
'                    <div class="form-row">',
'                        <div class="form-group col-md-5">',
'                            <label for="director">導演</label>',
'                            <input type="email" class="form-control" id="director" placeholder="director" required>',
'                        </div>',
'                        <div class="form-group col-md-5">',
'                            <label for="company">製作公司</label>',
'                            <input type="password" class="form-control" id="company" placeholder="company" required>',
'                        </div>',
'                        <div class="form-group col-md-2">',
'                            <label for="episode">總話數</label>',
'                            <div class="input-group">',
'                                <input type="text" class="form-control" id="episode" placeholder="episode" aria-describedby="inputGroupPrepend2" required>',
'                                <div class="input-group-prepend">',
'                                    <span class="input-group-text">話</span>',
'                                </div>',
'                            </div>',
'                        </div>',
'                    </div>',
'                    <div class="form-row">',
'                        <div class="form-group col-md-10">',
'                                <label for="description">描述</label>',
'                                <textarea class="form-control" id="description" rows="3" required></textarea>',
'                        </div>',
'                        <div class="form-group col-md-2">',
'                                <label for="feature">特色</label>',
'                                <select multiple class="form-control "  size="3" id="feature" required>',
'                                  <option>熱血</option>',
'                                  <option>校園</option>',
'                                  <option>奇幻</option>',
'                                  <option>搞笑</option>',
'                                  <option>日常</option>',
'                                  <option>愛情</option>',
'                                </select>',
'                        </div>',
'                    </div>',
'                    <button class="btn btn-primary" type="submit">上傳</button>'].join("");
        $("#reviseform").innerHTML(formblock);
        $.ajax({
            tyoe:"get",
            url:page,
            dataType:"json",
            success:function(data){
                $("#animatename").val(data[0].name);
                $("#price").val(data[0].price);
                $("#piclabel").val(data[0].picture);
                $("#director").val(data[0].director);
                $("#company").val(data[0].company);
                $("episode").val(data[0].episode);
                
            }
        });
    });

</script>