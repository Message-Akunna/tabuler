
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
            <!-- Page aside -->
            <aside class="aside aside-expand-md">
                <!--  data-ps-id="15919345-3b48-225a-fde1-12a9856b3aa1" -->
                <div class="aside-body ps-container ps-theme-default">
                    <ul class="nav nav-lg nav-pills flex-column">
                        <li class="nav-item active">
                            <i class="fa fa-users"></i>
                            <a class="nav-link" href="#">All Users</a>
                            <span class="badge badge-pill badge-default bg-pale-warning">11,223</span>
                        </li>

                    </ul>
                    <hr>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                        <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 2px;">
                        <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                    </div>
                </div>
                <button class="aside-toggler"></button>
            </aside>
            <!-- END Page aside -->

            <div class="main-content">
                <!-- Content Starts-->
                <div class=""></div>
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
            <a class="btn btn-float btn-primary" href="#dock-new-user" title="" data-provide="tooltip" data-toggle="dock" data-original-title="New ...">
                <i class="ti-plus"></i>
            </a>
        </div>
        <!-- Dock - Add ... -->
        <div class="dock-list">
            <div id="dock-new-user" class="dock dock-sm">
                <header class="dock-header dock-header-inverse bg-brown">
                    <div class="dock-title">
                        <span><i class="fa fa-user"></i></span>
                        <span>New User</span>
                    </div>

                    <div class="dock-actions">
                        <span title="" data-provide="tooltip" data-dock="close" data-original-title="Close"></span>
                        <span title="" data-provide="tooltip" data-dock="minimize" data-original-title="Minimize"></span>
                    </div>
                </header>

                <div class="dock-body dock-block form-type-material ps-container ps-theme-default" data-ps-id="6aa54add-19fa-6667-a65b-86d80755d697">
                    <div class="form-group">
                        <input type="text" class="form-control">
                        <label>Name</label>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control">
                        <label>Email Address</label>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control">
                        <label>Password</label>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control">
                        <label>Password Again (confirm)</label>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control">
                        <label>Phone Number</label>
                    </div>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                        <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 2px;">
                        <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                    </div>
                </div>

                <footer class="dock-footer text-right">
                    <button class="btn btn-flat btn-secondary" type="button" data-dock="close">Cancel<svg><circle cx="51" cy="21" r="90.7396" style="r: 90.7396px; display: none;"></circle></svg></button>
                    <button class="btn btn-flat btn-primary" type="submit">Create</button>
                </footer>
            </div>

            <!-- Dock - Compose an email -->
        </div>
        <!-- END Dock - Add ... -->
        <!-- Scripts -->
        <?php include_once("../include/scripts.php"); ?>
    </body>
</html>
