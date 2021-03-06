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
            <a href="#filmblock" class="menu titleDisplay homeMovies white">L???ch Chi???u</a>
            <a href="#cinemablock" class="menu titleDisplay homeCinemaComplex white">C???m r???p</a>
            <a href="#newsblock" class="menu titleDisplay homeNews white">Tin T???c</a>
            <a href="#appblock" class="menu titleDisplay wrapHomeApp white">???ng d???ng</a>
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
                    <p class="white" style="display: inline-block;">????ng Nh???p</p>
                </a>
            </div> -->
            <!-- <div class="selectLocation">
                <img src="../../img/icons/dinhvi.png" class="placeheader">
                <div class="dropdown-toggle selectMenu" style="top: 45px;
                left: -10px;">H??? Ch?? Minh</div>
                <ul class="dropdown-menu selectScroll">
                    <li class="ng-scope">
                        <a href="" class="ng-binding">H??? Ch?? Minh</a>
                    </li>
                    <li class="ng-scope">
                        <a href="" class="ng-binding">H?? N???i</a>
                    </li>
                    <li class="ng-scope">
                        <a href="" class="ng-binding">???? N???ng</a>
                    </li>
                    <li class="ng-scope">
                        <a href="" class="ng-binding">H???i Ph??ng</a>
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
                <li><a class="dropdown-item" href="#">Mortal Kombat - Cu???c Chi???n Sinh T??? (C18)</a></li>
                <li><a class="dropdown-item" href="#">L???t M???t: 48h</a></li>
                <li><a class="dropdown-item" href="#">Ng?????i Nh??n B???n - Seobok (C16)</a></li>
            </ul>
        </div>

        <div class="dropdown widthByPercent">
            <button class="btn btn-secondary dropdown-toggle selectMenu" type="button" id="dropdownMenuButton2"
                data-bs-toggle="dropdown" aria-expanded="false">
                R???p
                <!-- <i class="fas fa-chevron-down"></i> -->
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item" href="#">Vui l??ng ch???n phim</a></li>

            </ul>
        </div>
        <div class="dropdown widthByPercent">
            <button class="btn btn-secondary dropdown-toggle selectMenu" type="button" id="dropdownMenuButton2"
                data-bs-toggle="dropdown" aria-expanded="false">
                Ng??y xem
                <!-- <i class="fas fa-chevron-down"></i> -->
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item" href="#">Vui l??ng ch???n phim v?? r???p</a></li>

            </ul>
        </div>
        <div class="dropdown widthByPercent">
            <button class="btn btn-secondary dropdown-toggle selectMenu" type="button" id="dropdownMenuButton2"
                data-bs-toggle="dropdown" aria-expanded="false">
                Su???t chi???u
                <!-- <i class="fas fa-chevron-down"></i> -->
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item" href="#">Vui l??ng ch???n phim, r???p v?? ng??y xem</a></li>

            </ul>
        </div>
        <div class=" widthByPercent">
            <button id="btnBuy" class="btn btn-primary widthByPercent">
                MUA V?? NGAY
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
                    font-size: 25px;">??ang Chi???u</a>
                </li>
                <li style="margin-left:5px;">
                    <a href="" data-toggle="tab" data-target="#upComingFilms" aria-expanded="false" style="font-weight: 700;
                    font-size: 25px;">
                        S???p Chi???u
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
                                                        class="buyNow showingDetail">MUA V??</a>
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
                                                    L???t M???t: 48h
                                                </div>
                                                <div class="infoFilm hideHover">
                                                    100 ph??t
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA V??</a>
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
                                                    100 ph??t - 6.5 IMDb
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA V??</a>
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
                                                    Ng?????i Nh??n B???n - Seobok (C16)
                                                </div>
                                                <div class="infoFilm hideHover">
                                                    114 ph??t - 6.4 IMDb
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA V??</a>
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
                                                    B??n Tay Di???t Qu??? - Evil Expeller (C16)
                                                </div>
                                                <div class="infoFilm hideHover">
                                                    129 ph??t
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA V??</a>
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
                                                    Ong Nh?? Phi??u L??u K??: Gi???i C???u C??ng Ch??a Ki???n - Maya The Bee 3: The
                                                    Golden Orb - P
                                                </div>
                                                <div class="infoFilm hideHover">
                                                    129 ph??t
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA V??</a>
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
                                                    Detective Conan: Scarlet Bullet - Th??m T??? L???ng Danh Conan: Vi??n ?????n
                                                    ????? - C13
                                                </div>
                                                <div class="infoFilm hideHover">
                                                    110 ph??t - 7 IMDb
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA V??</a>
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
                                                    Detective Conan: Scarlet Bullet - Th??m T??? L???ng Danh Conan: Vi??n ?????n
                                                    ????? - C13
                                                </div>
                                                <div class="infoFilm hideHover">
                                                    110 ph??t - 7 IMDb
                                                </div>
                                                <div class="showHover">
                                                    <a href="../../log-in/html/login.php"
                                                        class="buyNow showingDetail">MUA V??</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- 21/4 x??a transform  -->
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
    <!-- 20/4 ch???nh s???a transform: translate3d -->
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
                                Hai B?? Tr??ng
                            </span>
                            <span class="infoMovieCinema">135 Hai B?? Tr??ng, B???n Ngh??, Q1</span>
                            <span class="redDetail showingDetailCinema" data-id="169">
                                <a href="https://tix.vn/rap-chieu-phim/169-cinestar-hai-ba-trung">
                                    [Chi ti???t]
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
                                - Qu???c Thanh
                            </span>
                            <span class="infoMovieCinema">271 Nguy???n Tr??i, Q.1</span>
                            <span class="redDetail showingDetailCinema" data-id="97">
                                <a href="https://tix.vn/rap-chieu-phim/169-cinestar-hai-ba-trung">
                                    [Chi ti???t]
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
                                    <span class="movieTitle">L???t M???t: 48h</span>
                                </p>
                                <p class="">100 ph??t - TIX 8.9 - IMDb 0</p>
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
                    <a data-toggle="tab" data-target="#showingNews" aria-expanded="true">??i???n ???nh 24h</a>
                    <div class="wing wingLeft"></div>
                    <div class="wing wingRight"></div>
                </li>
                <li>
                    <a data-toggle="tab" data-target="#showingReview" aria-expanded="false">Review</a>
                    <div class="wing wingLeft"></div>
                    <div class="wing wingRight"></div>
                </li>
                <li>
                    <a data-toggle="tab" data-target="#showingPromotion" aria-expanded="false">Khuy???n M??i</a>
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
                                ???n ?????nh ch???c n???ch ng??y kh???i chi???u 16.04, L?? H???i tung clip L???t M???t: 48H ?????m ch???t
                            </p>
                        </a>
                        <p class="newsDescription">
                            Tr?????c th???m kh???i chi???u 16.04 n??y, L?? H???i b???t ng??? tung clip r?????t ??u???i gay c???n th??t tim fans
                            h??m m???
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
                                [MORTAL KOMBAT: CU???C CHI???N SINH T???] - G???I T??N NH???NG PHIM ??I???N ???NH N???I TI???NG ???????C CHUY???N
                                TH??? T??? C??C T???A GAME ????NH ????M
                            </p>
                        </a>
                        <p class="newsDescription">
                            B??n c???nh nh???ng k???ch b???n g???c m???i m??? v?? ?????y b???t ng???, Hollywood c??ng kh??ng thi???u nh???ng t??c ph???m
                            ????nh ????m ???????c chuy???n th??? t??? ti???u thuy???t, phim ho???t h??nh, hay th???m ch?? l?? c??? tr?? ch??i ??i???n
                            t???.
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
                                PROMISING YOUNG WOMAN | B??ng h???ng n?????c Anh Carey Mulligan v?? m??n tr??? th?? ????n ??ng ????? ?????i
                            </p>
                        </a>
                        <p class="newsDescription">
                            ????? c??? gi???i Oscar danh gi?? v???a g???i t??n Carey Mulligan ??? h???ng m???c n??? ch??nh xu???t s???c nh???t cho
                            vai di???n "?????m m??u" nh???t s??? nghi???p c???a c?? trong phim Promising Young Woman (t???a Vi???t: C?? G??i
                            Tr??? H???a H???n).
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
                                V???A ?????P L???I V???A T??I N??NG, D??N SAO NAM C???A PHIM ???B??N TAY DI???T QU?????? ?????M B???O ?????N TIM H???I
                                CH??? EM
                            </p>
                        </a>
                        <p class="newsDescription">
                            Quy t??? 3 nam t??i t??? v???a ??i???n trai, v???a ???????c ????nh gi?? cao v??? n??ng l???c di???n xu???t l?? Park Seo
                            Joon, Woo Do Hwan v?? Choi Woo Sik, t??c ph???m kinh d??? ??? h??nh ?????ng ???B??n Tay Di???t Qu?????? h???a h???n
                            s??? l??m cho h???i ch??? em ph???i m?? m???n v??o th??ng t???i.
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
                                <img src="../../img/icons/r???p.jpg" alt="">
                            </a>
                        </div>
                        <a href="https://tix.vn/goc-dien-anh/7961-khai-truong-rap-xin-gia-ngon-chuan-xi-tai-sai-gon">
                            <p class="newsTitle">
                                Khai tr????ng r???p x???n gi?? ngon, chu???n x??-tai S??i G??n
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
                                ???B??c tem??? t??? h???p gi???i tr?? m???i toanh c???a gi???i H?? Th??nh
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
                                Ti???c Tr??ng M??u ch??nh th???c c??n m???c 100 t??? ch??? sau 2 tu???n c??ng chi???u
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
                                NG?? THANH V??N CH??NH TH???C KH???I ?????NG CU???C THI THI???T K??? TRANG PH???C CHO SI??U ANH H??NG ?????U
                                TI??N C???A VI???T NAM ??? VINAMAN
                            </p>
                        </a>


                    </div>
                    <div class="wrapButtonSeeMoreNews">
                        <button class="btnViewMore">XEM TH??M</button>
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
                                Review: T??n T??ch Qu??? ??m (Relic) - Ba th??? h??? v?? m???i li??n k???t
                            </p>
                        </a>
                        <p class="newsDescription">
                            ??i???m nh???n c???a phim kinh d??? n??m 2020 ch??nh l?? T??n T??ch Qu??? ??m
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
                                Review: Dinh Th??? Oan Khu???t (Ghost Of War)
                            </p>
                        </a>
                        <p class="newsDescription">
                            Tuy l?? m???t b??? phim c?? ch???t l?????ng t???t, nh??ng c?? v??? Dinh Th??? Oan Khu???t v???n ch??a ????? ????? ??em kh??n
                            gi??? tr??? l???i ph??ng v??!
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
                                ???BlacKkKlansman??? - c???c n?????c l???nh ????? ng?????i M??? th???c t???nh
                            </p>
                        </a>
                        <p class="newsDescription">
                            T??c ph???m nh???n ????? c??? Phim truy???n xu???t s???c t???i Oscar 2019 c???a ?????o di???n Spike Lee l?? m???t l??t
                            c???t n???a v??? n???n ph??n bi???t ch???ng t???c - n???i ??au g??y nh???c nh???i n?????c M??? cho t???i t???n h??m nay.
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
                                American Sniper - Ch??nh ngh??a hay phi ngh??a?
                            </p>
                        </a>
                        <p class="newsDescription">
                            American Sniper kh???c h???a m???t tay s??ng b???n t???a ???huy???n tho???i??? c???a H???i qu??n M??? v???i 4 l???n tham
                            chi???n ??? Trung ????ng. C??u chuy???n phim ch???m r??i ????a ng?????i xem qua t???ng th???i kh???c kh??c nhau c???a
                            Kyle, t??? th???a nh???, thi???u ni??n, r???i gia nh???p qu??n ?????i, r???i tham chi???n. T???ng kho???nh kh???c b???t
                            ?????u nh??? nh??ng...
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
                                COVID-19 l?? b???n ch??nh th???c c???a MEV-1 phim contagion (2011)
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
                                [Review] Si??u V??? S?? S??? V??? - Gi???i c???u T???ng th???ng ch??a bao gi??? l???y l???i v?? h??i h?????c ?????n th???
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
                                [Review] Bloodshot - M??? m??n ???n t?????ng cho V?? tr??? Si??u anh h??ng Valiant
                            </p>
                        </a>


                    </div>
                    <div class="wrapButtonSeeMoreNews">
                        <button class="btnViewMore">XEM TH??M</button>
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
                                BHD 59K/V?? C??? TU???N !!!
                            </p>
                        </a>
                        <p class="newsDescription">
                            T???n h?????ng ??u ????i l??n ?????n 3 V?? BHD Star m???i tu???n ch??? v???i gi?? 59k/v?? khi mua v?? tr??n TIX ho???c
                            M???c V?? Phim tr??n ZaloPay.
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
                                TIX 1K/V?? NG???I CHI GI?? V??
                            </p>
                        </a>
                        <p class="newsDescription">
                            ?????ng gi?? 1k/v?? c??? tu???n t???t c??? c??c r???p tr??n TIX + Nh???n th??m 02 voucher thanh to??n ZaloPay th???
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
                                ?????NG GI?? 1K/V?? KHI MUA V?? QUA TIX
                            </p>
                        </a>
                        <p class="newsDescription">
                            ?????NG GI?? 1K/V?? KHI MUA V?? QUA TIX

                            H??nh tr??nh t??m R??m v?? Ph??c ch??? v???i 1k c??? tu???n + nh???n th??m 02 voucher khi ?????t v?? qua TIX.
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
                                BHD STAR V?? CH??? 59.000?? C??? TU???N!
                            </p>
                        </a>
                        <p class="newsDescription">
                            T???n h?????ng ??u ????i l??n ?????n 3 V?? BHD Star m???i tu???n ch??? v???i gi?? 59k/v?? khi mua v?? tr??n TIX v??
                            thanh to??n b???ng ZaloPay ho???c M???c V?? Phim tr??n ZaloPay.
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
                                Beta Cineplex tr??? l???i v???i h??ng lo???t ??u ????i l???n
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
                                [123Phim] Th??? 6 Kh??ng ??en T???i - ??u ????i hu??? di???t 11k/v?? Anh Trai Y??u Qu??i
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
                                [123Phim] NH???P M?? 'PSM30K' - Gi???m ngay 30k khi ?????t v?? Ph??p S?? M??: Ai Ch???t Gi?? Tay
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
                                [Mega GS] M???t ??o?? hoa thay ng??n l???i y??u
                            </p>
                        </a>


                    </div>
                    <div class="wrapButtonSeeMoreNews">
                        <button class="btnViewMore">XEM TH??M</button>
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
                            <p class="textLeft">???ng d???ng ti???n l???i d??nh cho</p>
                            <p class="textLeft">ng?????i y??u ??i???n ???nh</p>
                            <br>
                            <p class="textSmallLeft">
                                Kh??ng ch??? ?????t v??, b???n c??n c?? th??? b??nh lu???n phim, ch???m ??i???m r???p v?? ?????i qu?? h???p d???n.
                            </p>
                            <br>
                            <button class="buttonLeft">App mi???n ph?? - T???i v??? ngay!</button>
                            <p class="textAppUnder">
                                TIX c?? hai phi??n b???n
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
                            <a href="">Th???a thu???n s??? d???ng</a>
                            <a href="">Ch??nh s??ch b???o m???t</a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12 hideOnMobile">
                        <p class="title">?????I T??C</p>
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
                        <span>TIX - S???N PH???M C???A C??NG TY C??? PH???N ZION</span>
                        <span>?????a ch???: Z06 ???????ng s??? 13, Ph?????ng T??n Thu???n ????ng, Qu???n 7, Tp. H??? Ch?? Minh, Vi???t
                            Nam.</span>
                        <span>Gi???y ch???ng nh???n ????ng k?? kinh doanh s???: 0101659783,
                            <br>
                            ????ng k?? thay ?????i l???n&nbsp;th???&nbsp;30,
                            ng??y&nbsp;22&nbsp;th??ng&nbsp;01&nbsp;n??m&nbsp;2020 do
                            S???&nbsp;k???&nbsp;ho???ch&nbsp;v??&nbsp;?????u&nbsp;t?? Th??nh ph??? H??? Ch?? Minh c???p.
                        </span>
                        <span>
                            S??? ??i???n Tho???i (Hotline): 1900&nbsp;545&nbsp;436<br>Email: <a href="mailto:support@tix.vn"
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