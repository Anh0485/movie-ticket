<?php session_start(); ?>
<?php $current_page = "Home"; ?>
<?php
    require_once("../../includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tix.vn</title>
<!-- bt4 -->
 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

 <!-- Optional theme -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">  
<!-- //bt4 -->
   
        <!-- bootraps  -->
        
        <!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../../app//asset/libs/bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css.map">
  
   
    <!-- fontawsome -->
    <script src="../../node_modules/@fortawesome/fontawesome-free/js/brands.js"></script>
    <script src="../../node_modules/@fortawesome/fontawesome-free/js/solid.js"></script>
    <script src="../../node_modules/@fortawesome/fontawesome-free/js/fontawesome.js"></script>
    <!-- slick -->
    <link rel="stylesheet" href="../../node_modules/slick-carousel/slick/slick.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- css -->

    <script src="../../node_modules/bootstrap/js/tab.js"></script>
    
   
    
        
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <!-- uiView -->
    <!-- header -->
    <div id="navbarHeader" class="ng-scope">
        <a href="" class="left">
            <img src="../../img/icons/weblogo.png" class="webLogo">
        </a>
        <div class="starImg star1"></div>
        <div class="starImg star2"></div>
        <div class="center" id="headMenu">
            <a href="#filmblock" class="menu titleDisplay homeMovies white">Lịch Chiếu</a>
            <a href="#cinemablock" class="menu titleDisplay homeCinemaComplex white">Cụm rạp</a>
            <a href="#newsblock" class="menu titleDisplay homeNews white">Tin Tức</a>
            <a href="#appblock" class="menu titleDisplay wrapHomeApp white">Ứng dụng</a>
        </div>
        <div class="right">
        <?php 
                                    if(isset($_SESSION['login'])) { ?>
                                        <form action="signout.php">
                                            <button class="btn-teal btn rounded-pill px-4 ml-lg-4">Sign out (<?php echo $_SESSION['user_name']; ?>)</button>

                                           
                                        </form>
                                        <form action="../../backend/index.php">
                                            <button class="btn-teal btn rounded-pill px-4 ml-lg-4" href="../../backend/index.php">ADMIN</button>

                                           
                                        </form>
                                    <?php } else {
                                        if(!isset($_COOKIE['_uid_']) && !isset($_COOKIE['_uiid_'])) {
                                            echo '<a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="../../backend/signin.php">Sign in</a>';
                                            //echo '<a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="backend/signup.php">Sign up</a>';
                                        } else {
                                            $user_id = base64_decode($_COOKIE['_uid_']);
                                            $user_nickname = base64_decode($_COOKIE['_uiid_']);
                                            $sql = "SELECT * FROM users WHERE user_id = :id AND user_nickname = :nickname";
                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute([
                                                ':id' => $user_id,
                                                ':nickname' => $user_nickname
                                            ]);
                                            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $user_name = $user['user_name'];
                                            $user_role = $user['user_role'];
                                            echo "
                                                <form action='signout.php'>
                                                    <button class='btn-teal btn rounded-pill px-4 ml-lg-4'>Sign out ({$user_name})</button>
                                                </form>
                                            ";
                                            $_SESSION['user_name'] = $user_nickname;
                                            $_SESSION['user_role'] = $user_role;
                                            $_SESSION['login'] = 'success';
                                        }
                                        
                                    }
                                ?>
            <!-- <div id="account" class="imgCircle">
                <a href="../../log-in/html/login.php" class="titleDisplay">
                    <img src="../../img/icons/avatar.png" class="btnLogin">
                    <p class="white" style="display: inline-block;">Đăng Nhập</p>
                </a>
            </div> -->
            <!-- <div class="selectLocation">
                <img src="../../img/icons/dinhvi.png" class="placeheader">
                <div class="dropdown-toggle selectMenu" style="top: 45px;
                left: -10px;">Hồ Chí Minh</div>
                <ul class="dropdown-menu selectScroll">
                    <li class="ng-scope">
                        <a href="" class="ng-binding">Hồ Chí Minh</a>
                    </li>
                    <li class="ng-scope">
                        <a href="" class="ng-binding">Hà Nội</a>
                    </li>
                    <li class="ng-scope">
                        <a href="" class="ng-binding">Đà Nẵng</a>
                    </li>
                    <li class="ng-scope">
                        <a href="" class="ng-binding">Hải Phòng</a>
                    </li>
                </ul>
            </div> -->
        </div>
    </div>
    <!-- //header -->

    <!-- //uiView -->
    <!-- bt4 -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#tcarousel-example-generic" data-slide-to="2"></li>
          <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="../../img/carousel/bo-gia-16146819941008.png" alt="...">
            <div class="carousel-caption">
             
            </div>
          </div>
          <div class="item">
            <img src="../../img/carousel/chaos-walking-16159520326264.jpg" style="width: 1287px; height: 536px;" alt="...">
            <div class="carousel-caption">
            
            </div>
          </div>
          <div class="item">
            <img src="../../img/carousel/gai-gia-lam-chieu-v-16152893212536.jpg" style="width: 1287px; height: 536px;" alt="...">
            <div class="carousel-caption">
            
            </div>
          </div>
          <div class="item">
            <img src="../../img/carousel/minari-16158836515210.jpg" style="width: 1287px; height: 536px;" alt="...">
            <div class="carousel-caption">
            
            </div>
          </div>
        
        </div>
      
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <!-- //bt4 -->
    <!-- Carousel -->
    <!-- <div class="owl-carousel owl-theme">
        <div class="item">
            <img src="../../img/carousel/bo-gia-16146819941008.png" alt="">
        </div>
        <div class="item">
            <img src="../../img/carousel/chaos-walking-16159520326264.jpg" alt="">
        </div>
        <div class="item">
            <img src="../../img/carousel/gai-gia-lam-chieu-v-16152893212536.jpg" alt="">
        </div>
        <div class="item">
            <img src="../../img/carousel/minari-16158836515210.jpg" alt="">
        </div>
        
        
    </div> -->
    <!-- //Carousel -->
    <!-- ToolBox -->
    <div id="homeTools" class="hideOnMobile">

        <div class="w30p widthByPercent dropdown">
            <button class="btn btn-secondary dropdown-toggle selectMenu" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                Phim

            </button>
            <!-- <i class="fas fa-chevron-down"></i> -->
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Mortal Kombat - Cuộc Chiến Sinh Tử (C18)</a></li>
                <li><a class="dropdown-item" href="#">Lật Mặt: 48h</a></li>
                <li><a class="dropdown-item" href="#">Người Nhân Bản - Seobok (C16)</a></li>
            </ul>
        </div>

        <div class="dropdown widthByPercent">
            <button class="btn btn-secondary dropdown-toggle selectMenu" type="button" id="dropdownMenuButton2"
                data-bs-toggle="dropdown" aria-expanded="false">
                Rạp
                <!-- <i class="fas fa-chevron-down"></i> -->
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item" href="#">Vui lòng chọn phim</a></li>

            </ul>
        </div>
        <div class="dropdown widthByPercent">
            <button class="btn btn-secondary dropdown-toggle selectMenu" type="button" id="dropdownMenuButton2"
                data-bs-toggle="dropdown" aria-expanded="false">
                Ngày xem
                <!-- <i class="fas fa-chevron-down"></i> -->
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item" href="#">Vui lòng chọn phim và rạp</a></li>

            </ul>
        </div>
        <div class="dropdown widthByPercent">
            <button class="btn btn-secondary dropdown-toggle selectMenu" type="button" id="dropdownMenuButton2"
                data-bs-toggle="dropdown" aria-expanded="false">
                Suất chiếu
                <!-- <i class="fas fa-chevron-down"></i> -->
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item" href="#">Vui lòng chọn phim, rạp và ngày xem</a></li>

            </ul>
        </div>
        <div class=" widthByPercent">
            <button id="btnBuy" class="btn btn-primary widthByPercent">
                MUA VÉ NGAY
            </button>
        </div>



    </div>
    <!-- //ToolBox -->
    <!-- Film Block -->
    <div class="row grayBack" id="filmblock">
        
        <div class="col-xs-12 block mainMaxWidth" id="homeMovies">
            <ul class="nav nav-tabs navCenter">
                <li class="active" style="margin-right:5px;">
                    <a data-toggle="tab" data-target="#nowShowingFilms" aria-expanded="true" style="font-weight: 700;
                    font-size: 25px;">Đang Chiếu</a>
                </li>
                <li style="margin-left:5px;">
                    <a href="" data-toggle="tab" data-target="#upComingFilms" aria-expanded="false" style="font-weight: 700;
                    font-size: 25px;">
                        Sắp Chiếu
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="nowShowingFilms" class="tab-pane fade wrapSlick slick-initialized slick-slider active in">
                    <button type="button" class="slick-prev slick-arrow" aria-label="Previous" role="button"></button>
                    <div class="slick-list draggable" aria-live="polite">
                        <div class="slick-track" role="listbox" style="opacity: 1;width: 4700px; ">
                            <div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1"
                                style="width: 940px;">
                                <div>
                                <?php
            $sql = "SELECT * FROM phim where phim_status = :status";
            $stmt = $pdo-> prepare($sql);
            $stmt -> execute([
                ':status' => 'published'
            ]);
            while($phim = $stmt -> fetch(PDO::FETCH_ASSOC)){
                $phim_ten = $phim['phim_ten'];
                $phim_ngaychieu = $phim['phim_ngaychieu'];
                $phim_ageType = $phim['phim_ageType'];
                $phim_img = $phim['phim_img'];
                $phim_infoFilm = $phim['phim_infoFilm'];
                ?>
                <div class="col-sm-3 col-xs-12 wrapFilm" style="width: 25%; display: inline-block;">
                                        <div class="film">
                                            <a href="https://tix.vn/phim/2339-mortal-kombat">
                                                <div class="filmThumbnail"
                                                    style="background-image:url(../../img/filmBlock/<?php echo $phim_img ?>), url(../../img/default/default-film.webp) ;">
                                                    <div class="hoverInfo showHover showingDetail">
                                                        <button class="playTrailer">
                                                            <img class="playvideo" src="../../img/icons/play-video.png"
                                                                alt="">
                                                        </button>
                                                    </div>
                                                    <span class="avgPoint">
                                                        <p class="txtPoint">7.5</p>
                                                        <p>
                                                            <img class="smallStar" src="../../img/icons/star1.png"
                                                                alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.2.png" class="half" alt="">
                                                        </p>
                                                    </span>
                                                </div>
                                            </a>
                                            <div class="info">
                                                <div class="nameFilm hideHover">
                                                    <span class="ageType"><?php echo $phim_ageType ?></span>
                                                   <?php echo $phim_ten?>
                                                </div>
                                                <div class="infoFilm hideHover">
                                                   <?php echo $phim_infoFilm?>
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA VÉ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
            }

        ?>
                                    <!-- <div class="col-sm-3 col-xs-12 wrapFilm" style="width: 25%; display: inline-block;">
                                        <div class="film">
                                            <a href="https://tix.vn/phim/2247-lat-mat-48h">
                                                <div class="filmThumbnail"
                                                    style="background-image:url(../../img/filmBlock/lat-mat-48h-16176188609123_215x318.png), url(../../img/default/default-film.webp) ;">
                                                    <div class="hoverInfo showHover showingDetail">
                                                        <button class="playTrailer">
                                                            <img class="playvideo" src="../../img/icons/play-video.png"
                                                                alt="">
                                                        </button>
                                                    </div>
                                                    <span class="avgPoint">
                                                        <p class="txtPoint">8.4</p>
                                                        <p>
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.2.png" class="half" alt="">
                                                        </p>
                                                    </span>
                                                </div>
                                            </a>
                                            <div class="info">
                                                <div class="nameFilm hideHover">
                                                    <span class="ageType">C18</span>
                                                    Lật Mặt: 48h
                                                </div>
                                                <div class="infoFilm hideHover">
                                                    100 phút
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA VÉ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12 wrapFilm" style="width: 25%; display: inline-block;">
                                        <div class="film">
                                            <a href="https://tix.vn/phim/2198-godzilla-vs-kong">
                                                <div class="filmThumbnail"
                                                    style="background-image:url(../../img/filmBlock/godzilla-vs-kong-16150074733397_215x318.jpg), url(../../img/default/default-film.webp) ;">
                                                    <div class="hoverInfo showHover showingDetail">
                                                        <button class="playTrailer">
                                                            <img class="playvideo" src="../../img/icons/play-video.png"
                                                                alt="">
                                                        </button>
                                                    </div>
                                                    <span class="avgPoint">
                                                        <p class="txtPoint">8.4</p>
                                                        <p>
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.2.png" class="half" alt="">
                                                        </p>
                                                    </span>
                                                </div>
                                            </a>
                                            <div class="info">
                                                <div class="nameFilm hideHover">
                                                    <span class="ageType">C13</span>
                                                    Godzilla vs. Kong
                                                </div>
                                                <div class="infoFilm hideHover">
                                                    100 phút - 6.5 IMDb
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA VÉ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12 wrapFilm" style="width: 25%; display: inline-block;">
                                        <div class="film">
                                            <a href="https://tix.vn/phim/2590-lich-chieu-nguoi-nhan-ban">
                                                <div class="filmThumbnail"
                                                    style="background-image:url(../../img/filmBlock/nguoi-nhan-ban-seobok-c18-16170933054901_215x318.jpg), url(../../img/default/default-film.webp) ;">
                                                    <div class="hoverInfo showHover showingDetail">
                                                        <button class="playTrailer">
                                                            <img class="playvideo" src="../../img/icons/play-video.png"
                                                                alt="">
                                                        </button>
                                                    </div>
                                                    <span class="avgPoint">
                                                        <p class="txtPoint">7.9</p>
                                                        <p>

                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.2.png" class="half" alt="">
                                                        </p>
                                                    </span>
                                                </div>
                                            </a>
                                            <div class="info">
                                                <div class="nameFilm hideHover">
                                                    <span class="ageType">C16</span>
                                                    Người Nhân Bản - Seobok (C16)
                                                </div>
                                                <div class="infoFilm hideHover">
                                                    114 phút - 6.4 IMDb
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA VÉ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12 wrapFilm" style="width: 25%; display: inline-block;">
                                        <div class="film">
                                            <a href="https://tix.vn/phim/2587-lich-chieu-bantaydietquy">
                                                <div class="filmThumbnail"
                                                    style="background-image:url(../../img/filmBlock/ban-tay-diet-quy-evil-expeller-c16-16167437811994_215x318.png), url(../../img/default/default-film.webp) ;">
                                                    <div class="hoverInfo showHover showingDetail">
                                                        <button class="playTrailer">
                                                            <img class="playvideo" src="../../img/icons/play-video.png"
                                                                alt="">
                                                        </button>
                                                    </div>
                                                    <span class="avgPoint">
                                                        <p class="txtPoint">8.8</p>
                                                        <p>
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.2.png" class="half" alt="">
                                                        </p>
                                                    </span>
                                                </div>
                                            </a>
                                            <div class="info">
                                                <div class="nameFilm hideHover">
                                                    <span class="ageType">C16</span>
                                                    Bàn Tay Diệt Quỷ - Evil Expeller (C16)
                                                </div>
                                                <div class="infoFilm hideHover">
                                                    129 phút
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA VÉ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12 wrapFilm" style="width: 25%; display: inline-block;">
                                        <div class="film">
                                            <a
                                                href="https://tix.vn/phim/2599-lich-chieu-ong-nhi-phieu-luu-ki-giai-cuu-cong-chua-kien">
                                                <div class="filmThumbnail"
                                                    style="background-image:url(../../img/filmBlock/ong-nhi-phieu-luu-ky-giai-cuu-cong-chua-kien-maya-the-bee-3-the-golden-orb-p-16177793756407_215x318.png), url(../../img/default/default-film.webp) ;">
                                                    <div class="hoverInfo showHover showingDetail">
                                                        <button class="playTrailer">
                                                            <img class="playvideo" src="../../img/icons/play-video.png"
                                                                alt="">
                                                        </button>
                                                    </div>
                                                    <span class="avgPoint">
                                                        <p class="txtPoint">5.5</p>
                                                        <p>

                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.2.png" class="half" alt="">
                                                        </p>
                                                    </span>
                                                </div>
                                            </a>
                                            <div class="info">
                                                <div class="nameFilm hideHover">
                                                    <span class="ageType ageType-general">P</span>
                                                    Ong Nhí Phiêu Lưu Ký: Giải Cứu Công Chúa Kiến - Maya The Bee 3: The
                                                    Golden Orb - P
                                                </div>
                                                <div class="infoFilm hideHover">
                                                    129 phút
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA VÉ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12 wrapFilm" style="width: 25%; display: inline-block;">
                                        <div class="film">
                                            <a
                                                href="https://tix.vn/phim/2605-lich-chieu-detective-conan-scarlet-bullet-tham-tu-lung-danh-conan-vien-dan-do">
                                                <div class="filmThumbnail"
                                                    style="background-image:url(../../img/filmBlock/detective-conan-scarlet-bullet-tham-tu-lung-danh-conan-vien-dan-do-p-16185623740090_215x318.png), url(../../img/default/default-film.webp) ;">
                                                    <div class="hoverInfo showHover showingDetail">
                                                        <button class="playTrailer">
                                                            <img class="playvideo" src="../../img/icons/play-video.png"
                                                                alt="">
                                                        </button>
                                                    </div>
                                                    <span class="avgPoint">
                                                        <p class="txtPoint">5.5</p>
                                                        <p>

                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.2.png" class="half" alt="">
                                                        </p>
                                                    </span>
                                                </div>
                                            </a>
                                            <div class="info">
                                                <div class="nameFilm hideHover">
                                                    <span class="ageType ">C13</span>
                                                    Detective Conan: Scarlet Bullet - Thám Tử Lừng Danh Conan: Viên Đạn
                                                    Đỏ - C13
                                                </div>
                                                <div class="infoFilm hideHover">
                                                    110 phút - 7 IMDb
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA VÉ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12 wrapFilm" style="width: 25%; display: inline-block;">
                                        <div class="film">
                                            <a href="https://tix.vn/phim/2607-nhan-doi-tinh-yeu-double-party-c13">
                                                <div class="filmThumbnail"
                                                    style="background-image:url(../../img/filmBlock/nhan-doi-tinh-yeu-double-party-c13-16188292910862_215x318.png), url(../../img/default/default-film.webp) ;">
                                                    <div class="hoverInfo showHover showingDetail">
                                                        <button class="playTrailer">
                                                            <img class="playvideo" src="../../img/icons/play-video.png"
                                                                alt="">
                                                        </button>
                                                    </div>
                                                    <span class="avgPoint">
                                                        <p class="txtPoint">5.5</p>
                                                        <p>

                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.png" alt="">
                                                            <img src="../../img/icons/star1.2.png" class="half" alt="">
                                                        </p>
                                                    </span>
                                                </div>
                                            </a>
                                            <div class="info">
                                                <div class="nameFilm hideHover">
                                                    <span class="ageType ">C13</span>
                                                    Detective Conan: Scarlet Bullet - Thám Tử Lừng Danh Conan: Viên Đạn
                                                    Đỏ - C13
                                                </div>
                                                <div class="infoFilm hideHover">
                                                    110 phút - 7 IMDb
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA VÉ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- 21/4 xóa transform  -->
                                </div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //FilmBlock -->
    <!-- 20/4 chỉnh sửa transform: translate3d -->
    <!--CinemaComplex Block  -->
    <!-- <div class="row session-main grayBack" id="cinemablock">
        <div class="col-xs-12 block mainMaxWidth" id="homeCinemaComplex">
            <div id="sliderAdsCinema" class="wrapSlick banner-ads">

            </div>
            <div class="noelBand"></div>
            <ul class="nav nav-tabs listPCinemas accordion" id="parentListPCinemas">
                <li class="liPCinema active" data-id="16">
                    <a href="">
                        <img src="../../img/complexBlock/CNS.png" alt="">
                    </a>
                </li>
                <li class="liPCinema " data-id="4">
                    <a href="">
                        <img src="../../img/complexBlock/BHD.png" alt="">
                    </a>
                </li>
                <li class="liPCinema " data-id="6">
                    <a href="">
                        <img src="../../img/complexBlock/DDC.png" alt="">
                    </a>
                </li>
                <li class="liPCinema " data-id="17">
                    <a href="">
                        <img src="../../img/complexBlock/GS.png" alt="">
                    </a>
                </li>
                <li class="liPCinema " data-id="25">
                    <a href="">
                        <img src="../../img/complexBlock/DC.jpg" alt="">
                    </a>
                </li>
                <li class="liPCinema " data-id="1">
                    <a href="">
                        <img src="../../img/complexBlock/lotte.png" alt="">
                    </a>
                </li>
            </ul>
            <div class="tab-content float-left" id="listCinemas" style="height: 705px;">
                <div class="">
                    <div class="cinema active" data-id="169">
                        <img src="../../img/complexBlock/cinestar-hai-ba-trung-15383833704033.jpg" class="cinemaImage"
                            alt="">
                        <div class="wrapInfo">
                            <span class="nameMovieCinema">
                                <span class="colorCinema CNS">CNS</span>
                                Hai Bà Trưng
                            </span>
                            <span class="infoMovieCinema">135 Hai Bà Trưng, Bến Nghé, Q1</span>
                            <span class="redDetail showingDetailCinema" data-id="169">
                                <a href="https://tix.vn/rap-chieu-phim/169-cinestar-hai-ba-trung">
                                    [Chi tiết]
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="cinema " data-id="">
                        <img class="cinemaImage" src="../../img/complexBlock/cinestar-hai-ba-trung-15383833704033.jpg"
                            alt="">
                        <div class="wrapInfo">
                            <span class="nameMovieCinema">
                                <span class="colorCinema CNS">CNS</span>
                                - Quốc Thanh
                            </span>
                            <span class="infoMovieCinema">271 Nguyễn Trãi, Q.1</span>
                            <span class="redDetail showingDetailCinema" data-id="97">
                                <a href="https://tix.vn/rap-chieu-phim/169-cinestar-hai-ba-trung">
                                    [Chi tiết]
                                </a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div id="listMovies" style="height: 705px;">
                <div class="" data-cinema="169">
                    <div class="wrapMovie panel">
                        <div class="movieInfo" data-toggle="collapse" data-parent="#homeCinemaComplex">
                            <img class="movieImage" src="../../img/complexBlock/lat-mat-48h-16176188609123_60x60.png"
                                alt="">
                            <div class="wrapInfo">
                                <p>
                                    <span class="ing ageType">
                                        C18
                                    </span>
                                    <span class="movieTitle">Lật Mặt: 48h</span>
                                </p>
                                <p class="">100 phút - TIX 8.9 - IMDb 0</p>
                            </div>
                        </div>
                        <div class="movieSession collapse in" id="cinema-169-film-2247">
                            <div class="listTypeTime">
                                <div class="s-version">2D Digital</div>
                                <div class="sessions">
                                    <a href="../../datcho/datcho/datcho.html/" class="session">
                                        <span class="s-start-time">21:00</span>
                                        ~ 22:40
                                    </a>
                                    <a href="../../datcho/datcho/datcho.html/" class="session">
                                        <span class="s-start-time">21:30</span>
                                        ~ 23:10
                                    </a>
                                    <a href="../../datcho/datcho/datcho.html/" class="session">
                                        <span class="s-start-time">22:00</span>
                                        ~ 23:40
                                    </a>
                                    <a href="../../datcho/datcho/datcho.html/" class="session">
                                        <span class="s-start-time">22:20</span>
                                        ~ 00:00
                                    </a>
                                    <a href="../../datcho/datcho/datcho.html/" class="session">
                                        <span class="s-start-time">22:50</span>
                                        ~ 00:20
                                    </a>
                                    <a href="../../datcho/datcho/datcho.html/" class="session">
                                        <span class="s-start-time">23:20</span>
                                        ~ 01:00
                                    </a>
                                    <a href="../../datcho/datcho/datcho.html/" class="session">
                                        <span class="s-start-time">23:50</span>
                                        ~ 01:30
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="noelBand"></div>
        </div>
    </div> -->
    <!-- CinemaComplex Block -->
    <!-- New block -->
    <div class="row grayBack" id="newsblock">
        <div class="col-xs-12 block mainMaxWidth" id="homeNews">
            <div id="sliderAdsNews" class="wrapSlick banner-ads">

            </div>
            <ul class="nav nav-tabs navCenter" id="myTab">
                <li class="active">
                    <a data-toggle="tab" data-target="#showingNews" aria-expanded="true">Điện ảnh 24h</a>
                    <div class="wing wingLeft"></div>
                    <div class="wing wingRight"></div>
                </li>
                <li>
                    <a data-toggle="tab" data-target="#showingReview" aria-expanded="false">Review</a>
                    <div class="wing wingLeft"></div>
                    <div class="wing wingRight"></div>
                </li>
                <li>
                    <a data-toggle="tab" data-target="#showingPromotion" aria-expanded="false">Khuyến Mãi</a>
                    <div class="wing wingLef"></div>
                    <div class="wing wingRight"></div>
                </li>
            </ul>
            <div class="tab-content">
                <div id="showingNews" class="tab-pane fade in active">
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a
                                href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat">
                                <img src="../../img/icons/lyhai.png" alt="">
                            </a>
                        </div>
                        <a
                            href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat">
                            <p class="newsTitle">
                                Ấn định chắc nịch ngày khởi chiếu 16.04, Lý Hải tung clip Lật Mặt: 48H đậm chất
                            </p>
                        </a>
                        <p class="newsDescription">
                            Trước thềm khởi chiếu 16.04 này, Lý Hải bất ngờ tung clip rượt đuổi gay cấn thót tim fans
                            hâm mộ
                        </p>
                        <div class="blockIconFacebook">
                            <div class="wrapIcon like">
                                <img src="../../img/icons/like.png" class="iconFacebook postLike" alt="">
                            </div>
                            <div class="wrapIcon comment">
                                <a href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat?tab=comment
                                ">
                                    <img src="../../img/icons/comment.png" class="iconFacebook postCmt" alt="">
                                    <p class="amount comment">0</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a
                                href="https://tix.vn/goc-dien-anh/7964-mortal-kombat-cuoc-chien-sinh-tu-goi-ten-nhung-phim-dien-anh-noi-tieng-duoc-chuyen-the-tu-cac-tua-game-dinh-dam">
                                <img src="../../img/icons/mortal.png" alt="">
                            </a>
                        </div>
                        <a
                            href="https://tix.vn/goc-dien-anh/7964-mortal-kombat-cuoc-chien-sinh-tu-goi-ten-nhung-phim-dien-anh-noi-tieng-duoc-chuyen-the-tu-cac-tua-game-dinh-dam">
                            <p class="newsTitle">
                                [MORTAL KOMBAT: CUỘC CHIẾN SINH TỬ] - GỌI TÊN NHỮNG PHIM ĐIỆN ẢNH NỔI TIẾNG ĐƯỢC CHUYỂN
                                THỂ TỪ CÁC TỰA GAME ĐÌNH ĐÁM
                            </p>
                        </a>
                        <p class="newsDescription">
                            Bên cạnh những kịch bản gốc mới mẻ và đầy bất ngờ, Hollywood cũng không thiếu những tác phẩm
                            đình đám được chuyển thể từ tiểu thuyết, phim hoạt hình, hay thậm chí là cả trò chơi điện
                            tử.
                        </p>
                        <div class="blockIconFacebook">
                            <div class="wrapIcon like">
                                <img src="../../img/icons/like.png" class="iconFacebook postLike" alt="">
                            </div>
                            <div class="wrapIcon comment">
                                <a href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat?tab=comment
                                ">
                                    <img src="../../img/icons/comment.png" class="iconFacebook postCmt" alt="">
                                    <p class="amount comment">0</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a
                                href="https://tix.vn/goc-dien-anh/7963-promising-young-woman-bong-hong-nuoc-anh-carey-mulligan-va-man-tra-thu-dan-ong-de-doi">
                                <img src="../../img/icons/PROMISING.png" alt="">
                            </a>
                        </div>
                        <a
                            href="https://tix.vn/goc-dien-anh/7963-promising-young-woman-bong-hong-nuoc-anh-carey-mulligan-va-man-tra-thu-dan-ong-de-doi">
                            <p class="newsTitle">
                                PROMISING YOUNG WOMAN | Bông hồng nước Anh Carey Mulligan và màn trả thù đàn ông để đời
                            </p>
                        </a>
                        <p class="newsDescription">
                            Đề cử giải Oscar danh giá vừa gọi tên Carey Mulligan ở hạng mục nữ chính xuất sắc nhất cho
                            vai diễn "đẫm máu" nhất sự nghiệp của cô trong phim Promising Young Woman (tựa Việt: Cô Gái
                            Trẻ Hứa Hẹn).
                        </p>
                        <div class="blockIconFacebook">
                            <div class="wrapIcon like">
                                <img src="../../img/icons/like.png" class="iconFacebook postLike" alt="">
                            </div>
                            <div class="wrapIcon comment">
                                <a href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat?tab=comment
                                ">
                                    <img src="../../img/icons/comment.png" class="iconFacebook postCmt" alt="">
                                    <p class="amount comment">0</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a
                                href="https://tix.vn/goc-dien-anh/7962-vua-dep-lai-vua-tai-nang-dan-sao-nam-cua-phim-ban-tay-diet-quy-dam-bao-don-tim-hoi-chi-em">
                                <img src="../../img/icons/Evil Expeller.png" alt="">
                            </a>
                        </div>
                        <a
                            href="https://tix.vn/goc-dien-anh/7962-vua-dep-lai-vua-tai-nang-dan-sao-nam-cua-phim-ban-tay-diet-quy-dam-bao-don-tim-hoi-chi-em">
                            <p class="newsTitle">
                                VỪA ĐẸP LẠI VỪA TÀI NĂNG, DÀN SAO NAM CỦA PHIM “BÀN TAY DIỆT QUỶ” ĐẢM BẢO ĐỐN TIM HỘI
                                CHỊ EM
                            </p>
                        </a>
                        <p class="newsDescription">
                            Quy tụ 3 nam tài tử vừa điển trai, vừa được đánh giá cao về năng lực diễn xuất là Park Seo
                            Joon, Woo Do Hwan và Choi Woo Sik, tác phẩm kinh dị – hành động “Bàn Tay Diệt Quỷ” hứa hẹn
                            sẽ làm cho hội chị em phải mê mẩn vào tháng tới.
                        </p>
                        <div class="blockIconFacebook">
                            <div class="wrapIcon like">
                                <img src="../../img/icons/like.png" class="iconFacebook postLike" alt="">
                            </div>
                            <div class="wrapIcon comment">
                                <a href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat?tab=comment
                                ">
                                    <img src="../../img/icons/comment.png" class="iconFacebook postCmt" alt="">
                                    <p class="amount comment">0</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a
                                href="https://tix.vn/goc-dien-anh/7961-khai-truong-rap-xin-gia-ngon-chuan-xi-tai-sai-gon">
                                <img src="../../img/icons/rạp.jpg" alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/goc-dien-anh/7961-khai-truong-rap-xin-gia-ngon-chuan-xi-tai-sai-gon">
                            <p class="newsTitle">
                                Khai trương rạp xịn giá ngon, chuẩn xì-tai Sài Gòn
                            </p>
                        </a>


                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a
                                href="https://tix.vn/goc-dien-anh/7960-boc-tem-to-hop-giai-tri-moi-toanh-cua-gioi-ha-thanh">
                                <img src="../../img/icons/mortal.png" alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/goc-dien-anh/7960-boc-tem-to-hop-giai-tri-moi-toanh-cua-gioi-ha-thanh">
                            <p class="newsTitle">
                                “Bóc tem” tổ hợp giải trí mới toanh của giới Hà Thành
                            </p>
                        </a>


                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a
                                href="https://tix.vn/goc-dien-anh/7957-tiec-trang-mau-chinh-thuc-can-moc-100-ty-chi-sau-2-tuan-cong-chieu">
                                <img src="../../img/icons/100.png" alt="">
                            </a>
                        </div>
                        <a
                            href="https://tix.vn/goc-dien-anh/7957-tiec-trang-mau-chinh-thuc-can-moc-100-ty-chi-sau-2-tuan-cong-chieu">
                            <p class="newsTitle">
                                Tiệc Trăng Máu chính thức cán mốc 100 tỷ chỉ sau 2 tuần công chiếu
                            </p>
                        </a>


                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a
                                href="https://tix.vn/goc-dien-anh/7956-ngo-thanh-van-chinh-thuc-khoi-dong-cuoc-thi-thiet-ke-trang-phuc-cho-sieu-anh-hung-dau-tien-cua-viet-nam-vinaman">
                                <img src="../../img/icons/ntv.jpg" alt="">
                            </a>
                        </div>
                        <a
                            href="https://tix.vn/goc-dien-anh/7956-ngo-thanh-van-chinh-thuc-khoi-dong-cuoc-thi-thiet-ke-trang-phuc-cho-sieu-anh-hung-dau-tien-cua-viet-nam-vinaman">
                            <p class="newsTitle">
                                NGÔ THANH VÂN CHÍNH THỨC KHỞI ĐỘNG CUỘC THI THIẾT KẾ TRANG PHỤC CHO SIÊU ANH HÙNG ĐẦU
                                TIÊN CỦA VIỆT NAM – VINAMAN
                            </p>
                        </a>


                    </div>
                    <div class="wrapButtonSeeMoreNews">
                        <button class="btnViewMore">XEM THÊM</button>
                    </div>

                </div>
                <div id="showingReview" class="tab-pane fade ">
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a href="https://tix.vn/review/7947-review-tan-tich-quy-am-relic-ba-the-he-va-moi-lien-ket">
                                <img src="../../img/icons/tantich.png" alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/review/7947-review-tan-tich-quy-am-relic-ba-the-he-va-moi-lien-ket">
                            <p class="newsTitle">
                                Review: Tàn Tích Quỷ Ám (Relic) - Ba thế hệ và mối liên kết
                            </p>
                        </a>
                        <p class="newsDescription">
                            Điểm nhấn của phim kinh dị năm 2020 chính là Tàn Tích Quỷ Ám
                        </p>
                        <div class="blockIconFacebook">
                            <div class="wrapIcon like">
                                <img src="../../img/icons/like.png" class="iconFacebook postLike" alt="">
                            </div>
                            <div class="wrapIcon comment">
                                <a href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat?tab=comment
                                ">
                                    <img src="../../img/icons/comment.png" class="iconFacebook postCmt" alt="">
                                    <p class="amount comment">0</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a href="https://tix.vn/review/7946-review-dinh-thu-oan-khuat-ghost-of-war">
                                <img src="../../img/icons/dinhthu.png" alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/review/7946-review-dinh-thu-oan-khuat-ghost-of-war">
                            <p class="newsTitle">
                                Review: Dinh Thự Oan Khuất (Ghost Of War)
                            </p>
                        </a>
                        <p class="newsDescription">
                            Tuy là một bộ phim có chất lượng tốt, nhưng có vẻ Dinh Thự Oan Khuất vẫn chưa đủ để đem khán
                            giả trở lại phòng vé!
                        </p>
                        <div class="blockIconFacebook">
                            <div class="wrapIcon like">
                                <img src="../../img/icons/like.png" class="iconFacebook postLike" alt="">
                            </div>
                            <div class="wrapIcon comment">
                                <a href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat?tab=comment
                                ">
                                    <img src="../../img/icons/comment.png" class="iconFacebook postCmt" alt="">
                                    <p class="amount comment">0</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a href="https://tix.vn/review/7924-blackkklansman-coc-nuoc-lanh-de-nguoi-my-thuc-tinh">
                                <img src="../../img/icons/blackkklansman-coc-nuoc-lanh-de-nguoi-my-thuc-tinh-15910862294165.png"
                                    alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/review/7924-blackkklansman-coc-nuoc-lanh-de-nguoi-my-thuc-tinh">
                            <p class="newsTitle">
                                ‘BlacKkKlansman’ - cốc nước lạnh để người Mỹ thức tỉnh
                            </p>
                        </a>
                        <p class="newsDescription">
                            Tác phẩm nhận đề cử Phim truyện xuất sắc tại Oscar 2019 của đạo diễn Spike Lee là một lát
                            cắt nữa về nạn phân biệt chủng tộc - nỗi đau gây nhức nhối nước Mỹ cho tới tận hôm nay.
                        </p>
                        <div class="blockIconFacebook">
                            <div class="wrapIcon like">
                                <img src="../../img/icons/like.png" class="iconFacebook postLike" alt="">
                            </div>
                            <div class="wrapIcon comment">
                                <a href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat?tab=comment
                                ">
                                    <img src="../../img/icons/comment.png" class="iconFacebook postCmt" alt="">
                                    <p class="amount comment">0</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a href="https://tix.vn/review/7918-american-sniper-chinh-nghia-hay-phi-nghia">
                                <img src="../../img/icons/american-sniper-chinh-nghia-hay-phi-nghia-15905660338111.png"
                                    alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/review/7918-american-sniper-chinh-nghia-hay-phi-nghia">
                            <p class="newsTitle">
                                American Sniper - Chính nghĩa hay phi nghĩa?
                            </p>
                        </a>
                        <p class="newsDescription">
                            American Sniper khắc họa một tay súng bắn tỉa “huyền thoại” của Hải quân Mỹ với 4 lần tham
                            chiến ở Trung Đông. Câu chuyện phim chậm rãi đưa người xem qua từng thời khắc khác nhau của
                            Kyle, từ thửa nhỏ, thiếu niên, rồi gia nhập quân đội, rồi tham chiến. Từng khoảnh khắc bắt
                            đầu nhẹ nhàng...
                        </p>
                        <div class="blockIconFacebook">
                            <div class="wrapIcon like">
                                <img src="../../img/icons/like.png" class="iconFacebook postLike" alt="">
                            </div>
                            <div class="wrapIcon comment">
                                <a href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat?tab=comment
                                ">
                                    <img src="../../img/icons/comment.png" class="iconFacebook postCmt" alt="">
                                    <p class="amount comment">0</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a href="https://tix.vn/review/7894-review-spider-man-into-the-spider-vesre">
                                <img src="../../img/icons/review-spider-man-into-the-spider-vesre-15886520889426.png"
                                    alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/review/7894-review-spider-man-into-the-spider-vesre">
                            <p class="newsTitle">
                                Review: Spider-Man: Into The Spider-Vesre
                            </p>
                        </a>


                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a
                                href="https://tix.vn/review/7886-covid-19-la-ban-chinh-thuc-cua-mev-1-phim-contagion-2011">
                                <img src="../../img/icons/covid-19-la-ban-chinh-thuc-cua-mev-1-phim-contagion-2011-15843496198482.jpg"
                                    alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/review/7886-covid-19-la-ban-chinh-thuc-cua-mev-1-phim-contagion-2011">
                            <p class="newsTitle">
                                COVID-19 là bản chính thức của MEV-1 phim contagion (2011)
                            </p>
                        </a>


                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a
                                href="https://tix.vn/review/7882-review-sieu-ve-si-so-vo-giai-cuu-tong-thong-chua-bao-gio-lay-loi-va-hai-huoc-den-the">
                                <img src="../../img/icons/review-sieu-ve-si-so-vo-giai-cuu-tong-thong-chua-bao-gio-lay-loi-va-hai-huoc-den-the-15840925506832.jpg"
                                    alt="">
                            </a>
                        </div>
                        <a
                            href="https://tix.vn/review/7882-review-sieu-ve-si-so-vo-giai-cuu-tong-thong-chua-bao-gio-lay-loi-va-hai-huoc-den-the">
                            <p class="newsTitle">
                                [Review] Siêu Vệ Sĩ Sợ Vợ - Giải cứu Tổng thống chưa bao giờ lầy lội và hài hước đến thế
                            </p>
                        </a>


                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a
                                href="https://tix.vn/review/7881-review-bloodshot-mo-man-an-tuong-cho-vu-tru-sieu-anh-hung-valiant">
                                <img src="../../img/icons/review-bloodshot-mo-man-an-tuong-cho-vu-tru-sieu-anh-hung-valiant-15840731141389.jpg"
                                    alt="">
                            </a>
                        </div>
                        <a
                            href="https://tix.vn/review/7881-review-bloodshot-mo-man-an-tuong-cho-vu-tru-sieu-anh-hung-valiant">
                            <p class="newsTitle">
                                [Review] Bloodshot - Mở màn ấn tượng cho Vũ trụ Siêu anh hùng Valiant
                            </p>
                        </a>


                    </div>
                    <div class="wrapButtonSeeMoreNews">
                        <button class="btnViewMore">XEM THÊM</button>
                    </div>
                </div>
                <div id="showingPromotion" class="tab-pane fade">
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a href="https://tix.vn/khuyen-mai/7958-bhd-59k-ve-ca-tuan">
                                <img src="../../img/icons/bhd-59k-ve-ca-tuan-16151022245962.jpg" alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/khuyen-mai/7958-bhd-59k-ve-ca-tuan">
                            <p class="newsTitle">
                                BHD 59K/VÉ CẢ TUẦN !!!
                            </p>
                        </a>
                        <p class="newsDescription">
                            Tận hưởng Ưu Đãi lên đến 3 VÉ BHD Star mỗi tuần chỉ với giá 59k/vé khi mua vé trên TIX hoặc
                            Mục Vé Phim trên ZaloPay.
                        </p>
                        <div class="blockIconFacebook">
                            <div class="wrapIcon like">
                                <img src="../../img/icons/like.png" class="iconFacebook postLike" alt="">
                            </div>
                            <div class="wrapIcon comment">
                                <a href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat?tab=comment
                                ">
                                    <img src="../../img/icons/comment.png" class="iconFacebook postCmt" alt="">
                                    <p class="amount comment">0</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a href="https://tix.vn/khuyen-mai/7955-tix-1k-ve-ngai-chi-gia-ve">
                                <img src="../../img/icons/tix-1k-ve-ngai-chi-gia-ve-16045662877511.jpg" alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/khuyen-mai/7955-tix-1k-ve-ngai-chi-gia-ve">
                            <p class="newsTitle">
                                TIX 1K/VÉ NGẠI CHI GIÁ VÉ
                            </p>
                        </a>
                        <p class="newsDescription">
                            Đồng giá 1k/vé cả tuần tất cả các rạp trên TIX + Nhận thêm 02 voucher thanh toán ZaloPay thả
                            ga
                        </p>
                        <div class="blockIconFacebook">
                            <div class="wrapIcon like">
                                <img src="../../img/icons/like.png" class="iconFacebook postLike" alt="">
                            </div>
                            <div class="wrapIcon comment">
                                <a href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat?tab=comment
                                ">
                                    <img src="../../img/icons/comment.png" class="iconFacebook postCmt" alt="">
                                    <p class="amount comment">0</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a href="https://tix.vn/khuyen-mai/7954-dong-gia-1k-ve-khi-mua-ve-qua-tix">
                                <img src="../../img/icons/dong-gia-1k-ve-khi-mua-ve-qua-tix-16010092946804.png" alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/khuyen-mai/7954-dong-gia-1k-ve-khi-mua-ve-qua-tix">
                            <p class="newsTitle">
                                ĐỒNG GIÁ 1K/VÉ KHI MUA VÉ QUA TIX
                            </p>
                        </a>
                        <p class="newsDescription">
                            ĐỒNG GIÁ 1K/VÉ KHI MUA VÉ QUA TIX

                            Hành trình tìm Ròm và Phúc chỉ với 1k cả tuần + nhận thêm 02 voucher khi đặt vé qua TIX.
                        </p>
                        <div class="blockIconFacebook">
                            <div class="wrapIcon like">
                                <img src="../../img/icons/like.png" class="iconFacebook postLike" alt="">
                            </div>
                            <div class="wrapIcon comment">
                                <a href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat?tab=comment
                                ">
                                    <img src="../../img/icons/comment.png" class="iconFacebook postCmt" alt="">
                                    <p class="amount comment">0</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a href="https://tix.vn/khuyen-mai/7919-bhd-star-ve-chi-59-000d-ca-tuan">
                                <img src="../../img/icons/bhd-59k-ve-ca-tuan-16151022245962.jpg" alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/khuyen-mai/7919-bhd-star-ve-chi-59-000d-ca-tuan">
                            <p class="newsTitle">
                                BHD STAR VÉ CHỈ 59.000Đ CẢ TUẦN!
                            </p>
                        </a>
                        <p class="newsDescription">
                            Tận hưởng Ưu Đãi lên đến 3 VÉ BHD Star mỗi tuần chỉ với giá 59k/vé khi mua vé trên TIX và
                            thanh toán bằng ZaloPay hoặc Mục Vé Phim trên ZaloPay.
                        </p>
                        <div class="blockIconFacebook">
                            <div class="wrapIcon like">
                                <img src="../../img/icons/like.png" class="iconFacebook postLike" alt="">
                            </div>
                            <div class="wrapIcon comment">
                                <a href="https://tix.vn/goc-dien-anh/7965-an-dinh-chac-nich-ngay-khoi-chieu-16-04-ly-hai-tung-clip-lat-mat-48h-dam-chat?tab=comment
                                ">
                                    <img src="../../img/icons/comment.png" class="iconFacebook postCmt" alt="">
                                    <p class="amount comment">0</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a href="https://tix.vn/khuyen-mai/7908-beta-cineplex-tro-lai-voi-hang-loat-uu-dai-lon">
                                <img src="../../img/icons/beta-cineplex-tro-lai-voi-hang-loat-uu-dai-lon-15889408112010.png"
                                    alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/khuyen-mai/7908-beta-cineplex-tro-lai-voi-hang-loat-uu-dai-lon">
                            <p class="newsTitle">
                                Beta Cineplex trở lại với hàng loạt ưu đãi lớn
                            </p>
                        </a>


                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a
                                href="https://tix.vn/khuyen-mai/7806-123phim-thu-6-khong-den-toi-uu-dai-huy-diet-11k-ve-anh-trai-yeu-quai">
                                <img src="../../img/icons/123phim-thu-6-khong-den-toi-uu-dai-huy-diet-11k-ve-anh-trai-yeu-quai-15746757294099.jpg"
                                    alt="">
                            </a>
                        </div>
                        <a
                            href="https://tix.vn/khuyen-mai/7806-123phim-thu-6-khong-den-toi-uu-dai-huy-diet-11k-ve-anh-trai-yeu-quai">
                            <p class="newsTitle">
                                [123Phim] Thứ 6 Không Đen Tối - Ưu đãi huỷ diệt 11k/vé Anh Trai Yêu Quái
                            </p>
                        </a>


                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a
                                href="https://tix.vn/khuyen-mai/7801-123phim-nhap-ma-psm30k-giam-ngay-30k-khi-dat-ve-phap-su-mu-ai-chet-gio-tay">
                                <img src="../../img/icons/123phim-nhap-ma-psm30k-giam-ngay-30k-khi-dat-ve-phap-su-mu-ai-chet-gio-tay-15729439018211.jpg"
                                    alt="">
                            </a>
                        </div>
                        <a
                            href="https://tix.vn/khuyen-mai/7801-123phim-nhap-ma-psm30k-giam-ngay-30k-khi-dat-ve-phap-su-mu-ai-chet-gio-tay">
                            <p class="newsTitle">
                                [123Phim] NHẬP MÃ 'PSM30K' - Giảm ngay 30k khi đặt vé Pháp Sư Mù: Ai Chết Giơ Tay
                            </p>
                        </a>


                    </div>
                    <div class="col-news col-xs-12 news">
                        <div class="thumbnailGeneral bigThumbnail newsThumbnail">
                            <a href="https://tix.vn/khuyen-mai/7792-mega-gs-mot-doa-hoa-thay-ngan-loi-yeu">
                                <img src="../../img/icons/me" alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/khuyen-mai/7792-mega-gs-mot-doa-hoa-thay-ngan-loi-yeu">
                            <p class="newsTitle">
                                [Mega GS] Một đoá hoa thay ngàn lời yêu
                            </p>
                        </a>


                    </div>
                    <div class="wrapButtonSeeMoreNews">
                        <button class="btnViewMore">XEM THÊM</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Newblock -->
    <!-- block App -->
    <div id="appblock">
        <div class="row" id="wrapHomeApp">
            <div class="col-xs-12 block" id="homeApp">
                <div class="mainMaxWidth">
                    <div class="row">
                        <div class="col-md-6 left text-left">
                            <p class="textLeft">Ứng dụng tiện lợi dành cho</p>
                            <p class="textLeft">người yêu điện ảnh</p>
                            <br>
                            <p class="textSmallLeft">
                                Không chỉ đặt vé, bạn còn có thể bình luận phim, chấm điểm rạp và đổi quà hấp dẫn.
                            </p>
                            <br>
                            <button class="buttonLeft">App miễn phí - Tải về ngay!</button>
                            <p class="textAppUnder">
                                TIX có hai phiên bản
                                <a class="tagA"
                                    href="https://apps.apple.com/us/app/123phim-mua-ve-lien-tay-chon/id615186197">iOS</a>
                                &&nbsp;
                                <a class="tagA"
                                    href="https://play.google.com/store/apps/details?id=vn.com.vng.phim123">Android</a>
                            </p>
                        </div>
                        <div class="col-md-6 right">
                            <img src="../../img/icons/mobile.png" class="img-responsive phone-img" alt="">
                            <div id="sliderScreen" class="wrapSlick slick-initialized slick-slider">
                                <div class="slick-list draggable">
                                    <div class="slick-track" role="listbox"
                                        style="opacity: 1; width: 4734px; transform: translate3d(-1578px, 0px,0px); transition: transform 500ms ease 0s;">
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="-1" arria-hidden="true" tabindex="-1"
                                            style="width: 195px;">
                                            <img src="../../img/slide/slide16.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>

                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="0" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide20" role="option">
                                            <img src="../../img/slide/slide1.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="1" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide21" role="option">
                                            <img src="../../img/slide/slide2.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="2" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide22" role="option">
                                            <img src="../../img/slide/slide3.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="3" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide23" role="option">
                                            <img src="../../img/slide/slide4.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="4" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide24" role="option">
                                            <img src="../../img/slide/slide5.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="5" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide25" role="option">
                                            <img src="../../img/slide/slide6.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="6" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide26" role="option">
                                            <img src="../../img/slide/slide7.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="7" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide27" role="option">
                                            <img src="../../img/slide/slide8.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="8" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide28" role="option">
                                            <img src="../../img/slide/slide9.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="9" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide29" role="option">
                                            <img src="../../img/slide/slide10.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="10" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide210" role="option">
                                            <img src="../../img/slide/slide11.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="11" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide211" role="option">
                                            <img src="../../img/slide/slide12.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="12" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide212" role="option">
                                            <img src="../../img/slide/slide13.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="13" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide213" role="option">
                                            <img src="../../img/slide/slide14.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="14" arria-hidden="false" tabindex="-1"
                                            style="width:195px;" aria-describedby="slick-slide214" role="option">
                                            <img src="../../img/slide/slide15.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="15" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide215" role="option">
                                            <img src="../../img/slide/slide16.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                        <div class="slickComponent itemslide slick-slide slick-cloned"
                                            data-slick-index="16" arria-hidden="true" tabindex="-1" style="width:195px;"
                                            aria-describedby="slick-slide216" role="option">
                                            <img src="../../img/slide/slide1.jpg"
                                                onload="localStorage.setItem('slide',1);" alt="">
                                            <div class="backgroundLinear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //block App -->
    <!-- footer -->
    <div class="footer">
        <div class="col-xs-12 block" id="footer">
            <div class="mainMaxWidth">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <p class="title hideOnMobile">TIX</p>
                        <div class="col-sm-6 col-xs-6 noPaddingLeft fontSizeP hideOnMobile">
                            <a href="/faq">FAQ</a>
                            <a href="">Brand Guidelines</a>
                        </div>
                        <div class="col-sm-6 col-xs-6 noPaddingLeft fontSizeP">
                            <a href="">Thỏa thuận sử dụng</a>
                            <a href="">Chính sách bảo mật</a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12 hideOnMobile">
                        <p class="title">ĐỐI TÁC</p>
                        <div class="rowcol-sm-12 col-xs-12 linePartner">
                            <a href="https://www.cgv.vn/">
                                <img src="../../img/icons/cgv.png" style="background-color: #fff;" class="iconConnect"
                                    alt="">
                            </a>
                            <a href="https://www.bhdstar.vn/">
                                <img src="../../img/icons/bhd.png" class="iconConnect" alt="">
                            </a>
                            <a href="https://www.galaxycine.vn/">
                                <img src="../../img/icons/galaxycine.png" class="iconConnect" alt="">
                            </a>
                            <a href="https://cinestar.com.vn/">
                                <img src="../../img/icons/cinestar.png" class="iconConnect" alt="">
                            </a>
                            <a href="http://www.lottecinemavn.com/LCHS/Contents/Movie/Movie-List.aspx">
                                <img src="../../img/icons/lotttecinema.png" class="iconConnect" alt="">
                            </a>
                        </div>
                        <div class="rowcol-sm-12 col-xs-12 linePartner">
                            <a href="https://www.megagscinemas.vn/">
                                <img src="../../img/icons/megags.png" class="iconConnect" alt="">
                            </a>
                            <a href="https://www.betacinemas.vn/home.htm">
                                <img src="../../img/icons/bt.jpg" class="iconConnect" alt="">
                            </a>
                            <a href="http://ddcinema.vn/">
                                <img src="../../img/icons/dongdacinema.png" class="iconConnect" alt="">
                            </a>
                            <a href="https://touchcinema.com/">
                                <img src="../../img/icons/TOUCH.png" class="iconConnect" alt="">
                            </a>
                            <a href="https://cinemaxvn.com/">
                                <img src="../../img/icons/cnx.jpg" class="iconConnect" alt="">
                            </a>
                        </div>
                        <div class="rowcol-sm-12 col-xs-12 linePartner">
                            <a href="https://starlight.vn/">
                                <img src="../../img/icons/STARLIGHT.png" class="iconConnect" alt="">
                            </a>
                            <a href="https://www.dcine.vn/">
                                <img src="../../img/icons/dcine.png" class="iconConnect" alt="">
                            </a>
                            <a href="https://zalopay.vn/">
                                <img src="../../img/icons/zalopay_icon.png" class="iconConnect" alt="">
                            </a>
                            <a href="https://www.payoo.vn/">
                                <img src="../../img/icons/payoo.jpg" class="iconConnect" alt="">
                            </a>
                            <a href="https://portal.vietcombank.com.vn/Pages/Home.aspx?devicechannel=default">
                                <img src="../../img/icons/VCB.png" class="iconConnect" alt="">
                            </a>

                        </div>
                        <div class="rowcol-sm-12 col-xs-12 linePartner">
                            <a href="https://www.agribank.com.vn/">
                                <img src="../../img/icons/AGRIBANK.png" class="iconConnect" alt="">
                            </a>
                            <a href="https://www.vietinbank.vn/web/home/vn/index.html">
                                <img src="../../img/icons/VIETTINBANK.png" class="iconConnect" alt="">
                            </a>
                            <a href="https://www.indovinabank.com.vn/">
                                <img src="../../img/icons/IVB.png" class="iconConnect" alt="">
                            </a>
                            <a href="https://webv3.123go.vn/">
                                <img src="../../img/icons/123go.png" class="iconConnect" alt="">
                            </a>
                            <a href="https://laban.vn/">
                                <img src="../../img/icons/laban.png" class="iconConnect" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="col-xs-6 hideOnMobile textCenter">
                            <p class="title">MOBILE APP</p>
                            <a
                                href="https://apps.apple.com/vn/app/tix-%C4%91%E1%BA%B7t-v%C3%A9-nhanh-nh%E1%BA%A5t/id615186197">
                                <img src="../../img/icons/apple-logo.png" class="iconApp" alt="">
                            </a>
                            <a href="https://play.google.com/store/apps/details?id=vn.com.vng.phim123">
                                <img src="../../img/icons/android-logo.png" class="iconApp" alt="">
                            </a>

                        </div>
                        <div class="col-xs-6 textCenter">
                            <p class="title hideOnMobile">SOCIAL</p>
                            <a href="https://www.facebook.com/tix.vn/">
                                <img src="../../img//icons/facebook-logo.png" class="iconApp" alt="">
                            </a>
                            <a href="https://zalo.me/tixdatve">
                                <img src="../../img//icons/zalo-logo.png" class="iconApp" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <hr id="hrFooter">
                <div class="row">
                    <div class="col-sm-1 col-xs-12 imgFooter">
                        <img src="../../img/icons/zion-logo.jpg" style="border-radius: 8px;" class="vngIcon" alt="">
                    </div>
                    <div class="col-sm-9 col-xs-12 infoFooter">
                        <span>TIX - SẢN PHẨM CỦA CÔNG TY CỔ PHẦN ZION</span>
                        <span>Địa chỉ: Z06 Đường số 13, Phường Tân Thuận Đông, Quận 7, Tp. Hồ Chí Minh, Việt
                            Nam.</span>
                        <span>Giấy chứng nhận đăng ký kinh doanh số: 0101659783,
                            <br>
                            đăng ký thay đổi lần&nbsp;thứ&nbsp;30,
                            ngày&nbsp;22&nbsp;tháng&nbsp;01&nbsp;năm&nbsp;2020 do
                            Sở&nbsp;kế&nbsp;hoạch&nbsp;và&nbsp;đầu&nbsp;tư Thành phố Hồ Chí Minh cấp.
                        </span>
                        <span>
                            Số Điện Thoại (Hotline): 1900&nbsp;545&nbsp;436<br>Email: <a href="mailto:support@tix.vn"
                                style="color: #FB4226;">support@tix.vn</a>
                        </span>
                    </div>
                    <div class="col-sm-2 col-xs-12 imgFooter">
                        <a href="http://online.gov.vn/Home/WebDetails/62782">
                            <img src="../../img/icons/d1e6bd560daa9e20131ea8a0f62e87f8.png" class="imgBoCo" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //footer -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script> -->
    <!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
    <!-- <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script> -->
<!-- js -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   
    


    
   
   <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/slick-carousel/slick/slick.js"></script>
    <script src="../../node_modules/slick-carousel/slick/slick.min.js"></script>
    <script src="jquery.min.js"></script>
   

    <script src="../../node_modules/jquery/src/jquery.js"></script>
   
   
    
   






</body>

</html>