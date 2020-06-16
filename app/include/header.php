<div class="topbar-left">
    <span class="topbar-btn sidebar-toggler"><i>☰</i></span>
    <div class="dropdown dropdown-sm d-none d-md-block">
        <span class="topbar-btn" data-toggle="dropdown"><i class="ti-layout-grid3-alt"></i></span>
        <div class="dropdown-menu dropdown-grid">
            <a class="dropdown-item <?php echo((basename($_SERVER['PHP_SELF']) == 'index.php')? 'active': '');?>" href="index">
                <span data-i8-icon="home"></span>
                <span class="title">Dashboard</span>
            </a>
            <a class="dropdown-item <?php echo((basename($_SERVER['PHP_SELF']) == 'users.php?users=staffs')? 'active': '');?>" href="users?users=staffs">
                <span data-i8-icon="portrait_mode"></span>
                <span class="title">Staffs</span>
            </a>
            <a class="dropdown-item <?php echo((basename($_SERVER['PHP_SELF']) == 'users.php?users=lecturers')? 'active': '');?>" href="users?users=lecturers">
                <span data-i8-icon="businesswoman"></span>
                <span class="title">Lecturers</span>
            </a>
            <a class="dropdown-item <?php echo((basename($_SERVER['PHP_SELF']) == 'users.php?users=students')? 'active': '');?>" href="users?users=students">
                <span data-i8-icon="reading_ebook"></span>
                <span class="title">Students</span>
            </a> 
            <a class="dropdown-item <?php echo((basename($_SERVER['PHP_SELF']) == 'courses.php')? 'active': '');?>" href="courses">
                <span data-i8-icon="reading"></span>
                <span class="title">Courses</span>
            </a>
            <a class="dropdown-item <?php echo((basename($_SERVER['PHP_SELF']) == 'department.php')? 'active': '');?>" href="department">
                <span data-i8-icon="department"></span>
                <span class="title">Departments</span>
            </a>
            <a class="dropdown-item <?php echo((basename($_SERVER['PHP_SELF']) == 'timetable.php')? 'active': '');?>" href="timetable">
                <span data-i8-icon="overtime"></span>
                <span class="title">Time Table</span>
            </a>
            <a class="dropdown-item <?php echo((basename($_SERVER['PHP_SELF']) == 'calender.php')? 'active': '');?>" href="calender">
                <span data-i8-icon="planner"></span>
                <span class="title">Calender</span>
            </a>
            <a class="dropdown-item <?php echo((basename($_SERVER['PHP_SELF']) == 'profile.php')? 'active': '');?>" href="profile">
                <span data-i8-icon="businessman"></span>
                <span class="title">Profile</span>
            </a>
        </div>
    </div>

    <div class="topbar-divider d-none d-md-block"></div>

    <div class="lookup d-none d-md-block topbar-search" id="theadmin-search">
        <input class="form-control w-300px" type="text" autofocus="false" autocomplete="FALSE">
        <div class="lookup-placeholder">
            <i class="ti-search"></i>
            <span><strong>Try</strong> button, slider, modal, etc.</span>
        </div>
    </div>
</div>

<div class="topbar-right">
    <ul class="topbar-btns">
        <li class="dropdown">
            <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="../../assets/img/avatar/1.jpg" alt="..."></span>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile"><i class="ti-user"></i> Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../logout"><i class="ti-lock"></i> Lock</a>
                <a class="dropdown-item" href="../logout"><i class="ti-power-off"></i> Logout</a>
            </div>
        </li>
        <div class="topbar-divider"></div>
        <!-- Notifications -->
        <li class="dropdown d-none d-md-block">
            <span class="topbar-btn has-new" data-toggle="dropdown"><i class="ti-bell"></i></span>
            <div class="dropdown-menu dropdown-menu-right">

            <div class="media-list media-list-hover media-list-divided media-list-xs">
                <a class="media media-new" href="#">
                    <span class="avatar bg-success"><i class="ti-user"></i></span>
                    <div class="media-body">
                        <p>Welcome, How are you doing today?</p>
                        <time datetime="2018-07-14 20:00">Just now</time>
                    </div>
                </a>
            </div>
            <div class="dropdown-footer">
                <div class="left">
                    <a href="#">Read all notifications</a>
                </div>

                <div class="right">
                    <a href="index" data-provide="tooltip" title="Mark all as read"><i class="fa fa-circle-o"></i></a>
                    <a href="#" data-provide="tooltip" title="Update"><i class="fa fa-repeat"></i></a>
                    <a href="#" data-provide="tooltip" title="Settings"><i class="fa fa-gear"></i></a>
                </div>
            </div>

            </div>
        </li>
        <!-- END Notifications -->
    </ul>
</div>