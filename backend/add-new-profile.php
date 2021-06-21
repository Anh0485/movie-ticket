<?php require_once('./includes/header.php')?>
    <body class="nav-fixed">
        <?php
                require_once('./includes/top-navbar.php');
        ?>

        <!--Side Nav-->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <a class="nav-link collapsed pt-4" href="index.html">
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                                Posts
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                    <a class="nav-link" href="all-post.html">All Posts</a>
                                    <a class="nav-link" href="add-new.html">Add New Post</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="categories.html" ><div class="nav-link-icon"><i data-feather="chevrons-up"></i></div>
                                Categories
                            </a>

                            <a class="nav-link" href="pages.html" ><div class="nav-link-icon"><i data-feather="book-open"></i></div>
                                Pages
                            </a>

                            <a class="nav-link" href="comments.html" ><div class="nav-link-icon"><i data-feather="package"></i></div>
                                Comments
                            </a>

                            <a class="nav-link" href="messages.html" ><div class="nav-link-icon"><i data-feather="mail"></i></div>
                                Messages
                            </a>

                            <a class="nav-link" href="profile.html" ><div class="nav-link-icon"><i data-feather="user"></i></div>
                                Profile
                            </a>
                        </div>
                    </div>

                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as:</div>
                            <div class="sidenav-footer-title">Md. A. Barik</div>
                        </div>
                    </div>

                </nav>
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
                </main>

                <?php require_once('./includes/footer.php')?>               