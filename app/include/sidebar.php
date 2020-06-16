<header class="sidebar-header bg-brown">
    <a class="logo-icon" href="index">
        <h4 class="text-brown bg-white font-weight-bolder rounded-circle px-2 mx-2">T</h4>
    </a>
    <span class="logo">
        <a href="index">
            <h2 class="text-white">Tabuler</h2>
        </a>
    </span>
    <span class="sidebar-toggle-fold"></span>
</header>

<nav class="sidebar-navigation">

    <div class="sidebar-profile">
        <div class="dropdown">
        <span class="dropdown-toggle no-caret" data-toggle="dropdown">
            <img class="avatar b-2 border-pale-brown" src="../../assets/img/avatar/7.jpg" alt="...">
        </span>
        <div class="dropdown-menu open-top-center">
            <a class="dropdown-item" href="profile"><i class="ti-user"></i> Profile</a>
            <a class="dropdown-item" href="#"><i class="ti-help"></i> Help</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../logout"><i class="ti-power-off"></i> Logout</a>
        </div>
        </div>

        <div class="profile-info">
            <h4 class="mb-0"><?=ucwords($userName);?></h4>
            <p class=""><?=ucwords($userType);?></p>
        </div>
    </div>

    <ul class="menu menu-bordery menu-sm">
        <li class="menu-category">Preview</li>
        <li class="menu-item <?=((basename($_SERVER['PHP_SELF']) == 'index.php')? 'active': '');?>">
            <a class="menu-link" href="index">
                <span class="icon fa fa-home"></span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li class="menu-category">Main Menu</li>

        <li class="menu-item <?=((basename($_SERVER['PHP_SELF']) == 'users.php')? 'active': '');?>">
            <a class="menu-link" href="users">
                <span class="icon fa fa-users"></span>
                <span class="title">Users</span>
            </a>
        </li>
        <li class="menu-item <?=((basename($_SERVER['PHP_SELF']) == 'courses.php')? 'active': '');?>">
            <a class="menu-link" href="courses">
                <span class="icon fa fa-book"></span>
                <span class="title">Courses</span>
            </a>
        </li>
        <li class="menu-item <?=((basename($_SERVER['PHP_SELF']) == 'departments.php')? 'active': '');?>">
            <a class="menu-link" href="departments">
                <span class="icon fa fa-bank"></span>
                <span class="title">Department</span>
            </a>
        </li>
        <li class="menu-item <?=((basename($_SERVER['PHP_SELF']) == 'lecture-halls.php')? 'active': '');?>">
            <a class="menu-link" href="lecture-halls">
                <span class="icon fa fa-building-o"></span>
                <span class="title">Lecture Halls</span>
            </a>
        </li>
        <li class="menu-item <?=((basename($_SERVER['PHP_SELF']) == 'periods.php')? 'active': '');?>">
            <a class="menu-link" href="periods">
                <span class="icon fa fa-clock-o"></span>
                <span class="title">Period</span>
            </a>
        </li>
        <li class="menu-item <?=((basename($_SERVER['PHP_SELF']) == 'calender.php')? 'active': '');?>">
            <a class="menu-link" href="calender">
                <span class="icon fa fa-calendar"></span>
                <span class="title">Calender</span>
            </a>
        </li>
        <li class="menu-item <?=((basename($_SERVER['PHP_SELF']) == 'timetable.php')? 'active': '');?>">
            <a class="menu-link" href="timetable">
                <span class="icon fa fa-calendar-check-o"></span>
                <span class="title">Timetable</span>
            </a>
        </li>

        <li class="menu-divider"></li>
        <li class="menu-category">Settings</li>
        <li class="menu-item <?=((basename($_SERVER['PHP_SELF']) == 'profile.php')? 'active': '');?>">
            <a class="menu-link" href="profile">
                <span class="icon fa fa-user"></span>
                <span class="title">Profile</span>
            </a>
        </li>
    </ul>
</nav>