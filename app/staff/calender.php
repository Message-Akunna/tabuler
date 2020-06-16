<?php
    include_once("auth/index.php");
    include_once("../api-call.php");
    $calender = callAPI('GET','calender/list', false);
    $calenderStatus = $calender['status'];
    $calenderListTotal = $calender['list_total'];
    $calenderData = $calender['response'];
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
                            <span class="icon fa fa-calendar text-muted"></span>
                            <strong>Calender</strong>
                        </h5>
                        <form class="lookup lookup-circle lookup-right lookup-sm">
                            <input type="text" name="s">
                        </form>
                    </div>
                    <div class="card-body bg-lighter bl-3 border-success p-0">
                        <div class="p-4 d-flex justify-content-between bb-1 border-light">
                            <div>
                                <div class="fs-12 text-muted"><i class="ti-time mr-1"></i> Info</div>
                                <div class="fs-18 text-primary">Please do not modify this data unless if/when necessary.</div>
                            </div>
    
                            <div class="fs-40 fw-100 text-right pr-2 text-success"><?=$calenderListTotal?></div>
                        </div>
                    </div>
                    <!-- data-provide="datatables" -->
                    <div class="table-responsive">
                        <table class="table table-hover b-0" data-provide="selectall" data-table-url="calender">
                            <thead>
                                <tr class="bg-lightest">
                                    <th class="w-40px">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <label class="custom-control-label"></label>
                                        </div>
                                    </th>
                                    <th class="font-weight-bold w-40px">#</th>
                                    <th class="font-weight-bold">Day</th>
                                    <th class="w-80px text-center font-weight-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sn=0;
                                    foreach ($calenderData as $row) {
                                    $sn++;
                                ?>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" data-check-input="<?=$row['id']?>">
                                            <label class="custom-control-label"></label>
                                        </div>
                                    </td>
                                    <td class="font-weight-bold"><?=$sn?></td>
                                    <td><?=ucwords($row['day'])?></td>
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
                    <!-- Table Responsive ends -->
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
            <a class="btn btn-float btn-primary" href="#dock-new-user" title="" data-provide="tooltip" data-toggle="dock" data-original-title="New day">
                <i class="ti-plus"></i>
            </a>
        </div>
        <!-- Dock - Add ... -->
        <div class="dock-list">
            <div id="dock-new-user" class="dock dock-sm h-200px">
                <header class="dock-header dock-header-inverse bg-brown">
                    <div class="dock-title">
                        <span><i class="fa fa-user"></i></span>
                        <span>New Day</span>
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
                    <form class="form-type-material regular-form" data-submit-url="calender">
                        <div class="form-group">
                            <input type="text" class="form-control" name="day" id="day" required>
                            <label>Day</label>
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
