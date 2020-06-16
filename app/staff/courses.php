<?php
    include_once("auth/index.php");
    include_once("../api-call.php");
    $course = callAPI('GET','course/list', false);
    $courseStatus = $course['status'];
    $courseListTotal = $course['list_total'];
    $courseData = $course['response'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once("../include/meta-tags.php"); ?>
        <title>Manage Courses &mdash; Tabuler</title>
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
                            <span class="icon fa fa-book text-muted text-muted"></span>
                            <strong>Courses</strong>
                        </h5>
                        <form class="lookup lookup-circle lookup-right lookup-sm">
                            <input type="text" name="s">
                        </form>
                    </div>
                    <div class="card-body bg-lighter bl-3 border-success p-0">
                        <div class="p-4 d-flex justify-content-between bb-1 border-light">
                            <div>
                                <div class="fs-12 text-muted"><i class="ti-time mr-1"></i> Info</div>
                                <div class="fs-18 text-primary">Add courses to the courses table only when departments has been added.</div>
                            </div>
    
                            <div class="fs-40 fw-100 text-right pr-2 text-success"><?=$courseListTotal?></div>
                        </div>
                    </div><!-- data-provide="datatables" -->
                    <div class="table-responsive">
                        <table class="table table-hover b-0" data-provide="selectall" data-table-url="course">
                            <thead>
                                <tr class="bg-lightest">
                                    <th class="w-40px">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <label class="custom-control-label"></label>
                                        </div>
                                    </th>
                                    <th class="font-weight-bold w-40px">#</th>
                                    <th class="font-weight-bold">Name</th>
                                    <th class="font-weight-bold">Course Code</th>
                                    <th class="font-weight-bold">Departments</th>
                                    <th class="font-weight-bold w-80px text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sn=0;
                                    foreach ($courseData as $row) {
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
                                    <td><?=ucwords($row['name'])?></td>
                                    <td><?=ucwords($row['course_code'])?></td>
                                    <td class=""><?=ucwords($row['department'][0]['department_name'])?></td>
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
            <a class="btn btn-float btn-primary" href="#dock-new-user" title="" data-provide="tooltip" data-toggle="dock" data-original-title="New Course">
                <i class="ti-plus"></i>
            </a>
        </div>
        <!-- Dock - Add Courses -->
        <div class="dock-list">
            <div id="dock-new-user" class="dock dock-sm h-350px">
                <header class="dock-header dock-header-inverse bg-brown">
                    <div class="dock-title">
                        <span><i class="fa fa-user"></i></span>
                        <span>New Course</span>
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
                    <form class="form-type-material regular-form" data-submit-url="course">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" required>
                            <label>Course Name</label>
                        </div>
        
                        <div class="form-group">
                            <input type="text" class="form-control" name="course_code" id="courseCode" required>
                            <label>Course Code</label>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="department" id="department" required>
                                <?php include('../include/options/department.php')?>
                            </select>
                            <label>Department</label>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-flat btn-primary submit-data" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Dock -->
        </div>
        <!-- END Dock - Add ... -->
        <!-- Scripts -->
        <?php include_once("../include/scripts.php"); ?>
    </body>
</html>
