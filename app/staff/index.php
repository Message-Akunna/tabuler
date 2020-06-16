<?php 
    include_once("auth/index.php");
    include_once("../api-call.php");
    function get_stats($table, $query){
        $stats = callAPI('GET', $table.'/list'.$query, false)['list_total'];
        return $stats;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once("../include/meta-tags.php"); ?>
        <title>Dashboard &mdash; Welcome to Tabuler</title>
        <?php include_once("../include/links.php"); ?>
    </head>
    <body>
        <!-- Preloader -->
        <?php include_once("../include/preloader.php"); ?>
        <!-- Sidebar -->
        <aside class="sidebar sidebar-expand-lg sidebar-color-brown sidebar-icons-boxed sidebar-light">
            <?php include_once('../include/sidebar.php') ?>
        </aside>
        <!-- END Sidebar -->
        
        <!-- Topbar -->
        <header class="topbar">
            <?php include_once('../include/header.php') ?>
        </header>
        <!-- END Topbar -->


        <!-- Main container -->
        <main class="main-container">
            <div class="main-content pt-30 ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            
                            <!-- Col-starts -->
                            <div class="col-md-4">
                                <div class="card shadow-1">
                                    <div class="card-body">
                                        <div class="flexbox">
                                            <h5>Staffs</h5>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ti-more-alt rotate-90"></i></span>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="users?users=staff"><i class="ion-android-list"></i> Details</a>
                                                    <a class="dropdown-item" href="users"><i class="ion-android-add"></i> Add new</a>
                                                    <a class="dropdown-item" href="index"><i class="ion-android-refresh"></i> Refresh</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center my-2">
                                            <div class="fs-40 fw-400 text-danger"><?=(get_stats('user','?column=user_type&keyword=staff'))?></div>
                                            <span class="fw-400 text-muted">Total</span>
                                        </div>
                                    </div>

                                    <div class="progress mb-0">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- col-ends -->
                            <!-- Col-starts -->
                            <div class="col-md-4">
                                <div class="card shadow-1">
                                    <div class="card-body">
                                        <div class="flexbox">
                                            <h5>Lecturer</h5>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ti-more-alt rotate-90"></i></span>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="users?users=lecturer"><i class="ion-android-list"></i> Details</a>
                                                    <a class="dropdown-item" href="users"><i class="ion-android-add"></i> Add new</a>
                                                    <a class="dropdown-item" href="index"><i class="ion-android-refresh"></i> Refresh</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center my-2">
                                            <div class="fs-40 fw-400 text-warning"><?=(get_stats('user','?column=user_type&keyword=lecturer'))?></div>
                                            <span class="fw-400 text-muted">Total</span>
                                        </div>
                                    </div>

                                    <div class="progress mb-0">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- col-ends -->
                            <!-- Col-starts -->
                            <div class="col-md-4">
                                <div class="card shadow-1">
                                    <div class="card-body">
                                        <div class="flexbox">
                                            <h5>Students</h5>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ti-more-alt rotate-90"></i></span>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="users?users=student"><i class="ion-android-list"></i> Details</a>
                                                    <a class="dropdown-item" href="users"><i class="ion-android-add"></i> Add new</a>
                                                    <a class="dropdown-item" href="index"><i class="ion-android-refresh"></i> Refresh</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center my-2">
                                            <div class="fs-40 fw-400 text-primary"><?=(get_stats('user','?column=user_type&keyword=student'))?></div>
                                            <span class="fw-400 text-muted">Total</span>
                                        </div>
                                    </div>

                                    <div class="progress mb-0">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- col-ends -->
                            <!-- Col-starts -->
                            <div class="col-md-6">
                                <div class="flexbox flex-justified text-center bg-white mb-15">
                                    <div class="no-shrink py-30">
                                        <i class="w-40px" data-i8-icon="department"></i>
                                    </div>

                                    <div class="py-30 bg-lighter">
                                        <div class="fs-30"><?=(get_stats('department',''))?></div>
                                        <span>Departments</span>
                                    </div>
                                </div>
                            </div>
                            <!-- col-ends -->
                            <!-- Col-starts -->
                            <div class="col-md-6">
                                <div class="flexbox flex-justified text-center bg-white mb-15">
                                    <div class="py-30 bg-lighter">
                                        <div class="fs-30"><?=(get_stats('course',''))?></div>
                                        <span>Courses</span>
                                    </div>
                                    <div class="no-shrink py-30">
                                        <i class="w-40px" data-i8-icon="reading"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- col-ends -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php include('../include/card/profile-card.php');?>
                    </div>
                </div>
            </div>
            <!--/.main-content -->
            <!-- Footer -->
            <footer class="site-footer">
                <?php include_once("../include/footer.php"); ?>
            </footer>
            <!-- END Footer -->
        </main>
        <!-- Scripts -->
        <?php include_once("../include/scripts.php"); ?>
    </body>
</html>
