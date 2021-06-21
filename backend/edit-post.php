<?php require_once('./includes/header.php')?>

    <body class="nav-fixed">
        <?php
                require_once('./includes/top-navbar.php');
        ?>
        

        <!--Side Nav-->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
               <?php 
                $curr_page = basename(__FILE__); 
                require_once('./includes/left-sidebar.php');
            ?>
            </div>

            <?php 
                if(isset($_POST['edit-post'])) {
                    $phim_id = $_POST['phim-id'];
                    $url = "http://localhost:8888/bainhom/backend/edit-post.php?phim_id=".$phim_id;
                    header("Location: {$url}");
                }
            ?>


            <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                    <span>Try Updating Post</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <?php 
                        if(isset($_GET['phim_id'])) {
                            $phim_id = $_GET['phim_id'];
                            $sql = "SELECT * FROM phim WHERE phim_id = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute([
                                ':id' => $phim_id
                            ]);
                            $phim = $stmt->fetch(PDO::FETCH_ASSOC);
                            $phim_ten = $phim['phim_ten'];
                            $phim_status = $phim['phim_status'];
                            $phim_category_id = $phim['phim_category_id'];
                            $phim_ngaychieu = $phim['phim_ngaychieu'];
                            $phim_photo = $phim['phim_img'];
                            
                        }
                    ?>

                        <?php 

                        if(isset($_POST['update-now'])) {
                            $phim_ten = trim($_POST['post-title']);
                            $phim_status = $_POST['post-status'];
                            $phim_category_id = $_POST['post-category'];
                            $phim_photo = $_FILES['post-photo']['name'];
                            $phim_photo_tmp = $_FILES['post-photo']['tmp_name'];
                            $phim_ngaychieu = date('Y-m-d', strtotime($_POST['phim-date']));
                            move_uploaded_file("{$phim_photo_tmp}", "../../img/{$phim_photo}");
                            if(empty($phim_photo)) {
                                $sql2 = "SELECT * FROM phim WHERE phim_id = :id";
                                $stmt2 = $pdo->prepare($sql2);
                                $stmt2->execute([':id'=>$_GET['phim_id']]);
                                $phim = $stmt2->fetch(PDO::FETCH_ASSOC);
                                $phim_photo = $phim['phim_img'];
                            }
                        
                            $sql1 = "UPDATE phim SET phim_ten = :title, 
                            phim_status = :status, 
                            phim_category_id = :cat_id, 
                            phim_ngaychieu = :ngay,
                            phim_img = :image, 
                            WHERE phim_id = :id";
                            $stmt = $pdo->prepare($sql1);
                            $stmt->execute([
                                ':title' => $phim_ten,
                                ':status' => $phim_status,
                                ':cat_id' => $phim_category_id,
                                ':image' => $phim_photo,
                                ':ngay' => $phim_ngaychieu,
                                ':id' => $_GET['phim_id']
                            ]);
                            header("Location: ./all-post.php");
                        }
                        ?>

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">Update Post</div>
                            <div class="card-body">
                                <form action="edit-post.php?phim_id=<?php echo $_GET['phim_id'] ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="post-title">Post Title:</label>
                                        <input name="post-title" value="<?php echo $phim_ten; ?>" class="form-control" id="post-title" type="text" placeholder="Post title ..." />
                                    </div>
                                    <div class="form-group">
                                        <label for="post-status">Post Status:</label>
                                        <select name="post-status" class="form-control" id="post-status">
                                            <option value="Published" <?php echo $phim_status == "Published"?"selected":""; ?>>Published</option>
                                            <option value="Draft" <?php echo $phim_status != "Published"?"selected":""; ?>>Draft</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="select-category">Select Category:</label>
                                        <select name="post-category" class="form-control" id="select-category">
                                            <?php 
                                                $sql = "SELECT * FROM catagories WHERE category_status = :status";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute([
                                                    ':status' => 'Published'
                                                ]);
                                                while($cats = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $cats['category_id']; ?>" <?php echo $cats['category_id']==$phim_category_id?"selected":""; ?>> 
                                                        <?php echo $cats['category_name']; ?> 
                                                    </option>
                                               <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="phim-date">Khởi chiếu</label>
                                        <input name="phim-date" value="<?php echo $phim_ngaychieu ?>" 
                                        lass="form-control" id="post-title" type="date" 
                                        
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="post-title">Choose photo:</label>
                                        <input name="post-photo" class="form-control" id="post-title" type="file" />
                                       
                                    </div>

                                    

                                    
                                    
                                    <button name="update-now" class="btn btn-primary mr-2 my-1" type="submit">Submit now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->

                </main>

                <!--start footer-->
                <footer class="footer mt-auto footer-light">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &#xA9; TechBarik 2020</div>
                            <div class="col-md-6 text-md-right small">
                                <a href="#!">Privacy Policy</a>
                                &#xB7;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!--end footer-->
            </div>
        </div>

        <!--Script JS-->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
