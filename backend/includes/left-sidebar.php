                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <?php
                                if($curr_page == 'index.php') { ?>
                                    <a class="nav-link collapsed pt-4 active" href="index.php">
                                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                        Dashboard
                                    </a>
                                <?php } else { ?>
                                    <a class="nav-link collapsed pt-4" href="index.php">
                                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                        Dashboard
                                    </a>
                                <?php }
                                
                            ?>

                            <?php 
                                if($curr_page == 'all-posts.php' || $curr_page = 'new-page.php' || $curr_page == 'edit-post.php') { ?>
                                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="true" aria-controls="collapseLayouts"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                                        Posts
                                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse show" id="collapseLayouts" data-parent="#accordionSidenav">
                                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                            <a class="nav-link" href="./all-post.php">All Posts</a>
                                            <a class="nav-link" href="./add-new.php">Add New Post</a>
                                        </nav>
                                    </div>
                            <?php } else { ?>
                                    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                                        Posts
                                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                            <a class="nav-link" href="./all-post.php">All Posts</a>
                                            <a class="nav-link" href="./add-new.php">Add New Post</a>
                                        </nav>
                                    </div>
                            <?php }
                            ?>

                            
                            <!-- <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                                Posts
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                    <a class="nav-link" href="all-post.php">All Posts</a>
                                    <a class="nav-link" href="add-new.php">Add New Post</a>
                                </nav>
                            </div> -->
                            <?php 
                                if($curr_page == 'new-category.php' || $curr_page == 'categories.php') { ?>
                                    <a class="nav-link active" href="categories.php" ><div class="nav-link-icon"><i data-feather="chevrons-up"></i></div>
                                        Categories
                                    </a>
                                        <?php } else { ?>
                                                <a class="nav-link " href="categories.php" ><div class="nav-link-icon"><i data-feather="chevrons-up"></i></div>
                                                    Categories
                                                </a>
                                        <?php }
                            ?>

                            <!-- <a class="nav-link" href="categories.php" ><div class="nav-link-icon"><i data-feather="chevrons-up"></i></div>
                                Categories
                            </a> -->

                            <!-- <a class="nav-link" href="pages.html" ><div class="nav-link-icon"><i data-feather="book-open"></i></div>
                                Pages
                            </a>

                            <a class="nav-link" href="users.html" ><div class="nav-link-icon"><i data-feather="users"></i></div>
                                Users
                            </a>

                            <a class="nav-link" href="comments.html" ><div class="nav-link-icon"><i data-feather="package"></i></div>
                                Comments
                            </a>

                            <a class="nav-link" href="messages.html" ><div class="nav-link-icon"><i data-feather="mail"></i></div>
                                Messages
                            </a>

                            <a class="nav-link" href="profile.html" ><div class="nav-link-icon"><i data-feather="user"></i></div>
                                Profile
                            </a> -->
                        </div>
                    </div>

                    <!-- <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as:</div>
                            <div class="sidenav-footer-title">Md. A. Barik</div>
                        </div>
                    </div> -->
                                
                </nav>