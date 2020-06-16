<?php 
    include_once("auth/index.php");
    include_once("../api-call.php");
    $lecture_halls = callAPI('GET','lecture_halls/list', false);
    $lecture_hallsStatus = $lecture_halls['status'];
    $lecture_hallsListTotal = $lecture_halls['list_total'];
    $lecture_hallsData = $lecture_halls['response'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once("../include/meta-tags.php"); ?>
        <title>Sidebar Documentation &mdash; TheAdmin</title>
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
            <div class="main-content">
                <!-- List Content Card Starts-->
                <div class="card rounded-lg shadow-1">
                    <div class="card-header">
                        <h5 class="card-title">
                            <span class="icon fa fa-building-o text-muted"></span>
                            <strong>Lecture Halls</strong>
                        </h5>
                        <form class="lookup lookup-circle lookup-right lookup-sm">
                            <input type="text" name="s">
                        </form>
                    </div>
                    <div class="card-body bg-lighter bl-3 border-success p-0">
                        <div class="p-4 d-flex justify-content-between bb-1 border-light">
                            <div>
                                <div class="fs-12 text-muted"><i class="ti-time mr-1"></i> Info</div>
                                <div class="fs-18 text-primary">Please add Lecture halls or classes before adding data to the timetable table.</div>
                            </div>
    
                            <div class="fs-40 fw-100 text-right pr-2 text-success"><?=$lecture_hallsListTotal?></div>
                        </div>
                    </div><!-- data-provide="datatables" -->
                    <div class="table-responsive">
                        <table class="table table-hover b-0" data-provide="selectall" data-table-url="lecture_halls">
                            <thead>
                                <tr class="bg-lightest">
                                    <th class="w-40px">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <label class="custom-control-label"></label>
                                        </div>
                                    </th>
                                    <th class="font-weight-bold w-40px">#</th>
                                    <th class="font-weight-bold">Hall Name</th>
                                    <th class="font-weight-bold">Capacity</th>
                                    <th class="font-weight-bold w-80px text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sn=0;
                                    foreach ($lecture_hallsData as $row) {
                                    $sn++;
                                ?>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" data-check-input="<?=$row['id']?>">
                                            <label class="custom-control-label"></label>
                                        </div>
                                    </td>
                                    <th class="font-weight-bold"><?=$sn?></th>
                                    <td class=""><?=$row['hall_name']?></td>
                                    <td class=""><?=$row['capacity']?></td>
                                    <td>
                                        <nav class="nav no-gutters gap-2 fs-16">
                                            <a class="nav-link hover-primary" href="#" data-edit-id="<?=$row['id']?>" data-provide="tooltip" title="" data-original-title="Edit"><i class="ti-pencil"></i></a>
                                            <a class="nav-link hover-danger" href="#" data-delete-id="<?=$row['id']?>" data-provide="tooltip" title="" data-original-title="Delete"><i class="ti-trash"></i></a>
                                        </nav>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- List Content Card Ends-->
            </div>
            <!--/.main-content -->
            <!-- Footer -->
            <footer class="site-footer">
                <?php include_once("../include/footer.php"); ?>
            </footer>
            <!-- END Footer -->
        </main>
        <!-- END Main container -->
        <div class="fab fab-fixed">
            <a class="btn btn-float btn-primary" href="#dock-new-user" title="" data-provide="tooltip" data-toggle="dock" data-original-title="New Lecture">
                <i class="ti-plus"></i>
            </a>
        </div>
        <!-- Dock - Add ... -->
        <div class="dock-list">
            <div id="dock-new-user" class="dock dock-sm h-250px">
                <header class="dock-header dock-header-inverse bg-brown">
                    <div class="dock-title">
                        <span><i class="fa fa-user"></i></span>
                        <span>New Lecture Hall</span>
                    </div>

                    <div class="dock-actions">
                        <span title="" data-provide="tooltip" data-dock="close" data-original-title="Close"></span>
                        <span title="" data-provide="tooltip" data-dock="minimize" data-original-title="Minimize"></span>
                    </div>
                </header>

                <div class="dock-body dock-block">
                    <div class="alert alert-success d-none" id="formAlertSuccess">
                        <span class="">Data Successfully Added, page will refresh in 1 Second <i class="fa fa-check-circle"></i>
                        </span>
                    </div>
                    <div class="alert alert-danger d-none" id="formAlertError">
                        <span id="formErrorMessage">
                        </span> <i class="fa fa-exclamation-circle"></i>
                    </div>
                    <form class="form-type-material regular-form"  data-submit-url="lecture_halls">
                        <div class="form-group">
                            <input type="text" class="form-control" name="hall_name" id="hallName" required>
                            <label>Hall Name</label>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" name="capacity" id="capacity" required>
                            <label>Capacity</label>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-flat btn-primary submit-data" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Dock - Compose an email -->
        </div>
        <!-- END Dock - Add ... -->
        <!-- Scripts -->
        <?php include_once("../include/scripts.php"); ?>
    </body>
</html>
