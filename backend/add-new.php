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
                require_once('./includes/left-sidebar.php');?>
            </div>
            </div>


            <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                    <span>Try Creating New Post</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <?php 
                        if(isset($_COOKIE['_uid_'])) {
                            $user_id = base64_decode($_COOKIE['_uid_']);
                        } else if(isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];
                        } else {
                            $user_id = -1;
                        }
                        $sql = "SELECT * FROM users WHERE user_id = :id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([
                            ':id' => $user_id
                        ]);
                        $user = $stmt->fetch(PDO::FETCH_ASSOC);
                        $user_name = $user['user_name'];
                    ?>

<?php 

if(isset($_POST['new-phim'])) {
    $phim_ten = trim($_POST['phim-ten']);
    $phim_status = $_POST['phim-status'];
    $phim_category_id = $_POST['phim-category'];
    $phim_photo = $_FILES['phim-photo']['name'];
    $phim_photo_tmp = $_FILES['phim-photo']['tmp_name'];
    move_uploaded_file("{$phim_photo_tmp}", "../../img/{$phim_photo}");
    $phim_ngaychieu = date('Y-m-d', strtotime($_POST['phim-date']));
    
    $sql = "INSERT INTO phim (phim_category_id, phim_ten, phim_img, phim_ngaychieu, phim_status)
    VALUES (:id, :title, :image, :ngay, :status)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $phim_category_id,
        ':title' => $phim_ten,
        // ':detail' => $post_detail,
        ':image' => $phim_photo,
        ':ngay' => $phim_ngaychieu,
        ':status' => $phim_status,
        
        
    ]);
    header("Location: all-post.php");
}
?>

                    <!--Start Form-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">Thêm Phim</div>
                            <div class="card-body">
                                <form action="add-new.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="phim-ten">Tên phim</label>
                                        <input name="phim-ten" class="form-control" id="phim-ten" type="text" placeholder="Tên phim ..." />
                                    </div>
                                    <div class="form-group">
                                        <label for="phim-status">Phim Status:</label>
                                        <select name="phim-status" class="form-control" id="phim-status">
                                            <option value="Published">Published</option>
                                            <option value="Draft">Draft</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="select-category">Select Category:</label>
                                        <select name="phim-category" class="form-control" id="select-category">
                                            <?php 
                                                $sql = "SELECT * FROM catagories WHERE category_status = :status";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute([
                                                    ':status' => 'Published'
                                                ]);
                                                while($cats = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $cats['category_id']; ?>"> 
                                                        <?php echo $cats['category_name']; ?> 
                                                    </option>
                                               <?php }
                                            ?>
                                        </select>
                                    </div>

                                        <div class="form-group">
                                            <label for="phim-date">Khởi chiếu</label>
                                            <input name="phim-date" class="form-control" id="phim-ten" type="date" />
                                        </div>
                                    <div class="form-group">    
                                        <label for="post-title">Choose photo:</label>
                                        <input name="phim-photo" class="form-control" id="phim-ten" type="file" />
                                    </div>
                                    

                                   

                                   
                                    <button name="new-phim" class="btn btn-primary mr-2 my-1" type="submit">Submit now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Form-->

                </main>

                <!--start footer-->
                <?php require_once('./includes/footer.php')?>                