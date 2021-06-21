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
                            <div class="page-header-content d-flex align-items-center justify-content-between text-white">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="chevrons-up"></i></div>
                                    <span>Categories</span>
                                </h1>
                                <a href="new-category.php" title="Add new category" class="btn btn-white">
                                    <div class="page-header-icon"><i data-feather="plus"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--Table-->
                    <div class="container-fluid mt-n10">

                        <div class="card mb-4">
                            <div class="card-header">All Categories</div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category Name</th>
                                                <th>Total Posts</th>
                                                
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                $sql = "SELECT * FROM catagories";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                while($categories = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    // category_id, category_name, category_total_posts, category_status, created_by
                                                    $category_id = $categories['category_id'];
                                                    $category_name = $categories['category_name'];
                                                    $category_total_posts = $categories['category_total_posts'];
                                                    $category_status = $categories['category_status'];
                                                    $created_by = $categories['created_by']; ?>
                                                    <tr>
                                                        <td><?php echo $category_id; ?></td>
                                                        <td>
                                                            <a href="../categories.php?category_id=<?php echo $category_id; ?>&category_name=<?php echo $category_name; ?>" target="_blank">
                                                                <?php echo $category_name; ?>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $category_total_posts; ?></td>
                                                        <td><?php echo $created_by; ?></td>
                                                        <td>
                                                            <?php 
                                                                if($category_status == 'published') { ?>
                                                                    <div class="badge badge-success"><?php echo $category_status; ?></div>
                                                               <?php } else { ?>
                                                                    <div class="badge badge-warning"><?php echo $category_status; ?></div>
                                                               <?php }
                                                            ?>
                                                            
                                                        </td>
                                                        <td>
                                                            <form action="edit-category.php" method="POST">
                                                                <input type="hidden" name="edit-id" value="<?php echo $category_id ?>" />
                                                                <button name="edit" type="submit" class="btn btn-blue btn-icon"><i data-feather="edit"></i></button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                        <?php 
                                                                if (isset($_POST['delete-category'])) {
                                                                    $sql = "DELETE FROM catagories WHERE category_id = :id";
                                                                    $stmt = $pdo->prepare($sql);
                                                                    $stmt->execute([
                                                                        ':id' => $_POST['id']
                                                                    ]);
                                                                    header("Location: categories.php");
                                                                }
                                                            ?>
                                                            <?php 
                                                                if($category_total_posts == 0) { ?>
                                                                    <form action="categories.php" method="POST">
                                                                        <input type="hidden" name="id" value="<?php echo $category_id; ?>" />
                                                                        <button name="delete-category" class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                                                    </form>  
                                                                <?php } else { ?>
                                                                    <button title="You can't delete category having a post!" name="delete-category" class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                                                <?php }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            ?> 
                                            <!-- <tr>
                                                <td>1</td>
                                                <td>
                                                    <a href="#">
                                                        Lifestyle
                                                    </a>
                                                </td>
                                                <td>20</td>
                                                <td>61</td>
                                                <td>Md. A. Barik</td>
                                                <td>
                                                    <div class="badge badge-success">Published
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-blue btn-icon"><i data-feather="edit"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                                </td>
                                            </tr>     
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                    <a href="#">
                                                        Loved
                                                    </a>
                                                </td>
                                                <td>20</td>
                                                <td>61</td>
                                                <td>Md. A. Barik</td>
                                                <td>
                                                    <div class="badge badge-success">Published
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-blue btn-icon"><i data-feather="edit"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>
                                                    <a href="#">
                                                        Programming
                                                    </a>
                                                </td>
                                                <td>20</td>
                                                <td>61</td>
                                                <td>Md. A. Barik</td>
                                                <td>
                                                    <div class="badge badge-success">Published
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-blue btn-icon"><i data-feather="edit"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                                </td>
                                            </tr>      -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    
                    </div>
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
