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


            <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="layout"></i></div>
                                    <span>All Posts</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">All Posts</div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên Phim</th>
                                                <th>Status</th>
                                                <th>Category</th>
                                                
                                                <th>Image</th>
                                                <th>Khởi chiếu</th>
                                                
                                                
                                              
                                                
                                                <!-- <th>Edit</> -->
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>ID</th>
                                                <th>Tên Phim</th>
                                                <th>Status</th>
                                                <th>Category</th>
                                                
                                                <th>Image</th>
                                                <th>Khởi chiếu</th>
                                                
                                                    
                                              
                                                
                                                <!-- <th>Edit</> -->
                                                <th>Delete</th>
                                            </tr>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
                                                if(isset($_POST['delete-post'])) {
                                                    $phim_id = $_POST['phim-id'];
                                                    $sql = "DELETE FROM phim WHERE phim_id = :id";
                                                    $stmt = $pdo->prepare($sql);
                                                    $stmt->execute([
                                                        ':id' => $phim_id
                                                    ]);
                                                    header("Location: ./all-post.php");
                                                }
                                            ?>


                                        <?php 
                                                $sql = "SELECT * FROM phim";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                while($phim = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    
                                                    $phim_id = $phim['phim_id'];
                                                    $phim_category_id = $phim['phim_category_id'];
                                                    
                                                    $sql1 = "SELECT * FROM catagories WHERE category_id = :id";
                                                    $stmt1 = $pdo->prepare($sql1);
                                                    $stmt1->execute([':id'=>$phim_category_id]);
                                                    $cat = $stmt1->fetch(PDO::FETCH_ASSOC);
                                                    $category_title = $cat['category_name'];

                                                    $phim_ten = $phim['phim_ten'];
                                                    
                                                    $phim_img = $phim['phim_img'];
                                                    $phim_ngaychieu = $phim['phim_ngaychieu'];
                                                    $phim_status = $phim['phim_status'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $phim_id; ?></td>
                                                        <td>
                                                            <a href="../single.php?post_id=<?php echo $phim_id ?>" target="_blank"><?php echo $phim_ten; ?></a>
                                                        </td>
                                                        <td>
                                                            <div class="badge badge-<?php echo $phim_status=='Published'?'success':'warning'; ?>"><?php echo $phim_status; ?></div>
                                                        </td>
                                                        <td><?php echo $category_title; ?></td>
                                                        <!-- <td><?php echo $post_author; ?></td> -->
                                                        <td>
                                                            <img src="../img/filmBlock/<?php echo $phim_img; ?>" width="50" height="50" />
                                                        </td>
                                                        <td><?php echo $phim_ngaychieu; ?></td>
                                                        <!-- <td><?php echo $post_details; ?></td> -->
                                                        <!-- <td><?php echo $post_tags; ?></td> -->
                                                        <!-- <td>
                                                            <a href="comments.php"><?php echo $post_comment_count; ?></a>
                                                        </td> -->
                                                        <!-- <td><?php echo $post_views; ?></td> -->
                                                        <!-- <td>
                                                            <form action="edit-post.php" method="POST">
                                                                <input type="hidden" value="<?php echo $phim_id; ?>" name="phim-id" />
                                                                <button name="edit-post" type="submit" class="btn btn-blue btn-icon"><i data-feather="edit"></i></button>
                                                            </form>
                                                        </td> -->
                                                        <td>
                                                            <form action="./all-post.php" method="POST">
                                                                <input type="hidden" name="phim-id" value="<?php echo $phim_id; ?>" />
                                                                <button name="delete-post" type="submit" class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            ?>
                                            <!-- <tr>
                                                <td>1</td>
                                                <td>
                                                    <a href="#">I Love You!</a>
                                                </td>
                                                <td>
                                                    <div class="badge badge-success">Published
                                                    </div>
                                                </td>
                                                <td>Love</td>
                                                <td>Md. A. Barik</td>
                                                <td>Image</td>
                                                <td>17 Nov 2020</td>
                                                <td>Post details</td>
                                                <td>Important Tags</td>
                                                <td>
                                                    <a href="comments.html">2</a>
                                                </td>
                                                <td>100</td>
                                                <td>
                                                    <button class="btn btn-blue btn-icon"><i data-feather="edit"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                                </td>
                                            </tr>   -->
                                            <!-- <tr>
                                                <td>2</td>
                                                <td>
                                                    <a href="#">I Love You!</a>
                                                </td>
                                                <td>
                                                    <div class="badge badge-warning">Draft
                                                    </div>
                                                </td>
                                                <td>Love</td>
                                                <td>Md. A. Barik</td>
                                                <td>Image</td>
                                                <td>17 Nov 2020</td>
                                                <td>Post details</td>
                                                <td>Important Tags</td>
                                                <td>
                                                    <a href="comments.html">2</a>
                                                </td>
                                                <td>100</td>
                                                <td>
                                                    <button class="btn btn-blue btn-icon"><i data-feather="edit"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                                </td>
                                            </tr>                      -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->

                </main>

                <!--start footer-->
                <!-- <footer class="footer mt-auto footer-light">
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
                </footer> -->
                <!--end footer-->
            </div>
        </div>

        <!--Script JS-->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
