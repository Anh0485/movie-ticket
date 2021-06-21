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
                                    <div class="page-header-icon"><i data-feather="activity"></i></div>
                                    <span>Dashboard</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <!--Table-->
                    <div class="container-fluid mt-n10">

                    <!--Card Primary-->
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>All Posts</p>
                                    <?php
                                        $sql = "SELECT * FROM phim where phim_status = :status";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute([':status'=>'published']);
                                        $post_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $post_count?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="./all-post.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Comments</p>
                                    <p>32</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>CATEGORY</p>
                                    <?php
                                        $sql = "SELECT * FROM catagories ";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        $category_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo  $category_count?></p>
                                    
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="./categories.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Pages</p>
                                    <p>32</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!--Card Primary-->

                        <div class="card mb-4">
                            <div class="card-header">Phim </div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên Phim</th>
                                                <th>Phim Category</th>
                                               
                                                <th>Photo</th>
                                                
                                                <th>Posted On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                              $sql = "SELECT * from phim where phim_status = :status";
                                              $stmt = $pdo->prepare($sql);
                                              $stmt-> execute([
                                                    ':status' => 'published'
                                            ]);      
                                              while($phim = $stmt-> fetch(PDO::FETCH_ASSOC)){
                                                $phim_id = $phim['phim_id'];
                                                $phim_ten = $phim['phim_ten'];
                                                $phim_ngaychieu = $phim['phim_ngaychieu'];
                                                $phim_ageType = $phim['phim_ageType'];
                                                $phim_img = $phim['phim_img'];
                                                $phim_infoFilm = $phim['phim_infoFilm'];
                                                $phim_category_id=$phim['phim_category_id'];
                                                
                                                $sql1 = "SELECT * FROM catagories WHERE category_id = :id";
                                                $stmt1 = $pdo->prepare($sql1);
                                                $stmt1->execute([':id'=>$phim_category_id]);
                                                $category = $stmt1->fetch(PDO::FETCH_ASSOC);
                                                $category_title = $category['category_name'];?>
                                                    <tr>
                                                        <td><?php echo $phim_id; ?></td>
                                                        <td>
                                                            <a href="#" target="_blank">
                                                                <?php echo $phim_ten;?>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $category_title;?></td>
                                                        
                                                        <td><img src="../img/filmBlock/<?php echo $phim_img?>" height="50" width="50"></td>
                                                        
                                                        <td><?php echo $phim_ngaychieu?></td>
                                                    </tr> 
                                                <?php

                                              }                                         
                                        ?>
                                                
                                            <!-- <tr>
                                                <td>2</td>
                                                <td>
                                                    <a href="#">
                                                        I Love You!
                                                    </a>
                                                </td>
                                                <td>Love</td>
                                                <td>61</td>
                                                <td>Photo</td>
                                                <td>MD. A. Barik</td>
                                                <td>17 Nov 20</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>
                                                    <a href="#">
                                                        I Love You!
                                                    </a>
                                                </td>
                                                <td>Love</td>
                                                <td>61</td>
                                                <td>Photo</td>
                                                <td>MD. A. Barik</td>
                                                <td>17 Nov 20</td>
                                            </tr>      -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->

                </main>
<?php require_once('./includes/footer.php')?>
               