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
        <div class="card" style="margin-top:3%;">
            <h3 class="card-header">
                <i class="fa fa-upload"></i> 上傳動畫</h3>
            <div class="card-body">
                <form action="back-upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="animatename">名稱</label>
                                <input type="text" class="form-control" id="animatename" name="name" placeholder="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="price">價格</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="money" required>
                                </div>
                            </div>
                        </div>
                                <div class="form_field mb-3">
                                    <label for="picture">圖片</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="picture"  name="picture" required>
                                        <label class="custom-file-label" for="picture">Choose Profile Photo</label>
                                    </div>
                                </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="director">導演</label>
                                <input type="text" class="form-control" id="director" name="director" placeholder="director" required>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="company">製作公司</label>
                                <input type="text" class="form-control" id="company" name="company" placeholder="company" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="episode">總話數</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="episode" name="episode" placeholder="episode"  required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">話</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                    <label for="description">描述</label>
                                    <textarea class="form-control" id="description" rows="5" name="description" required></textarea>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="feature">特色</label>
                                <select multiple="multiple" class="form-control "  size="5" id="feature" name="feature[]" required>
                                  <?php
                                    $sql="SELECT * from feature";
                                    $result=$link->query($sql);
                                    while($row = $result->fetch_assoc()){
                                        $feature_id=$row["feature_id"];
                                        $feature_name=$row["feature_name"];
                                        echo "<option value='$feature_id'>$feature_name</option>";
                                    }
                                  ?>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">上傳</button>
                </form>
            </div>
        </div>
    <?php
    if(isset($_POST["name"])&&isset($_POST["price"])&&(!empty($_FILES["picture"]))){
        $name=$_POST["name"];
        $price=$_POST["price"];
        $director=$_POST["director"];
        $company=$_POST["company"];
        $episode=$_POST["episode"];
        $description=$_POST["description"];
        $feature=$_POST["feature"];
        $sql="SELECT * from animate where animate_name='$name'";
        $result=$link->query($sql);
        if($result->num_rows>0){
            echo "<center><font color='red'>";
            echo "動畫已存在<br/>";
            echo "</font></center>";
        }else{
            $upload="image/".$_FILES["picture"]["name"];
            $filepath=pathinfo($upload);
            $changename="image/animate-$name.".$filepath["extension"];
            copy($_FILES["picture"]["tmp_name"],$changename);
            date_default_timezone_set("Asia/Taipei");
            $time=date("m-d");
            $sql="INSERT INTO `animate` (`animate_name`, `animate_price`, `animate_director`,`animate_company`, `animate_photo`, `animate_description`, `animate_episode`,`animate_click`,`animate_time`) VALUES ('$name', $price, '$director', '$company','$changename', '$description',$episode, 0, '$time')";
            if($link->query($sql)==true){
                $sql="SELECT * from animate where animate_name='$name'";
                $result=$link->query($sql);
                while($row=$result->fetch_assoc()){
                    $id=$row["animate_id"];
                }
                foreach ($feature as $value){
                    $sql="INSERT INTO `feature_detail` (`animate_id`,`feature_id`) VALUES ($id,$value)";
                    $link->query($sql);
                }
            }else{
                echo "<center><font color='red'>";
                echo "插入失敗<br/>";
                echo "</font></center>";
            }
        }
    }
    ?>
    </div>
</body>
</html>
<script>
    $("#uploadcomic").addClass("active");
    $('.custom-file-input').on('change', function() { 
        let fileName = $(this).val().split('\\').pop(); 
        $(this).next('.custom-file-label').addClass("selected").html(fileName); 
    });
</script>