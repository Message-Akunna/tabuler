<?php include_once("auth/index.php"); ?>
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
            <header class="header bg-img mb-0" style="background-image: url(../../assets/img/login/bg-tabuler-clock.jpg)">
                <div class="header-info h-100px mb-0">
                    <div class="media align-items-end">
                        <img class="avatar avatar-xl avatar-bordered" src="../../assets/img/avatar/1.jpg" alt="...">
                        <div class="media-body pt-0 mt-0">
                            <p class="text-white fs-20 pt-0 mt-0"><strong><?=$userName?></strong></p>
                            <small class="text-white"><?=$userType?></small>
                        </div>
                    </div>
                </div>
                
                <div class="header-action bg-white">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#profile-info"><span class="d-block d-md-none"><i class="ti-user"></i></span> <span class="d-none d-md-block"> Info</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile-settings"><span class="d-block d-md-none"><i class="ti-settings"></i></span><span class="d-none d-md-block"> Setting</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#change-password"><span class="d-block d-md-none"><i class="ti-lock"></i></span><span class="d-none d-md-block"> Change Password</span></a>
                        </li>
                    </ul>
                </div>
            </header>
            <div class="main-content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-content">
                            <!--
                            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
                            | User details
                            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
                            !-->
                            <div class="card bl-3 border-primary tab-pane fade active show" id="profile-info">
                                <ol class="timeline timeline-activity timeline-point-sm timeline-content-right w-100 py-20 pr-20">
                                    <li class="timeline-block">
                                        <div class="timeline-point">
                                            <span class="badge badge-ring badge-secondary"></span>
                                        </div>
                                        <div class="timeline-content">
                                            <time datetime="2018"><i class="ti-user"></i> Full Name</time>
                                            <p><?=$userData->first_name." ".$userData->last_name." ".$userData->other_names?>.</p>
                                        </div>
                                    </li>

                                    <li class="timeline-block">
                                        <div class="timeline-point">
                                            <span class="badge badge-ring badge-secondary"></span>
                                        </div>
                                        <div class="timeline-content">
                                            <time datetime="2018"><i class="ti-map-alt"></i> Address</time>
                                            <p><?=$userData->address?>.</p>
                                        </div>
                                    </li>
                                    <li class="timeline-block">
                                        <div class="timeline-point">
                                            <span class="badge badge-ring badge-secondary"></span>
                                        </div>
                                        <div class="timeline-content">
                                            <time datetime="2018"><i class="ti-stamp"></i> Gender</time>
                                            <p><?= ucfirst($userData->gender)?>.</p>
                                        </div>
                                    </li>

                                    <li class="timeline-block">
                                        <div class="timeline-point">
                                            <span class="badge badge-ring badge-secondary"></span>
                                        </div>
                                        <div class="timeline-content">
                                            <time datetime="2018"><i class="ti-mobile"></i> Phone Number</time>
                                            <p><?=$userData->phoneno?></p>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                            <!--
                            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
                            | Update Forms
                            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
                            !-->
                            <div class="card bb-3 border-primary tab-pane fade" id="profile-settings" data-user-id="<?=$userData->id?>">
                                <div class="card-body">
                                    <form class="form-type-material update-user-form" id="updateUserForm">
                                        <div class="form-group do-float">
                                            <input type="text" class="form-control" value="<?=$userData->first_name?>">
                                            <label>First Name</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group do-float">
                                                    <input type="text" class="form-control" value="<?=$userData->last_name?>">
                                                    <label>Last Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group do-float">
                                                    <input type="text" class="form-control" value="<?=$userData->other_names?>">
                                                    <label>Other Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group do-float">
                                            <input type="text" class="form-control" value="(+123) <?=$userData->phoneno?>">
                                            <label>Phone Number</label>
                                        </div>
                                        <div class="form-group do-float">
                                            <input type="text" class="form-control" value="<?=$userData->address?>">
                                            <label>Address</label>
                                        </div>
                                        <div class="form-group text-right mb-0">
                                            <button class="btn btn-flat btn-primary update-user-account" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--
                            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
                            | Change Password Forms
                            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
                            !-->
                            <div class="card br-3 border-primary tab-pane fade" id="change-password">
                                <div class="card-body">
                                    <form class="form-type-material update-user-form" id="changeUserPasswordForm">
                                        <div class="form-group do-float">
                                            <input type="text" class="form-control" id="">
                                            <label>Old Password</label>
                                        </div>
                                        <div class="form-group do-float">
                                            <input type="text" class="form-control" id="">
                                            <label>New Password</label>
                                        </div>
                                        <div class="form-group do-float">
                                            <input type="text" class="form-control" id="">
                                            <label>Confirm Password</label>
                                        </div>
                                        <input type="text" class="form-control" value="" id="" hidden>
                                        <div class="form-group text-right mb-0">
                                            <button class="btn btn-flat btn-primary change-user-password" type="submit">Change Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
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
