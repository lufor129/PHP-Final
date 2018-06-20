<div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="width:100%">
                <a class="navbar-brand" href="#">肥宅動畫</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <?php
                        session_start();
                        if($_SESSION["login"]!=true){
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="javascript:void(0)">歡迎! 訪客</a>';
                            echo '</li>';
                        }elseif($_SESSION["user"]=="root"){
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="back-revisemember.php">歡迎! 管理者</a>';
                            echo '</li>';
                        }else{
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="back-revise.php">歡迎! '.$_SESSION["user"].'</a>';
                            echo '</li>';
                        }
                    ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        看動畫
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item disabled">分類</a>
                        <a class="dropdown-item" href="javascript:void(0)" value="all">全部</a>
                        <a class="dropdown-item" href="javascript:void(0)" value="1">熱血</a>
                        <a class="dropdown-item" href="javascript:void(0)" value="2">校園</a>
                        <a class="dropdown-item" href="javascript:void(0)" value="3">奇幻</a>
                        <a class="dropdown-item" href="javascript:void(0)" value="4">搞笑</a>
                        <a class="dropdown-item" href="javascript:void(0)" value="5">日常</a>
                        <a class="dropdown-item" href="javascript:void(0)" value="6">愛情</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item disabled">排名</a>
                        <a class="dropdown-item" href="javascript:void(0)" value="click">點擊數</a>
                        <a class="dropdown-item" href="javascript:void(0)" value="love">最愛數</a>
                        <a class="dropdown-item" href="javascript:void(0)" value="buy">收藏數</a>
                      </div>
                    </li>
                    <?php
                        if($_SESSION["login"]!=true){
                            echo '<li class="nav-item"><a class="nav-link" href="index.php">平台說明</a></li>';
                            echo '<li class="nav-item visitor"><a class="nav-link" href="login.php">登入</a></li>';
                            echo '<li class="nav-item visiter"><a class="nav-link" href="register.php">註冊</a></li>';
                        }elseif($_SESSION["user"]=="root"){
                            echo '<li class="nav-item visiter"><a class="nav-link" href="back-revisemember.php">後台管理</a></li>';
                            echo '<li class="nav-item visitor"><a class="nav-link" href="part/logout.php">登出</a></li>';
                        }else{
                            echo '<li class="nav-item"><a class="nav-link" href="index.php">平台說明</a></li>';
                            echo '<li class="nav-item visitor"><a class="nav-link" href="back-cart.php">購物車</a></li>';
                            echo '<li class="nav-item visitor"><a class="nav-link" href="part/logout.php">登出</a></li>';
                        }
                    
                    ?>
                  </ul>
                  <div class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" id="search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" id="searchbutton" type="submit">搜尋動畫</button>
                  </div>
                </div>
        </nav>
    </div>